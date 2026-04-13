# Fix #3: Remove or Noindex Test and Internal Pages

## Problem
Several pages are publicly accessible and potentially indexed that should not appear in Google Search:

| Page | URL | Issue |
|------|-----|-------|
| test-blog | `/test-blog` | Development/staging content visible to users and crawlers |
| Booking Confirmation | `/booking-confirmation` | Transactional page — no value in search results |
| Search Results | `/search-results-without-dates` | Internal search page — thin/dynamic content |
| Uncategorized | `/category/uncategorized` | WordPress default — exposes site internals |

## Fix: Using Yoast SEO

For each page listed above:

1. Go to **WordPress Admin > Pages** (or Posts)
2. Find and edit the page
3. Scroll to the **Yoast SEO** panel at the bottom
4. Click the **Advanced** tab (gear icon)
5. Set **"Allow search engines to show this page in search results?"** to **No**
6. Save/Update the page

### For `/test-blog` specifically:
- **Best option:** Set the page status to **Draft** (unpublishes it entirely)
- If it must stay live for testing, set it to noindex as above

### For `/category/uncategorized`:
1. Go to **Posts > Categories**
2. Either delete the "Uncategorized" category (reassign any posts first)
3. Or rename it to something useful like "General"

## Fix: Using RankMath

Same steps, but:
1. Edit the page
2. Open the **RankMath** panel
3. Click **Advanced** tab
4. Set **Robots Meta** to **noindex**

## Fix: Using All in One SEO

1. Edit the page
2. Scroll to **AIOSEO Settings**
3. Click **Advanced** tab
4. Toggle **Use Default Settings** off
5. Set **Robots Setting** to **noindex, nofollow**

## Verification
After saving, view the page source and confirm:
```html
<meta name="robots" content="noindex, nofollow">
```

## Expected Result
These pages stop appearing in Google Search within 1-2 weeks. Crawl budget is no longer wasted on them.
