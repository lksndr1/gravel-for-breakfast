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
                <!-- logo -->
                <?php
                    $svg_url = get_field('logo', 'option');
                    if ($svg_url) {
                        $cache_key = 'cached_svg_' . md5($svg_url);
                        $svg_content = get_transient($cache_key);

                        if (!$svg_content) {
                            $svg_path = ABSPATH . str_replace(home_url('/'), '', $svg_url);
                            if (file_exists($svg_path)) {
                                $svg_content = file_get_contents($svg_path);
                                set_transient($cache_key, $svg_content, 12 * HOUR_IN_SECONDS);
                            }
                        }

                        if ($svg_content) {
                            echo '<div class="header-logo">';
                            echo $svg_content;
                            echo '</div>';
                        }
                    }
                ?>

                <div class='header-buttons'>
                    <!-- burger-menu -->
                    <?php
                        $svg_url = get_field('burger_menu_icon', 'option');
                        if ($svg_url) {
                            $cache_key = 'cached_svg_' . md5($svg_url);
                            $svg_content = get_transient($cache_key);

                            if (!$svg_content) {
                                $svg_path = ABSPATH . str_replace(home_url('/'), '', $svg_url);
                                if (file_exists($svg_path)) {
                                    $svg_content = file_get_contents($svg_path);
                                    set_transient($cache_key, $svg_content, 12 * HOUR_IN_SECONDS);
                                }
                            }

                            if ($svg_content) {
                                echo '<button id="header-dropdown-menu-toggle" class="burger-button">';
                                echo $svg_content;
                                echo '</button>';
                            }
                        }
                    ?>

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

                    <!-- button link -->
                    <?php
                        $header_link = get_field('header_link', 'option');
                        if (!empty($header_link)) :
                            $link_class = isset($classes['link']) ? esc_attr($classes['link']) : 'header_link';
                            get_template_part('template-parts/button-small-icon', null, [
                                'link' => $header_link['url'],
                                'link_text' => $header_link['title'],
                                'link_class' => $link_class
                            ]);
                            
                        endif;
                    ?>
                </div>
            </div>
        </header>
        