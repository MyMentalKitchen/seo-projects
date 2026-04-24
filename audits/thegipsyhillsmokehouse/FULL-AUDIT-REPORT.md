# Full SEO Audit Report: The Gipsy Hill Smokehouse

**URL:** https://www.thegipsyhillsmokehouse.com  
**Date:** 2026-04-24 (updated; original audit 2026-04-12)  
**Business Type Detected:** Local Service / Catering (Hog Roast & BBQ, London, UK)  
**Platform:** Wix.com Website Builder  
**Pages Discovered:** ~36 pages (14 service/info pages, ~12 blog posts, utility pages)  
**SEO Health Score: 38/100** (down from 46 on 2026-04-12)

---

## Executive Summary

The Gipsy Hill Smokehouse is a well-established hog roast and BBQ catering business in London with over 20 years of experience (est. 2004). The website has decent foundational content on key pages like the homepage (~1,133 words) and wedding page (~1,200 words), and the business has strong E-E-A-T credentials including mentions of Kensington Palace, Gordon Ramsay's F-Word, and Heston Blumenthal's Fat Duck.

However, the site suffers from **severe technical and structural SEO issues** that are almost certainly suppressing search visibility dramatically. The score has **declined from 46 to 38** since the original audit on 2026-04-12, primarily because a fourth key page (`/spit-roasts-hog-roasts`) has now been tagged with `noindex`.

### Top 5 Critical Issues

1. **Homepage title tag renders as "(1)"** -- the Smartarget WhatsApp widget overwrites `document.title` with a notification counter; Google indexes this broken title
2. **FOUR key revenue pages blocked by `noindex`** -- `/private-parties`, `/event-catering`, `/hog-roast-party`, and `/spit-roasts-hog-roasts` are all invisible to Google
3. **Zero structured data (JSON-LD)** -- no LocalBusiness, CateringBusiness, Review, FAQ, or any schema markup on any page
4. **Spit Roasts page has 6 H1 tags** -- catastrophic heading structure; each content section uses H1 instead of H2
5. **No Google Business Profile** detected -- critical gap for a local service business

### Top 5 Quick Wins

1. Fix the homepage `<title>` tag (remove/replace Smartarget widget) -- immediate SERP improvement
2. Remove `noindex` from the 4 blocked service pages -- re-index within 1-2 weeks
3. Add CateringBusiness JSON-LD schema site-wide via Wix Custom Code
4. Add Review/AggregateRating schema to the testimonials page (12 genuine reviews exist)
5. Fix the spit roasts page heading structure (6 H1s -> 1 H1 + 5 H2s)

---

## Technical SEO (Score: 30/100 | Weight: 22%)

### Crawlability

| Check | Status | Notes |
|-------|--------|-------|
| robots.txt | Present | `Allow: /` for all; sitemap declared; Googlebot blocked from `?lightbox=` URLs |
| XML Sitemap | Present | `sitemap.xml` with 3 sub-sitemaps (booking-services, restaurants-menu, pages) |
| HTTPS | Yes | SSL active |
| Google Verification | Yes | `mTKqnmAyleGZ-BbxJFH0myG0ZBWf150zeQ7ukJFp8Aw` |
| Bing Verification | Yes | Two verification codes present |
| Wix JS Rendering | Concern | Heavy client-side rendering may impact crawl budget |

### Indexability Issues

| Issue | Severity | Page(s) |
|-------|----------|---------|
| Homepage `<title>` overridden by chat widget | **CRITICAL** | `/` (renders as "(1)") |
| `noindex,nofollow` on Private Parties | **CRITICAL** | `/private-parties` |
| `noindex,nofollow` on Event Catering | **CRITICAL** | `/event-catering` |
| `noindex,nofollow` on Hog Roast Party | **CRITICAL** | `/hog-roast-party` |
| `noindex` on Spit Roasts | **CRITICAL** | `/spit-roasts-hog-roasts` (NEW since original audit) |
| Duplicate OG tags (arrays) on form pages | Medium | `/private-parties`, `/event-catering`, `/hog-roast-party` |
| Multiple viewport meta tags | Medium | `/private-parties` (3), `/event-catering` (4), `/hog-roast-party` (3) |

