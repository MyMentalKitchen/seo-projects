# Fix #10b: Expand Wedding Villas Page

## Problem

The "Suitable for Weddings" page (`/villas/suitable-for-weddings`) has only **250 words** of generic "villas with pool" content. The URL says "weddings" but the title, H1, and content contain zero wedding-specific information. This means the page cannot rank for any wedding-related search queries.

### Current Issues
- **Title:** "Sicily Villas with Pool - Luxury Villas to rent" (generic — same as 3 other pages)
- **H1:** "Villas in Sicily with Pool to rent" (generic — not wedding-related)
- **Content:** ~250 words of generic villa listings text
- **Zero mentions of:** weddings, ceremonies, receptions, wedding planners, guest capacity, marriage in Italy, etc.

## Replacement Content

This expands the page to ~1,200 words with wedding-specific content, proper heading structure, and FAQ schema opportunity.

---

### Page Title (set in CMS/SEO settings)
```
Wedding Villas in Sicily | Dream Venues with Pool & Sea Views | Sicily4U
```

### Meta Description (set in CMS/SEO settings)
```
Plan your dream wedding in Sicily with a private villa. Stunning venues with pools, sea views, and space for up to 100 guests. Expert advice from Sicily4U since 2004.
```

### H1
```
Wedding Villas in Sicily
```

### Page Content

---

**Your Dream Sicilian Wedding Starts Here**

Imagine exchanging vows as the Mediterranean sun sets behind you, surrounded by fragrant lemon groves and ancient olive trees. A wedding in Sicily is not just a ceremony — it is an experience your guests will talk about for years.

Sicily4U has been helping couples find the perfect wedding villa since 2004. Our handpicked collection includes properties specifically suited for wedding celebrations, from intimate elopements for two to grand receptions for over 100 guests.

**Why Choose Sicily for Your Wedding**

Sicily offers what few destinations can match: breathtaking natural beauty, world-class cuisine, warm hospitality, and a pace of life that makes every moment feel special. Whether you envision a barefoot ceremony on a private beach, a formal reception in a historic courtyard, or a relaxed poolside party, our villas provide the perfect backdrop.

- **Year-round sunshine** — Sicily enjoys over 300 sunny days per year, making it ideal for outdoor celebrations from April through November
- **Lower costs than mainland Italy** — Venue hire, catering, and accommodation in Sicily typically cost 30-40% less than equivalent options in Tuscany or the Amalfi Coast
- **Easy access from the UK** — Direct flights from London, Manchester, and other UK airports to Catania and Palermo (2.5-3 hours)
- **Legal or symbolic ceremonies** — Our villas can host both legally recognised marriages (with the right paperwork) and symbolic ceremonies

**Our Wedding-Suitable Villas**

We have carefully selected villas that work beautifully for wedding celebrations. What makes a great wedding villa?

**Space and capacity** — Our wedding villas accommodate 20 to 100+ guests for the ceremony and reception, with sleeping arrangements for the wedding party of 6 to 30 guests on-site.

**Outdoor entertaining areas** — Expansive terraces, manicured gardens, and poolside areas that serve as natural ceremony and reception spaces without the need for elaborate staging.

**Privacy** — Set in private grounds away from neighbours, so your celebration can continue into the small hours without restrictions.

**Scenic backdrops** — From clifftop sea views to rolling vineyard landscapes, every villa offers a stunning natural setting for photographs.

**Our Most Popular Wedding Locations**

**Taormina & East Coast** — Dramatic views of Mount Etna and the Ionian Sea. The most famous wedding destination in Sicily, combining natural beauty with proximity to historic sites and excellent restaurants.

**Noto & South East** — The heart of Sicilian Baroque. Gold-stone towns, pristine beaches, and some of the best food on the island. Perfect for couples who want culture alongside their celebrations.

**Cefalù & North Coast** — A charming medieval fishing town with a famous Norman cathedral. Intimate, romantic, and wonderfully photogenic.

**Trapani & West Coast** — Dramatic salt flats, hilltop villages, and ancient Greek temples at Selinunte. Ideal for couples seeking something truly unique.

