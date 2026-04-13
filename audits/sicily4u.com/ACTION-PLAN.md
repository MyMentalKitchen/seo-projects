# SEO Action Plan: Sicily4u (www.sicily4u.com)

**URL:** https://www.sicily4u.com
**Date:** 2026-04-13
**Current Score:** 42/100
**Target Score:** 75/100 (achievable within 3 months)

---

## CRITICAL Priority -- Fix Immediately

### 1. Fix Conflicting Robots Meta Tags (De-Indexing ~65+ Pages)
- **Issue:** The homepage, all ~65 villa/accommodation detail pages, and the contact page output TWO conflicting robots meta tags: `index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1` AND `noindex, nofollow`. Google honors the most restrictive directive, so these pages are likely being de-indexed.
- **Root Cause:** A WooCommerce or MotoPress Hotel Booking plugin is injecting the second `<meta name="robots" content="noindex, nofollow">` tag on pages that contain booking functionality. Standard WordPress pages/posts are unaffected.
- **Impact:** This is the single most damaging SEO issue. The homepage and every villa detail page (the site's core commercial pages) may be invisible in Google Search. This could account for a 50-80% loss in potential organic traffic.
- **Fix:**
  1. Check WooCommerce settings: Go to **WooCommerce > Settings > Products** and look for any "Shop page" or "Catalog visibility" setting that adds noindex to non-standard pages.
  2. Check MotoPress Hotel Booking settings: Look for an option related to search engine indexing of accommodation pages.
  3. Check the Yoast/RankMath/AIOSEO plugin (whichever is installed) for global robots settings that may conflict.
  4. If you cannot find the setting, add this to your theme's `functions.php` to force-remove the conflicting tag:
     ```php
     add_action('wp_head', function() {
         // Remove WooCommerce noindex if it conflicts
         remove_action('wp_head', 'wc_page_noindex');
     }, 1);
     ```
  5. After fixing, verify in View Source that only ONE robots meta tag exists on villa pages.
  6. Use Google Search Console's URL Inspection tool to request re-indexing of the homepage and key villa pages.
- **Effort:** 1-2 hours to diagnose and fix
- **Expected Result:** Homepage and all villa pages re-indexed within 1-3 weeks; significant organic traffic recovery

### 2. Fix robots.txt (Currently Returns 403 Forbidden)
- **Issue:** `https://www.sicily4u.com/robots.txt` returns an HTTP 403 Forbidden status code. Search engine crawlers cannot access crawl directives.
- **Impact:** Without a valid robots.txt, crawlers may waste crawl budget on low-value pages, and the sitemap declaration in robots.txt is inaccessible.
- **Fix:**
  1. Check if a security plugin (Wordfence, Sucuri, etc.) or the server firewall is blocking access to `robots.txt`.
  2. Ensure WordPress can generate the default robots.txt by checking **Settings > Reading** -- make sure "Discourage search engines" is NOT checked.
  3. If using a custom robots.txt file, ensure the web server is configured to serve it with a 200 status code.
  4. Recommended robots.txt content:
     ```
     User-agent: *
     Allow: /

     Sitemap: https://sicily4u.com/sitemap_index.xml
     ```
- **Effort:** 30 minutes
- **Expected Result:** Crawlers can access directives; sitemap auto-discovered

### 3. Remove or Noindex Test/Internal Pages
- **Issue:** `/test-blog` is publicly accessible and may be indexed. `/booking-confirmation` and `/search-results-without-dates` are internal transactional pages that should not appear in search results.
- **Fix:**
  1. Delete `/test-blog` if it's no longer needed, or set it to Draft status.
  2. Add `noindex, nofollow` via your SEO plugin (Yoast/RankMath) to:
     - `/booking-confirmation`
     - `/search-results-without-dates`
  3. Also noindex the `/category/uncategorized` page.
- **Effort:** 15 minutes
- **Expected Result:** Eliminates crawl waste and prevents low-quality pages from appearing in search

---

## HIGH Priority -- Fix Within 1 Week

### 4. Add JSON-LD Structured Data (Organization + WebSite)
- **Issue:** Zero JSON-LD structured data exists site-wide. This is a significant missed opportunity for rich results.
- **Fix:** Add the following to your theme's `header.php` or via an SEO plugin:
  ```json
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Sicily4u",
    "url": "https://sicily4u.com",
    "logo": "https://sicily4u.com/wp-content/uploads/2025/01/cropped-logo_sicily4u.png",
    "sameAs": [],
    "contactPoint": {
      "@type": "ContactPoint",
      "contactType": "customer service",
      "availableLanguage": ["English"]
    }
  }
  ```
  And on the homepage:
  ```json
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "Sicily4u",
    "url": "https://sicily4u.com",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "https://sicily4u.com/?s={search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
  ```
- **Effort:** 1-2 hours
- **Expected Result:** Knowledge panel eligibility; sitelinks search box in SERPs

### 5. Add LodgingBusiness/VacationRental Schema to Villa Pages
- **Issue:** Villa detail pages have no structured data, missing out on accommodation rich results.
- **Fix:** Add per-villa JSON-LD with `VacationRental` or `LodgingBusiness` schema including name, description, image, location (address, geo coordinates), amenities, and number of rooms/beds.
- **Effort:** 3-4 hours (template-level implementation)
- **Expected Result:** Rich accommodation results in Google Search

### 6. Add FAQPage Schema to /faqs
- **Issue:** The FAQs page has question-and-answer content but no FAQPage structured data.
- **Fix:** Add `FAQPage` JSON-LD with each question/answer pair marked up.
- **Effort:** 1 hour
- **Expected Result:** FAQ rich results with expandable Q&A directly in search results

### 7. Add Article/BlogPosting Schema to Blog Posts
- **Issue:** Blog posts have author attribution and dates in the HTML but no Article structured data.
- **Fix:** Add `Article` or `BlogPosting` JSON-LD to blog post templates including headline, author, datePublished, dateModified, image.
- **Effort:** 1 hour (template-level implementation)
- **Expected Result:** Article rich results with author and date in SERPs

### 8. Fix Garbled Meta Description on /locations Page
- **Issue:** The meta description reads: "Gorgeous Villas in Sicily Fully-equipped villas for a relaxing vacation without stress and worrying. Explore All Destinations CefaluDiscover Luxury Cefalu" -- navigation and UI text has leaked into the description.
- **Fix:** Write a proper, hand-crafted meta description: "Explore our villa locations across Sicily -- from Taormina and Cefalu to Syracuse, Noto, and the Aeolian Islands. Find your perfect Sicilian retreat."
- **Effort:** 10 minutes
- **Expected Result:** Clean SERP snippet for an important landing page

### 9. Fix Duplicate Viewport Meta Tags
- **Issue:** The same pages affected by the robots conflict also have two viewport meta tags. The second adds `maximum-scale=1` which prevents user zooming (accessibility violation).
- **Fix:** This will likely be resolved by the same plugin fix as item #1. If not, add to `functions.php`:
  ```php
  add_action('wp_head', function() {
      // Remove duplicate viewport injected by plugin
      echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  }, 1);
  ```
  And ensure the plugin's duplicate is removed.
- **Effort:** Included with fix #1
- **Expected Result:** Single viewport tag; users can zoom (accessibility compliance)

---

## MEDIUM Priority -- Fix Within 1 Month

### 10. Fix "Accommodation Types Archive" Page Title
- **Issue:** The `/accommodation` page displays WordPress's default archive title: "Accommodation Types Archive - Sicily4u".
- **Fix:** Set a custom SEO title via your SEO plugin: "Luxury Villas in Sicily | Browse All Properties | Sicily4u"
- **Effort:** 5 minutes
- **Expected Result:** Professional, keyword-rich title in SERPs

### 11. Add Missing Meta Descriptions
- **Issue:** `/accommodation` has no meta description. `/privacy-policy` and `/terms-conditions` have auto-generated descriptions from page content.
- **Fix:**
  - `/accommodation`: "Browse our full collection of handpicked luxury villas across Sicily. Filter by location, amenities, and availability for your perfect Sicilian holiday."
  - `/privacy-policy`: "Read Sicily4u's privacy policy. Learn how we handle your personal data when you browse our site or book a villa in Sicily."
  - `/terms-conditions`: "Review Sicily4u's booking terms and conditions, including payment policies, cancellation rules, and rental agreements for our Sicily villas."
- **Effort:** 15 minutes
- **Expected Result:** Custom descriptions appear in search results instead of garbled auto-generated text

### 12. Migrate Images from sicily4u.co.uk to sicily4u.com
- **Issue:** The About Us page loads team member images from the old `sicily4u.co.uk` domain. This creates a cross-domain dependency.
- **Fix:** Download the images and upload them to the WordPress media library on `sicily4u.com`. Update the About Us page to reference the new URLs.
- **Effort:** 30 minutes
- **Expected Result:** No cross-domain dependencies; faster loading; resilient to old domain changes

### 13. Fix OG Image Issues
- **Issue:** Multiple OG image problems:
  - `/locations`: OG image uses `http://` (not HTTPS) and has a double-slash in the path
  - `/faqs`, `/locations/taormina`, `/accommodation`: Missing OG image entirely
  - `/about-us`: OG image points to old `.co.uk` domain
- **Fix:**
  - Set a featured image on pages missing OG images
  - Fix the Locations page OG image URL to use HTTPS with correct path
  - After migrating About Us images (#12), the OG image will automatically update
- **Effort:** 30 minutes
- **Expected Result:** All social shares display proper preview images

### 14. Canonicalize Duplicate Listing Views
- **Issue:** Three URLs serve similar villa listings in different layouts: `/villas-grid-view`, `/villas-list-view`, `/map-view`. This risks duplicate content.
- **Fix:** Choose one as the canonical version (e.g., `/sicily-villas`) and add `<link rel="canonical">` pointing to it from the other views. Or consolidate into a single page with a view toggle that doesn't change the URL.
- **Effort:** 1-2 hours
- **Expected Result:** Consolidated link equity; no duplicate content signals

### 15. Fix Contact Page Meta Description Typo
- **Issue:** Description reads "...if you have any enquires..." -- "enquires" should be "enquiries".
- **Fix:** Update the meta description in the SEO plugin.
- **Effort:** 2 minutes
- **Expected Result:** Professional, error-free SERP snippet

### 16. Fix About Us Page Heading Structure
- **Issue:** Two H1 tags on the About Us page: "About Us" and "Why choose Sicily4u Villas". Each page should have exactly one H1.
- **Fix:** Change the second H1 to an H2 in the WordPress block editor.
- **Effort:** 5 minutes
- **Expected Result:** Proper heading hierarchy for crawlers and screen readers

---

## LOW Priority -- Fix Within 3 Months

### 17. Add BreadcrumbList Schema Site-Wide
- **Issue:** No breadcrumb structured data.
- **Fix:** Implement BreadcrumbList JSON-LD on all pages reflecting the site hierarchy (Home > Locations > Taormina, Home > Accommodation > Villa La Boheme, etc.).
- **Effort:** 2-3 hours (template-level implementation)
- **Expected Result:** Breadcrumb rich results in SERPs improve CTR and show page hierarchy

### 18. Resolve Domain Strategy (sicily4u.com vs. sicily4u.co.uk)
- **Issue:** Two active domains with no hreflang tags or redirects linking them. This may cause duplicate content and split link equity.
- **Fix:**
  - If `.co.uk` is the legacy site: Set up 301 redirects from all `.co.uk` URLs to their `.com` equivalents.
  - If both are actively used for different markets: Implement `hreflang` tags to tell Google which domain serves which audience.
- **Effort:** 2-4 hours depending on approach
- **Expected Result:** Consolidated domain authority; no duplicate content across domains

### 19. Remove WordPress/WooCommerce Version from Generator Meta
- **Issue:** `<meta name="generator" content="WordPress 6.9.4">` and `<meta name="generator" content="WooCommerce 10.3.8">` expose exact software versions.
- **Fix:** Add to `functions.php`:
  ```php
  remove_action('wp_head', 'wp_generator');
  add_filter('woocommerce_hide_invisible_variations', '__return_true');
  ```
  Or use a security plugin to strip generator tags.
- **Effort:** 10 minutes
- **Expected Result:** Reduced attack surface

### 20. Improve Blog URL Structure
- **Issue:** Blog posts sit at the root URL level (e.g., `/best-beaches-in-sicily`) alongside pages (`/faqs`). This creates a flat hierarchy.
- **Fix:** Consider adding a `/blog/` prefix to blog post permalinks in **Settings > Permalinks**. Note: This requires 301 redirects from old URLs and carries short-term ranking risk. Evaluate carefully.
- **Effort:** 1-2 hours (including redirect setup)
- **Expected Result:** Clearer URL hierarchy; better content organization signals

---

## Implementation Timeline

| Week | Actions | Expected Score Impact |
|------|---------|---------------------|
| **Week 1** | Fix #1 (robots conflict), #2 (robots.txt), #3 (test pages) | 42 -> 55 |
| **Week 2** | Fix #4-#7 (JSON-LD schemas), #8 (locations description), #9 (viewport) | 55 -> 65 |
| **Week 3-4** | Fix #10-#16 (titles, descriptions, images, canonicals) | 65 -> 72 |
| **Month 2-3** | Fix #17-#20 (breadcrumbs, domain strategy, security, URLs) | 72 -> 78 |

---

## Monitoring & Verification

After implementing fixes:

1. **Google Search Console:** Monitor the "Pages" report for indexing status changes. Villa pages should move from "Excluded" to "Indexed" within 2-4 weeks.
2. **URL Inspection Tool:** Manually request re-indexing of the homepage and top 10 villa pages after fixing the robots conflict.
3. **Rich Results Test:** Validate JSON-LD schema on key pages at https://search.google.com/test/rich-results
4. **Mobile-Friendly Test:** Verify viewport fix resolves any mobile usability issues.
5. **View Source:** After each fix, verify the HTML source of affected pages to confirm only correct meta tags are present.

---

## Summary

The most impactful single fix is resolving the conflicting robots meta tags (#1). This one change could recover visibility for 65+ pages and dramatically increase organic traffic. Combined with adding structured data (#4-#7) and fixing the robots.txt (#2), the site could move from a 42/100 to a 65+/100 within two weeks. The remaining medium and low priority items are incremental improvements that will push the score toward 75-80/100 over the following months.
