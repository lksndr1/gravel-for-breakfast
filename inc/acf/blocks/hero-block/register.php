<?php
acf_register_block_type(array(
    'name'              => 'hero-block',
    'title'             => __('hero Block'),
    'description'       => __('Block hero'),
    'render_template'   => acf_theme_blocks_path('hero-block/hero-block.php'),
    'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/hero-block/hero-block.css',
    'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/hero-block/hero-block.js',
    'category'          => 'custom-blocks',
));
?>