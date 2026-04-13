<?php
/**
 * Fix #7: Article / BlogPosting JSON-LD Schema for Blog Posts
 *
 * PROBLEM:
 *   Blog posts show author and date in the HTML but have no Article
 *   structured data. This means no eligibility for article rich results
 *   (author photo, date, headline in SERPs).
 *
 * HOW TO USE:
 *   Add this code to your child theme's functions.php.
 *   It automatically generates Article JSON-LD for every blog post.
 *
 * EXPECTED RESULT:
 *   Article rich results with author name and publish date in SERPs.
 *   Validate at: https://search.google.com/test/rich-results
 */

add_action('wp_head', 'sicily4u_article_schema');

function sicily4u_article_schema() {
    // Only run on single blog posts
    if ( ! is_singular('post') ) {
        return;
    }

    $post_id  = get_the_ID();
    $title    = get_the_title($post_id);
    $url      = get_permalink($post_id);
    $excerpt  = get_the_excerpt($post_id);
    $content  = get_the_content(null, false, $post_id);
    $desc     = ! empty($excerpt) ? $excerpt : wp_trim_words($content, 30);
    $image    = get_the_post_thumbnail_url($post_id, 'full');
    $published = get_the_date('c', $post_id);
    $modified  = get_the_modified_date('c', $post_id);
    $word_count = str_word_count(wp_strip_all_tags($content));

    // Author info
    $author_id   = get_post_field('post_author', $post_id);
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_url  = get_author_posts_url($author_id);

    $schema = [
        '@context'      => 'https://schema.org',
        '@type'         => 'Article',
        'headline'      => $title,
        'description'   => wp_strip_all_tags($desc),
        'url'           => $url,
        'datePublished' => $published,
        'dateModified'  => $modified,
        'wordCount'     => $word_count,
        'inLanguage'    => 'en-US',
        'author'        => [
            '@type' => 'Person',
            'name'  => $author_name,
            'url'   => $author_url,
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name'  => 'Sicily4u',
            'url'   => 'https://sicily4u.com',
            'logo'  => [
                '@type' => 'ImageObject',
                'url'   => 'https://sicily4u.com/wp-content/uploads/2025/01/cropped-logo_sicily4u.png',
            ],
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id'   => $url,
        ],
    ];

    if ( $image ) {
        $schema['image'] = $image;
    }

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    echo "\n</script>\n";
}
