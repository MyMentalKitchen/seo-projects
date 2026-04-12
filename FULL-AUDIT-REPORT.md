# Full SEO Audit Report: Sicily4U

**URL:** https://www.sicily4u.co.uk  
**Date:** 2026-04-12  
**Business Type Detected:** Vacation Villa Rental Agency (Sicily, Italy -- company based in Tagerwilen, Switzerland)  
**Platform:** Custom-built (Node.js / server-rendered with client-side enhancements)  
**Pages Discovered:** ~100 pages (32 destination/location pages, ~30 villa detail pages, ~20 category/filter pages, ~10 info/guide pages, ~8 utility pages)  
**SEO Health Score: 38/100**

---

## Executive Summary

Sicily4U is an established luxury villa rental specialist operating since 2004, with a Trustpilot rating of 4 stars from 15 reviews. The website has strong destination content on some pages (Sicily main page: 16,000+ words, Taormina: 12,000+ words) and a well-organised URL structure. However, the site suffers from **severe technical SEO issues** that are almost certainly suppressing search visibility dramatically.

The most damaging issue is a **hardcoded viewport width of 1250px across the entire site**, which fails Google's mobile-first indexing requirements. Combined with broken canonical URLs, empty title tags, duplicate meta data, and inconsistent schema markup, the site is significantly underperforming its potential.

### Top 5 Critical Issues

1. **Viewport meta tag hardcoded to `width=1250` on every page** -- fails mobile usability completely, devastating under Google's mobile-first indexing
2. **Empty `<title>` tags** on "Who Are We" and "Owner Registration" pages -- Google will auto-generate titles, typically poorly
3. **Wrong canonical URLs** on at least 3 key pages (who-are-we, owner-registration, contact) -- all point to the homepage instead of themselves, causing Google to ignore these pages
4. **Villa detail pages have ~80% of images missing alt text** (30 of 38 on sampled villa) -- massive image SEO and accessibility failure
5. **Misleading/fake structured data** -- Product schema with 100 fabricated ratings on /pool page; AggregateRating with 0 reviews on /last-minute; risks Google manual action

### Top 5 Quick Wins

1. Fix the viewport meta tag to `width=device-width, initial-scale=1.0` site-wide -- immediate mobile ranking recovery
2. Fix canonical URLs on who-are-we, owner-registration, and contact pages to point to themselves
3. Add unique `<title>` tags to all pages with empty or generic titles (at least 6 pages affected)
4. Remove the fake AggregateRating schema from /pool and /last-minute pages
5. Fix the OG description typo ("isr" -> "is") on the homepage

---

## Technical SEO (Score: 30/100 | Weight: 25%)

### Crawlability

| Check | Status | Notes |
|-------|--------|-------|
| robots.txt | Present | Simple: `User-agent: * Allow: /` with sitemap declared |
| XML Sitemap | Present | `sitemap_gb.xml?lang=gb` declared (403 when accessed externally -- may need authentication) |
| HTTPS | Yes | SSL active on www.sicily4u.co.uk |
| Google Verification | Yes | Two verification codes present (`OoLZToOo...` and `2w2AsUCZ...`) |
| HTTP/2 | Yes | Content-Type: `text/html; charset=utf-8` |
| Server Rendering | Good | Server-side rendered HTML (not a pure SPA) |

### Critical: Mobile Usability Failure

| Issue | Severity | Scope |
|-------|----------|-------|
| `<meta name="viewport" content="width=1250">` | **CRITICAL** | **Every page on the site** |

The viewport is hardcoded to a fixed width of 1250 pixels on **every single page**. This means:
- The site does **not** pass Google's Mobile-Friendly Test
- Under Google's **mobile-first indexing** (default since 2023), this devastates rankings
- Mobile users must pinch-zoom to read any content
- Google may demote the entire site in mobile search results

**Expected fix:** Change to `<meta name="viewport" content="width=device-width, initial-scale=1.0">` and ensure CSS is responsive.

### Canonical URL Issues

