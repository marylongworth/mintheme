<?php
 
$slider = new CPT(array(
    'post_type_name' => 'slider',
    'singular' => __('Slider', 'mintheme'),
    'plural' => __('Slider', 'mintheme'),
    'slug' => 'slider'
),
	array(
    'supports' => array('title', 'editor', 'thumbnail', 'comments'),
    'menu_icon' => 'dashicons-portfolio'
));
 
$slider->register_taxonomy(array(
    'taxonomy_name' => 'Slider_tags',
    'singular' => __('Slider Tag', 'mintheme'),
    'plural' => __('Slider Tags', 'mintheme'),
    'slug' => 'slider-tag'
));