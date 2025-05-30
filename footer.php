            <div class="container">
                <footer class='footer'>
                    <div class="footer-wrapper">
                        <div>
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
                                    echo '<div class="footer-logo">';
                                    echo $svg_content;
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>

                        <div class='social-icons'>
                            <?php if( have_rows('socials', 'option') ):
                            get_template_part('template-parts/socials');
                            endif; ?>
                        </div>
                    
                        <div class='footer-address'>
                            <?php
                            $address = get_field('address', 'option');
                            if ($address) :
                            ?>
                                <p><?php echo $address ?></p>
                            <?php endif; ?>
                        </div>

                        <div class='email-copyright-flex'>
                            <?php
                            $email = get_field('email', 'option');
                            if ($email) :
                            ?>
                                <p><?php echo $email ?></p>
                            <?php endif; ?>

                            <?php
                            $copyright = get_field('copyright', 'option');
                            if ($copyright) :
                            ?>
                                <p><?php echo $copyright ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- To-top button -->
                        <?php
                            $svg_url = get_field('top_button_icon', 'option');
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
                                    echo '<button id="to_top_button" class="to-top-button">';
                                    echo $svg_content;
                                    echo '</button>';
                                }
                            }
                        ?>
                    </div>
                </footer>
            </div>
            <?php wp_footer(); ?>
        </div>
    </body>
</html>