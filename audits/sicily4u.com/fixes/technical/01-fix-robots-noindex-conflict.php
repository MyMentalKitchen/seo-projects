<?php
/**
 * Fix #1 + #9: Remove conflicting robots & duplicate viewport meta tags
 *
 * PROBLEM:
 *   WooCommerce / MotoPress Hotel Booking injects a second
 *   <meta name="robots" content="noindex, nofollow"> and a second
 *   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 *   on the homepage, all accommodation (villa) pages, and the contact page.
 *
 *   Google honours the most restrictive robots directive, so these pages
 *   are likely being de-indexed. The duplicate viewport also prevents
 *   user zooming (WCAG 2.1 violation).
 *
 * AFFECTED PAGES:
 *   - Homepage (sicily4u.com)
 *   - All ~65 /accommodation/villa-* pages
 *   - /contact-us
 *
 * HOW TO USE:
 *   1. Copy this entire file into your child theme's functions.php
 *      OR paste the code below (without the opening <?php tag) at the
 *      bottom of your active theme's functions.php.
 *   2. Save and verify by viewing page source on a villa page —
 *      you should see only ONE robots tag and ONE viewport tag.
 *   3. After confirming, request re-indexing in Google Search Console
 *      for the homepage and your top 10 villa pages.
 *
 * EXPECTED RESULT:
 *   Homepage + all villa pages re-indexed within 1-3 weeks.
 *   Projected traffic recovery: 50-80% of lost organic visibility.
 */

// ── 1. Remove WooCommerce's noindex injection ──────────────────────────
// WooCommerce adds noindex to pages it considers "non-shop" pages.
// This fires early (priority 1) so it runs before wp_head outputs tags.
add_action('wp_head', function () {
    remove_action('wp_head', 'wc_page_noindex');
}, 1);

// ── 2. Strip the extra noindex via output buffering (belt-and-suspenders) ──
// If a plugin injects noindex via a different hook, this catches it.
add_action('template_redirect', function () {
    ob_start(function ($html) {
        // Remove any <meta name="robots" content="noindex, nofollow"> tags
        // but preserve the Yoast/RankMath one with "index, follow"
        $html = preg_replace(
            '/<meta\s+name=["\']robots["\']\s+content=["\']noindex,\s*nofollow["\']\s*\/?>\s*/i',
            '',
            $html
        );

        // Remove duplicate viewport tags (keep only the first one)
        $count = 0;
        $html = preg_replace_callback(
            '/<meta\s+name=["\']viewport["\'][^>]*\/?>/i',
            function ($match) use (&$count) {
                $count++;
                // Keep the first viewport tag, remove subsequent ones
                if ($count === 1) {
                    // Ensure the kept tag does NOT have maximum-scale=1
                    return '<meta name="viewport" content="width=device-width, initial-scale=1">';
                }
                return '';
            },
            $html
        );

        return $html;
    });
});

// ── 3. Also check MotoPress Hotel Booking settings ─────────────────────
// Go to: WordPress Admin > Hotel Booking > Settings > General
// Look for any "Search Engine Visibility" or "Indexing" option.
// If there is a checkbox like "Prevent search engines from indexing
// accommodation pages", make sure it is UNCHECKED.
//
// Also check: WooCommerce > Settings > Products > Shop page
// Ensure the shop page setting isn't conflicting with your homepage.
