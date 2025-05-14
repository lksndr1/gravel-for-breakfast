<?php
acf_register_block_type(array(
    'name'              => 'block1',
    'title'             => __('Block 1'),
    'description'       => __('Block 1'),
    'render_template'   => acf_theme_blocks_path('block1/block1.php'),
    'enqueue_style'     => get_template_directory_uri() . '/assets/blocks/styles/block1/block1.css',
    'enqueue_script'    => get_template_directory_uri() . '/assets/blocks/scripts/block1/block1.js',
    'category'          => 'custom-blocks',
));
?>