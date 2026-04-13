# Fix #9: Fix Archive Title and Heading Structure

## Problem A: "Accommodation Types Archive" Default Title

The `/accommodation` page shows the WordPress-generated archive title "Accommodation Types Archive - Sicily4u" — this exposes internal WordPress terminology to users and search engines.

### Fix

**Using Yoast SEO:**
1. Go to **Yoast SEO > Search Appearance > Content Types**
2. Find the **Accommodation Types** section (or whatever MotoPress registers)
3. Set the **SEO Title** for the archive to:
   ```
   Luxury Villas in Sicily | Browse All Properties | Sicily4u
   ```
4. Set the **Meta description** to:
   ```
   Browse our full collection of handpicked luxury villas across Sicily. Filter by location, amenities, and availability for your perfect Sicilian holiday.
   ```

**Using RankMath:**
1. Go to **RankMath > Titles & Meta > Post Types**
2. Find **Accommodation Types** archive settings
3. Set the custom title and description as above

**Alternative — PHP in functions.php:**
```php
add_filter('get_the_archive_title', function ($title) {
    if (is_post_type_archive('mphb_room_type')) {
        return 'Luxury Villas in Sicily';
    }
    return $title;
});
```

## Problem B: About Us Page Has Two H1 Tags

The `/about-us` page has two H1 headings:
- `<h1>About Us</h1>`
- `<h1>Why choose Sicily4u Villas</h1>`

Each page should have exactly one H1. The second heading should be an H2.

### Fix
1. Go to **WordPress Admin > Pages > About Us > Edit**
2. Click on the block containing "Why choose Sicily4u Villas"
3. In the block toolbar, change the heading level from **H1** to **H2**
4. Click **Update** to save

## Problem C: Generic Page Titles

Several page titles could be more descriptive:

| Page | Current Title | Suggested Title |
|------|--------------|----------------|
| `/about-us` | "About Us - Sicily4u" | "About Us \| Luxury Villa Specialists Since 2004 - Sicily4u" |
| `/locations` | "Locations - Sicily4u" | "Villa Locations in Sicily \| Where to Stay - Sicily4u" |
| `/blog` | "Blog - Sicily4u" | "Sicily Travel Blog \| Tips, Guides & Inspiration - Sicily4u" |

Set these via the SEO plugin's title field on each page.

## Verification
- View page source to confirm single H1 on the About Us page
- Check Google SERP for updated titles within 1-2 weeks

## Expected Result
Professional, keyword-rich titles replace generic defaults. Proper heading hierarchy for crawlers and screen readers.
