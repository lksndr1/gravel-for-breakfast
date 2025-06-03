<?php

wp_enqueue_style('button-big-icon-style', get_template_directory_uri() . '/assets/styles/template-parts/button-big-icon.css', [], '1.0');

$big_link = isset($args['big_link']) ? $args['big_link'] : '#';
$big_link_text = isset($args['big_link_text']) ? $args['big_link_text'] : 'click-link';
$big_link_class = isset($args['big_link_class']) ? $args['big_link_class'] : '';
$big_target = isset($args['target']) ? $args['target'] : '';

    if (!empty($big_link_text)) :
?>

<a class="bi-link <?php echo esc_attr($big_link_class); ?>" href="<?php echo esc_url($big_link); ?>" target="<?php echo esc_url($target); ?>">
        <?php echo esc_html($big_link_text); ?>
        <span class='button-icon'>
            <?php
                $svg_url = get_field('hero_link_icon');
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