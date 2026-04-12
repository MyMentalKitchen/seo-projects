# Fix #2: Remove noindex,nofollow from Private Parties Page

## Problem

The `/private-parties` page has a `<meta name="robots" content="noindex,nofollow">` tag,
which completely blocks it from Google. This is a key revenue page targeting searches like
"hog roast party London" and "private party catering London".

## Steps in Wix Editor

1. Open the Wix Editor
2. Navigate to the **Private Parties** page
3. Click the **page menu** (three dots) next to the page name in the left panel
4. Select **SEO Basics** (or **SEO Settings**)
5. Scroll to **Advanced SEO**
6. Find the toggle for **"Let search engines index this page"** -- ensure it is **ON**
7. Check that **"noindex"** and **"nofollow"** meta tags are **removed** from any custom meta tags
8. Click **Save** and **Publish**

## Verification

After publishing, wait 24-48 hours, then check:

```
site:thegipsyhillsmokehouse.com/private-parties
```

in Google. The page should appear in results. You can also request indexing via
Google Search Console > URL Inspection > Request Indexing.

## Expected Impact

- Re-enables organic traffic for party-related queries
- Restores internal link equity flow from this page
- Could surface in "hog roast party London" results within 1-2 weeks
