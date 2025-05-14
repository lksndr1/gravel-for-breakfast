<?php

function acf_theme_blocks_path($path = '')
{
    return get_template_directory() . '/inc/acf/blocks/' . $path;
}

function gt_block_category_init($categories, $post)
{
    return array_merge(
        [
            [
                'slug' => 'custom-blocks',
                'title' => __('Custom Blocks', 'gravel_for_breakfast_theme'),
            ],
        ],
        $categories
    );
}
add_filter('block_categories', 'gt_block_category_init', 10, 2);

/* Register acf blocks */
function gravel_for_breakfast_blocks_init()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        $block_folders = glob(acf_theme_blocks_path() . '*', GLOB_ONLYDIR);
        foreach ($block_folders as $block_path) {
            $register_file = $block_path . '/register.php';

            if (file_exists($register_file)) {
                include_once $register_file;
            }
        }

    }
}
add_action('acf/init', 'gravel_for_breakfast_blocks_init');