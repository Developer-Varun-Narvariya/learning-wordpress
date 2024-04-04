<?php
/*
        * Plugin Name:Learn HOOK
        * Description: Learining HOOK from Online Web Tutor

    */

// ==========================================================================================================






function varun_wp_init()
{
    $args = array(
        'public' => true,
        'label'  => __('TEST POST TYPE', 'textdomain'),
    );
    register_post_type('varun_hook', $args);
}

// add_action('init','varun_wp_init');




// ==========================================================================================================




function varun_wp_widget_init_register_sidebar()
{
    register_sidebar(array(
        'name'          => __('Varun Sidebar', 'textdomain'),
        'id'            => 'varun-sidebar-1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}

// add_action('widgets_init','varun_wp_widget_init_register_sidebar');



// ==========================================================================================================


function varun_custom_menu()
{
    add_menu_page("Varun Playlist", "Varun Playlist", "manage_options", "varun-playlist", "varun_playlist_fn");
    add_submenu_page("varun-playlist", "Submenu 1", "Submenu 1", "manage_options", "submenu-1", "varun_submenu1_fn");
}
function varun_submenu1_fn()
{
    echo "This is our Admin submenu 1";
}
function varun_playlist_fn()
{
    echo "This is Admin Menu Page";
}
// add_action('admin_menu','varun_custom_menu');





// ==========================================================================================================





function varun_attach_assets_to_admin()
{
    wp_enqueue_script('varun-js', plugin_dir_url(__FILE__) . "assets/js/varun-admin.js");
    wp_enqueue_style('varun-css', plugin_dir_url(__FILE__) . "assets/js/varun-admin.css");
}
// add_action('admin_enqueue_scripts','varun_attach_assets_to_admin');


function varun_attach_assets_to_front()
{
    wp_enqueue_style('varun-css', plugin_dir_url(__FILE__) . "assets/js/varun-front.css");
    wp_enqueue_script('varun-js', plugin_dir_url(__FILE__) . "assets/js/varun-front.js");
}

// add_action('wp_enqueue_scripts','varun_attach_assets_to_front');






// ==========================================================================================================



function varun_custom_bar_menu($wp_admin_bar)
{
    $args = array(
        'id' => 'varun-wordpress-blog',
        'title' => 'Developer Wordpress',
        'href' => 'https://developer.wordpress.org/',
        'meta' => array(
            'class' => 'varun-wordpress-blog',
            'target' => '_blank'
        )
    );
    $wp_admin_bar->add_node($args);

    $submenu1 = array(
        'id' => 'varun-wordpress-action',
        'title' => 'ACTIONS',
        'href' => 'https://developer.wordpress.org/plugins/hooks/actions/',
        'meta' => array(
            'class' => 'varun-wordpress-action',
            'target' => '_blank'
        ),
        'parent' => 'varun-wordpress-blog'
    );

    $wp_admin_bar->add_node($submenu1);

    $submenu2 = array(
        'id' => 'varun-wordpress-filter',
        'title' => 'FILTERS',
        'href' => 'https://developer.wordpress.org/plugins/hooks/filters/',
        'meta' => array(
            'class' => 'varun-wordpress-filter',
            'target' => '_blank'
        ),
        'parent' => 'varun-wordpress-blog'

    );

    $wp_admin_bar->add_node($submenu2);
}
add_action('admin_bar_menu', 'varun_custom_bar_menu', 999);



// ==========================================================================================================




function varun_admin_notice()
{
?>
    <!-- <div class="notice notice-error"> -->
    <!-- <div class="notice notice-success is-dismissible"> -->
    <!-- <div class="notice notice-warning is-dismissible"> -->
    <!-- is-dismissible - class provide close icon in messgae -->
    <div class="notice notice-info is-dismissible">
        <p>Welcome to the Admin Panel</p>
    </div>
<?php
}

// add_action('admin_notices','varun_admin_notice');





// ==========================================================================================================

function varun_make_meta_box()
{
    add_meta_box('varun-meta-box', 'Varun Custom Box', 'varun_meta_box_fn', 'post', 'side', 'default');
}

function varun_meta_box_fn($post)
{
    echo "Custom Meta Box in Post Page";
?>
    <br />
    <br />

    <div>
        <label for="name">Name</label>
        <br />
        <input type="text" name="varun_mbx_name" id="varun_mbx_name" placeholder="Enter Name" value="<?php echo get_post_meta($post->ID, 'varun_mbx_value', true); ?>">
    </div>

<?php }

// add_action('add_meta_boxes','varun_make_meta_box');


function varun_save_meta_box_value($post_id)
{
    $varun_mbx_name = isset($_REQUEST['varun_mbx_name']) ? trim($_REQUEST['varun_mbx_name']) : "";
    if (!empty($varun_mbx_name)) {
        update_post_meta($post_id, 'varun_mbx_value', $varun_mbx_name);
    }
}

// add_action('save_post','varun_save_meta_box_value');


// ==========================================================================================================




function varun_attach_assets_to_login()
{
    wp_enqueue_script('varun-admin-login-js', plugin_dir_url(__FILE__) . "assets/js/varun-admin-login.js");
    wp_enqueue_style('varun-admin-login-css', plugin_dir_url(__FILE__) . "assets/css/varun-admin-login.css");
}
add_action('login_enqueue_scripts', 'varun_attach_assets_to_login');







// ================================== wp_head & wp_footer ========================================================================

function varun_head_file_css(){
    echo "<link rel='stylesheet' href='".plugin_dir_url(__FILE__)."assets/css/header-varun.css'>";
}
add_action('wp_head','varun_head_file_css');


function varun_footer_file_js(){
echo '<script scr="'.plugin_dir_url(__FILE__).'assets/js/footer-varun.js"></script>';
}
add_action('wp_footer','varun_footer_file_js');






// ================================== login_form ========================================================================


function varun_login_input_form(){
    ?>
    <p>
        <label for="name">Name</label>
        <input type="text" name="varun_name" id="varun_name" value="">
    </p>
    <p>
        <label for="phone">Phone</label>
        <input type="text" name="varun_phone" id="varun_phone" value="">
    </p>
<?php }
add_action('login_form','varun_login_input_form');
