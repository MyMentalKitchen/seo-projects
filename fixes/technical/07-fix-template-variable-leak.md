# Fix #7: Remove Template Variable Leak from Meta Keywords

## Problem

Villa detail pages have a **template/debug variable** leaking into the production HTML. The meta keywords tag contains `tmp_SelectedLocatization` — a server-side variable name that was never resolved to its value.

**Current (broken):**
```html
<meta name="keywords" content="sicily co uk, visit and live sicily, visit sicily travel, sicily tourism, luxury beach villas sicily, villas in sicily with pool, sicily holiday rental, rent villa sicily, luxury villa sicily with pool, tmp_SelectedLocatization">
```

## Why This Matters

While meta keywords don't directly affect Google rankings (Google ignores them), this leak:
1. **Signals poor code quality** to anyone inspecting the source (competitors, potential partners)
2. **May indicate other template leaks** in visible content that DO affect SEO
3. **Exposes internal variable names** which is a minor information disclosure

## Fix

### Step 1: Find the template variable

Search your codebase for `tmp_SelectedLocatization`:
```bash
grep -rn 'tmp_SelectedLocatization' templates/ views/ config/
```

It's likely in a villa detail page template where keywords are assembled:
```javascript
// BEFORE (broken)
const keywords = baseKeywords + ', ' + page.localization;
// page.localization is undefined, so "tmp_SelectedLocatization" (the variable name) gets output

// AFTER (fixed)
const location = page.localization || villa.location || '';
const keywords = baseKeywords + (location ? ', ' + location : '');
```

### Step 2: Also fix the generic keywords problem

While you're fixing this, note that **most pages use the exact same generic keywords**:
```
sicily co uk, visit and live sicily, visit sicily travel, sicily tourism, luxury beach villas sicily, villas in sicily with pool, sicily holiday rental, rent villa sicily, luxury villa sicily with pool
```

This is wasteful. Either:
- **Remove the meta keywords tag entirely** (Google, Bing, and all major search engines ignore it)
- **Or set page-specific keywords** if you want them for internal tracking

### Step 3: Audit for other template leaks

Search for common template variable patterns in the rendered HTML:
```bash
# Check for unresolved template variables in rendered output
curl -s https://www.sicily4u.co.uk/villas/italy/sicily/cefalù/villas/villa-mandralisca | grep -oE 'tmp_\w+|undefined|null|NaN|\{\{[^}]+\}\}|<%[^%]+%>'
```

## Verification

1. View source on any villa detail page
2. Search for "tmp_" — should return zero results
3. Optionally: remove the meta keywords tag entirely to simplify the codebase
