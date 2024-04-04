<?php

function my_child_theme_enqueue_styles(){
    //load parent theme stylesheet first
    wp_enqueue_style('parent-style',get_template_directory_uri().'/style.css');
    //load child theme stylesheet
    wp_enqueue_style('child-style',get_stylesheet_uri(),array('parent-style'));
}

add_action('wp_enqueue_scripts','my_child_theme_enqueue_styles');

?>