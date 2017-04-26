<?php
 
$featured = new CPT(array(
    'post_type_name' => 'featured',
    'singular' => __('Featured', 'mintheme'),
    'plural' => __('Featured', 'mintheme'),
    'slug' => 'featured'
),
	array(
    'supports' => array('title', 'editor', 'thumbnail', 'comments'),
    'menu_icon' => 'dashicons-portfolio'
));
 
$featured->register_taxonomy(array(
    'taxonomy_name' => 'featured_tags',
    'singular' => __('Featured Tag', 'mintheme'),
    'plural' => __('Featured Tags', 'mintheme'),
    'slug' => 'featured-tag'
));