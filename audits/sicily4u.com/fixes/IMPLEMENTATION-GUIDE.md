# SEO Fixes Implementation Guide

**Site:** www.sicily4u.com (WordPress + WooCommerce + MotoPress Hotel Booking)
**Date:** 2026-04-13
**Projected score uplift:** 42/100 → 70-78/100

This guide lists 10 fixes in priority order with exact WordPress steps.
All code snippets are in the `schema/`, `technical/`, and `onpage/` folders.

---

## Quick Reference

| # | Fix | Type | File | WordPress Location | Time |
|---|-----|------|------|--------------------|------|
| 1 | Fix conflicting robots + viewport tags | Technical | `technical/01-fix-robots-noindex-conflict.php` | Child theme `functions.php` | 30 min |
| 2 | Fix robots.txt 403 Forbidden | Technical | `technical/02-fix-robots-txt.md` | Settings > Reading / .htaccess / security plugin | 15 min |
| 3 | Noindex test/internal pages | Technical | `technical/03-noindex-test-pages.md` | SEO plugin per-page settings | 10 min |
| 4 | Add Organization + WebSite schema | Schema | `schema/04-organization-website-schema.html` | Code Snippets plugin or `header.php` | 15 min |
| 5 | Add VacationRental schema to villas | Schema | `schema/05-vacation-rental-schema.php` | Child theme `functions.php` | 20 min |
| 6 | Add FAQPage schema to /faqs | Schema | `schema/06-faqpage-schema.html` | Code Snippets plugin (FAQs page only) | 10 min |
| 7 | Add Article schema to blog posts | Schema | `schema/07-article-blogposting-schema.php` | Child theme `functions.php` | 10 min |
| 8 | Fix garbled/missing meta descriptions | On-page | `onpage/08-fix-meta-descriptions.md` | SEO plugin per-page settings | 15 min |
| 9 | Fix archive title + heading structure | On-page | `onpage/09-fix-archive-title-and-headings.md` | SEO plugin + page editor | 10 min |
| 10 | Fix OG images + cross-domain refs | On-page | `onpage/10-fix-og-and-cross-domain-images.md` | Page editor + Media Library | 30 min |

**Total estimated time: ~2.5 hours**

---

## Implementation Order

### Phase 1: Critical Technical Fixes (Day 1) — Score: 42 → 58

These fixes address the most damaging issues first.

**Step 1:** Apply Fix #1 (functions.php) — this resolves BOTH the conflicting robots tags AND the duplicate viewport, unblocking ~65 pages from de-indexing.

**Step 2:** Apply Fix #2 (robots.txt) — enables crawlers to discover the sitemap.

**Step 3:** Apply Fix #3 (noindex pages) — removes junk pages from the index.

### Phase 2: Structured Data (Day 2-3) — Score: 58 → 68

**Step 4:** Apply Fix #4 (Organization + WebSite) — site-wide schema.

**Step 5:** Apply Fix #5 (VacationRental) — villa page schema (test on one villa first, then deploy to all).

**Step 6:** Apply Fix #6 (FAQPage) — FAQ page schema.

**Step 7:** Apply Fix #7 (Article) — blog post schema.

### Phase 3: On-Page Optimization (Day 4-5) — Score: 68 → 75

**Step 8:** Apply Fix #8 — update 5 meta descriptions.

**Step 9:** Apply Fix #9 — fix archive title and About Us heading.

**Step 10:** Apply Fix #10 — fix OG images and migrate cross-domain images.

---

## How to Add PHP Code to WordPress

Fixes #1, #5, and #7 require adding PHP to `functions.php`:

### Option A: Child Theme (Recommended)
1. If you don't have a child theme, create one for Booklium
2. Open the child theme's `functions.php`
3. Paste the code from each `.php` file
4. Save and upload via FTP/SFTP

### Option B: Code Snippets Plugin
1. Install the **Code Snippets** plugin (free)
2. Go to **Snippets > Add New**
3. Paste the PHP code (without the `<?php` opening tag)
4. Give it a descriptive title (e.g., "Fix robots conflict")
5. Set scope to **Run everywhere**
6. Click **Save and Activate**

> **Warning:** Never edit the parent theme's `functions.php` directly —
> it will be overwritten on the next theme update.

---

## Verification Checklist

After implementing all fixes, verify with these tools:

### After Phase 1:
- [ ] View source on a villa page — only ONE robots meta tag (`index, follow...`)
- [ ] View source on a villa page — only ONE viewport meta tag
- [ ] Visit `https://sicily4u.com/robots.txt` — returns 200 OK
- [ ] Visit `/test-blog` — either 404 or has `noindex` in source

### After Phase 2:
- [ ] Schema valid: test homepage at https://search.google.com/test/rich-results
- [ ] Schema valid: test a villa page at the same URL
- [ ] Schema valid: test the /faqs page
- [ ] Schema valid: test a blog post

### After Phase 3:
- [ ] Facebook Sharing Debugger shows preview images for /locations, /faqs
- [ ] View source on /about-us — only one `<h1>` tag
- [ ] Google Search Console: request re-indexing for homepage + top 10 villas

---

## Expected Timeline for Results

| Milestone | Timeframe |
|-----------|-----------|
| Google re-crawls pages with fixes | 3-7 days |
| Villa pages move from "Excluded" to "Indexed" in GSC | 1-3 weeks |
| Rich results (FAQ, article) appear in SERPs | 2-4 weeks |
| Organic traffic recovery from de-indexed pages | 2-6 weeks |
| Full ranking improvements from schema + on-page fixes | 4-8 weeks |
