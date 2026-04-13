# SEO Action Plan: Sicily4U (www.sicily4u.co.uk)

**URL:** https://www.sicily4u.co.uk  
**Date:** 2026-04-12  
**Current Score:** 38/100  
**Target Score:** 70/100 (achievable within 3 months)

---

## CRITICAL Priority -- Fix Immediately

### 1. Fix Viewport Meta Tag (Mobile-First Indexing Failure)
- **Issue:** Every page on the site has `<meta name="viewport" content="width=1250">`, which hardcodes a desktop-only layout. Google's mobile-first indexing means the site is being judged on its mobile experience, which currently fails completely.
- **Impact:** This single issue is likely responsible for a 30-50% loss in organic traffic. The site cannot pass Google's Mobile-Friendly Test, will be demoted in all mobile search results, and provides a poor user experience on phones and tablets.
- **Fix:** Change the viewport meta tag site-wide to:
  ```html
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  ```
  Then ensure all CSS uses responsive breakpoints (media queries) rather than fixed pixel widths. Test with Google's Mobile-Friendly Test tool after deployment.
- **Effort:** 1-3 days depending on CSS refactoring needed
- **Expected result:** Significant ranking improvements within 2-4 weeks as Google re-crawls and re-evaluates mobile usability

### 2. Fix Broken Canonical URLs on 3 Key Pages
- **Issue:** Three pages have canonical URLs pointing to the homepage instead of themselves:
  - `/villas/who-are-we` -> canonical says `/villas/` (should be self)
  - `/villas/owner-registration` -> canonical says `/villas` (should be self)
  - `/villas/contact` -> canonical says `https://www.sicily4u.co.uk` (should be self)
- **Impact:** Google treats these pages as duplicates of the homepage and ignores their unique content. The contact page in particular is important for local SEO signals (NAP data).
- **Fix:** Set each page's canonical tag to its own URL. Check the CMS/template system for a bug that defaults canonical to the homepage when not explicitly set.
- **Effort:** 30 minutes
- **Expected result:** Pages re-indexed within 1-2 weeks with their own content

### 3. Add Title Tags to Empty/Generic Pages
- **Issue:** At least 2 pages have completely empty `<title>` tags, and 3+ pages share an identical generic title:
  - `/villas/who-are-we`: Empty title
  - `/villas/owner-registration`: Empty title
  - `/villas/suitable-for-weddings`: "Sicily Villas with Pool - Luxury Villas to rent" (generic)
  - `/villas/for-sale`: Same generic title as weddings
  - `/villas/last-minute`: Same generic title as weddings/for-sale
- **Impact:** Google auto-generates titles for empty pages (usually poorly). Duplicate titles prevent differentiation in search results.
- **Fix:** Create unique, descriptive titles for each page:
  - Who Are We: `"About Sicily4U | Luxury Villa Specialists Since 2004"`
  - Owner Registration: `"List Your Villa | Property Owner Registration | Sicily4U"`
  - Weddings: `"Wedding Villas in Sicily | Stunning Venues with Pool | Sicily4U"`
  - For Sale: `"Sicily Villas for Sale | Buy Property in Sicily | Sicily4U"`
  - Last Minute: `"Last Minute Villa Deals in Sicily | Late Availability | Sicily4U"`
- **Effort:** 30 minutes
- **Expected result:** Improved CTR in search results within 1-2 weeks

### 4. Remove Fake/Misleading AggregateRating Schema
- **Issue:** Two pages have AggregateRating structured data that violates Google's guidelines:
  - `/villas/pool`: Product schema with 100 ratings at 4.5 stars -- fabricated for a category page
  - `/villas/last-minute`: Place schema with 0.0 rating and 0 reviews -- pointless and invalid
- **Impact:** Google may issue a manual action (penalty) for schema spam, which can affect the entire site's visibility. At minimum, these will be flagged in Search Console.
- **Fix:** Remove the AggregateRating markup from both pages immediately. Only use review schema on pages with genuine, verifiable customer reviews.
- **Effort:** 15 minutes
- **Expected result:** Eliminates risk of manual penalty

