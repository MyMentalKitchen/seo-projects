# Fix #2: robots.txt Returns 403 Forbidden

## Problem
`https://www.sicily4u.com/robots.txt` returns HTTP 403 Forbidden. Search engine crawlers cannot read crawl directives and the sitemap declaration is inaccessible.

## Diagnosis Steps

### Step 1: Check WordPress Settings
1. Go to **WordPress Admin > Settings > Reading**
2. Ensure **"Discourage search engines from indexing this site"** is **NOT checked**
3. If it was checked, uncheck it and save

### Step 2: Check Security Plugins
If you use Wordfence, Sucuri, or another security plugin:
1. Open the plugin's **Firewall** or **Access Control** settings
2. Look for rules that block access to `/robots.txt`
3. Add `/robots.txt` to the allowed/whitelisted paths

### Step 3: Check .htaccess (Apache) or Server Config (Nginx)

**Apache (.htaccess):** Look for rules that block `.txt` files:
```apache
# If you find something like this, add an exception for robots.txt:
<FilesMatch "\.txt$">
    Deny from all
</FilesMatch>

# Replace with:
<FilesMatch "\.txt$">
    Deny from all
</FilesMatch>
<Files "robots.txt">
    Allow from all
    Satisfy any
</Files>
```

**Nginx:** Add this block:
```nginx
location = /robots.txt {
    allow all;
    try_files $uri /index.php?$args;
}
```

### Step 4: Create a Physical robots.txt (if WordPress virtual one is blocked)
If the above steps don't work, create a physical `robots.txt` file in the WordPress root directory with this content:

```
User-agent: *
Allow: /
Disallow: /wp-admin/
Allow: /wp-admin/admin-ajax.php
Disallow: /booking-confirmation/
Disallow: /search-results-without-dates/
Disallow: /test-blog/

Sitemap: https://sicily4u.com/sitemap_index.xml
```

Upload it via FTP/SFTP to the same directory as `wp-config.php`.

## Verification
After fixing, visit `https://sicily4u.com/robots.txt` in a browser. You should see the robots.txt content with HTTP 200 status.

## Expected Result
Crawlers discover the sitemap automatically; crawl budget is directed to valuable pages.
