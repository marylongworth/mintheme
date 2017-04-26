<?php
 
$portfolio = new CPT(array(
    'post_type_name' => 'portfolio',
    'singular' => __('Portfolio', 'mintheme'),
    'plural' => __('Portfolio', 'mintheme'),
    'slug' => 'portfolio'
),
	array(
    'supports' => array('title', 'editor', 'thumbnail', 'comments'),
    'menu_icon' => 'dashicons-portfolio'
));
 
$portfolio->register_taxonomy(array(
    'taxonomy_name' => 'portfolio_tags',
    'singular' => __('Portfolio Tag', 'mintheme'),
    'plural' => __('Portfolio Tags', 'mintheme'),
    'slug' => 'portfolio-tag'
));