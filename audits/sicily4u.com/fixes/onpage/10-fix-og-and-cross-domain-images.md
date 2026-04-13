# Fix #10: Fix OG Image Issues and Cross-Domain Image References

## Problem A: HTTP OG Image URL on /locations

The `/locations` page has an `og:image` using HTTP instead of HTTPS, with a malformed double-slash in the path:
```
http://sicily4u.com//wp-content/uploads/2025/01/cefalu_892.jpg
```

### Fix
1. Edit the **Locations** page in WordPress
2. Check if a **Featured Image** is set — if so, re-save it
3. If using Yoast/RankMath, go to the **Social** tab and manually set the OG image
4. The correct URL should be:
   ```
   https://sicily4u.com/wp-content/uploads/2025/01/cefalu_892.jpg
   ```
5. The double-slash suggests a WordPress `siteurl` or `home` setting may have a trailing slash issue. Check **Settings > General** — both "WordPress Address" and "Site Address" should be `https://sicily4u.com` (no trailing slash)

## Problem B: Missing OG Images

These pages have no `og:image` — social shares will show no preview:

| Page | Fix |
|------|-----|
| `/faqs` | Set a featured image (e.g., a villa or Sicily landscape photo) |
| `/locations/taormina` | Set a featured image (Taormina vista photo) |
| `/accommodation` | Set a featured image (villa collection hero image) |

### How to Set a Featured Image
1. Edit the page in WordPress
2. In the right sidebar, find **Featured Image**
3. Click **Set featured image** and select/upload an appropriate photo
4. Click **Update** to save

The SEO plugin will automatically use the featured image as the `og:image`.

## Problem C: About Us Images From Old Domain

The About Us page loads team member photos from `sicily4u.co.uk`:
- `https://www.sicily4u.co.uk/img/v2_sicily4u/infotext/cristina-al-09.08-foto3.jpg`
- `https://www.sicily4u.co.uk/img/v2_sicily4u/infotext/lara1.jpg`
- `https://www.sicily4u.co.uk/img/v2_sicily4u/infotext/1.jpg`

### Fix
1. Download each image from the `.co.uk` URLs above
2. Upload them to the WordPress Media Library on `sicily4u.com`
3. Edit the About Us page
4. Replace each image block's source with the new `sicily4u.com` URL
5. Add descriptive alt text if not already present (e.g., "Christina Bächle - Sicily4u founder")
6. Click **Update** to save

## Verification
- Use Facebook's [Sharing Debugger](https://developers.facebook.com/tools/debug/) to test each page's OG tags
- Inspect the About Us page source to confirm images load from `sicily4u.com`

## Expected Result
All social shares display proper preview images. No cross-domain dependencies on the legacy `.co.uk` domain.
