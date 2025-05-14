<?php

function gravel_for_breakfast_scripts()
{
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('gravel-for-breakfast-style', get_template_directory_uri() . '/assets/styles/main.css', array('main'));
    wp_enqueue_script('gravel-for-breakfast-scripts', get_template_directory_uri() . '/assets/scripts/main.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'gravel_for_breakfast_scripts');

function register_acf_block_assets() {
    $blocks_dir = get_template_directory() . '/inc/acf/blocks';

    foreach (glob($blocks_dir . '/*', GLOB_ONLYDIR) as $block_dir) {
        $block_name = basename($block_dir);

        $style_path = "/assets/blocks/styles/$block_name/$block_name.css";
        $script_path = "/assets/blocks/scripts/$block_name/$block_name.js";

        if (file_exists(get_template_directory() . $style_path)) {
            wp_enqueue_style(
                "block-$block_name-style",
                get_template_directory_uri() . $style_path,
                array(),
                filemtime(get_template_directory() . $style_path)
            );
        }

        if (file_exists(get_template_directory() . $script_path)) {
            wp_enqueue_script(
                "block-$block_name-script",
                get_template_directory_uri() . $script_path,
                array('jquery'),
                filemtime(get_template_directory() . $script_path),
                true
            );
        }
    }
}
add_action('enqueue_block_assets', 'register_acf_block_assets');

/** Initializing aсf blocks for gutenberg */
require_once get_template_directory() . '/inc/acf/blocks/blocks-init.php';

function add_google_fonts()
{
    wp_enqueue_style('google_web_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Roboto');
}

add_action('wp_enqueue_scripts', 'add_google_fonts');

?>