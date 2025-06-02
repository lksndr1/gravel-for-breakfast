<?php
$default_classes = [
    'text-wrapper' => 'text-wrapper',
    'flex-wrapper' => 'flex-wrapper',
    'left-col' => 'left-col',
    'right-col' => 'right-col',
    'right-col-wrapper' => 'right-col-wrapper',

];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['hero-block'] ?? []);
}
?>

<div class="container">
    <section class="section">
        <div class="<?php echo esc_attr($classes['text-wrapper']); ?>">
            <div class="<?php echo esc_attr($classes['flex-wrapper']); ?>">
                <div class="<?php echo esc_attr($classes['left-col']); ?>">
                    <h1><?php echo get_field('heading') ?></h1>
                </div>
                <div class="<?php echo esc_attr($classes['right-col']); ?>">
                    <div class="<?php echo esc_attr($classes['right-col-wrapper']); ?>">
                        <p><?php echo get_field('description') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr($classes['address-wrapper']); ?>">

        </div>
    </section>
</div>
