<?php

/**
 * theme setup
 *
 * @return void
 */
function custom_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'custom_theme_setup');

/**
 * remove_action for wp_head
 *
 * @return void
 */
function custom_wp_head_remove_action()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
}
add_action('init', 'custom_wp_head_remove_action');

/**
 * remove_action for template_redirect
 *
 * @return void
 */
function custom_template_redirect_remove_action()
{
    remove_action('template_redirect', 'rest_output_link_header', 11);
}
add_action('init', 'custom_template_redirect_remove_action');

/**
 * remove_action for wp_print_styles
 *
 * @return void
 */
function custom_wp_print_styles_remove_action()
{
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'custom_wp_print_styles_remove_action');

/**
 * custom title separator
 *
 * @param string $sep
 * @return string
 */
function custom_title_separator(string $sep)
{
    $sep = ' | ';
    return $sep;
}
add_filter('document_title_separator', 'custom_title_separator');

/**
 * remove adminbar items
 *
 * @param object $wp_admin_bar
 * @return void
 */
function remove_adminbar_item(object $wp_admin_bar)
{
    $wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'remove_adminbar_item', 999);

/**
 * widgets init
 *
 * @return void
 */
function arphabet_widgets_init()
{
    register_sidebar([
        'name' => 'ウイジェット',
        'id' => 'sidebar',
        'before_widget' => '<div class="sidebar-inner">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="sidebar-ttl">',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'arphabet_widgets_init');

/**
 * register menu
 *
 * @return void
 */
function register_custom_menu()
{
    register_nav_menu('header-menu', __('ヘッダーメニュー'));
}
add_action('init', 'register_custom_menu');

/**
 * load theme css
 *
 * @return void
 */
function load_theme_css()
{
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap',
        [],
        '1.0.0'
    );
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style(
        'app-style',
        get_theme_file_uri('dist/css/app.css'),
        [],
        filemtime(get_theme_file_path('dist/css/app.css'))
    );
}
add_action('wp_enqueue_scripts', 'load_theme_css');

/**
 * load theme scripts
 *
 * @return void
 */
function load_theme_scripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', [], '3.6.0', true);

    wp_enqueue_script(
        'app-script',
        get_theme_file_uri('dist/js/app.js'),
        [],
        filemtime(get_theme_file_path('dist/js/app.js')),
        true
    );
}
add_action('wp_enqueue_scripts', 'load_theme_scripts');

/**
 * shutout author query
 *
 * @return void
 */
function shut_author_query()
{
    if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('init', 'shut_author_query');

require_once get_theme_file_path('/functions/admin/theme-setting.php');
