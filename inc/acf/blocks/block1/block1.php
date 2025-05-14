<?php
    $default_classes = [
    'text1' => 'text1',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['block1'] ?? []);
}
?>
    <h1 class="<?php echo esc_attr($classes['text1']); ?>">block1</h1>