The `noindex` issue on form-embedded pages is a **known Wix bug**: when a Wix Form is embedded directly on a page (rather than via lightbox), it injects its own meta tags including `noindex,nofollow` and duplicate OG tags.

### robots.txt Analysis

- **Good:** Sitemap declared, Googlebot allowed with specific `?lightbox=` exclusion
- **Concern:** Over 100 individual user-agents blocked (Wix default bloat)
- **Concern:** PetalBot (Huawei search) fully blocked
- **Note:** AhrefsBot and dotbot given crawl-delay of 10 seconds

---

## Content Quality (Score: 52/100 | Weight: 23%)

### E-E-A-T Assessment

| Signal | Score | Notes |
|--------|-------|-------|
| Experience | Strong | 20+ years in business (est. 2004), Borough Market heritage, hundreds of events |
| Expertise | Strong | Detailed knowledge of porchetta-style cooking, Portuguese cuisine origins, specific cooking techniques |
| Authoritativeness | Moderate | Notable clients (Kensington Palace, Gordon Ramsay, Heston Blumenthal) but limited external validation |
| Trustworthiness | Moderate | Real phone number (07944 390 309), testimonials present but use initials only (H.J., C.S.), no external review links |

### Content Depth by Page

| Page | URL | Word Count | Quality |
|------|-----|-----------|---------|
| Event Catering | `/event-catering` | ~1,581 | Good -- but page is **noindexed** |
| Homepage | `/` | ~1,133 | Good -- comprehensive, good internal links |
| Wedding Caterer | `/hog-roast-wedding-caterer-london` | ~1,200 | Good -- strong E-E-A-T, origin story |
| Testimonials | `/testimonials` | ~930 | Moderate -- 12 genuine testimonials but no schema |
| Private Parties | `/private-parties` | ~457 | Thin -- and **noindexed** |
| Beckenham Location | `/hog-roast-catering-beckenham` | ~282 | Thin -- needs expansion |
| Spit Roasts | `/spit-roasts-hog-roasts` | ~259 | Thin -- and **noindexed** |
| Our Food | `/our-food` | ~202 | Very Thin |
| Hog Roast Party | `/hog-roast-party` | ~189 | Very Thin -- essentially just a form |
| Contact Us | `/contact-us` | ~72 | Minimal -- just form + phone |

### Content Issues

- **4 of the top 10 pages by content are noindexed**, including the richest one (Event Catering at 1,581 words)
- **Our Food page at 202 words** is critically thin for a food business
- **Blog has only 2 posts** -- massive missed opportunity for topical authority
- **Testimonials use initials only** (H.J., C.S.) -- reduces trust signals
- **No FAQ content** on any page
- **No pricing information** except on the spit roasts page ("From £25.00 per head")

---

## On-Page SEO (Score: 38/100 | Weight: 20%)

### Title Tags

| Page | Title Tag | Issue |
|------|-----------|-------|
| Homepage | `💬 (1)` | **CRITICAL**: Chat widget overrides real title |
| Our Food | `OUR FOOD \| GipsyHill_Smokehouse` | Poor -- uses internal Wix site name |
| Spit Roasts | `Spit Roast Catering \| Get a Spit Roasted Hog at your Event \| The Gipsy Hill Smokehouse - Roast Hog` | Too long (97 chars; Google truncates at ~60) |
| Blog | `Blog \| GipsyHill_Smokehouse` | Poor -- uses internal Wix site name |
| Wedding Menus | OG title: `WEDDING MENUS \| Roast Hog and GipsyHill_Smokehouse` | OG title uses internal name (page title is fine) |
| Wedding | `Hog Roast Wedding Caterer London, UK - Spit Roasts & Barbecue Catering Services` | Good (80 chars) |
| Contact | `Contact Us \| The Gipsy Hill Smokehouse - Roast Hog` | Good |
| Testimonials | `Wedding Catering Testimonials \| The Gipsy Hill Smokehouse - Roast Hog` | Good |
| Beckenham | `Hog Roast BBQ Catering Beckenham, UK - Barbecue Caterers for Wedding, Events & Parties` | Good |

