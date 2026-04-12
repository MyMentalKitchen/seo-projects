# Fix #4: Remove Fake/Misleading AggregateRating Schema

## Problem

Two pages have structured data with fabricated or empty review ratings. This violates [Google's structured data guidelines](https://developers.google.com/search/docs/appearance/structured-data/review-snippet#guidelines) and risks a **manual action** (penalty) that could affect the entire site's search visibility.

### Page 1: `/villas/pool` — Fabricated Product Rating

**Current (REMOVE THIS):**
```json
{
  "@context": "http://schema.org",
  "@type": "Product",
  "name": "Villas in Sicily with Pool",
  "description": "Discover the perfect villa for your holiday in Sicily...",
  "url": "https://www.sicily4u.co.uk/villas/pool",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.5",
    "ratingCount": "100"
  }
}
```

**Why this is wrong:**
- A villa category/listing page is NOT a "Product"
- There are not 100 genuine reviews for this page
- The 4.5 rating appears to be fabricated
- Google explicitly prohibits self-serving review markup without genuine reviews

### Page 2: `/villas/last-minute` — Zero-Review Rating

**Current (REMOVE THIS):**
```json
{
  "@context": "https://schema.org/",
  "@type": "Place",
  "name": "Villa La Palma",
  "address": {...},
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "0.0",
    "reviewCount": "0"
  }
}
```

**Why this is wrong:**
- AggregateRating with 0 reviews and 0.0 rating is meaningless
- A listing page with multiple villas should not have a single Place schema for one villa
- 0.0 rating could display as zero stars in search results — harmful to CTR

## Fix

### For `/villas/pool` — Replace with WebPage schema:

```json
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "Sicily Villas with Private Pool",
  "description": "Browse our curated selection of luxury villas with private pools in Sicily.",
  "url": "https://www.sicily4u.co.uk/villas/pool",
  "isPartOf": {
    "@type": "WebSite",
    "name": "Sicily4U",
    "url": "https://www.sicily4u.co.uk"
  }
}
```

### For `/villas/last-minute` — Replace with CollectionPage schema:

```json
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "Last Minute Villa Deals in Sicily",
  "description": "Luxury villas in Sicily available at short notice with late availability discounts.",
  "url": "https://www.sicily4u.co.uk/villas/last-minute",
  "isPartOf": {
    "@type": "WebSite",
    "name": "Sicily4U",
    "url": "https://www.sicily4u.co.uk"
  }
}
```

## When IS AggregateRating Appropriate?

Only use AggregateRating when:
- You have **genuine customer reviews** collected on your site or a third-party platform
- The rating applies to a **specific product, service, or business** (not a category page)
- The `reviewCount` reflects **real, verifiable reviews**

For Sicily4U, the right place for AggregateRating would be:
- Individual villa detail pages (when guests have left reviews for that specific villa)
- The Organization schema (if aggregating Trustpilot or Google Business reviews)

## Verification

1. After removing the fake schema, test at: https://validator.schema.org/
2. Test at: https://search.google.com/test/rich-results
3. Check Google Search Console > "Enhancements" section for any remaining schema warnings
