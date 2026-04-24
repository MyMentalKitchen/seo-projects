# SEO Action Plan: The Gipsy Hill Smokehouse

**URL:** https://www.thegipsyhillsmokehouse.com  
**Date:** 2026-04-24 (updated; original audit 2026-04-12)  
**Current Score:** 38/100  
**Target Score:** 70/100 (achievable within 3 months)

---

## CRITICAL Priority (Fix Immediately)

### 1. Fix Homepage Title Tag
- **Issue:** The `<title>` element renders as "(1)" due to the Smartarget WhatsApp chat widget injecting a notification counter into `document.title`. Google indexes this broken title.
- **Impact:** Devastating -- homepage CTR in Google results likely reduced by 50%+ since no one clicks a result titled "(1)"
- **Fix:** Remove the Smartarget widget entirely (its trial has expired and it injects branding text too) and replace with Wix's built-in WhatsApp button. Alternatively, add the JavaScript fix from `fixes/technical/01-fix-homepage-title.html` via Wix Custom Code > Body end > Homepage only.
- **Effort:** 10 minutes
- **Expected result:** Correct title appears in Google within 1-2 weeks

### 2. Remove noindex from 4 Key Revenue Pages
- **Issue:** Four of the most important commercial pages are completely blocked from Google by `noindex` meta tags:
  - `/private-parties` -- targets "hog roast party London"
  - `/event-catering` -- targets "corporate event catering London" (1,581 words of good content wasted)
  - `/hog-roast-party` -- targets "hog roast party" / quote form
  - `/spit-roasts-hog-roasts` -- targets "spit roast catering London" (NEW since original audit)
- **Root cause:** Wix embedded forms inject `noindex,nofollow` and duplicate OG tags. This is a known Wix bug.
- **Fix:** In Wix Editor, for each page: go to Page Settings > SEO > Advanced SEO > ensure "Let search engines index this page" is ON. If the embedded form is causing it, switch to a lightbox-based form or Wix's native form app.
- **Effort:** 15-30 minutes
- **Expected result:** All 4 pages re-indexed within 1-2 weeks

### 3. Add CateringBusiness JSON-LD Schema
- **Issue:** Zero structured data exists across the entire site. No LocalBusiness, no CateringBusiness, no Review schema.
- **Impact:** Missing rich results, knowledge panel, and local pack eligibility
- **Fix:** Add JSON-LD via Wix Custom Code > Head > All pages. Use the ready-made snippet from `fixes/schema/03-local-business-schema.html`.
- **Effort:** 15 minutes
- **Expected result:** Eligible for rich results within 2-4 weeks

### 4. Add Review Schema to Testimonials Page
- **Issue:** 12 genuine customer testimonials exist on `/testimonials` but have no structured data markup
- **Impact:** Missing star ratings in search results
- **Fix:** Add Review + AggregateRating JSON-LD via Wix Custom Code > Head > Testimonials page only. Use `fixes/schema/04-review-schema-testimonials.html`.
- **Effort:** 15 minutes
- **Expected result:** Star ratings in SERPs within 2-4 weeks

---

## HIGH Priority (Fix Within 1 Week)

### 5. Fix Spit Roasts Page Heading Structure
- **Issue:** `/spit-roasts-hog-roasts` has **6 H1 tags** instead of a proper heading hierarchy. H1s include "WATCH THE VIDEOS TO SEE OUR FOOD", "CALL US ON 07944390309 TO DISCUSS YOUR MENU", "Hog roasts", "Lamb spit roast", etc.
- **Fix:** Keep one H1 (e.g., "Spit Roast & Hog Roast Catering London"), convert the rest to H2s
- **Effort:** 10 minutes in Wix Editor

### 6. Fix Hog Roast Party Page H1
- **Issue:** The H1 on `/hog-roast-party` is "If you haven't already, check our menu and if you want a quote, fill out the form below." -- this is instructional text, not a heading
- **Fix:** Change H1 to "Get a Hog Roast Quote | The Gipsy Hill Smokehouse" or similar
- **Effort:** 5 minutes

### 7. Fix Page Titles Using Internal Wix Name
- **Issue:** Multiple pages use "GipsyHill_Smokehouse" (the internal Wix site name) in their titles instead of the proper business name
- **Fix:**
  - Our Food: Change from `OUR FOOD | GipsyHill_Smokehouse` to `Hog Roast & BBQ Menus | The Gipsy Hill Smokehouse`
  - Blog: Change from `Blog | GipsyHill_Smokehouse` to `Blog | Hog Roast Tips & Recipes | The Gipsy Hill Smokehouse`
  - Wedding Menus OG title: Align with page title
- **Effort:** 5 minutes per page

### 8. Fix Spit Roasts Page Title Length
- **Issue:** Title is 97 characters (`Spit Roast Catering | Get a Spit Roasted Hog at your Event | The Gipsy Hill Smokehouse - Roast Hog`). Google truncates at ~60.
- **Fix:** Shorten to `Spit Roast Catering London | The Gipsy Hill Smokehouse` (54 chars)
- **Effort:** 2 minutes

### 9. Fix Meta Keywords Across All Pages
- **Issue:** Keywords are wrong/irrelevant on multiple pages:
  - Wedding: `about, the, gipsy, hill, smokhouse` (stop words + typo)
  - Our Food: `our, food` (useless)
  - Beckenham: `roast hog london bridge, london borough market` (wrong location entirely)
  - Event Catering: `roast hog london bridge, london borough market` (wrong focus)
- **Fix:** Either remove meta keywords entirely (Google ignores them) or set relevant values. The typo "smokhouse" is a visible quality signal.
- **Effort:** 15 minutes

