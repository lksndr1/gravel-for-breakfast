<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <?php wp_head(); ?>
    <title>Gravel for breakfast</title>
</head>
<body>
    <div class="container">
        <header class="header">
            <?php
            $logo = get_field('logo', 'option');
            if ($logo) :
                $logo_url = $logo['url'];
                $logo_alt = $logo['alt'];
            ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
            <?php endif;

            $burger_menu = get_field('burger_menu', 'option');
            if ($burger_menu) :
                $burger_menu_url = $burger_menu['url'];
                $burger_menu_alt = $burger_menu['alt'];
            ?>
                <img src="<?php echo esc_url($burger_menu_url); ?>" alt="<?php echo esc_attr($burger_menu_alt); ?>">
            <?php endif;

            $get_in_touch = get_field('get_in_touch', 'option');
            if ($get_in_touch) :
                $get_in_touch_url = $get_in_touch['url'];
                $get_in_touch_alt = $get_in_touch['alt'];
            ?>
                <img src="<?php echo esc_url($get_in_touch_url); ?>" alt="<?php echo esc_attr($get_in_touch_alt); ?>">
            <?php endif; ?>
        </header>
    </div>