<?php
    $default_classes = [
    'heading-description-wrapper' => 'heading-description-wrapper',
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
    </section>
</div>