# Full SEO Audit Report: The Gipsy Hill Smokehouse

**URL:** https://www.thegipsyhillsmokehouse.com  
**Date:** 2026-04-12  
**Business Type Detected:** Local Service / Catering (Hog Roast & BBQ, London, UK)  
**Platform:** Wix.com Website Builder  
**Pages Discovered:** ~32 pages  
**SEO Health Score: 46/100**

---

## Executive Summary

The Gipsy Hill Smokehouse is a well-established hog roast and BBQ catering business in London with nearly 20 years of experience. The website has good foundational content and decent imagery, but suffers from several **critical SEO issues** that are likely suppressing search visibility significantly.

### Top 5 Critical Issues

1. **Homepage title tag is broken** -- renders as `(1)` due to WhatsApp chat widget overriding the `<title>` element
2. **Private Parties page has `noindex, nofollow`** -- a key service page is completely blocked from search engines
3. **Zero structured data (JSON-LD)** -- no LocalBusiness, CateringBusiness, Review, or any schema markup detected
4. **No Google Business Profile schema integration** -- critical for a local service business
5. **Blog content is thin** -- most posts are 300-500 words with minimal depth

### Top 5 Quick Wins

1. Fix the homepage `<title>` tag (chat widget conflict) -- immediate ranking recovery
2. Remove `noindex,nofollow` from the Private Parties page
3. Add LocalBusiness + CateringBusiness JSON-LD schema to all pages
4. Add Review/AggregateRating schema to the testimonials page
5. Fix inconsistent email addresses (`timclements@thegipsyhillsmokehouse.com` vs `timclements@gipsyhillsmokehouse.com`)

---

## Technical SEO (Score: 45/100 | Weight: 22%)

### Crawlability

| Check | Status | Notes |
|-------|--------|-------|
| robots.txt | Present | Sitemap declared; excessive bot blocking (100+ user-agents) |
| XML Sitemap | Present | 3 sub-sitemaps (booking-services, restaurants-menu, pages) |
| HTTPS | Yes | SSL active |
| Google Verification | Yes | `mTKqnmAyleGZ-BbxJFH0myG0ZBWf150zeQ7ukJFp8Aw` |
| Bing Verification | Yes | Two verification codes present |
| Wix JS Rendering | Concern | Heavy client-side rendering may impact crawl budget |

### Indexability Issues

| Issue | Severity | Page |
|-------|----------|------|
| `noindex,nofollow` on Private Parties page | CRITICAL | `/private-parties` |
| Homepage `<title>` overridden by chat widget | CRITICAL | `/` (renders as "(1)") |
| Duplicate viewport meta tags | Medium | Multiple pages have 2-3 viewport tags |
| Duplicate `og:type` values | Low | `/private-parties` has `og:type` listed twice |
| Duplicate `og:title` / `og:description` values | Low | `/private-parties` has duplicate OG tags from embedded form |

### Security & Headers

| Check | Status |
|-------|--------|
| HTTPS | Active |
| Mixed Content | Not detected |
| Content-Type | `text/html; charset=UTF-8` |

### robots.txt Analysis

- **Good:** Sitemap properly declared, Googlebot allowed with specific exclusions
- **Concern:** Over 100 user-agents individually blocked -- this is excessive and unnecessary. Most of these are obsolete bots. This bloats the robots.txt file and provides no real benefit.
- **Concern:** PetalBot (Huawei search) fully blocked -- may limit visibility in some markets
- **Note:** AhrefsBot and dotbot given crawl-delay of 10 seconds

---

## Content Quality (Score: 55/100 | Weight: 23%)

### E-E-A-T Assessment

| Signal | Score | Notes |
|--------|-------|-------|
| Experience | Good | 20+ years in business, mentions Borough Market, celebrity clients, specific events |
| Expertise | Good | Detailed knowledge of porchetta-style cooking, Portuguese cuisine origins |
| Authoritativeness | Moderate | Notable client mentions (Kensington Palace, Gordon Ramsay, Heston Blumenthal) but no external validation visible |
| Trustworthiness | Moderate | Testimonials present but use initials only (H.J., C.S., etc.) -- no full names, dates, or verification |

### Content Depth by Page

| Page | Word Count | Quality |
|------|-----------|---------|
| Wedding Caterer (`/hog-roast-wedding-caterer-london`) | ~1,200 | Good -- comprehensive, keyword-rich |
| Private Parties (`/private-parties`) | ~350 | Thin -- needs expansion |
| Our Food (`/our-food`) | ~200 | Very Thin -- minimal descriptions |
| Contact Us (`/contact-us`) | ~50 | Minimal -- just form + phone |
| Testimonials (`/testimonials`) | ~800 | Moderate -- good social proof but unstructured |
| Blog posts | 300-500 each | Thin -- lack depth, headers, internal links |

