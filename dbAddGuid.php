<?php

global $wpdb;

$tableName  = $wpdb->prefix."posts";
$posts = new WP_Query(array(
    'post_type' => 'excursion',
    'posts_per_page' => -1,
));

while ($posts->have_posts()) {
    $posts->the_post();
    $id = get_the_ID();

    $wpdb->update(
        $tableName,
        array(
            'guid' => 'http://novi.rkgeronimo.hr/?p='.$id,
            'post_name' => $id,
        ),
        array( 'ID' => $id )
    );

    echo get_permalink($id);
    echo "\n";
    echo $id;
    echo "\n";
}

wp_reset_query();