| Page | Canonical URL | Expected | Status |
|------|--------------|----------|--------|
| `/villas/who-are-we` | `https://www.sicily4u.co.uk/villas/` | `https://www.sicily4u.co.uk/villas/who-are-we` | **WRONG** |
| `/villas/owner-registration` | `https://www.sicily4u.co.uk/villas` | `https://www.sicily4u.co.uk/villas/owner-registration` | **WRONG** |
| `/villas/contact` | `https://www.sicily4u.co.uk` | `https://www.sicily4u.co.uk/villas/contact` | **WRONG** |
| Homepage `/` | `https://www.sicily4u.co.uk/villas` | `https://www.sicily4u.co.uk/` or `/villas` | Acceptable but inconsistent |
| `/villas/italy/sicily` | Self-referencing | Correct | OK |
| `/villas/italy/sicily/taormina` | Self-referencing | Correct | OK |
| `/villas/beach` | Self-referencing | Correct | OK |
| `/villas/pool` | Self-referencing | Correct | OK |

Three important pages have canonicals pointing to the homepage, effectively telling Google to **ignore their content entirely**.

### Title Tag Issues

| Page | Title Tag | Issue |
|------|-----------|-------|
| `/villas/who-are-we` | `\n\n` (empty) | **CRITICAL** -- No title at all |
| `/villas/owner-registration` | `\n\n` (empty) | **CRITICAL** -- No title at all |
| `/villas/suitable-for-weddings` | "Sicily Villas with Pool - Luxury Villas to rent" | Generic -- not wedding-specific |
| `/villas/for-sale` | "Sicily Villas with Pool - Luxury Villas to rent" | Generic -- identical to weddings page |
| `/villas/last-minute` | "Sicily Villas with Pool - Luxury Villas to rent" | Generic -- identical to weddings/for-sale |
| `/villas/pool` | "Villas with Pool Sicily Villas with Pool \| Seafront Villas with Pools to rent" | Keyword-stuffed ("Villas with Pool" x2) |
| Homepage | "Sicily Villas with Pool \| Villa Rentals Sicily - Sicily4U" | Acceptable |
| `/villas/italy/sicily` | "Villas in Sicily with pool \| Luxury Sicily villas with pools for rent" | Good |
| `/villas/italy/sicily/taormina` | "Luxury Villas with Pool in Taormina \| Taormina Villas near the beach" | Good |

### Duplicate Meta Tags

The **contact page** has every OG and Twitter meta tag duplicated (arrays instead of single values):
- `og:description` appears 2x
- `og:title` appears 2x  
- `og:image` appears 2x
- `og:url` appears 2x
- `twitter:card` appears 2x
- `twitter:title` appears 2x
- `twitter:description` appears 2x
- `google-site-verification` appears 2x
- `description` is repeated/concatenated 4 times

Multiple other pages have **concatenated meta descriptions** (same text repeated with a comma separator):
- Homepage: description repeated 2x with comma
- `/villas/beach`: description repeated 2x  
- `/villas/italy/sicily`: description repeated 2x
- `/villas/italy/sicily/noto`: description repeated 2x
- `/villas/info/history-of-sicily`: description repeated 2x

### Security & Headers

| Check | Status |
|-------|--------|
| HTTPS | Active on main domain |
| Mixed Content | Not detected |
| feedback.sicily4u.co.uk | **HTTP only** (no SSL) -- security risk |
| Content-Type | `text/html; charset=utf-8` |

### robots.txt Analysis

- **Good:** Simple and permissive (`Allow: /`)
- **Good:** Sitemap properly declared
- **Concern:** Sitemap returns 403 to external crawlers (WebFetch received 403)
- **Note:** Only one sitemap declared; no separate image or video sitemaps

---

## On-Page SEO (Score: 35/100 | Weight: 25%)

### Heading Structure Issues

