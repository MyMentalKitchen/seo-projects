# Fix #8: Fix Garbled, Missing, and Auto-Generated Meta Descriptions

## Problem
Several pages have broken, missing, or auto-generated meta descriptions that display poorly in search results.

| Page | Current Description | Problem |
|------|-------------------|---------|
| `/locations` | "Gorgeous Villas in Sicily...CefaluDiscover Luxury Cefalu" | Navigation text leaked into description |
| `/accommodation` | *(none)* | Missing entirely |
| `/contact-us` | "...if you have any enquires regarding our villas." | Typo: "enquires" → "enquiries" |
| `/privacy-policy` | "Data Protection Any personal data you give us will be used..." | Auto-generated, truncated mid-sentence |
| `/terms-conditions` | "BY BOOKING AND REGISTERING ON OUR WEBSITE..." | Auto-generated, all-caps legal text |

## Replacement Descriptions

Use your SEO plugin (Yoast, RankMath, or AIOSEO) to set these custom meta descriptions. Each page's SEO panel has a "Meta Description" field.

### `/locations`
```
Explore our villa locations across Sicily — from Taormina and Cefalù to Syracuse, Noto, and the Aeolian Islands. Find your perfect Sicilian retreat.
```
*(155 characters)*

### `/accommodation`
```
Browse our full collection of handpicked luxury villas across Sicily. Filter by location, amenities, and availability for your perfect Sicilian holiday.
```
*(152 characters)*

### `/contact-us`
```
Get in touch with the Sicily4u team. Contact us by phone, email, or WhatsApp for enquiries about our luxury villa rentals across Sicily.
```
*(137 characters)*

### `/privacy-policy`
```
Read Sicily4u's privacy policy. Learn how we handle your personal data when you browse our site or book a villa in Sicily.
```
*(123 characters)*

### `/terms-conditions`
```
Review Sicily4u's booking terms and conditions, including payment policies, cancellation rules, and rental agreements for our Sicily villas.
```
*(141 characters)*

## How to Apply (Yoast SEO)

1. **WordPress Admin > Pages**
2. Find the page and click **Edit**
3. Scroll to the **Yoast SEO** panel
4. Click the **SEO** tab
5. In the **Meta description** field, paste the text above
6. The green bar should indicate good length (120-155 chars)
7. Click **Update** to save

## Verification
Google "site:sicily4u.com/locations" — within 1-2 weeks the new description should appear in the search snippet.

## Expected Result
Professional, keyword-rich snippets replace garbled text in search results. Improved CTR on all affected pages.