### 10. Remove/Replace Smartarget WhatsApp Widget
- **Issue:** Trial expired. Injects visible "Smartarget Apps are hidden" branding text crawlable by search engines. Causes homepage title overwrite.
- **Fix:** Remove Smartarget completely. Use Wix's free built-in WhatsApp/chat button.
- **Effort:** 15 minutes

---

## MEDIUM Priority (Fix Within 1 Month)

### 11. Expand Thin Content Pages
- **Our Food (202 words):** Expand to 500+ words with descriptions of each meat, cooking methods, sourcing, and dietary options
- **Hog Roast Party (189 words):** Add 300+ words of content above the form explaining pricing, process, and what's included
- **Contact (72 words):** Add business hours, service area, FAQs about booking process. Use ready-made content from `fixes/content/09-contact-page-expanded.md`
- **Beckenham (282 words):** Expand with Beckenham-specific content, local venue partnerships, photos from local events
- **Effort:** 2-3 hours total

### 12. Add FAQ Sections + Schema to Key Pages
- **Pages:** Homepage, Wedding page
- **Topics:** Pricing ranges, guest minimums, booking lead times, dietary accommodations, service area
- **Schema:** Add FAQPage JSON-LD. Use ready-made content from `fixes/content/10-faq-wedding-page.md` and schema from `fixes/schema/10-faq-schema-wedding.html`
- **Note:** Per Aug 2023 Google update, FAQPage rich results are limited, but FAQ schema still benefits AI/LLM citations
- **Effort:** 1-2 hours

### 13. Create/Claim Google Business Profile
- **Issue:** No GBP found in search results. Critical for a local service business.
- **Fix:** Create or claim the Google Business Profile at business.google.com. Add photos, services, service area, Q&A, and regular posts.
- **Effort:** 1-2 hours
- **Impact:** Essential for local pack visibility and Google Maps

### 14. Fix Email Domain Inconsistency
- **Issue:** Website domain is `thegipsyhillsmokehouse.com` but wedding page shows `timclements@gipsyhillsmokehouse.com`. Contact page correctly shows `timclements@thegipsyhillsmokehouse.com`.
- **Fix:** Standardize to `timclements@thegipsyhillsmokehouse.com` everywhere
- **Effort:** 15 minutes

### 15. Fix Duplicate OG Tags on Form Pages
- **Issue:** Pages with embedded Wix forms (`/private-parties`, `/event-catering`, `/hog-roast-party`) have duplicate `og:title`, `og:description`, `og:image`, and `og:type` tags appearing as arrays. The second values come from the form embed ("Online Order Form", "Please click the link to complete this form.").
- **Fix:** Switch from embedded forms to lightbox-based forms, or add canonical OG tags via Wix Custom Code that override the duplicates.
- **Effort:** 30 minutes

### 16. Expand Blog Content
- **Issue:** Only 2 blog posts exist. For a 20+ year business, this is a massive missed opportunity.
- **Fix:** Publish 1-2 posts per month targeting long-tail keywords:
  - "How much does a hog roast cost for 100 people?"
  - "Best wedding catering ideas London 2026"
  - "Hog roast vs BBQ for weddings -- which to choose"
  - "How to plan a hog roast party"
  - "Best sides for a hog roast"
- **Effort:** 2-4 hours per post

### 17. Create More Location Pages
- **Issue:** Only 1 location page exists (Beckenham). Business covers a 50-mile radius.
- **Fix:** Create pages for South London, Crystal Palace, Dulwich, Bromley, Croydon, Surrey, Kent
- **Effort:** 2-3 hours per page

---

## LOW Priority (Backlog)

### 18. Add llms.txt File
- Create `/llms.txt` at root for AI search engine discovery
- **Effort:** 30 minutes

### 19. Improve Testimonials Page
- Add full first names (with permission), dates, and event types
- Categorize by Wedding / Party / Corporate
- Link to Google/Facebook reviews
- **Effort:** 2 hours

### 20. Add Specific Statistics to Content
- "Over 500 events since 2004", "Serving 20 to 500+ guests", "From £25.00 per head"
- Helps AI search engines cite the business
- **Effort:** 30 minutes

### 21. Fix Image Alt Text
- Wedding page has 3 images without alt text
- Our Food page has 1 image without alt text
- Replace filename-based alt text with descriptive text
- **Effort:** 30 minutes

### 22. Clean Up robots.txt
- Remove 100+ obsolete bot blocks
- **Effort:** 15 minutes

---

## Implementation Roadmap

| Week | Tasks | Expected Impact |
|------|-------|-----------------|
| Week 1 | Fix homepage title (#1), Remove noindex from 4 pages (#2), Add CateringBusiness schema (#3), Add Review schema (#4) | +15-20 points |
| Week 2 | Fix heading structure (#5,6), Fix page titles (#7,8), Fix meta keywords (#9), Remove Smartarget (#10) | +5-8 points |
| Week 3-4 | Expand thin content (#11), Add FAQ sections (#12), Create GBP (#13), Fix email (#14), Fix OG tags (#15) | +5-8 points |
| Month 2-3 | Blog expansion (#16), Location pages (#17), Remaining items (#18-22) | +5-10 points |

**Projected Score After Full Implementation: 70-80/100**

---

## Changes Since Original Audit (2026-04-12)

| Item | Original | Current |
|------|----------|---------|
| Noindexed pages | 1 (Private Parties) | 4 (+Event Catering, +Hog Roast Party, +Spit Roasts) |
| Overall score | 46/100 | 38/100 |
| Homepage meta description | Generic | Updated and improved |
| Homepage OG title | Long and verbose | Shortened and cleaner |
| Spit Roasts pricing | Not present | "From £25.00 per head" added |
| Spit Roasts noindex | Not present | noindex added (regression) |
