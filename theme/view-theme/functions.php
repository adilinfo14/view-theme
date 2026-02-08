<?php
/**
 * Minimal block theme functions.
 */

/**
 * Register block patterns from the patterns/ directory.
 * Patterns are loaded from PHP files in /patterns/ and registered with Gutenberg.
 */
function view_theme_register_patterns()
{
    $pattern_files = array(
        'hero.php' => array(
            'title' => __('Hero – Site Vitrine Premium', 'view-theme'),
            'categories' => array('featured', 'hero'),
        ),
        'features.php' => array(
            'title' => __('Section Services / Features', 'view-theme'),
            'categories' => array('featured', 'gallery'),
        ),
        'cta-banner.php' => array(
            'title' => __('Bandeau Call To Action', 'view-theme'),
            'categories' => array('call-to-action'),
        ),
    );

    foreach ($pattern_files as $file => $args) {
        $pattern_path = get_theme_file_path('patterns/' . $file);
        if (file_exists($pattern_path)) {
            // Extract slug from file path
            $slug_from_file = str_replace('.php', '', $file);
            register_block_pattern(
                'view-theme/' . $slug_from_file,
                array(
                    'title' => $args['title'],
                    'categories' => $args['categories'],
                    'content' => file_get_contents($pattern_path),
                    'description' => __('Responsive pattern using theme.json design tokens', 'view-theme'),
                )
            );
        }
    }
}
add_action('init', 'view_theme_register_patterns');
