<?php

wp_enqueue_style('button-small-icon-style', get_template_directory_uri() . '/assets/styles/template-parts/button-small-icon.css', [], '1.0');

    $button_text = $args['text'] ?? '';
    $custom_text_class = $args['custom_text_class'] ?? '';
    $custom_elements_class = $args['custom_elements_class'] ?? '';

    if (!empty($button_text)) :
?>

    <?php
    $button_link = get_field('button_link', 'option');
    ?>
    <a href="<?php echo esc_url($button_link ?: '#'); ?>" class="button-small-icon <?php echo esc_attr($custom_elements_class); ?>">
        <?php echo esc_html($button_text); ?>
        <span class='button-icon'>
            <?php
                $svg_url = get_field('button_icon', 'option');
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
                        echo $svg_content;
                    }
                }
            ?>
        </span>
    </a>
<?php endif; ?>