---

## HIGH Priority -- Fix Within 1 Week

### 5. Add Alt Text to Villa Detail Page Images
- **Issue:** On the sampled villa page (Villa Mandralisca), 30 out of 38 images (79%) have no alt text. This pattern likely applies to all ~30 villa detail pages, meaning 900+ images site-wide are missing alt text.
- **Impact:** Missing alt text means: (a) zero visibility in Google Image Search for villa photos, (b) WCAG accessibility violation, (c) lost ranking signal from image context.
- **Fix:** Add descriptive alt text to every villa image. Use the format: `"[Villa Name] - [Description of what's shown]"`, e.g., `"Villa Mandralisca - panoramic sea view from the terrace"`, `"Villa Mandralisca - master bedroom with balcony"`.
- **Effort:** 1-2 hours per villa page (batch across all villas)
- **Expected result:** Images begin appearing in Google Image Search; improved page relevance signals

### 6. Fix OG Description Typo and HTML in Social Tags
- **Issue:** Multiple social meta tag problems:
  - Homepage OG description: `"Sicily4U isr an exclusive"` -- typo ("isr" should be "is")
  - Villa detail pages: twitter:title contains raw HTML: `"Villa Mandralisca<br><p>in Cefalù"` -- HTML tags render literally in social shares
  - Contact page: All OG/Twitter tags duplicated (appear as arrays)
- **Impact:** Social shares look unprofessional; reduces click-through from Facebook, Twitter, WhatsApp, etc.
- **Fix:**
  - Fix the typo in the homepage OG description
  - Strip HTML from villa page twitter:title generation in the template
  - Debug the contact page template that outputs duplicate social tags
- **Effort:** 1-2 hours
- **Expected result:** Professional social sharing appearance

### 7. Fix Duplicate/Concatenated Meta Descriptions
- **Issue:** At least 6 pages have their meta description repeated/concatenated with a comma separator, e.g.: `"Beach villas in Sicily - Discover our stunning..., Beach villas in Sicily - Discover our stunning..."`. Affected pages: homepage, beach, Sicily destination, Noto, history, contact (4x).
- **Impact:** Google may truncate or replace these in search results, reducing CTR.
- **Fix:** Audit the template system for the bug that concatenates descriptions. Each page should have a single, unique description under 160 characters.
- **Effort:** 1-2 hours to identify root cause in template engine
- **Expected result:** Clean SERP snippets

### 8. Remove Template Variable from Meta Keywords
- **Issue:** Villa detail page keywords contain `"tmp_SelectedLocatization"` -- a template/debug variable that leaked into production HTML.
- **Impact:** While meta keywords don't affect rankings, this signals poor code quality to anyone inspecting source. If similar template leaks exist elsewhere, they could affect visible content.
- **Fix:** Find and fix the template that outputs this variable. Audit other pages for similar leaks.
- **Effort:** 30 minutes
- **Expected result:** Clean meta tags

---

## MEDIUM Priority -- Fix Within 1 Month

### 9. Add VacationRental Schema to Villa Detail Pages
- **Issue:** Villa detail pages have zero structured data despite being the most commercially important pages on the site. They have pricing, availability, location, amenities, and images -- all perfect for rich results.
- **Impact:** Missing out on enhanced SERP display (price, rating, availability) which competitors likely have.
- **Fix:** Add `VacationRental` JSON-LD schema to every villa detail page. Example:
  ```json
  {
    "@context": "https://schema.org",
    "@type": "VacationRental",
    "name": "Villa Mandralisca",
    "description": "Seafront villa with sea view for 6 guests...",
    "url": "https://www.sicily4u.co.uk/villas/italy/sicily/cefalù/villas/villa-mandralisca",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Cefalù",
      "addressRegion": "Sicily",
      "addressCountry": "IT"
    },
    "numberOfRooms": 3,
    "occupancy": {
      "@type": "QuantitativeValue",
      "maxValue": 6
    },
    "offers": {
      "@type": "Offer",
      "priceSpecification": {
        "@type": "PriceSpecification",
        "priceCurrency": "EUR",
        "minPrice": 2610,
        "maxPrice": 4630,
        "unitText": "WEEK"
      }
    },
    "image": ["https://ik.imagekit.io/agrpv/105086_00.jpg"],
    "amenityFeature": [
      {"@type": "LocationFeatureSpecification", "name": "Direct beach access"},
      {"@type": "LocationFeatureSpecification", "name": "Sea view"}
    ]
  }
  ```
  Also add `BreadcrumbList` schema to match the existing visible breadcrumbs.
