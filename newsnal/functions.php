<?php
function newsnal_enqueue_child_styles()
{
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'darknews-style';
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'newsnal',
        get_stylesheet_directory_uri() . '/style.css',
        array('bootstrap', $parent_style),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'newsnal_enqueue_child_styles');

function newsnal_custom_header_setup($default_custom_header)
{
    $default_custom_header['default-text-color'] = '202020';
    return $default_custom_header;
}
add_filter('darknews_custom_header_args', 'newsnal_custom_header_setup', 1);

//default settings
function newsnal_filter_default_theme_options($defaults)
{
   
    $defaults['global_site_layout_setting']    = 'boxed';
    $defaults['global_site_mode_setting']    = 'aft-default-mode';
    $defaults['archive_grid_column_layout'] = 'grid-layout-three';
    $defaults['global_author_icon_gravatar_display_setting'] = 'display-icon';    
    return $defaults;
}

add_filter('darknews_filter_default_theme_options', 'newsnal_filter_default_theme_options', 1);