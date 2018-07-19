<?php
// Include your functions files here
include('inc/enqueues.php');



// Add your theme support ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
function customThemeSupport() {
    global $wp_version;

    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );

    // let wordpress manage the title
    add_theme_support( 'title-tag' );

    //add_theme_support( 'custom-background', $args );
    //add_theme_support( 'custom-header', $args );

    // Automatic feed links compatibility
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );


// Content width
if( !isset( $content_width ) ) {
    // @TODO : edit the value for your own specifications
    $content_width = 960;
}


// Register menus, use wp_nav_menu() to display menu to your template ( cf : http://codex.wordpress.org/Function_Reference/wp_nav_menu )
register_nav_menus( array(
    'main_menu' => __( 'Menu principal', 'minimal-blank-theme' ) //@TODO : change i18n domain name to yours
) );


// Register sidebars
function registerThemeSidebars() {
    if( !function_exists( 'register_sidebar' ) ) {
        return;
    }

    register_sidebar( array(
        'name' => 'Main sidebar',
        'id' => 'main-sidebar',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'registerThemeSidebars' );


// Admin editor style
function addAdminEditorStyle() {
    add_editor_style( get_stylesheet_directory_uri() . 'css/editor-style.css' );
};
//add_action( 'admin_init', 'addAdminEditorStyle' );

// подключаем файлы со стилями
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
 wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css' );
 wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css' );
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/editor-style.css' );
 wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
 wp_enqueue_script( 'jquery-js', get_template_directory_uri() . 'https://code.jquery.com/jquery-3.3.1.min.js');
 wp_enqueue_script( 'loadmore-js', get_template_directory_uri() . '/js/loadmore.js');
};