### Content Issues

- **Thin content pages:** Our Food, Contact Us, and several blog posts
- **Blog posts lack structure:** No H2/H3 subheadings, no bullet points, no internal links to service pages
- **Testimonials use initials only:** "H.J.", "C.S." -- this reduces trust signals. Full names (with permission) or at minimum first names would be stronger
- **No FAQ content:** Missing opportunity for FAQ-rich content that targets long-tail queries
- **No pricing information:** Even approximate pricing ranges would help conversions and target "hog roast cost" queries

---

## On-Page SEO (Score: 50/100 | Weight: 20%)

### Title Tags

| Page | Title | Issue |
|------|-------|-------|
| Homepage | `(1)` | **CRITICAL**: Chat widget overrides real title |
| Wedding | `Hog Roast Wedding Caterer London, UK - Spit Roasts & Barbecue Catering Services` | Good but long (83 chars) |
| Our Food | `OUR FOOD \| GipsyHill_Smokehouse` | Poor -- not descriptive, underscore in brand |
| Contact | `Contact Us \| The Gipsy Hill Smokehouse - Roast Hog` | OK |
| Testimonials | `Wedding Catering Testimonials \| The Gipsy Hill Smokehouse - Roast Hog` | Good |
| Private Parties | `Hog Roast Private Party Catering London, UK - Spit Roasts & BBQ Catering Services` | Good but page is noindexed |
| Blog post | `Why A Hog Roast Is The Perfect Solution For Wedding Catering` | Good |

### Meta Descriptions

| Page | Description | Quality |
|------|-------------|---------|
| Homepage | "Elevate your weddings, parties, and events with mouth-watering hog roast and BBQ catering in London..." | Good (155 chars) |
| Wedding | "Celebrate your special day with premier hog roast and barbecue catering in London, UK..." | Good |
| Our Food | "Hog Roast, Barbecue and Spit Roast Catering. Our food, menus and event catering planning..." | OK |
| Contact | "Wedding catering, hog roast party catering, corporate event catering..." | Good |

### Meta Keywords (Obsolete but Present)

| Page | Keywords | Issue |
|------|----------|-------|
| Homepage | `hog roast, hog roast caterer` | Minimal |
| Wedding | `about, the, gipsy, hill, smokhouse` | **Typo: "smokhouse"**; also these are stop words, not keywords |
| Our Food | `our, food` | Useless -- just the page name split into words |
| Private Parties | `roast hog party, hog roast parties, roast hog london` | Reasonable but irrelevant since page is noindexed |

### Heading Structure

