# Fix #3: Empty and Generic Title Tags on 5+ Pages

## Problem

At least 2 pages have completely **empty** `<title>` tags, and 3+ pages share an identical generic title that doesn't match their content. Google will auto-generate titles for empty pages (usually poorly), and duplicate titles prevent differentiation in search results.

### Empty Titles (CRITICAL)

| Page | Current Title | Fix |
|------|--------------|-----|
| `/villas/who-are-we` | *(empty — just whitespace)* | `About Sicily4U \| Luxury Villa Rental Specialists Since 2004` |
| `/villas/owner-registration` | *(empty — just whitespace)* | `List Your Villa with Sicily4U \| Property Owner Registration` |

### Duplicate Generic Titles (HIGH)

These 3 pages all share the identical title `"Sicily Villas with Pool - Luxury Villas to rent"` despite having very different purposes:

| Page | Current Title (identical) | Correct Unique Title |
|------|--------------------------|---------------------|
| `/villas/suitable-for-weddings` | Sicily Villas with Pool - Luxury Villas to rent | `Wedding Villas in Sicily \| Stunning Venues with Pool \| Sicily4U` |
| `/villas/for-sale` | Sicily Villas with Pool - Luxury Villas to rent | `Sicily Villas for Sale \| Buy Your Dream Property \| Sicily4U` |
| `/villas/last-minute` | Sicily Villas with Pool - Luxury Villas to rent | `Last Minute Sicily Villa Deals \| Late Availability \| Sicily4U` |

### Keyword-Stuffed Title (MEDIUM)

| Page | Current Title | Fix |
|------|--------------|-----|
| `/villas/pool` | `Villas with Pool Sicily Villas with Pool \| Seafront Villas with Pools to rent` | `Sicily Villas with Private Pool \| Luxury Pool Villas \| Sicily4U` |

## Root Cause

The template system falls back to a generic site-wide title when no page-specific title is configured. Pages that were added without setting a custom title inherit this default.

## Fix

Set unique titles in your CMS or template configuration for each page. Title tag best practices:

- **50-60 characters** (Google truncates after ~60)
- **Primary keyword near the front**
- **Brand name at the end** (separated by `|` or `-`)
- **Unique per page** — no two pages should share the same title
- **Matches page intent** — "Wedding Villas" for the weddings page, not "Villas with Pool"

### If using a template with per-page config:

```javascript
// Example page configuration (adapt to your template system)
pages: {
  'who-are-we': {
    title: 'About Sicily4U | Luxury Villa Rental Specialists Since 2004',
    description: 'Meet the Sicily4U team. Since 2004, we have been handpicking luxury villas across Sicily for unforgettable family holidays, romantic getaways, and group trips.'
  },
  'owner-registration': {
    title: 'List Your Villa with Sicily4U | Property Owner Registration',
    description: 'Own a villa in Sicily? Partner with Sicily4U to reach international guests. We handle marketing, bookings, and guest communication for your property.'
  },
  'suitable-for-weddings': {
    title: 'Wedding Villas in Sicily | Stunning Venues with Pool | Sicily4U',
    description: 'Discover beautiful Sicily villas perfect for weddings. Private pools, panoramic views, and space for up to 100 guests. Plan your dream Sicilian wedding.'
  },
  'for-sale': {
    title: 'Sicily Villas for Sale | Buy Your Dream Property | Sicily4U',
    description: 'Browse luxury villas for sale in Sicily. From beachfront properties to countryside estates. Investment opportunities in Italy\'s most beautiful island.'
  },
  'last-minute': {
    title: 'Last Minute Sicily Villa Deals | Late Availability | Sicily4U',
    description: 'Grab a last-minute Sicily villa deal. Luxury villas with pools available at short notice. Book your spontaneous Sicilian getaway today.'
  },
  'pool': {
    title: 'Sicily Villas with Private Pool | Luxury Pool Villas | Sicily4U',
    description: 'Find your perfect Sicily villa with a private pool. Handpicked luxury properties with heated pools, infinity pools, and stunning sea views.'
  }
}
```

## Also Fix: Meta Descriptions for These Pages

Each page above should also get a unique meta description (see the `description` values in the code above). Currently, several of these pages share the same generic description.

## Verification

1. After deploying, view source on each page and confirm unique `<title>` and `<meta name="description">` tags
2. Use Google Search Console "URL Inspection" on each page
3. Within 1-2 weeks, check `site:sicily4u.co.uk` in Google — each page should show its unique title
