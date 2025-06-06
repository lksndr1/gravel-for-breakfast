<?php
acf_register_block_type(array(
    'name'              => 'values-block',
    'title'             => __('Main values block'),
    'description'       => __('Photo and some text'),
    'render_template'   => acf_theme_blocks_path('values-block/values-block.php'),
    'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/values-block/values-block.css',
    'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/values-block/values-block.js',
    'category'          => 'custom-blocks',
));
?>