### Meta Keywords Issues

| Page | Keywords | Issue |
|------|----------|-------|
| Wedding | `about, the, gipsy, hill, smokhouse` | **Stop words as keywords + typo ("smokhouse")** |
| Our Food | `our, food` | Useless -- page name split into words |
| Event Catering | `roast hog london bridge, london borough market` | Wrong focus for an event catering page |
| Beckenham | `roast hog london bridge, london borough market` | **Wrong location entirely** (Beckenham ≠ London Bridge) |
| Homepage | `hog roast, hog roast caterer` | Minimal but acceptable |

### Heading Structure Issues

| Page | H1 Count | Issue |
|------|----------|-------|
| Spit Roasts | **6** | Catastrophic -- every section uses H1 |
| Hog Roast Party | 1 | H1 text is: "If you haven't already, check our menu and if you want a quote, fill out the form below." -- not a proper heading |
| Homepage | 1 | Good |
| Wedding | 1 | Good |
| Contact | 1 | Good |
| Testimonials | 1 | Good |

### Meta Description Issues

| Page | Issue |
|------|-------|
| Testimonials | Apostrophe error: "client's" should be "clients" |
| Spit Roasts | Updated with pricing info ("From £25.00 per head") -- good improvement |
| Homepage | Updated since original audit -- now cleaner and more compelling |

---

## Schema & Structured Data (Score: 5/100 | Weight: 10%)

### Current Implementation

**No JSON-LD structured data was detected on any page across the entire site.**

This is the single biggest gap for a local service business.

### Missing Schema Opportunities

| Schema Type | Priority | Page(s) |
|-------------|----------|---------|
| `CateringBusiness` (LocalBusiness subtype) | **CRITICAL** | All pages (site-wide via Wix Custom Code) |
| `Review` / `AggregateRating` | **HIGH** | `/testimonials` (12 genuine reviews exist with no markup) |
| `FAQPage` | HIGH | Wedding page, homepage (add FAQ sections) |
| `Menu` | MEDIUM | `/our-food`, `/menus/wedding-menus`, `/gipsy-hill-smokehouse-menu` |
| `BreadcrumbList` | MEDIUM | All pages |
| `Article` / `BlogPosting` | MEDIUM | Blog posts |
| `WebSite` with `SearchAction` | LOW | Homepage |

---

## Performance (Score: 60/100 | Weight: 10%)

| Factor | Status | Notes |
|--------|--------|-------|
| Image Format | Good | Wix auto-serves AVIF/WebP |
| CDN | Good | Wix CDN (`static.wixstatic.com`) |
| Responsive Images | Good | Wix handles responsive sizing |
| Third-party Scripts | Concern | Smartarget WhatsApp widget (expired trial, injects branding text) |
| JavaScript Weight | Concern | Wix is JS-heavy; impacts FCP/LCP |

### Smartarget Widget Concern

The Smartarget WhatsApp widget trial has expired. It:
- Overwrites `document.title` on the homepage with "(1)"
- Injects visible "Smartarget Apps are hidden" branding text on non-homepage pages
- This text is crawlable by search engines

---

## AI Search Readiness (Score: 25/100 | Weight: 10%)

| Factor | Status |
|--------|--------|
| `llms.txt` | Missing |
| FAQ structured data | Missing |
| Content citability | Moderate -- wedding page has good factual content, notable client mentions |
| Brand mention signals | Moderate -- Kensington Palace, Gordon Ramsay, Heston Blumenthal |
| AI crawler access | Allowed (robots.txt permits `*`) |
| Content structure for extraction | Poor -- no bullet-point summaries, no data tables |
| Unique statistics/data | Missing -- only one price point found ("From £25.00 per head") |