**What We Help With**

While Sicily4U is a villa rental specialist rather than a wedding planner, we can help connect you with trusted local professionals:

- **Wedding planners** who specialise in destination weddings in Sicily
- **Catering companies** offering everything from formal sit-down dinners to Sicilian street food buffets
- **Florists, photographers, and musicians** who know the best locations and local customs
- **Transport** for guests, including minibus hire and airport transfers
- **Legal guidance** on the paperwork required for a legally binding ceremony in Italy

We recommend booking your wedding villa at least 12 months in advance for peak season (May–September) and at least 6 months for shoulder season (April, October, November).

**Frequently Asked Questions**

**How many guests can a wedding villa accommodate?**
Our wedding-suitable villas can host ceremonies and receptions for 20 to 100+ guests. Sleeping arrangements on-site typically accommodate 6 to 30 guests, with nearby villas and B&Bs available for additional guests.

**Can we have a legally binding wedding in Sicily?**
Yes. Non-Italian couples can marry legally in Sicily with the correct documentation, including birth certificates, Nulla Osta (no impediment certificate), and translated/apostilled documents. We recommend working with a local wedding planner who handles the paperwork process.

**What is the best time of year for a wedding in Sicily?**
Late May through early October offers the best weather. June and September are particularly popular — warm and sunny without the peak August heat. Spring (April-May) is ideal for couples who prefer cooler temperatures and wildflower-filled landscapes.

**How much does a villa wedding in Sicily cost?**
Villa hire ranges from approximately €2,000 to €8,000 per week depending on the property and season. Total wedding costs (including catering, decorations, entertainment) typically range from €10,000 to €40,000 for a celebration of 50 guests — significantly less than equivalent UK or mainland Italian venues.

**Can we visit the villa before booking?**
We strongly encourage villa visits before committing to a wedding booking. Contact us to arrange a viewing trip — we can schedule visits to multiple properties in a single day.

Ready to start planning your Sicilian wedding? [Contact our team](/villas/contact) for personalised villa recommendations based on your guest count, preferred location, and wedding style.

---

## SEO Notes

- Target keywords: "wedding villa sicily", "wedding venue sicily", "destination wedding sicily", "getting married in sicily", "villa wedding italy"
- FAQ section should also get FAQPage JSON-LD schema (see bonus schema below)
- Internal links to /villas/contact and location pages
- Price ranges included for commercial query intent
- Content addresses all key decision factors: capacity, legality, cost, timing, locations

## Bonus: FAQPage Schema for This Page

Add this to the `<head>` of the weddings page:

```html
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How many guests can a wedding villa in Sicily accommodate?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our wedding-suitable villas can host ceremonies and receptions for 20 to 100+ guests. Sleeping arrangements on-site typically accommodate 6 to 30 guests, with nearby villas and B&Bs available for additional guests."
      }
    },
    {
      "@type": "Question",
      "name": "Can we have a legally binding wedding in Sicily?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Non-Italian couples can marry legally in Sicily with the correct documentation, including birth certificates, Nulla Osta (no impediment certificate), and translated/apostilled documents. We recommend working with a local wedding planner who handles the paperwork process."
      }
    },
    {
      "@type": "Question",
      "name": "What is the best time of year for a wedding in Sicily?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Late May through early October offers the best weather. June and September are particularly popular — warm and sunny without the peak August heat. Spring (April-May) is ideal for couples who prefer cooler temperatures and wildflower-filled landscapes."
      }
    },
    {
      "@type": "Question",
      "name": "How much does a villa wedding in Sicily cost?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Villa hire ranges from approximately €2,000 to €8,000 per week depending on the property and season. Total wedding costs (including catering, decorations, entertainment) typically range from €10,000 to €40,000 for a celebration of 50 guests — significantly less than equivalent UK or mainland Italian venues."
      }
    },
    {
      "@type": "Question",
      "name": "Can we visit the villa before booking?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We strongly encourage villa visits before committing to a wedding booking. Contact us to arrange a viewing trip — we can schedule visits to multiple properties in a single day."
      }
    }
  ]
}
</script>
```