- **Effort:** 4-8 hours (template-level implementation for all villas)
- **Expected result:** Rich results in 2-4 weeks; higher CTR

### 10. Expand Thin Content Pages
- **Issue:** Several key pages have critically thin content:
  - **Who Are We (35 words):** Should tell the company story, team, why customers trust you
  - **Weddings (250 words):** URL is `/suitable-for-weddings` but content is generic villas text
  - **For Sale (133 words):** Needs property-for-sale specific content or should be removed/noindexed
  - **Contact (429 words):** Could benefit from FAQ, business hours, service area
- **Fix:**
  - **Who Are We:** Expand to 800+ words: company history (since 2004), team bios, Switzerland office, partnership with villa owners, why you're different. Add team photos.
  - **Weddings:** Expand to 1,500+ words: wedding-specific villa features, wedding planning tips, capacity for wedding events, testimonials from wedding clients, photo gallery from past weddings. Create unique title "Wedding Villas in Sicily".
  - **For Sale:** Either add genuine property-for-sale listings with 500+ words of content, or redirect/noindex if no properties are actually for sale.
  - **Contact:** Add business hours, physical address if applicable, WhatsApp number, FAQ about booking process.
- **Effort:** 1-2 days of content writing
- **Expected result:** Better rankings for long-tail queries; improved trust signals

---

## Additional Recommendations (Lower Priority)

### 11. Implement Consistent Hreflang Tags
If the site has Italian versions (detected on Noto page), implement `hreflang` tags consistently across all pages that have translations.

### 12. Fix Pool Page H1 Tags
Reduce from 13 H1 tags to a single H1, converting the rest to H2/H3.

### 13. Add FAQPage Schema
The Sicily destination page has an FAQ section -- add `FAQPage` JSON-LD to enable FAQ rich results.

### 14. Consolidate sicily4u.co.uk and sicily4u.com
If both domains serve the same business, set up proper redirects or canonical cross-referencing to avoid brand cannibalization.

### 15. Migrate feedback.sicily4u.co.uk to HTTPS
The feedback subdomain is still on HTTP, which is a security and trust issue.

### 16. Increase Trustpilot Review Volume
15 reviews after 20+ years of operation is low. Implement a post-stay email requesting reviews.

### 17. Add Organization Schema with Social Profiles
The existing Organization schema on the who-are-we page has an empty `sameAs` array. Populate it with Facebook, Trustpilot, and any other social profile URLs.

### 18. Create a Blog or Guide Strategy
The `/villas/info/` section has good content (history page is 1,900+ words with Article schema) but is not prominently linked. Consider expanding with guides like "Best Time to Visit Sicily", "Top 10 Beaches in Sicily", "Planning a Wedding in Sicily" etc.

---

## Implementation Timeline

| Week | Actions | Expected Impact |
|------|---------|----------------|
| Week 1 | Fix viewport (#1), Fix canonicals (#2), Fix titles (#3), Remove fake schema (#4) | Mobile rankings begin recovering |
| Week 2 | Add image alt text (#5), Fix social tags (#6), Fix duplicate descriptions (#7), Fix template var (#8) | SERP appearance improves |
| Week 3-4 | Add VacationRental schema (#9), Expand thin content (#10) | Rich results begin appearing |
| Month 2-3 | Implement recommendations #11-#18 | Incremental improvements |

**Target Score after 3 months:** 70/100 (from current 38/100)
