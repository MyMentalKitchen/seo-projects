<?php
/**
 * Fix #5: VacationRental JSON-LD Schema for Villa Detail Pages
 *
 * PROBLEM:
 *   Villa detail pages have zero structured data. This means no
 *   eligibility for accommodation rich results in Google Search.
 *
 * HOW TO USE:
 *   Add this code to your child theme's functions.php.
 *   It automatically generates VacationRental JSON-LD for every
 *   MotoPress Hotel Booking "mphb_room_type" post (i.e., every villa page).
 *
 *   The schema pulls data from the post's existing fields:
 *   - Title → name
 *   - Content/excerpt → description
 *   - Featured image → image
 *   - Meta fields → bedrooms, bathrooms, guests, amenities
 *
 *   After adding, validate at: https://search.google.com/test/rich-results
 *
 * EXPECTED RESULT:
 *   Rich accommodation results in Google Search for villa queries.
 */

add_action('wp_head', 'sicily4u_vacation_rental_schema');

function sicily4u_vacation_rental_schema() {
    // Only run on single accommodation/villa pages
    if ( ! is_singular('mphb_room_type') ) {
        return;
    }

    $post_id = get_the_ID();
    $title   = get_the_title($post_id);
    $url     = get_permalink($post_id);
    $excerpt = get_the_excerpt($post_id);
    $desc    = ! empty($excerpt) ? $excerpt : wp_trim_words(get_the_content(null, false, $post_id), 50);
    $image   = get_the_post_thumbnail_url($post_id, 'full');
    $modified = get_the_modified_date('c', $post_id);

    // ── Pull villa meta fields ──
    // Adjust these meta keys to match your MotoPress Hotel Booking setup.
    // Check your database or use: get_post_meta($post_id) to list all keys.
    $guests   = get_post_meta($post_id, 'mphb_adults_capacity', true);
    $bedrooms = get_post_meta($post_id, 'mphb_bedrooms', true);
    // Bathrooms may not be a default MPHB field — check your setup
    $bathrooms = get_post_meta($post_id, 'mphb_bathrooms', true);

    // ── Get location from taxonomy ──
    $locations = wp_get_post_terms($post_id, 'mphb_room_type_category', ['fields' => 'names']);
    $location_name = ! empty($locations) ? $locations[0] : 'Sicily, Italy';

    // ── Get amenities from taxonomy ──
    $amenity_terms = wp_get_post_terms($post_id, 'mphb_room_type_tag', ['fields' => 'names']);
    $amenities = ! empty($amenity_terms) ? $amenity_terms : [];

    // ── Build the schema ──
    $schema = [
        '@context'          => 'https://schema.org',
        '@type'             => 'VacationRental',
        'name'              => $title,
        'description'       => wp_strip_all_tags($desc),
        'url'               => $url,
        'dateModified'      => $modified,
        'containedInPlace'  => [
            '@type' => 'Place',
            'name'  => $location_name,
            'address' => [
                '@type'          => 'PostalAddress',
                'addressRegion'  => $location_name,
                'addressCountry' => 'IT',
            ],
        ],
        'provider' => [
            '@type' => 'Organization',
            'name'  => 'Sicily4u',
            'url'   => 'https://sicily4u.com',
        ],
    ];

    if ( $image ) {
        $schema['image'] = $image;
    }
    if ( $guests ) {
        $schema['occupancy'] = [
            '@type'    => 'QuantitativeValue',
            'maxValue' => (int) $guests,
        ];
    }
    if ( $bedrooms ) {
        $schema['numberOfBedrooms'] = (int) $bedrooms;
    }
    if ( $bathrooms ) {
        $schema['numberOfBathroomsTotal'] = (int) $bathrooms;
    }
    if ( ! empty($amenities) ) {
        $schema['amenityFeature'] = array_map(function ($name) {
            return [
                '@type' => 'LocationFeatureSpecification',
                'name'  => $name,
                'value' => true,
            ];
        }, $amenities);
    }

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    echo "\n</script>\n";
}