- **Homepage:** Heading structure not fully extractable due to Wix JS rendering
- **Wedding page:** Good H1 ("Our Hog Roast Wedding Caterer London Services") followed by relevant H2s and H3s
- **Our Food:** H2s only (no H1 visible in main content -- "Barbecue Menus" is an H1 but it's a secondary heading)
- **Contact:** H1 ("Contact us") -- appropriately simple

### Internal Linking

- **Good:** Main navigation links to key service pages
- **Gap:** Blog posts don't link back to service pages consistently
- **Gap:** No breadcrumb navigation
- **Gap:** Testimonials page has no links to service pages or contact form
- **Inconsistent email:** Two different email domains used (`@thegipsyhillsmokehouse.com` and `@gipsyhillsmokehouse.com`)

---

## Schema & Structured Data (Score: 10/100 | Weight: 10%)

### Current Implementation

**No JSON-LD structured data was detected on any page.**

This is a critical gap for a local service business.

### Missing Schema Opportunities

| Schema Type | Priority | Page(s) |
|-------------|----------|---------|
| `LocalBusiness` / `FoodService` | CRITICAL | All pages (footer/site-wide) |
| `CateringBusiness` (schema.org) | CRITICAL | Homepage, Wedding, Private Parties |
| `Review` / `AggregateRating` | HIGH | Testimonials page |
| `FAQPage` | HIGH | Homepage, Wedding page (add FAQ section) |
| `Article` / `BlogPosting` | MEDIUM | Blog posts (Wix may auto-add, but not confirmed) |
| `BreadcrumbList` | MEDIUM | All pages |
| `WebSite` with `SearchAction` | LOW | Homepage |
| `Event` | LOW | Festival/event pages |

### Recommended LocalBusiness Schema

```json
{
  "@context": "https://schema.org",
  "@type": "CateringBusiness",
  "name": "The Gipsy Hill Smokehouse",
  "description": "Hog roast and BBQ catering for weddings, events, and parties in London",
  "url": "https://www.thegipsyhillsmokehouse.com",
  "telephone": "+447944390309",
  "email": "timclements@thegipsyhillsmokehouse.com",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Gipsy Hill",
    "addressRegion": "London",
    "addressCountry": "GB"
  },
  "areaServed": {
    "@type": "GeoCircle",
    "geoMidpoint": { "@type": "GeoCoordinates", "latitude": 51.4220, "longitude": -0.0840 },
    "geoRadius": "80467"
  },
  "foundingDate": "2004",
  "priceRange": "$$",
  "servesCuisine": ["Hog Roast", "BBQ", "Portuguese", "Spit Roast"],
  "sameAs": [
    "https://www.instagram.com/thegipsyhillsmokehouse",
    "https://www.facebook.com/thegipsyhillsmokehouse",
    "https://www.twitter.com/gh_smokehouse",
    "https://www.youtube.com/channel/UCNn_UscR8fylPm-OQQEJEKg"
  ]
}
```

---

## Performance (Score: 65/100 | Weight: 10%)

### Observations (Lab Data Unavailable -- No Google API Credentials)

| Factor | Status | Notes |
|--------|--------|-------|
| Image Format | Good | Wix auto-serves AVIF/WebP with quality optimization |
| CDN | Good | Wix CDN (`static.wixstatic.com`) |
| Responsive Images | Good | Wix handles responsive image sizing |
| Third-party Scripts | Concern | Smartarget WhatsApp widget (trial version with branding visible to crawlers) |
| JavaScript Weight | Concern | Wix is JS-heavy; impacts FCP/LCP for crawlers |
| Hero Image Sizes | Moderate | Some hero images are 1400-1733px wide |

### Third-Party Script Concern

The **Smartarget WhatsApp widget** is on a trial/free plan and injects visible branding text into the page:
> "Smartarget Apps are hidden. Your Smartarget Whatsapp - Contact Us is visible on the homepage only + Smartarget branding."

This text is crawlable and appears as page content to search engines.

**Recommendation:** Upgrade to paid plan or replace with a native Wix chat widget to eliminate injected branding text.

---

## AI Search Readiness (Score: 25/100 | Weight: 10%)

| Factor | Status |
|--------|--------|
| `llms.txt` | Missing |
| FAQ structured data | Missing |
| Content citability | Moderate -- wedding page has good factual content |
| Brand mention signals | Moderate -- notable client mentions (Kensington Palace, Gordon Ramsay, etc.) |
| AI crawler access | Allowed (robots.txt permits `*`) |
| Content structure for extraction | Poor -- no bullet-point summaries, no data tables |
| Unique statistics/data | Missing -- no specific numbers (events catered, years, guest counts) |

### Recommendations for AI Search Optimization

1. Add an `llms.txt` file at the root
2. Create FAQ sections on key pages with FAQPage schema
3. Add specific, citable statistics ("Over 500 events catered since 2004", "Serving parties of 20 to 500+ guests")
4. Structure content with clear headers, bullet points, and summary paragraphs
5. Add a "Key Facts" section to the homepage for easy AI extraction

---

## Images (Score: 60/100 | Weight: 5%)

### Image Optimization

| Factor | Status | Notes |
|--------|--------|-------|
| Alt Text Present | Mostly | Most images have descriptive alt text |
| AVIF/WebP Format | Yes | Wix auto-converts to modern formats |
| Responsive Sizing | Yes | Wix handles `fill/w_XXX,h_XXX` sizing |
| Lazy Loading | Likely | Wix handles via JS |

### Alt Text Issues

| Image | Alt Text | Issue |
|-------|----------|-------|
| Wedding hero | `IMG_4386_edited.jpg` | Filename used as alt text -- not descriptive |
| Our Food hero | `Gipsy Hill Smokehouse Our Food_edited.jpg` | Filename-based, includes "_edited" |
| Other images | Generally good | e.g., "Hog Roast Wedding Caterers, Spit Roasts & Barbecues" |

### Missing Image SEO

- No `<figcaption>` elements on images
- No image sitemap entries visible
- OG images are properly set across pages

---

## SEO Health Score Breakdown

| Category | Weight | Score | Weighted |
|----------|--------|-------|----------|
| Technical SEO | 22% | 45/100 | 9.9 |
| Content Quality | 23% | 55/100 | 12.7 |
| On-Page SEO | 20% | 50/100 | 10.0 |
| Schema / Structured Data | 10% | 10/100 | 1.0 |
| Performance | 10% | 65/100 | 6.5 |
| AI Search Readiness | 10% | 25/100 | 2.5 |
| Images | 5% | 60/100 | 3.0 |
| **TOTAL** | **100%** | | **45.6 ~ 46/100** |

---

## Notes

- **No Google API credentials configured** -- CrUX field data, GSC indexation status, and GA4 traffic data unavailable. Configuring these would provide real-world performance metrics.
- **No backlink API credentials** -- Unable to assess domain authority, referring domains, or toxic links.
- **Wix platform limitations** -- Some technical SEO optimizations (server headers, advanced redirects, custom code injection) are limited by the Wix platform.
