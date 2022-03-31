<?php

/**
 * add theme setting page
 *
 * @return void
 */
function admin_theme_setting_page()
{
    add_menu_page(
        'テーマ設定',
        'テーマ設定',
        'manage_options',
        'admin_theme_setting_page',
        'add_admin_theme_setting_page',
        'dashicons-admin-generic',
        80
    );
}
add_action('admin_menu', 'admin_theme_setting_page');

/**
 * register setting menu
 *
 * @return void
 */
function register_theme_setting()
{
    register_setting('theme-setting-group', 'gtm-id'); // GTM ID (GTM-XXXXXX)
    register_setting('theme-setting-group', 'ga-id'); // GA ID (G-XXXXXX)
}
add_action('admin_init', 'register_theme_setting');

/**
 * markup theme setting page
 *
 * @return void
 */
function add_admin_theme_setting_page()
{ ?>
    <div class="wrap">
        <h1>テーマ設定</h1>
        <form method="post" action="options.php">
            <?php settings_errors(); ?>
            <?php settings_fields('theme-setting-group'); ?>
            <?php do_settings_sections('theme-setting-group'); ?>
            <h2 class="title">アクセス解析</h2>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="gtm-id">GTM設定</label>
                        </th>
                        <td>
                            <span>GTM-</span>
                            <input name="gtm-id" type="text" id="gtm-id" value="<?php echo get_option('gtm-id'); ?>" class="regular-text" placeholder="XXXXXX">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="ga-id">GA設定</label>
                        </th>
                        <td>
                            <span>G-</span>
                            <input name="ga-id" type="text" id="ga-id" value="<?php echo get_option('ga-id'); ?>" class="regular-text" placeholder="XXXXXX">
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="変更を保存">
            </p>
        </form>
    </div>
<?php
}
