<?php

// アイキャッチ設定
add_theme_support('post-thumbnails');

// html5許可
add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);

// RSS用リンク出力
add_theme_support('automatic-feed-links');

// oembed消去
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// wp-json消去
remove_action('template_redirect', 'rest_output_link_header', 11);

// 絵文字消去
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// 外部投稿ツール消去
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// meta generator消去
remove_action('wp_head', 'wp_generator');

// 短縮URL消去
remove_action('wp_head', 'wp_shortlink_wp_head');

// 次の記事消去
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// タイトルタグ追加
add_theme_support('title-tag');

// タイトルタグセパレーター変更
function title_separator($sep)
{
    $sep = '｜';
    return $sep;
}
add_filter('document_title_separator', 'title_separator');

// adminbarカスタマイズ
function remove_adminbar_item($wp_admin_bar)
{
    if (!is_admin()) {
        $wp_admin_bar->remove_node('wp-logo');
        $wp_admin_bar->remove_node('new-content');
        $wp_admin_bar->remove_node('comments');
        $wp_admin_bar->remove_node('appearance');
        $wp_admin_bar->remove_node('updates');
        $wp_admin_bar->remove_node('search');
        $wp_admin_bar->remove_node('customize');
    }
}
add_action('admin_bar_menu', 'remove_adminbar_item', 999);

// ウィジェット登録
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

// メニュー登録
function register_my_menu()
{
    register_nav_menu('header-menu', __('ヘッダーメニュー'));
}
add_action('init', 'register_my_menu');

// load css
function my_template_css()
{
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style(
        'app-style',
        get_theme_file_uri('dist/css/app.css'),
        [],
        filemtime(get_theme_file_path('dist/css/app.css')),
    );
}
add_action('wp_enqueue_scripts', 'my_template_css');

// load js
function add_my_scripts()
{

    wp_deregister_script('jquery');
    wp_enqueue_script(
        'jquery',
        'https://code.jquery.com/jquery-3.6.0.min.js',
        [],
        '3.6.0',
        true
    );

    wp_enqueue_script(
        'app-script',
        get_theme_file_uri('dist/js/app.js'),
        [],
        filemtime(get_theme_file_path('dist/js/app.js')),
        true
    );
}
add_action('wp_enqueue_scripts', 'add_my_scripts');
