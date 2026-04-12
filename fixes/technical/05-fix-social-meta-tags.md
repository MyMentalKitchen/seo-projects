# Fix #5: OG Description Typo, HTML in Social Tags, Duplicate Meta

## Problem A: Homepage OG Description Typo

The homepage Open Graph description contains a typo that appears on every Facebook, WhatsApp, LinkedIn, and other social media share:

**Current (broken):**
```
Sicily4U isr an exclusive villas rental specialist offering villas with pools near the beach.
```

**Fixed:**
```
Sicily4U is an exclusive villa rental specialist offering luxury villas with pools near the beach in Sicily. Book today!
```

### Where to fix
Find the OG meta tag in the homepage template or CMS configuration:
```html
<!-- CURRENT -->
<meta property="og:description" content="Luxury Sicily villas for rent. Sicily4U isr an exclusive villas rental specialist offering villas with pools near the beach. Book today!">

<!-- FIXED -->
<meta property="og:description" content="Luxury Sicily villas for rent. Sicily4U is an exclusive villa rental specialist offering villas with pools near the beach. Book today!">
```

---

## Problem B: HTML Tags Leaking into Twitter Cards

Villa detail pages have raw HTML in the `twitter:title` meta tag. When someone shares a villa on Twitter/X, the title renders with visible HTML code.

**Current (broken):**
```html
<meta name="twitter:title" content="Villa Mandralisca<br><p>in Cefalù">
```

**What social shares look like:**
```
Villa Mandralisca<br><p>in Cefalù
```

### Where to fix
In the villa detail page template, the twitter:title is being generated from a field that contains HTML. You need to strip HTML tags before outputting:

```javascript
// BEFORE (broken) — raw HTML from CMS field
const twitterTitle = villa.name + villa.locationHtml;

// AFTER (fixed) — strip HTML tags
function stripHtml(str) {
  return str.replace(/<[^>]*>/g, '').trim();
}
const twitterTitle = stripHtml(villa.name) + ' in ' + stripHtml(villa.location);
```

Or in the template:
```html
<!-- BEFORE -->
<meta name="twitter:title" content="<%= villa.nameHtml %><%= villa.locationHtml %>">

<!-- AFTER — use plain text versions -->
<meta name="twitter:title" content="<%= villa.name %> in <%= villa.locationPlain %>">
```

**Apply this same fix to all social meta tags** (og:title, twitter:title, og:description, twitter:description) across all villa detail pages.

---

## Problem C: Duplicate Meta Tags on Contact Page

The contact page (`/villas/contact`) has every OG and Twitter meta tag duplicated — they appear twice in the HTML. This is likely caused by two template includes both outputting social meta tags.

**Current (broken) — tags appear as arrays in HTML:**
```html
<!-- First set (from base template) -->
<meta property="og:title" content="Sicily4u - contact our team">
<meta property="og:description" content="Contact Sicily Holidays...">
<meta name="twitter:card" content="summary_large_image">

<!-- Second set (from page-specific template) -->
<meta property="og:title" content="Sicily4u - contact our team">
<meta property="og:description" content="Contact Sicily Holidays...">
<meta name="twitter:card" content="summary_large_image">
```

The `<meta name="description">` tag is even worse — repeated 4 times with comma concatenation:
```
Contact Sicily Holidays..., Contact Sicily Holidays..., Contact Sicily Holidays..., Contact Sicily Holidays...
```

### Where to fix
This is a template inheritance issue. Either:

**Option A:** Remove social meta tags from the page-specific template if the base template already outputs them.

**Option B:** Add a conditional in the base template:
```html
<% if (!page.hasSocialMeta) { %>
  <meta property="og:title" content="<%= page.title %>">
  <meta property="og:description" content="<%= page.description %>">
<% } %>
```

**Option C:** Use a single block/slot for meta tags:
```html
<!-- base.html -->
<head>
  {% block meta %}
    <!-- default social meta -->
  {% endblock %}
</head>

<!-- contact.html -->
{% block meta %}
  <!-- page-specific social meta (replaces, not appends) -->
{% endblock %}
```

### Audit other pages
The contact page is the worst case, but check ALL pages for duplicate meta tags. Run this quick check:
```bash
curl -s https://www.sicily4u.co.uk/villas/contact | grep -c 'og:title'
# Should return 1, not 2+
```

## Verification
1. Share the homepage URL on Facebook's Sharing Debugger: https://developers.facebook.com/tools/debug/
2. Share a villa page on Twitter Card Validator
3. View source on the contact page and confirm each meta tag appears exactly once