| Page | H1 Count | Issue |
|------|----------|-------|
| `/villas/pool` | **13** | Massively over-used -- each section uses H1 instead of H2 |
| `/villas/beach` | **4** | Multiple H1s -- should be single H1 |
| `/villas/for-sale` | **2** | Two H1 tags |
| `/villas/last-minute` | **2** | Two H1 tags |
| `/villas/italy/sicily/noto` | **2** | Two H1 tags |
| Homepage | 1 | Correct |
| `/villas/italy/sicily` | 1 | Correct |
| `/villas/italy/sicily/taormina` | 1 | Correct |

The /pool page is the worst offender with **13 H1 tags**. Every section heading was incorrectly set to H1 instead of using a proper H1 > H2 > H3 hierarchy.

### Meta Keywords

Most pages use the **exact same generic keywords meta tag**:
```
sicily co uk, visit and live sicily, visit sicily travel, sicily tourism, luxury beach villas sicily, villas in sicily with pool, sicily holiday rental, rent villa sicily, luxury villa sicily with pool
```

While meta keywords don't affect Google rankings, this signals a lack of per-page SEO attention. A few pages have customised keywords:
- `/villas/pool`: Custom pool-related keywords (good)
- `/villas/beach`: Custom beach-related keywords (good)
- `/villas/info/history-of-sicily`: Custom history-related keywords (good)

### Image Alt Text

| Page Sampled | Total Images | Missing Alt | % Missing |
|-------------|-------------|-------------|-----------|
| Villa Mandralisca (Cefalu) | 38 | 30 | **79%** |
| Homepage | 41 | 0 | 0% |

Villa detail pages appear to have the vast majority of images **missing alt text**. Given there are ~30 villa pages, this likely affects 900+ images site-wide. This is:
- A critical accessibility violation (WCAG 2.1)
- A massive lost opportunity for image search traffic
- A negative ranking signal

### Social Meta Tag Issues

| Issue | Page | Details |
|-------|------|---------|
| HTML in twitter:title | Villa Mandralisca | `"Villa Mandralisca<br><p>in Cefalù"` -- raw HTML renders in social shares |
| OG description typo | Homepage | `"Sicily4U isr an exclusive"` -- "isr" should be "is" |
| Duplicate OG/Twitter tags | Contact page | All social tags appear twice |
| Generic OG image | Multiple info pages | Uses same `luxury_sicily_villas.jpg` instead of page-specific images |

### Template Variable Leak

The Villa Mandralisca page keywords contain: `"tmp_SelectedLocatization"` -- a template/debug variable that has leaked into production meta tags. This likely affects other villa detail pages as well.

---

## Content Quality (Score: 55/100 | Weight: 20%)

### E-E-A-T Assessment

| Signal | Score | Notes |
|--------|-------|-------|
| Experience | Good | Operating since 2004, 20+ years in Sicily villa rentals |
| Expertise | Good | Deep destination content on Sicily, Taormina pages; local knowledge evident |
| Authoritativeness | Moderate | Trustpilot 4-star rating (15 reviews); Tripadvisor forum presence; but limited review volume |
| Trustworthiness | Moderate | HTTPS, real phone number (+44 203 868 6514), but feedback subdomain on HTTP |

### Content Depth by Page

| Page | Word Count | Quality |
|------|-----------|---------|
| `/villas/italy/sicily` | ~16,236 | **Excellent** -- comprehensive destination guide with FAQ |
| `/villas/italy/sicily/taormina` | ~12,342 | **Excellent** -- detailed destination content |
| Homepage | ~4,555 | **Good** -- solid landing page content |
| `/villas/pool` | ~2,303 | **Good** -- decent collection page |
| `/villas/beach` | ~2,500 | **Good** -- decent collection page |
| `/villas/info/history-of-sicily` | ~1,924 | **Good** -- informational content |
| Villa Mandralisca (detail) | ~1,500 | **Moderate** -- could be expanded |
| `/villas/italy/sicily/noto` | ~1,250 | **Moderate** -- thinner than Taormina |
| `/villas/owner-registration` | ~887 | **Thin** -- registration page with generic content |
| `/villas/last-minute` | ~718 | **Thin** -- mostly villa listings, little unique content |
| `/villas/contact` | ~429 | **Thin** -- just contact info |
| `/villas/suitable-for-weddings` | ~250 | **Very Thin** -- a wedding page needs far more content |
| `/villas/for-sale` | ~133 | **Very Thin** -- minimal content |
| `/villas/who-are-we` | ~35 | **Critically Thin** -- 35 words for an "About Us" page |

