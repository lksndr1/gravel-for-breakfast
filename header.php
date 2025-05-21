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
    <div class="wrapper">
        <header class="header">
            <div class="overlay" id="menu-overlay"></div>
            <div class="container">
                <?php
                $logo = get_field('logo', 'option');
                if ($logo) :
                    $logo_url = $logo['url'];
                    $logo_alt = $logo['alt'];
                ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
                <?php endif; ?>

                <div class='header-buttons'>
                    <?php
                    $burger_menu = get_field('burger_menu', 'option');
                    if ($burger_menu) :
                        $burger_menu_url = $burger_menu['url'];
                        $burger_menu_alt = $burger_menu['alt'];
                    ?>
                        <button id='header-dropdown-menu-toggle'>
                            <img src="<?php echo esc_url($burger_menu_url); ?>" alt="<?php echo esc_attr($burger_menu_alt); ?>">
                        </button>
                        <div class='header-dropdown-menu-wrapper'>
                            <button id='close-dropdown-menu' type="button" aria-label="Close menu">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.8335 5.83331L14.1668 14.1666M5.8335 14.1666L14.1668 5.83331" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <nav class="dropdown-menu-nav">
                                <?php wp_nav_menu([
                                    'theme_location'       => 'header',
                                    'container'            => false,
                                    'menu_class'           => 'dropdown-menu-list',
                                    'menu_id'              => false,
                                    'echo'                 => true,
                                    'items_wrap'           => '<ul id="%1$s" class="header_list %2$s">%3$s</ul>',
                                ]); ?>
                            </nav>
                        </div>
                    <?php endif;

                    $get_in_touch = get_field('get_in_touch', 'option');
                    if ($get_in_touch) :
                        $get_in_touch_url = $get_in_touch['url'];
                        $get_in_touch_alt = $get_in_touch['alt'];
                    ?>
                        <img class='get-in-touch' src="<?php echo esc_url($get_in_touch_url); ?>" alt="<?php echo esc_attr($get_in_touch_alt); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </header>
        