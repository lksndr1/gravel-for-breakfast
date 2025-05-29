<?php

wp_enqueue_style('button-small-icon-style', get_template_directory_uri() . '/assets/styles/template-parts/button-small-icon.css', [], '1.0');

$link = isset($args['link']) ? $args['link'] : '#';
$link_text = isset($args['link_text']) ? $args['link_text'] : 'click-link';
$link_class = isset($args['link_class']) ? $args['link_class'] : '';
$target = isset($args['target']) ? $args['target'] : '';

    if (!empty($link_text)) :
?>

    <a class="si-link <?php echo esc_attr($link_class); ?>" href="<?php echo esc_url($link); ?>" target="<?php echo esc_url($target); ?>">
        <?php echo esc_html($link_text); ?>
        <span class='button-icon'>
            <?php
                $svg_url = get_field('header_link_icon', 'option');
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