---

## Images (Score: 55/100 | Weight: 5%)

| Factor | Status |
|--------|--------|
| Homepage alt text | Good -- 15 images with alt, 0 without |
| Wedding page alt text | Mixed -- 11 with alt, 3 without |
| Our Food page | Mixed -- 4 with alt, 1 without |
| AVIF/WebP format | Yes (Wix auto-converts) |
| OG images | Several pages use generic Wix logo instead of page-specific images |

---

## Local SEO (Not Scored Separately)

| Factor | Status | Notes |
|--------|--------|-------|
| Google Business Profile | **Not found** | Critical gap for a local service business |
| NAP Consistency | Issue | Email domain inconsistency: site is `thegipsyhillsmokehouse.com` but wedding page shows `timclements@gipsyhillsmokehouse.com` |
| Phone | Present | 07944 390 309 (in meta description and contact page) |
| Service Area | Mentioned | "50-mile radius around London" on wedding page |
| Location Pages | Minimal | Only 1 location page (Beckenham) |
| External Citations | Some | Facebook, Poptop, Togather, Yelp, Opendi |

---

## SEO Health Score Breakdown

| Category | Weight | Score | Weighted |
|----------|--------|-------|----------|
| Technical SEO | 22% | 30/100 | 6.6 |
| Content Quality | 23% | 52/100 | 12.0 |
| On-Page SEO | 20% | 38/100 | 7.6 |
| Schema / Structured Data | 10% | 5/100 | 0.5 |
| Performance | 10% | 60/100 | 6.0 |
| AI Search Readiness | 10% | 25/100 | 2.5 |
| Images | 5% | 55/100 | 2.8 |
| **TOTAL** | **100%** | | **38.0 / 100** |

### Score Change Since Original Audit (2026-04-12)

| Category | Original | Current | Change |
|----------|----------|---------|--------|
| Technical SEO | 45 | 30 | -15 (4 noindexed pages, up from 1) |
| Content Quality | 55 | 52 | -3 |
| On-Page SEO | 50 | 38 | -12 (more issues discovered) |
| Schema | 10 | 5 | -5 (confirmed zero across all pages) |
| Performance | 65 | 60 | -5 |
| AI Search | 25 | 25 | 0 |
| Images | 60 | 55 | -5 |
| **Overall** | **46** | **38** | **-8** |

The decline is driven primarily by the discovery of additional `noindex` directives (now 4 pages instead of 1) and deeper on-page issues including the spit roasts page having 6 H1 tags and the hog roast party page having a sentence as its H1.

---

## Pages Audited

1. Homepage (`/`)
2. Wedding Caterer (`/hog-roast-wedding-caterer-london`)
3. Private Parties (`/private-parties`)
4. Event Catering (`/event-catering`)
5. Hog Roast Party (`/hog-roast-party`)
6. Our Food (`/our-food`)
7. Contact Us (`/contact-us`)
8. Testimonials (`/testimonials`)
9. Spit Roasts (`/spit-roasts-hog-roasts`)
10. Beckenham Location (`/hog-roast-catering-beckenham`)
11. Gallery (`/gallery`)
12. Wedding Menus (`/menus/wedding-menus`)
13. Blog (`/blog`)
14. robots.txt

---

## Notes

- **Positive changes since original audit:** Homepage meta description and OG title have been updated and improved. Spit roasts page now includes pricing ("From £25.00 per head").
- **Negative changes since original audit:** Spit roasts page has gained a `noindex` directive, bringing total blocked pages to 4.
- **No Google API credentials configured** -- CrUX field data, GSC indexation status, and GA4 traffic unavailable.
- **Wix platform limitations** apply to server headers, advanced redirects, and code injection options.