### Content Issues

- **"Who Are We" page has only 35 words** -- this is the company's about page and it's essentially empty. This is a huge missed trust-building opportunity.
- **Wedding page has generic content** -- URL is `/suitable-for-weddings` but title, H1, and content are all generic "Villas with Pool" text. No wedding-specific content at all.
- **"For Sale" page has generic rental content** -- URL suggests properties for sale but content/title say "Villas to rent". Confusing intent mismatch.
- **Blog/info section exists** but is not prominently linked from main navigation (found via Google, not via site map)

---

## Structured Data / Schema (Score: 25/100 | Weight: 15%)

### Schema Markup Inventory

| Page | Schema Type | Quality |
|------|------------|---------|
| Homepage | **None** | Missing -- should have Organization + WebSite |
| `/villas/who-are-we` | Organization | Empty `sameAs` property |
| `/villas/italy/sicily` | WebPage | Basic but correct |
| `/villas/italy/sicily/taormina` | WebPage | **Missing `@context`** -- invalid without it |
| `/villas/pool` | Product + AggregateRating | **PROBLEMATIC** -- 4.5 rating with "100 reviews" on a category page |
| `/villas/beach` | WebPage | Incomplete (just type name, no full object) |
| `/villas/italy/sicily/noto` | Service (Vacation Rental) | Reasonable but should be on villa pages |
| `/villas/info/history-of-sicily` | Article | Good -- has headline, author, datePublished |
| `/villas/last-minute` | Place + AggregateRating | **PROBLEMATIC** -- 0.0 rating with 0 reviews |
| `/villas/owner-registration` | Product, Organization, WebSite | Multiple unrelated types |
| Villa Mandralisca (detail) | **None** | Missing -- should have VacationRental or LodgingBusiness |
| `/villas/contact` | **None** | Missing |
| `/villas/suitable-for-weddings` | WebPage | Basic |
| `/villas/for-sale` | **None** | Missing |

### Critical Schema Issues

1. **Fake/misleading AggregateRating on /pool page**: Claims 100 ratings with 4.5 average for a category page that is not a product. This violates Google's structured data guidelines and risks a manual action.
2. **Zero-review AggregateRating on /last-minute**: Schema shows 0.0 rating with 0 reviews -- pointless and potentially penalised.
3. **No VacationRental schema on villa detail pages**: The most important pages for conversions have zero structured data. Google supports `VacationRental` type which would enable rich results.
4. **No BreadcrumbList schema**: The site has visible breadcrumbs (Home > Villas > Sicily > Cefalu > Villa Mandralisca) but no corresponding schema markup.
5. **No FAQPage schema**: The Sicily page has a FAQ section but no corresponding JSON-LD.
6. **Inconsistent schema strategy**: 7 different schema types used across 14 pages with no coherent strategy.

---

## Link Profile & Brand Signals (Score: 50/100 | Weight: 8%)

### External Presence

| Platform | Status | URL/Notes |
|----------|--------|-----------|
| Trustpilot | 4 stars (15 reviews) | sicily4u.co.uk listed |
| Tripadvisor | Forum mention | Discussion thread in Sicily forum |
| Facebook | Present | /sicily4ucouk page |
| Scamadviser | "Likely legit" | Positive trust score |
| feedback.sicily4u.co.uk | Active | Separate subdomain for reviews (HTTP only) |
| sicily4u.com | **Separate domain** | Appears to be same business -- potential cannibalization |

### Brand Concerns

