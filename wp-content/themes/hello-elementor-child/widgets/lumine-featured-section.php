<?php
namespace Elementor;

class Lumine_Featured_Section_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'lumine_featured_section';
    }

    public function get_title()
    {
        return __('Lumine Featured Section', 'hello-elementor-child');
    }

    public function get_icon()
    {
        return 'eicon-featured-image';
    }

    public function get_categories()
    {
        return ['lumine'];
    }

    protected function register_controls()
    {
        // Image Section
        $this->start_controls_section(
            'section_image',
            [
                'label' => __('Image', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'hello-elementor-child'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image',
                'default' => 'large',
            ]
        );

        $this->end_controls_section();

        // Card Section
        $this->start_controls_section(
            'section_card',
            [
                'label' => __('Card Content', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'card_title',
            [
                'label' => __('Title', 'hello-elementor-child'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Network', 'hello-elementor-child'),
            ]
        );

        $this->add_control(
            'card_content',
            [
                'label' => __('Content', 'hello-elementor-child'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'hello-elementor-child'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'hello-elementor-child'),
                'type' => Controls_Manager::TEXT,
                'default' => __('OUR MISSION', 'hello-elementor-child'),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'hello-elementor-child'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'hello-elementor-child'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'hello-elementor-child'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => __('Layout', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'image-left',
                'options' => [
                    'image-left' => __('Image Left', 'hello-elementor-child'),
                    'image-right' => __('Image Right', 'hello-elementor-child'),
                ],
                'prefix_class' => 'lumine-featured-layout-',
            ]
        );

        $this->end_controls_section();

        // Style Tab - Image
        $this->start_controls_section(
            'section_style_image',
            [
                'label' => __('Image', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __('Image Width', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 980,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-image img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __('Image Height', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 560,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-image img' => 'height: {{SIZE}}{{UNIT}}; object-fit: cover;',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_offset_x',
            [
                'label' => __('Image Horizontal Offset', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-image' => 'transform: translate({{SIZE}}{{UNIT}}, {{image_offset_y.SIZE}}{{image_offset_y.UNIT}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_offset_y',
            [
                'label' => __('Image Vertical Offset', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-image' => 'transform: translate({{image_offset_x.SIZE}}{{image_offset_x.UNIT}}, {{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .lumine-featured-image img',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', 'hello-elementor-child'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Card
        $this->start_controls_section(
            'section_style_card',
            [
                'label' => __('Card', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => __('Background Color', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'default' => '#F7D37F',
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-card' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => __('Padding', 'hello-elementor-child'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '30',
                    'right' => '30',
                    'bottom' => '30',
                    'left' => '30',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .lumine-featured-card',
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => __('Border Radius', 'hello-elementor-child'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Card Content Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_content_typography',
                'label' => __('Content Typography', 'hello-elementor-child'),
                'selector' => '{{WRAPPER}} .lumine-featured-card-content',
            ]
        );

        $this->end_controls_section();

        // Style Tab - Button
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => __('Button', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .lumine-featured-button',
            ]
        );

        $this->add_responsive_control(
            'button_width',
            [
                'label' => __('Button Width', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 178,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_height',
            [
                'label' => __('Button Height', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 41,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-button' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}; padding: 0;',
                ],
            ]
        );

        $this->start_controls_tabs('button_styles');

        $this->start_controls_tab(
            'button_normal',
            [
                'label' => __('Normal', 'hello-elementor-child'),
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => __('Background Color', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'default' => '#C0392B',
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover',
            [
                'label' => __('Hover', 'hello-elementor-child'),
            ]
        );

        $this->add_control(
            'button_background_color_hover',
            [
                'label' => __('Background Color', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'default' => '#A93226',
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __('Text Color Hover', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'hello-elementor-child'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'hello-elementor-child'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '64',
                    'right' => '64',
                    'bottom' => '64',
                    'left' => '64',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Divider
        $this->start_controls_section(
            'section_style_divider',
            [
                'label' => __('Divider', 'hello-elementor-child'),
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
                    '{{WRAPPER}} .lumine-featured-card:before' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .lumine-featured-card:before' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .lumine-featured-card:before' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .lumine-featured-card:before' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab - Title
        $this->start_controls_section(
            'section_style_title',
            [
                'label' => __('Title', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_title_color',
            [
                'label' => __('Title Color', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'default' => '#0B3455',
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-card-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'section_layout',
            [
                'label' => __('Layout', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'card_position',
            [
                'label' => __('Card Position', 'hello-elementor-child'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'hello-elementor-child'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __('Right', 'hello-elementor-child'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'right',
                'prefix_class' => 'lumine-card-position-',
            ]
        );

        $this->add_responsive_control(
            'card_width',
            [
                'label' => __('Card Width', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 200,
                        'max' => 800,
                    ],
                    '%' => [
                        'min' => 20,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 445,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-card' => 'width: {{SIZE}}{{UNIT}}; height: 391px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_overlap',
            [
                'label' => __('Card Overlap', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -400,
                        'max' => 0,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => -100,
                ],
                'selectors' => [
                    '{{WRAPPER}}.lumine-card-position-right .lumine-featured-card' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.lumine-card-position-left .lumine-featured-card' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_offset_x',
            [
                'label' => __('Card Horizontal Offset', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-card' => 'transform: translate({{SIZE}}{{UNIT}}, {{card_offset_y.SIZE}}{{card_offset_y.UNIT}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_offset_y',
            [
                'label' => __('Card Vertical Offset', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-card' => 'transform: translate({{card_offset_x.SIZE}}{{card_offset_x.UNIT}}, {{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_section();

        // Responsive Controls Section
        $this->start_controls_section(
            'section_responsive',
            [
                'label' => __('Responsive Settings', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'mobile_card_width',
            [
                'label' => __('Card Width (Mobile/Tablet)', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range' => [
                    '%' => [
                        'min' => 50,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 200,
                        'max' => 800,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 90,
                ],
                'selectors' => [
                    '(tablet) {{WRAPPER}} .lumine-featured-card' => 'width: {{SIZE}}{{UNIT}} !important;',
                    '(mobile) {{WRAPPER}} .lumine-featured-card' => 'width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_spacing',
            [
                'label' => __('Vertical Spacing', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '(tablet) {{WRAPPER}} .lumine-featured-card' => 'margin-top: {{SIZE}}{{UNIT}};',
                    '(mobile) {{WRAPPER}} .lumine-featured-card' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Responsive Layout Section
        $this->start_controls_section(
            'section_responsive_layout',
            [
                'label' => __('Responsive Layout', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stack_on_mobile',
            [
                'label' => __('Stack on Mobile', 'hello-elementor-child'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'prefix_class' => 'lumine-stack-mobile-',
            ]
        );

        $this->add_responsive_control(
            'content_alignment',
            [
                'label' => __('Content Alignment', 'hello-elementor-child'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'hello-elementor-child'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'hello-elementor-child'),
                        'icon' => 'eicon-text-align-center',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-card' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => __('Section Padding', 'hello-elementor-child'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-mobile .mobile-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '40',
                    'right' => '20',
                    'bottom' => '40',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->add_responsive_control(
            'spacing_between',
            [
                'label' => __('Spacing Between Elements', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-featured-mobile .mobile-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
                <style>
                    /* Base styles */
                    .lumine-featured-section {
                        position: relative;
                        width: 100%;
                    }

                    .lumine-featured-card {
                        background: none;
                    }

                    /* Desktop styles */
                    @media (min-width: 1025px) {
                        .lumine-featured-mobile {
                            display: none;
                        }
                    }

                    /* Mobile & Tablet styles */
                    @media (max-width: 1024px) {

                        /* Reset parent containers */
                        .elementor-section.elementor-section-boxed>.elementor-container {
                            max-width: none !important;
                            padding: 0 !important;
                            margin: 0 !important;
                            width: 100% !important;
                        }

                        .elementor-widget-lumine_featured_section {
                            margin: 0 !important;
                            padding: 0 !important;
                            width: 100% !important;
                        }

                        /* Force background rendering */
                        .elementor-section {
                            background-size: cover !important;
                            background-position: center !important;
                            background-repeat: no-repeat !important;
                        }

                        /* Hide desktop version */
                        .lumine-featured-section:not(.lumine-featured-mobile) {
                            display: none;
                        }

                        /* Mobile section container */
                        .lumine-featured-mobile {
                            width: 100%;
                            background: transparent;
                            position: relative;
                            z-index: 1;
                        }

                        /* Content wrapper */
                        .lumine-featured-mobile .mobile-container {
                            width: 90%;
                            max-width: 540px;
                            margin: 0 auto;
                            padding: 40px 0;
                            position: relative;
                            z-index: 2;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            gap: 30px;
                        }

                        /* Image styling */
                        .lumine-featured-mobile .mobile-image {
                            width: 100%;
                            max-width: 480px;
                            position: relative;
                            z-index: 2;
                        }

                        .lumine-featured-mobile .mobile-image img {
                            width: 100%;
                            height: auto;
                            display: block;
                            border-radius: 4px;
                        }

                        /* Card styling */
                        .lumine-featured-mobile .lumine-featured-card {
                            width: 100%;
                            max-width: 480px;
                            background: var(--e-global-color-secondary, #F7D37F);
                            padding: 35px 25px;
                            border-radius: 8px;
                            text-align: center;
                            position: relative;
                            z-index: 2;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                        }

                        .lumine-featured-mobile .lumine-featured-card-title {
                            font-size: 24px;
                            line-height: 1.3;
                            margin-bottom: 15px;
                            width: 100%;
                        }

                        .lumine-featured-mobile .lumine-featured-card-content {
                            margin-bottom: 25px;
                            width: 100%;
                            max-width: 400px;
                        }

                        .lumine-featured-mobile .lumine-featured-button {
                            display: inline-block;
                            padding: 12px 35px;
                            border-radius: 50px;
                            background: var(--e-global-color-accent, #C0392B);
                            color: #fff;
                            text-decoration: none;
                            text-align: center;
                            min-width: 160px;
                        }
                    }

                    /* Small mobile adjustments */
                    @media (max-width: 767px) {
                        .lumine-featured-mobile .mobile-container {
                            width: 92%;
                            padding: 30px 0;
                            gap: 24px;
                        }
                    }
                </style>

                <!-- Desktop Version -->
                <div class="lumine-featured-section">
                    <?php $this->render_desktop_layout($settings); ?>
                </div>

                <!-- Mobile Version -->
                <div class="lumine-featured-mobile lumine-featured-section" data-layout="<?php echo esc_attr($settings['layout']); ?>">
                    <div class="mobile-container">
                        <div class="lumine-featured-card">
                            <?php $this->render_card_content($settings); ?>
                        </div>
                        <div class="mobile-image">
                            <?php if (!empty($settings['image']['url'])): ?>
                                    <img src="<?php echo esc_url($settings['image']['url']); ?>"
                                        alt="<?php echo esc_attr($settings['card_title']); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
    }

    // Helper function to render card content
    protected function render_card_content($settings)
    {
        ?>
                <div class="lumine-featured-card-content-wrapper">
                    <?php if (!empty($settings['card_title'])): ?>
                            <h2 class="lumine-featured-card-title elementor-heading-title elementor-size-default">
                                <?php echo esc_html($settings['card_title']); ?>
                            </h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['card_content'])): ?>
                            <div class="lumine-featured-card-content elementor-widget-container">
                                <?php echo wp_kses_post($settings['card_content']); ?>
                            </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['button_text'])): ?>
                            <a class="lumine-featured-button" href="<?php echo esc_url($settings['button_link']['url']); ?>" <?php echo $settings['button_link']['is_external'] ? 'target="_blank"' : ''; ?>                         <?php echo $settings['button_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                <?php echo esc_html($settings['button_text']); ?>
                            </a>
                    <?php endif; ?>
                </div>
                <?php
    }

    // Helper function to render desktop layout
    protected function render_desktop_layout($settings)
    {
        // Move existing desktop layout code here
        if ($settings['layout'] === 'image-right') {
            $this->render_right_layout($settings);
        } else {
            $this->render_left_layout($settings);
        }
    }

    // Helper function for right layout
    protected function render_right_layout($settings)
    {
        ?>
                <div class="lumine-featured-card">
                    <?php $this->render_card_content($settings); ?>
                </div>
                <div class="lumine-featured-image">
                    <?php if (!empty($settings['image']['url'])): ?>
                            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['card_title']); ?>">
                    <?php endif; ?>
                </div>
                <?php
    }

    // Helper function for left layout
    protected function render_left_layout($settings)
    {
        ?>
                <div class="lumine-featured-image">
                    <?php if (!empty($settings['image']['url'])): ?>
                            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['card_title']); ?>">
                    <?php endif; ?>
                </div>
                <div class="lumine-featured-card">
                    <?php $this->render_card_content($settings); ?>
                </div>
                <?php
    }
}
