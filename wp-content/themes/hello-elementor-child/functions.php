<?php
if (!defined('ABSPATH')) {
    exit;
}

function hello_elementor_child_enqueue_styles() {
    wp_enqueue_style(
        'hello-elementor-child',
        get_stylesheet_directory_uri() . '/style.css',
        ['hello-elementor'],
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles');

// Include and register Elementor widgets
function include_widgets() {
    require_once(__DIR__ . '/widgets/lumine-posts-grid.php');
    require_once(__DIR__ . '/widgets/lumine-hero-image.php');
    require_once(__DIR__ . '/widgets/lumine-featured-section.php');
}
add_action('elementor/widgets/widgets_registered', 'include_widgets');

function register_lumine_widgets($widgets_manager) {
    $widgets_manager->register(new \Elementor\Lumine_Posts_Grid_Widget());
    $widgets_manager->register(new \Elementor\Lumine_Hero_Image_Widget());
    $widgets_manager->register(new \Elementor\Lumine_Featured_Section_Widget());
}
add_action('elementor/widgets/register', 'register_lumine_widgets');

// Add custom Elementor sections
function add_elementor_sections($elements_manager) {
    \Elementor\Plugin::instance()->elements_manager->add_category(
        'lumine',
        [
            'title' => esc_html__('Lumine Elements', 'hello-elementor-child'),
            'icon' => 'fa fa-university',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'add_elementor_sections');

/**
 * Shortcode to display number of university programs
 * For demo purposes, generates a random number between 30-50
 * In production, this would query and count a custom post type
 */
function lumine_university_count_shortcode($atts) {
    // Parse attributes
    $atts = shortcode_atts(array(
        'min' => 30,
        'max' => 50
    ), $atts);

    // Generate random number for demo
    $count = rand($atts['min'], $atts['max']);

    return $count;
}
add_shortcode('university_count', 'lumine_university_count_shortcode');

/**
 * Usage example in template:
 * Collaboration Among [university_count] Catholic University Programs
 * 
 * Optional parameters:
 * [university_count min="25" max="45"]
 */
