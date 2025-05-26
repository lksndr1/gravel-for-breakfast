            <div class="container">
                <footer class='footer'>
                    <div class="footer-wrapper">
                        <div>
                            <?php
                            $logo = get_field('logo', 'option');
                            if ($logo) :
                                $logo_url = $logo['url'];
                                $logo_alt = $logo['alt'];
                            ?>
                                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
                            <?php endif; ?>
                        </div>

                        <div>
                            <?php if( have_rows('socials', 'option') ): ?>
                                <ul class="socials">
                                    <?php while( have_rows('socials', 'option') ): the_row(); 
                                        $social_icon = get_sub_field('social_icon');
                                        $social_icon_url = $social_icon['url'];
                                        $social_icon_alt = $social_icon['alt'];
                                        $social_icon_link = get_sub_field('social_link');
                                    ?>
                                        <li>
                                            <a href="<?php echo esc_url($social_icon_link); ?>" target="_blank" rel="noopener">
                                                <img src="<?php echo esc_url($social_icon_url); ?>" alt="<?php echo esc_attr($social_icon_alt); ?>">
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
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
                        

                        <?php
                        $to_top_button = get_field('top_button_icon', 'option');
                        if ($to_top_button) :
                            $to_top_button_url = $to_top_button['url'];
                            $to_top_button_alt = $to_top_button['alt'];
                        ?>
                            <button id='to_top_button'>
                                <img src="<?php echo esc_url($to_top_button_url); ?>" alt="<?php echo esc_attr($to_top_button_alt); ?>">
                            </button>
                        <?php endif; ?>
                    </div>
                </footer>
            </div>
            <?php wp_footer(); ?>
        </div>
    </body>
</html>