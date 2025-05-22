            <div class="container">
                <footer class='footer'>
                    <!-- logo -->
                    <?php
                    $logo = get_field('logo', 'option');
                    if ($logo) :
                        $logo_url = $logo['url'];
                        $logo_alt = $logo['alt'];
                    ?>
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
                    <?php endif; ?>

                    <!-- socials -->
                    <?php if( have_rows('socials', 'option') ): ?>
                        <ul class="socials">
                            <?php while( have_rows('socials', 'option') ): the_row(); 
                                $social_icon = get_sub_field('social_icon');
                                $social_icon_url = $social_icon['url'];
                                $social_icon_alt = $social_icon['alt'];
                                $social_icon_link = get_sub_field('link');
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($social_icon_link); ?>" target="_blank" rel="noopener">
                                        <img src="<?php echo esc_url($social_icon_url); ?>" alt="<?php echo esc_attr($social_icon_alt); ?>">
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>


                </footer>
            </div>
            <?php wp_footer(); ?>
        </div>
    </body>
</html>