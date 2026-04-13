# SEO Action Plan: The Gipsy Hill Smokehouse

**URL:** https://www.thegipsyhillsmokehouse.com  
**Date:** 2026-04-12  
**Current Score:** 46/100  
**Target Score:** 75/100 (achievable within 3 months)

---

## CRITICAL Priority (Fix Immediately)

### 1. Fix Homepage Title Tag
- **Issue:** The `<title>` element renders as "(1)" due to the Smartarget WhatsApp chat widget injecting a notification counter into the document title
- **Impact:** Google is likely indexing this broken title, severely damaging CTR in search results
- **Fix:** In Wix Editor > Settings > SEO, ensure the homepage title is set. Then check the Smartarget widget settings to prevent it from modifying `document.title`. If the widget cannot be configured, replace it with Wix's native chat or a widget that doesn't modify the title tag.
- **Expected result:** Immediate improvement in homepage SERP appearance and CTR

### 2. Remove `noindex,nofollow` from Private Parties Page
- **Issue:** `/private-parties` has `<meta name="robots" content="noindex,nofollow">`, completely hiding a key service page from search engines
- **Impact:** Losing all organic traffic for "hog roast party London", "private party catering", etc.
- **Fix:** In Wix Editor, go to the Private Parties page > SEO Settings > ensure "Let search engines index this page" is enabled
- **Expected result:** Page appears in Google within 1-2 weeks

### 3. Add LocalBusiness / CateringBusiness JSON-LD Schema
- **Issue:** Zero structured data on the entire site
- **Impact:** Missing rich results, knowledge panel potential, and local pack eligibility signals
- **Fix:** Add JSON-LD via Wix's custom code injection (Settings > Custom Code > Head). See recommended schema in the Full Audit Report.
- **Expected result:** Eligible for rich results within 2-4 weeks after validation

### 4. Add Review Schema to Testimonials
- **Issue:** 12+ customer testimonials exist but have no structured data markup
- **Impact:** Missing star ratings in search results
- **Fix:** Add `Review` and `AggregateRating` JSON-LD. Also update testimonials to include full first names and dates where possible.

---

## HIGH Priority (Fix Within 1 Week)

### 5. Fix "Our Food" Page Title
- **Issue:** Title is "OUR FOOD | GipsyHill_Smokehouse" -- generic, has underscore in brand name
- **Fix:** Change to "Hog Roast & BBQ Menus | The Gipsy Hill Smokehouse"
- **Effort:** 5 minutes in Wix

### 6. Fix Meta Keywords Typo and Clean Up
- **Issue:** Wedding page keywords contain typo "smokhouse" (missing 'e') and use stop words as keywords
- **Fix:** While meta keywords don't directly impact rankings, they signal carelessness to anyone inspecting the source. Either remove them entirely or set meaningful values.
- **Effort:** 10 minutes

### 7. Remove or Upgrade Smartarget WhatsApp Widget
- **Issue:** Free/trial version injects visible branding text ("Smartarget Apps are hidden...") into the page that search engines can crawl
- **Fix:** Upgrade to paid Smartarget plan, or replace with Wix native chat widget
- **Effort:** 15 minutes

### 8. Fix Inconsistent Email Addresses
- **Issue:** Two different email domains used: `timclements@thegipsyhillsmokehouse.com` and `timclements@gipsyhillsmokehouse.com`
- **Impact:** Confusing for customers; inconsistent NAP signals for local SEO
- **Fix:** Standardize to one email address across all pages
- **Effort:** 15 minutes

### 9. Expand Thin Content Pages
- **Our Food page (~200 words):** Expand to 500+ words with detailed descriptions of each meat, cooking methods, sourcing details, and dietary options
- **Contact page (~50 words):** Add business hours, service area description, FAQs about booking process
- **Effort:** 2-3 hours of writing

---

## MEDIUM Priority (Fix Within 1 Month)

### 10. Add FAQ Sections to Key Pages
- **Pages:** Homepage, Wedding page, Private Parties page
- **Topics:** Pricing ranges, guest minimums, booking lead times, dietary accommodations, service area, what's included
- **Schema:** Add FAQPage JSON-LD for each
- **Impact:** Target long-tail queries, appear in "People Also Ask" boxes
- **Effort:** 3-4 hours

### 11. Improve Blog Content Quality
- **Issue:** Posts are 300-500 words with no subheadings, bullet points, or internal links
- **Fix for each post:**
  - Expand to 800-1,200 words minimum
  - Add H2/H3 subheadings every 200-300 words
  - Include internal links to service pages
  - Add a CTA at the end (link to contact/quote page)
  - Add relevant images with descriptive alt text
- **Effort:** 2-3 hours per post

### 12. Improve Testimonials Page
- **Current:** Initials only (H.J., C.S.), no dates, no structure
- **Fix:**
  - Add full first names where possible
  - Add dates or at least years
  - Categorize by event type (Wedding, Party, Corporate)
  - Add photos from events where available
  - Link to Google/Facebook reviews for external validation
- **Effort:** 2-3 hours

### 13. Add Breadcrumb Navigation
- **Issue:** No breadcrumbs on any page
- **Fix:** Enable Wix breadcrumbs or add via custom code + BreadcrumbList schema
- **Impact:** Better user navigation, additional SERP real estate
- **Effort:** 30 minutes

### 14. Fix Image Alt Text
- **Issue:** Some images use filenames as alt text (e.g., "IMG_4386_edited.jpg")
- **Fix:** Replace with descriptive alt text (e.g., "Gipsy Hill Smokehouse hog roast at a London wedding reception")
- **Effort:** 30 minutes

### 15. Create a Dedicated "Areas We Cover" Page
- **Current:** Geographical coverage is buried at the bottom of the wedding page
- **Fix:** Create a dedicated page listing all areas served (South London, South East London, Kent, Surrey, etc.) with unique content per area
- **Impact:** Target location-based searches
- **Effort:** 3-4 hours

---

## LOW Priority (Backlog)

### 16. Add llms.txt File
- Create `/llms.txt` with a structured summary of the business for AI search engines
- **Effort:** 30 minutes

### 17. Clean Up robots.txt
- Remove the 100+ obsolete bot blocks (most bots listed haven't existed for 10+ years)
- Keep only necessary blocks (AdsBot-Google internal paths, PetalBot if desired)
- **Effort:** 15 minutes

### 18. Add Specific Statistics to Content
- Add citable numbers: "Over 500 events since 2004", "Serving 20 to 500+ guests", etc.
- Helps AI search engines cite the business in responses
- **Effort:** 30 minutes

### 19. Consider Unblocking PetalBot
- Currently fully blocked in robots.txt
- PetalBot serves Huawei search -- may be relevant for some audience segments
- **Effort:** 2 minutes

### 20. Set Up Google API Integration for Ongoing Monitoring
- Configure Google PageSpeed API key for Core Web Vitals monitoring
- Set up Google Search Console API for indexation tracking
- **Effort:** 1-2 hours initial setup

---

## Implementation Roadmap

| Week | Tasks | Expected Impact |
|------|-------|-----------------|
| Week 1 | Items 1-4 (Critical) | +10-15 points |
| Week 2 | Items 5-9 (High) | +5-8 points |
| Week 3-4 | Items 10-12 (Medium, content) | +5-8 points |
| Month 2 | Items 13-15 (Medium, structure) | +3-5 points |
| Month 3 | Items 16-20 (Low, polish) | +2-3 points |

**Projected Score After Full Implementation: 71-85/100**
