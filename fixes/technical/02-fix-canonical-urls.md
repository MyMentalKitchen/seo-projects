# Fix #2: Broken Canonical URLs on 3 Key Pages

## Problem

Three pages have `<link rel="canonical">` tags pointing to the **homepage** instead of themselves. This tells Google these pages are duplicates of the homepage, so Google ignores their unique content entirely.

| Page | Current Canonical (WRONG) | Correct Canonical |
|------|--------------------------|-------------------|
| `/villas/who-are-we` | `https://www.sicily4u.co.uk/villas/` | `https://www.sicily4u.co.uk/villas/who-are-we` |
| `/villas/owner-registration` | `https://www.sicily4u.co.uk/villas` | `https://www.sicily4u.co.uk/villas/owner-registration` |
| `/villas/contact` | `https://www.sicily4u.co.uk` | `https://www.sicily4u.co.uk/villas/contact` |

## Root Cause

The template system appears to default to the homepage URL when a page-specific canonical is not explicitly set. This is a template/CMS bug — the canonical tag should always self-reference the current page URL unless there is a deliberate reason to point elsewhere.

## Fix

### Option A: Fix in the base template (recommended)

Find the canonical tag in your shared `<head>` template. It likely looks something like:

```html
<!-- CURRENT (buggy): Falls back to homepage when no canonical is set -->
<link rel="canonical" href="<%= page.canonical || siteUrl %>">
```

Change to:

```html
<!-- FIXED: Always defaults to the current page URL -->
<link rel="canonical" href="<%= page.canonical || currentPageUrl %>">
```

Where `currentPageUrl` is the full URL of the current page being rendered (e.g., `req.protocol + '://' + req.get('host') + req.originalUrl` in Express.js).

### Option B: Set canonicals explicitly per page

If you cannot change the template logic, set the canonical URL explicitly in each page's configuration/CMS entry:

**Who Are We page:**
```html
<link rel="canonical" href="https://www.sicily4u.co.uk/villas/who-are-we">
```

**Owner Registration page:**
```html
<link rel="canonical" href="https://www.sicily4u.co.uk/villas/owner-registration">
```

**Contact page:**
```html
<link rel="canonical" href="https://www.sicily4u.co.uk/villas/contact">
```

## Also Check

While fixing these, audit ALL pages for the same issue. Any page where the canonical doesn't match the page's own URL (and there's no deliberate redirect/consolidation reason) should be fixed.

Quick audit command if you have server-side access:
```bash
# Crawl all pages and check canonical vs actual URL
curl -s https://www.sicily4u.co.uk/villas/who-are-we | grep -o 'rel="canonical" href="[^"]*"'
curl -s https://www.sicily4u.co.uk/villas/owner-registration | grep -o 'rel="canonical" href="[^"]*"'
curl -s https://www.sicily4u.co.uk/villas/contact | grep -o 'rel="canonical" href="[^"]*"'
```

## Verification

After deploying:
1. View page source on each fixed page and confirm the canonical matches the page URL
2. In Google Search Console, use "URL Inspection" tool for each page
3. Click "Request Indexing" to speed up re-crawl
4. Check back in 1-2 weeks — the pages should appear in `site:sicily4u.co.uk` search results
