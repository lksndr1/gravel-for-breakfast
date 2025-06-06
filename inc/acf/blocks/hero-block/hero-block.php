<?php
$default_classes = [
    'hero-section' => 'hero-section',
    'text-wrapper' => 'text-wrapper',
    'flex-wrapper' => 'flex-wrapper',
    'left-col' => 'left-col',
    'right-col' => 'right-col',
    'right-col-wrapper' => 'right-col-wrapper',
    'description' => 'description',
    'big_link' => 'big_link',
    'email-copyright-wrapper' => 'email-copyright-wrapper',
    'hero_copyright' => 'hero_copyright',
    'hero-image-wrapper' => 'hero-image-wrapper',
];

$modules_file = get_template_directory() . '/assets/blocks/styles/modules.json';
$classes = $default_classes;

if (file_exists($modules_file)) {
    $modules = json_decode(file_get_contents($modules_file), true);
    $classes = array_merge($default_classes, $modules['hero-block'] ?? []);
}
?>

<div class="container">
    <section class="section <?php echo esc_attr($classes['hero-section']); ?>">
        <div class="<?php echo esc_attr($classes['text-wrapper']); ?>">
            <div class="<?php echo esc_attr($classes['flex-wrapper']); ?>">
                <div class="<?php echo esc_attr($classes['left-col']); ?>">
                    <h1><?php echo get_field('heading') ?></h1>
                </div>
                <div class="<?php echo esc_attr($classes['right-col']); ?>">
                    <div class="<?php echo esc_attr($classes['right-col-wrapper']); ?>">
                        <p class="<?php echo esc_attr($classes['description']); ?>"><?php echo get_field('description') ?></p>
                        <?php
                            $hero_link = get_field('hero_link');
                            if (!empty($hero_link)) :
                                $hero_link_class = isset($classes['big_link']) ? esc_attr($classes['big_link']) : 'hero_link';
                                get_template_part('template-parts/button-big-icon', null, [
                                    'big_link' => $hero_link['url'],
                                    'big_link_text' => $hero_link['title'],
                                    'big_link_class' => $hero_link_class
                                ]);
                
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="<?php echo esc_attr($classes['flex-wrapper']); ?>">
            <div class="<?php echo esc_attr($classes['left-col']); ?>">
                <?php
                $address = get_field('address', 'option');
                if ($address) :
                ?>
                    <p><?php echo $address ?></p>
                <?php endif; ?>
            </div>

            <div class="<?php echo esc_attr($classes['right-col']); ?>">
                <div class="<?php echo esc_attr($classes['right-col-wrapper']); ?>">
                    <div class="<?php echo esc_attr($classes['email-copyright-wrapper']); ?>">
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
                            <p class="<?php echo esc_attr($classes['hero_copyright']); ?>"><?php echo $copyright ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        <?php
        $hero_image = get_field('hero_image');
        if(!empty($hero_image)) : ?>
            <div class="<?php echo esc_attr($classes['hero-image-wrapper']); ?>">
                <img src="<?php echo esc_url($hero_image['url']) ?>" alt="<?php echo esc_attr($hero_image['alt'])?>" />
            </div>
        <?php endif; ?>

    </section>
</div>
