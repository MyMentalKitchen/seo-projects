# SEO Action Plan: Sicily4u (www.sicily4u.com) — Updated

**URL:** https://www.sicily4u.com
**Date:** 2026-08-13
**Previous Audit:** 2026-04-13
**Current Score:** 57/100 (up from 42/100)
**Target Score:** 78/100 (achievable within 6 weeks)

---

## Progress Since April 2026

### Completed Fixes

| # | Fix | Status | Score Impact |
|---|-----|--------|-------------|
| 1 | Conflicting robots meta tags removed | **DONE** | +15 |
| 2 | robots.txt now returns 200 OK | **DONE** | +3 |
| 9 | Duplicate viewport tags removed | **DONE** | +2 |
| 16 | About Us dual H1 heading fixed | **DONE** | +1 |
| — | About Us OG image migrated to .com domain | **DONE** | +1 |
| — | WordPress + WooCommerce upgraded | **DONE** | +2 |
| — | New villa listings + content improvements | **DONE** | +5 |

### Still Outstanding

| # | Fix | Status |
|---|-----|--------|
| 4-7 | All JSON-LD structured data | NOT STARTED |
| 8 | Garbled /locations meta description | NOT FIXED |
| 10 | "Accommodation Types Archive" title | NOT FIXED |
| 13 | /locations OG image HTTP + double-slash | NOT FIXED |
| 15 | /contact-us "enquires" typo | NOT FIXED |
| 12 | 2 team images still on .co.uk | PARTIAL |
| 11 | /accommodation missing meta description | NOT FIXED |

---

## Remaining Fixes — Reprioritized

### HIGH Priority — Fix Within 1 Week

#### 1. Add JSON-LD Structured Data (Biggest Remaining Gap)

This is now the single most impactful thing to do. The code is already written and ready in the `fixes/schema/` folder.

**a) Organization + WebSite schema (site-wide)**
- File: `fixes/schema/04-organization-website-schema.html`
- Add via Code Snippets plugin or child theme header.php
- Time: 15 minutes

**b) VacationRental schema (all villa pages)**
- File: `fixes/schema/05-vacation-rental-schema.php`
- Add to child theme functions.php
- Time: 20 minutes

**c) FAQPage schema (/faqs page)**
- File: `fixes/schema/06-faqpage-schema.html`
- Add via Code Snippets plugin, scope to FAQs page only
- Time: 10 minutes

**d) Article schema (all blog posts)**
- File: `fixes/schema/07-article-blogposting-schema.php`
- Add to child theme functions.php
- Time: 10 minutes

**Total: ~1 hour. Expected score impact: +12-15 points.**

#### 2. Fix /locations Meta Description
- **Current:** "Gorgeous Villas in Sicily...CefaluDiscover Luxury Cefalu"
- **Replace with:** "Explore our villa locations across Sicily — from Taormina and Cefalù to Syracuse, Noto, and the Aeolian Islands. Find your perfect Sicilian retreat."
- **Where:** SEO plugin > /locations page > Meta description field
- Time: 2 minutes

#### 3. Fix /locations OG Image URL
- **Current:** `http://sicily4u.com//wp-content/uploads/2025/01/cefalu_892.jpg`
- **Issues:** Uses HTTP (not HTTPS) and has double-slash in path
- **Fix:** Check **Settings > General** — ensure "WordPress Address" and "Site Address" are `https://sicily4u.com` (no trailing slash). Then re-save the /locations page featured image, or manually set the OG image in the SEO plugin's Social tab.
- Time: 5 minutes

### MEDIUM Priority — Fix Within 2 Weeks

#### 4. Fix /accommodation Archive Title
- **Current:** "Accommodation Types Archive - Sicily4u"
- **Replace with:** "Luxury Villas in Sicily | Browse All Properties - Sicily4u"
- **Where:** SEO plugin > Content Types > Accommodation Types > Archive SEO Title
- Time: 2 minutes

#### 5. Fix /contact-us Meta Description Typo
- **Current:** "...if you have any enquires regarding our villas."
- **Replace with:** "Get in touch with the Sicily4u team. Contact us by phone, email, or WhatsApp for enquiries about our luxury villa rentals across Sicily."
- **Where:** SEO plugin > /contact-us page > Meta description field
- Time: 2 minutes

#### 6. Add Missing Meta Description to /accommodation
- **Current:** None
- **Add:** "Browse our full collection of handpicked luxury villas across Sicily. Filter by location, amenities, and availability for your perfect Sicilian holiday."
- **Where:** SEO plugin > Content Types > Accommodation Types > Archive Meta Description
- Time: 2 minutes

#### 7. Migrate Remaining 2 Team Images from .co.uk
- Lara Handjieff and Tim Clements photos still load from `sicily4u.co.uk`
- Download, upload to sicily4u.com Media Library, update About Us page
- Time: 10 minutes

#### 8. Set Featured Image on /faqs
- Currently no OG image — social shares have no preview
- Set any villa/Sicily landscape photo as the featured image
- Time: 2 minutes

### LOW Priority — Fix Within 1 Month

#### 9. Remove Generator Meta Tags
- WordPress 7.0.4 and WooCommerce 11.0.0 versions still exposed
- Add to functions.php: `remove_action('wp_head', 'wp_generator');`
- Time: 5 minutes

#### 10. Add BreadcrumbList Schema Site-Wide
- No breadcrumb structured data
- Implement JSON-LD reflecting site hierarchy
- Time: 2-3 hours

---

## Implementation Timeline

| Week | Actions | Expected Score |
|------|---------|---------------|
| **Week 1** | Fix #1a-d (all JSON-LD schemas) | 57 → 70 |
| **Week 2** | Fix #2-3 (locations description + OG image), #4-6 (titles + descriptions) | 70 → 75 |
| **Week 3-4** | Fix #7-10 (images, generator, breadcrumbs) | 75 → 78 |

---

## Verification Checklist

After implementing the schema fixes:
- [ ] Validate Organization schema: https://search.google.com/test/rich-results (homepage)
- [ ] Validate VacationRental: test on a villa page
- [ ] Validate FAQPage: test on /faqs
- [ ] Validate Article: test on a blog post
- [ ] Check /locations page source for corrected meta description
- [ ] Use Facebook Sharing Debugger on /locations to confirm OG image is HTTPS
- [ ] Google Search Console: monitor rich result reports over 2-4 weeks

---

## Summary

The April audit's critical technical issues have been resolved — the site jumped from 42 to 57. The next leap to 75+ depends almost entirely on **adding structured data**, which accounts for ~15 points of potential uplift. The schema code is already written and sitting in the `fixes/schema/` folder; it just needs to be deployed. The remaining on-page fixes (descriptions, titles, images) are all quick wins requiring 2-10 minutes each.
