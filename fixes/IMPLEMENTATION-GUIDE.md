# SEO Fixes Implementation Guide

**Site:** www.sicily4u.co.uk (Custom Node.js)
**Date:** 2026-04-12
**Projected score uplift:** 38/100 -> 65-70/100

This guide lists 10 fixes in priority order with exact implementation steps.
All code snippets are in the `schema/`, `technical/`, and `content/` folders.

---

## Quick Reference

| # | Fix | Type | File | Where to Apply | Time |
|---|-----|------|------|---------------|------|
| 1 | Fix viewport meta tag | Technical | `technical/01-fix-viewport-meta.html` | Base layout template `<head>` — all pages | 30 min + CSS |
| 2 | Fix broken canonical URLs | Technical | `technical/02-fix-canonical-urls.md` | Template canonical tag logic | 30 min |
| 3 | Fix empty/generic title tags | Technical | `technical/03-fix-title-tags.md` | CMS/page config for 6 pages | 30 min |
| 4 | Remove fake AggregateRating | Technical | `technical/04-remove-fake-schema.md` | Remove schema from /pool and /last-minute | 15 min |
| 5 | Fix OG typo + HTML in social tags | Technical | `technical/05-fix-social-meta-tags.md` | Homepage OG tags + villa template + contact template | 1 hr |
| 6 | Fix duplicate meta descriptions | Technical | `technical/06-fix-duplicate-descriptions.md` | Template description output logic | 1 hr |
| 7 | Remove template variable leak | Technical | `technical/07-fix-template-variable-leak.md` | Villa detail template keywords | 15 min |
| 8 | Add Organization + WebSite schema | Schema | `schema/08-organization-website-schema.html` | Base layout `<head>` — all pages | 15 min |
| 9 | Add VacationRental schema | Schema | `schema/09-vacation-rental-schema.html` | Villa detail page template `<head>` | 2-4 hrs |
| 10a | Expand "Who Are We" page | Content | `content/10a-who-are-we-expanded.md` | Page editor / CMS | 30 min |
| 10b | Expand Wedding Villas page | Content | `content/10b-wedding-villas-expanded.md` | Page editor / CMS + schema | 45 min |

**Total estimated time: ~7-9 hours**

---

## Priority Tiers

### CRITICAL — Deploy ASAP (Fixes 1-4)

These fixes address issues that are actively suppressing search rankings:

| Fix | Issue | Impact if Not Fixed |
|-----|-------|-------------------|
| #1 Viewport | Hardcoded 1250px width fails mobile-first indexing | 30-50% organic traffic loss |
| #2 Canonicals | 3 pages point canonical to homepage | Pages invisible to Google |
| #3 Titles | Empty/duplicate titles on 6 pages | Poor SERP display, no differentiation |
| #4 Fake Schema | Fabricated review ratings | Risk of Google manual penalty |

### HIGH — Deploy Within 1 Week (Fixes 5-7)

These fixes clean up technical debt that degrades SERP appearance:

| Fix | Issue | Impact if Not Fixed |
|-----|-------|-------------------|
| #5 Social Tags | Typo in OG description, HTML in Twitter cards | Poor social sharing appearance |
| #6 Descriptions | Duplicated meta descriptions on 6+ pages | Google auto-generates snippets |
| #7 Template Leak | Debug variable in production HTML | Signals poor code quality |

### MEDIUM — Deploy Within 1 Month (Fixes 8-10)

These fixes add new capabilities and content:

| Fix | Issue | Impact if Not Fixed |
|-----|-------|-------------------|
| #8 Org Schema | No business structured data | Missing knowledge panel, trust signals |
| #9 Villa Schema | No VacationRental markup | Missing price/availability rich results |
| #10 Content | About page: 35 words; Wedding: 250 words | Cannot rank for relevant queries |

---

## Platform Notes

Sicily4U runs on a **custom Node.js** platform (not Wix, WordPress, or a hosted builder). This means:

1. **Template changes** require access to the server-side codebase (likely Express.js with EJS, Handlebars, or similar template engine)
2. **Schema markup** should be added via the `<head>` section of templates
3. **Meta tags** are likely controlled by a combination of base layouts and per-page configuration
4. **CSS changes** (for viewport fix) need to be deployed alongside the HTML change
5. **Content changes** may go through a CMS or may require direct template editing

---

## Verification Checklist

After deploying all fixes, verify with these tools:

- [ ] **Mobile friendly:** https://search.google.com/test/mobile-friendly — enter homepage URL
- [ ] **Canonicals:** View source on /who-are-we, /owner-registration, /contact — check canonical matches page URL
- [ ] **Titles:** View source on all 6 fixed pages — each should have a unique `<title>`
- [ ] **Schema valid:** https://validator.schema.org/ — test homepage, a villa page, and /pool page
- [ ] **Rich results:** https://search.google.com/test/rich-results — test a villa detail page
- [ ] **Social tags:** https://developers.facebook.com/tools/debug/ — test homepage URL
- [ ] **No template leaks:** View source on a villa page — search for "tmp_" (should not appear)
- [ ] **Descriptions:** View source on homepage — `<meta name="description"` should appear exactly once
- [ ] **Content live:** Check /who-are-we has ~850 words and /suitable-for-weddings has ~1,200 words

---

## Expected Timeline for Results

| Milestone | Timeframe |
|-----------|-----------|
| Google re-crawls pages with fixes | 3-7 days |
| Mobile usability errors clear in Search Console | 1-2 weeks |
| Fixed titles appear in search results | 1-2 weeks |
| Canonical-fixed pages re-indexed | 1-2 weeks |
| Organization schema reflected in knowledge panel | 2-4 weeks |
| VacationRental rich results appear | 2-4 weeks |
| Wedding page ranks for new keywords | 4-8 weeks |
| Full score recovery to 65-70/100 | 8-12 weeks |
