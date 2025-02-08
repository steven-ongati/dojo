<?php
namespace Elementor;

class Lumine_Posts_Grid_Widget extends Widget_Base {

    public function get_name() {
        return 'lumine_posts_grid';
    }

    public function get_title() {
        return __('Lumine Posts Grid', 'hello-elementor-child');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['lumine'];
    }

    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content Settings', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'hello-elementor-child'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'min' => 1,
                'max' => 12,
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => __('Category', 'hello-elementor-child'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_post_categories(),
                'multiple' => false,
            ]
        );

        $this->end_controls_section();

        // Style Section - Card
        $this->start_controls_section(
            'section_card_style',
            [
                'label' => __('Card Style', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'label' => __('Box Shadow', 'hello-elementor-child'),
                'selector' => '{{WRAPPER}} .lumine-post-card',
            ]
        );

        $this->add_control(
            'content_background_color',
            [
                'label' => __('Content Background Color', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'default' => '#F7D37F',
                'selectors' => [
                    '{{WRAPPER}} .lumine-post-content' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_border_radius',
            [
                'label' => __('Border Radius', 'hello-elementor-child'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .lumine-post-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '8',
                    'right' => '8',
                    'bottom' => '8',
                    'left' => '8',
                    'unit' => 'px',
                ],
            ]
        );

        $this->add_control(
            'card_dimensions',
            [
                'label' => __('Card Dimensions', 'hello-elementor-child'),
                'type' => Controls_Manager::HIDDEN,
                'default' => 'fixed',
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'hello-elementor-child'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .lumine-post-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
            ]
        );

        $this->add_control(
            'grid_layout',
            [
                'label' => __('Grid Layout', 'hello-elementor-child'),
                'type' => Controls_Manager::HIDDEN,
                'default' => 'fixed',
                'selectors' => [
                    '{{WRAPPER}} .lumine-posts-grid' => 'display: grid; grid-template-columns: repeat(auto-fill, 376px); gap: 20px; justify-content: center;',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Divider
        $this->start_controls_section(
            'section_divider_style',
            [
                'label' => __('Divider Style', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'divider_color',
            [
                'label' => __('Color', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'default' => '#0B3455',
                'selectors' => [
                    '{{WRAPPER}} .lumine-post-content:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'divider_width',
            [
                'label' => __('Width', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-post-content:before' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'divider_height',
            [
                'label' => __('Height', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-post-content:before' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'divider_spacing',
            [
                'label' => __('Top Spacing', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-post-content:before' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'divider_position',
            [
                'label' => __('Position', 'hello-elementor-child'),
                'type' => Controls_Manager::HIDDEN,
                'default' => 'relative',
                'selectors' => [
                    '{{WRAPPER}} .lumine-post-content' => 'position: relative;',
                    '{{WRAPPER}} .lumine-post-content:before' => 'content: ""; position: absolute; left: 0;',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Title
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __('Title Style', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'default' => '#0B3455',
                'selectors' => [
                    '{{WRAPPER}} .lumine-post-content h5' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lumine-post-content h5',
            ]
        );

        $this->end_controls_section();
    }

    private function get_post_categories() {
        $categories = get_categories();
        $options = ['all' => __('All Categories', 'hello-elementor-child')];
        
        foreach ($categories as $category) {
            $options[$category->slug] = $category->name;
        }
        
        return $options;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $args = [
            'post_type' => 'post',
            'posts_per_page' => $settings['posts_per_page'],
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ];

        if (!empty($settings['category']) && $settings['category'] !== 'all') {
            $args['category_name'] = $settings['category'];
        }

        $query = new \WP_Query($args);

        if ($query->have_posts()) : ?>
            <style>
                .lumine-posts-grid {
                    display: grid !important;
                    grid-template-columns: repeat(auto-fit, 376px) !important;
                    gap: 52px !important;
                    justify-content: center !important;
                    width: 100% !important;
                }
                .lumine-post-card {
                    width: 376px !important;
                    height: 418px !important;
                }
                .lumine-post-image {
                    width: 376px !important;
                    height: 265px !important;
                    background-size: cover !important;
                    background-position: center !important;
                }
                .lumine-post-content {
                    width: 376px !important;
                    height: 163px !important;
                    background: none;  /* Remove any theme background */
                    position: relative !important;
                }
                .lumine-post-content:before {
                    content: "" !important;
                    position: absolute !important;
                    left: 0 !important;
                    top: 15px !important;
                    width: 100% !important;
                    height: 1px !important;
                    background-color: currentColor !important;
                }
                /* Remove any other potential dividers */
                .lumine-post-content .lumine-post-divider,
                .lumine-post-content:after {
                    display: none !important;
                }
                .lumine-post-content-wrapper {
                    height: 100% !important;
                }
                .lumine-post-content .elementor-heading-title {
                    margin: 0 !important;
                    overflow: hidden !important;
                    display: -webkit-box !important;
                    -webkit-line-clamp: 3 !important;
                    -webkit-box-orient: vertical !important;
                }
            </style>
            <div class="lumine-posts-grid">
                <?php while ($query->have_posts()) : $query->the_post();
                    $image_url = has_post_thumbnail() ? 
                        get_the_post_thumbnail_url(get_the_ID(), 'large') : 
                        plugins_url('assets/placeholder.jpg', __FILE__);
                    ?>
                    <div class="lumine-post-card">
                        <div class="lumine-post-image" style="background-image: url(<?php echo esc_url($image_url); ?>)"></div>
                        <div class="lumine-post-content">
                            <div class="lumine-post-content-wrapper">
                                <h5 class="elementor-heading-title"><?php the_title(); ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php
            wp_reset_postdata();
        endif;
    }
}
