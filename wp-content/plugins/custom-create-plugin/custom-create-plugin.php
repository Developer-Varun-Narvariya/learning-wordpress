<?php

/*
Plugin Name:Custom-Create-Plugin
Author:Varun Narvariya
Description:learn to create plugin and create plugin
Text Domain:ccp
*/

//wp_config file set - true ------- define( 'WP_DEBUG', true );

// if this file is called directly,abort
if (!defined('WPINC')) {
    die;
}

// check is already define or not safty for conflict



if (!defined('CCP_PLUGIN_VERSION')) {
    define('CCP_PLUGIN_VERSION', '1.0.0');
}

if (!defined('CCP_PLUGIN_DIR')) {
    define('CCP_PLUGIN_DIR', plugin_dir_url(__FILE__));
}

if (!function_exists('ccp_my_plugin_scripts')) {
    function ccp_my_plugin_scripts()
    {
        wp_enqueue_style('ccp-css', CCP_PLUGIN_DIR . 'assets/css/style.css');
        wp_enqueue_script('ccp-js', CCP_PLUGIN_DIR . 'assets/js/main.js', 'jQeury', '1.0.0', true);
    }
}

add_action('wp_enqueue_scripts', 'ccp_my_plugin_scripts');

function ccp_settings_page_html()
{
    echo "Hello";
}

function ccp_register_menu_page()
{
    add_menu_page('CCP Sytstem', 'CCP Setting', 'manage_options', 'ccp-setting', 'ccp_settings_page_html', 'dashicons-admin-plugins', 30);
}

add_action('admin_menu', 'ccp_register_menu_page');

// register setting,fields

function ccp_settings(){
    // register_setting(    string $option_group,    string $option_name,    array $args = []);

    // add_settings_section(    string $id,    string $title,    callable $callback,    string $page,    array $args = []);


    // add_settings_field(
    //     string $id,
    //     string $title,
    //     callable $callback,
    //     string $page,
    //     string $section = 'default',
    //     array $args = []
    // );
}

add_action('admin_init','ccp_settings');


























// function customPlugin_publish_send_mail()
// {
//     global $post;
//     $author = $post->post_author;
//     $permalink = get_permalink($ID);
//     $name = get_the_author_meta('display_name', $author);
//     $email = get_the_author_meta('user_email', $author);
//     $title = $post->post_title;
//     $to[] = sprintf('%s,<%s>', $name, $email);
//     $subject = sprintf('Published %s', $title);
//     $message = sprintf('Congratulations, %s! Your article "%s" has been published.' . "\n\n", $name, $title);
//     $message = sprintf("View: %s", $permalink);
//     $headers[] = '';
    
//     wp_mail($to, $subject, $message, $headers);
// }

// add_action('publish_post', 'customPlugin_publish_send_mail');



// function customPlugin_excerpt_lenght($words){
//     return 2;
// }
// add_filter( 'excerpt_length',  'customPlugin_excerpt_lenght',999 );


// function customPlugin_excerpt_more($more){
//     $more = '<a href="'.get_the_permalink().'"> More</a>';
//     return str_replace( '[…]', '...', $more );
// }
// add_filter( 'excerpt_more',  'customPlugin_excerpt_more',99);