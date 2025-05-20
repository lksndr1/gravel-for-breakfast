<?php
$default_classes = [
    'hero' => 'hero',
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
        <p class="<?php echo esc_attr($classes['hero']); ?>">Hero</p>
    </section>
</div>
