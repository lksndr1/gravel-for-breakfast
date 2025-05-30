<?php
wp_enqueue_style('socials-style', get_template_directory_uri() . '/assets/styles/template-parts/socials.css', [], '1.0');

if( have_rows('socials', 'option') ): ?>
    <ul class="socials">
        <?php while( have_rows('socials', 'option') ): the_row();
            $social_svg_url = get_sub_field('social_icon');
            $social_icon_link = get_sub_field('social_link');
        ?>
            <li>
                <a href="<?php echo esc_url($social_icon_link); ?>" target="_blank" rel="noopener">
                    <?php
                    if ($social_svg_url) {
                        $social_cache_key = 'cached_svg_' . md5($social_svg_url);
                        $social_svg_content = get_transient($social_cache_key);

                        if (!$social_svg_content) {
                            $social_svg_path = ABSPATH . str_replace(home_url('/'), '', $social_svg_url);
                            if (file_exists($social_svg_path)) {
                                $social_svg_content = file_get_contents($social_svg_path);
                                set_transient($social_cache_key, $social_svg_content, 12 * HOUR_IN_SECONDS);
                            }
                        }

                        if ($social_svg_content) {
                            echo $social_svg_content;
                        }
                    }
                    ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>