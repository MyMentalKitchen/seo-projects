# SEO Fixes Implementation Guide

**Site:** www.thegipsyhillsmokehouse.com (Wix)
**Date:** 2026-04-12
**Projected score uplift:** 46/100 -> 68-75/100

This guide lists 10 fixes in priority order with exact Wix steps.
All code snippets are in the `schema/`, `technical/`, and `content/` folders.

---

## Quick Reference

| # | Fix | Type | File | Wix Location | Time |
|---|-----|------|------|-------------|------|
| 1 | Fix homepage title tag | Technical | `technical/01-fix-homepage-title.html` | Custom Code > Body end > Homepage only | 5 min |
| 2 | Remove noindex from Private Parties | Technical | `technical/02-remove-noindex-private-parties.md` | Page SEO Settings | 2 min |
| 3 | Add LocalBusiness JSON-LD | Schema | `schema/03-local-business-schema.html` | Custom Code > Head > All pages | 5 min |
| 4 | Add Review schema | Schema | `schema/04-review-schema-testimonials.html` | Custom Code > Head > Testimonials only | 5 min |
| 5 | Fix Our Food page title | On-page | `technical/05-onpage-title-meta-fixes.md` | Page SEO Settings | 2 min |
| 6 | Fix meta keywords | On-page | `technical/05-onpage-title-meta-fixes.md` | Page SEO Settings (3 pages) | 5 min |
| 7 | Fix email inconsistency | On-page | `technical/05-onpage-title-meta-fixes.md` | Page editor + form settings | 10 min |
| 8 | Expand Our Food content | Content | `content/08-our-food-page-expanded.md` | Page editor | 20 min |
| 9 | Expand Contact page content | Content | `content/09-contact-page-expanded.md` | Page editor | 15 min |
| 10 | Add FAQ + schema to Wedding page | Content+Schema | `content/10-faq-wedding-page.md` + `schema/10-faq-schema-wedding.html` | Page editor + Custom Code > Head | 25 min |

**Total estimated time: ~1.5 hours**

---

## How to Add Custom Code in Wix

These steps apply to fixes #1, #3, #4, and #10:

1. Open the **Wix Editor** for your site
2. Click **Settings** in the left menu (gear icon)
3. Click **Custom Code** (under "Advanced")
4. Click **+ Add Custom Code**
5. Paste the HTML snippet from the relevant file
6. Set the **placement** as noted (Head or Body end)
7. Set the **pages** as noted (All pages, or specific page)
8. Click **Apply** then **Publish**

---

## Verification Checklist

After publishing all fixes, verify with these tools:

- [ ] **Title tag:** Google "site:thegipsyhillsmokehouse.com" -- check homepage title shows correctly
- [ ] **Private Parties indexed:** Google "site:thegipsyhillsmokehouse.com/private-parties"
- [ ] **Schema valid:** Test at https://validator.schema.org/ and https://search.google.com/test/rich-results
- [ ] **Email consistency:** Check all pages show `timclements@thegipsyhillsmokehouse.com`
- [ ] **Content live:** Verify expanded content on Our Food and Contact pages
- [ ] **FAQ visible:** Check FAQ section appears on Wedding page

---

## Expected Timeline for Results

| Milestone | Timeframe |
|-----------|-----------|
| Google re-crawls pages with fixes | 3-7 days |
| Homepage title corrected in SERP | 1-2 weeks |
| Private Parties page indexed | 1-2 weeks |
| Rich results (stars, FAQ) appear | 2-4 weeks |
| Ranking improvements from content | 4-8 weeks |
