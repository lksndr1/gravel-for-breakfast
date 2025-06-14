<?php
    $default_classes = [
    'heading-description-wrapper' => 'heading-description-wrapper',
    'values-wrapper' => 'values-wrapper',
    'title-text-wrapper' => 'title-text-wrapper',
    'value-item' => 'value-item',

];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['values-block'] ?? []);
}
?>
    
<div class="container">
    <section>
        <div class="<?php echo esc_attr($classes['heading-description-wrapper']); ?>">
            <div class="<?php echo esc_attr($classes['heading-wrapper']); ?>">
                <h2>
                    <?php echo the_field('values_heading') ?>
                </h2>
            </div>
            <div>
                <p>
                    <?php echo the_field('values_description') ?>
                </p>
            </div>
        </div>

        <?php if( have_rows('values_items') ): ?>
            <div class="<?php echo esc_attr($classes['values-wrapper']); ?>">
                <?php 
                $counter = 0;
                while( have_rows('values_items') ): the_row(); 
                    $counter++;
                    $title = get_sub_field('value_title');
                    $text = get_sub_field('value_text');
                ?>

                    <div class="<?php echo esc_attr($classes['title-text-wrapper']); ?> <?php echo esc_attr($classes['value-item']); ?>">
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($text); ?></p>
                    </div>

                    <?php if ($counter % 2 == 0): ?>
                        <?php 
                        $image = get_sub_field('value_even-num_image');
                        if ($image): ?>
                            <div class="<?php echo esc_attr($classes['title-text-wrapper']); ?> hide-on-mobile">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>
</div>