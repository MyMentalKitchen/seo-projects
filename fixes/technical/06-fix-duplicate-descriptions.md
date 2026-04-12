# Fix #6: Duplicate/Concatenated Meta Descriptions

## Problem

At least 6 pages have their meta description **repeated and concatenated** with a comma separator. Google will either truncate these or auto-generate its own snippet, reducing your control over how the site appears in search results.

### Affected Pages

| Page | Current Description (duplicated) |
|------|--------------------------------|
| Homepage `/villas` | `"Sicily villas to rent with Sicily4U. We offer an exclusive selection of luxury villas with pools near the beach. Book today!, Find luxury Sicily villas for rent with Sicily4U. We offer an exclusive selection of luxury villas with pools and seaside views. Book today!"` |
| `/villas/beach` | `"Beach villas in Sicily - Discover our stunning beachfront villas..., Beach villas in Sicily - Discover our stunning beachfront villas..."` |
| `/villas/italy/sicily` | `"Find the best villas in Sicily with pool at Sicily4U..., Find the best villas in Sicily with pool at Sicily4U..."` |
| `/villas/italy/sicily/noto` | `"Noto Villas with pool - Discover Sicily..., Noto Villas with pool - Discover Sicily..."` |
| `/villas/info/history-of-sicily` | `"Explore the history of Sicily..., Explore the history of Sicily..."` |
| `/villas/contact` | Description repeated **4 times** |

## Root Cause

The template system is concatenating multiple description sources. This typically happens when:
1. A base template outputs a description AND a page template also outputs one
2. A CMS field stores descriptions as an array and joins them with commas
3. Multiple meta tag generators run (e.g., a SEO plugin + manual template code)

## Fix

### Step 1: Find the template bug

Search your codebase for where `<meta name="description"` is generated. Look for:
```bash
grep -rn 'meta.*description' templates/ views/ partials/
```

You'll likely find it in 2+ places. Consolidate to a single output.

### Step 2: Ensure single description per page

```html
<!-- SINGLE source of truth for meta description -->
<meta name="description" content="<%= page.metaDescription || site.defaultDescription %>">
```

Do NOT have this in both a base layout AND a page template.

### Step 3: Set clean descriptions for affected pages

| Page | Recommended Description (under 160 chars) |
|------|------------------------------------------|
| Homepage | `Sicily villas for rent with private pools and sea views. Sicily4U offers handpicked luxury villas since 2004. Book your dream Sicilian holiday today.` |
| `/villas/beach` | `Discover beachfront villas in Sicily with private pools and direct sea access. Handpicked luxury holiday rentals from Sicily4U.` |
| `/villas/italy/sicily` | `Find luxury villas with private pools across Sicily. Browse by location, amenities, and price. Expert local knowledge from Sicily4U.` |
| `/villas/italy/sicily/noto` | `Luxury villas with pool near Noto, Sicily. Explore baroque architecture, beautiful beaches, and stay in handpicked holiday homes.` |
| `/villas/info/history-of-sicily` | `Explore 3,000 years of Sicilian history from Greek colonies to Norman conquests. A cultural guide by Sicily4U villa rental specialists.` |
| `/villas/contact` | `Contact Sicily4U for villa rental enquiries. Reach us by phone +44 203 868 6514, email, or live chat. Expert advice for your Sicily holiday.` |

## Verification

After fixing, run this for each page:
```bash
curl -s [URL] | grep -o '<meta name="description" content="[^"]*"' | wc -c
```
Description should appear exactly once and be under 160 characters.