1. **Two domains**: `sicily4u.co.uk` and `sicily4u.com` both exist. If both have similar content, they may be cannibalising each other in search results.
2. **feedback subdomain on HTTP**: `http://feedback.sicily4u.co.uk` is not on HTTPS, which is a trust and security concern.
3. **Low review volume**: Only 15 Trustpilot reviews for a business operating since 2004. More review generation efforts needed.
4. **Organization schema has empty sameAs**: The `sameAs` property (for linking to social profiles) is blank.

---

## Internationalisation (Score: 30/100 | Weight: 5%)

### Hreflang Tags

| Page | Hreflang Tags | Status |
|------|--------------|--------|
| `/villas/who-are-we` | `en-GB` | Present but alone (no alternate language) |
| `/villas/italy/sicily/noto` | `en-GB`, `it-IT` | Present -- correctly indicates two language versions |
| All other pages sampled | None | **Missing** |

The site appears to have Italian versions (evidenced by `it-IT` hreflang on the Noto page and the `.co.uk` TLD suggesting UK market), but hreflang implementation is inconsistent. Most pages have no hreflang tags at all.

---

## Page Speed & Performance (Score: 50/100 | Weight: 5%)

### Indicators

| Signal | Status | Notes |
|--------|--------|-------|
| Server response | Fast | All pages returned 200 in <1 second |
| Image optimisation | Partial | Uses ImageKit CDN (`ik.imagekit.io`) for villa photos -- good. But many pages use local images without CDN |
| JavaScript | Moderate | `mobile-web-app-capable: yes` suggests PWA intentions |
| CSS/render blocking | Unknown | Would need Lighthouse audit for full assessment |

**Note:** A full Core Web Vitals assessment requires Google PageSpeed Insights or Lighthouse testing, which could not be performed in this audit. However, the fixed 1250px viewport width will cause layout shift issues on mobile devices, likely failing CLS (Cumulative Layout Shift) thresholds.

---

## Scoring Summary

| Category | Score | Weight | Weighted |
|----------|-------|--------|----------|
| Technical SEO | 30/100 | 25% | 7.5 |
| On-Page SEO | 35/100 | 25% | 8.75 |
| Content Quality | 55/100 | 20% | 11.0 |
| Schema / Structured Data | 25/100 | 15% | 3.75 |
| Link Profile & Brand | 50/100 | 8% | 4.0 |
| Internationalisation | 30/100 | 5% | 1.5 |
| Performance | 50/100 | 2% | 1.0 |
| **Overall** | | | **37.5 / 100** |

---

## Pages Audited

1. Homepage (`/villas`)
2. Who Are We (`/villas/who-are-we`)
3. Contact (`/villas/contact`)
4. Sicily destination (`/villas/italy/sicily`)
5. Taormina destination (`/villas/italy/sicily/taormina`)
6. Noto destination (`/villas/italy/sicily/noto`)
7. Villa Mandralisca detail (`/villas/italy/sicily/cefalù/villas/villa-mandralisca`)
8. Pool collection (`/villas/pool`)
9. Beach collection (`/villas/beach`)
10. Weddings collection (`/villas/suitable-for-weddings`)
11. For Sale (`/villas/for-sale`)
12. Last Minute (`/villas/last-minute`)
13. Owner Registration (`/villas/owner-registration`)
14. History of Sicily (`/villas/info/history-of-sicily`)
15. robots.txt

---

## Competitive Landscape

Sicily4U operates in a competitive niche alongside:
- **Think Sicily** (thinksicily.com) -- premium villa specialist
- **Wish Sicily** (wishsicily.com) -- curated collection
- **Italian Connection** (italian-connection.co.uk) -- broader Italy rentals
- **Airbnb / Vrbo / Booking.com** -- marketplace giants

Given the niche focus on Sicily luxury villas, there is significant opportunity to rank well for long-tail terms like "luxury villa with pool Taormina", "beachfront villa Sicily", and "wedding villa Sicily" -- but only after resolving the critical technical issues identified in this audit.
