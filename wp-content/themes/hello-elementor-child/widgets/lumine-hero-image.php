<?php
namespace Elementor;

class Lumine_Hero_Image_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'lumine_hero_image';
    }

    public function get_title()
    {
        return __('Lumine Hero Image', 'hello-elementor-child');
    }

    public function get_icon()
    {
        return 'eicon-image-before-after';
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
                'dynamic' => [
                    'active' => true,
                ],
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
                'separator' => 'none',
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'hello-elementor-child'),
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
                    'right' => [
                        'title' => __('Right', 'hello-elementor-child'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Image Style Section
        $this->start_controls_section(
            'section_image_style',
            [
                'label' => __('Image Style', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __('Image Width', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'vw' => [
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
                    '{{WRAPPER}} .lumine-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_max_width',
            [
                'label' => __('Image Max Width', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-image' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __('Image Height', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-image img' => 'height: {{SIZE}}{{UNIT}}; object-fit: cover;',
                ],
            ]
        );

        $this->add_control(
            'image_fit',
            [
                'label' => __('Object Fit', 'hello-elementor-child'),
                'type' => Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => __('Cover', 'hello-elementor-child'),
                    'contain' => __('Contain', 'hello-elementor-child'),
                    'fill' => __('Fill', 'hello-elementor-child'),
                    'none' => __('None', 'hello-elementor-child'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-image img' => 'object-fit: {{VALUE}};',
                ],
                'condition' => [
                    'image_height[size]!' => '',
                ],
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-image img' => 'border-radius: {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} 0 0;',
                    '{{WRAPPER}} .lumine-hero-arc.arc1, {{WRAPPER}} .lumine-hero-arc.arc2' => 'border-radius: {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} 0 0;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'selector' => '{{WRAPPER}} .lumine-image img',
            ]
        );

        $this->add_control(
            'image_position_heading',
            [
                'label' => __('Image Position', 'hello-elementor-child'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'image_offset_x',
            [
                'label' => __('Horizontal Offset', 'hello-elementor-child'),
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
                    '{{WRAPPER}} .lumine-image' => 'transform: translate({{SIZE}}{{UNIT}}, {{image_offset_y.SIZE}}{{image_offset_y.UNIT}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_offset_y',
            [
                'label' => __('Vertical Offset', 'hello-elementor-child'),
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
                    '{{WRAPPER}} .lumine-image' => 'transform: translate({{image_offset_x.SIZE}}{{image_offset_x.UNIT}}, {{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_rotation',
            [
                'label' => __('Rotation', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-image' => 'transform: translate({{image_offset_x.SIZE}}{{image_offset_x.UNIT}}, {{image_offset_y.SIZE}}{{image_offset_y.UNIT}}) rotate({{SIZE}}deg);',
                ],
            ]
        );

        $this->add_control(
            'image_z_index',
            [
                'label' => __('Z-Index', 'hello-elementor-child'),
                'type' => Controls_Manager::NUMBER,
                'min' => -10,
                'max' => 10,
                'step' => 1,
                'default' => 1,
                'selectors' => [
                    '{{WRAPPER}} .lumine-image' => 'z-index: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Frame Style Section
        $this->start_controls_section(
            'section_frame_style',
            [
                'label' => __('Frame Style', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'frame_background',
            [
                'label' => __('Frame Background', 'hello-elementor-child'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lumine-frame' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'frame_border',
                'selector' => '{{WRAPPER}} .lumine-frame',
            ]
        );

        $this->end_controls_section();

        // Arc Style Section
        $this->start_controls_section(
            'section_arc_style',
            [
                'label' => __('Arc Styles', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arc_opacity',
            [
                'label' => __('Arcs Opacity', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'arc_blend_mode',
            [
                'label' => __('Blend Mode', 'hello-elementor-child'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'normal' => __('Normal', 'hello-elementor-child'),
                    'multiply' => __('Multiply', 'hello-elementor-child'),
                    'screen' => __('Screen', 'hello-elementor-child'),
                    'overlay' => __('Overlay', 'hello-elementor-child'),
                    'darken' => __('Darken', 'hello-elementor-child'),
                    'lighten' => __('Lighten', 'hello-elementor-child'),
                ],
                'default' => 'normal',
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc' => 'mix-blend-mode: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Arc Controls Section
        $this->start_controls_section(
            'section_arcs',
            [
                'label' => __('Arc Settings', 'hello-elementor-child'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Arc 1 Controls
        $this->add_control(
            'arc1_color',
            [
                'label' => __('Arc 1 Color', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FF6B6B',
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc.arc1' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arc1_width',
            [
                'label' => __('Arc 1 Width', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc.arc1' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'arc1_rotation',
            [
                'label' => __('Arc 1 Rotation', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc.arc1' => 'transform: rotate({{SIZE}}deg) translate({{arc1_offset_x.SIZE}}{{arc1_offset_x.UNIT}}, {{arc1_offset_y.SIZE}}{{arc1_offset_y.UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'arc1_offset_x',
            [
                'label' => __('Arc 1 Horizontal Offset', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
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
                    '{{WRAPPER}} .lumine-hero-arc.arc1' => 'transform: rotate({{arc1_rotation.SIZE}}deg) translate({{SIZE}}{{UNIT}}, {{arc1_offset_y.SIZE}}{{arc1_offset_y.UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'arc1_offset_y',
            [
                'label' => __('Arc 1 Vertical Offset', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
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
                    '{{WRAPPER}} .lumine-hero-arc.arc1' => 'transform: rotate({{arc1_rotation.SIZE}}deg) translate({{arc1_offset_x.SIZE}}{{arc1_offset_x.UNIT}}, {{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'arc1_size',
            [
                'label' => __('Arc 1 Size', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc.arc1' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Arc 2 Controls
        $this->add_control(
            'arc2_color',
            [
                'label' => __('Arc 2 Color', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4ECDC4',
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc.arc2' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arc2_width',
            [
                'label' => __('Arc 2 Width', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc.arc2' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'arc2_rotation',
            [
                'label' => __('Arc 2 Rotation', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -180,
                        'max' => 180,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc.arc2' => 'transform: rotate({{SIZE}}deg) translate({{arc2_offset_x.SIZE}}{{arc2_offset_x.UNIT}}, {{arc2_offset_y.SIZE}}{{arc2_offset_y.UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'arc2_offset_x',
            [
                'label' => __('Arc 2 Horizontal Offset', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
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
                    '{{WRAPPER}} .lumine-hero-arc.arc2' => 'transform: rotate({{arc2_rotation.SIZE}}deg) translate({{SIZE}}{{UNIT}}, {{arc2_offset_y.SIZE}}{{arc2_offset_y.UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'arc2_offset_y',
            [
                'label' => __('Arc 2 Vertical Offset', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
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
                    '{{WRAPPER}} .lumine-hero-arc.arc2' => 'transform: rotate({{arc2_rotation.SIZE}}deg) translate({{arc2_offset_x.SIZE}}{{arc2_offset_x.UNIT}}, {{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'arc2_size',
            [
                'label' => __('Arc 2 Size', 'hello-elementor-child'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 200,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-hero-arc.arc2' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Logo Section
        $this->start_controls_section(
            'section_logo',
            [
                'label' => __('Logo', 'hello-elementor-child'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => __('Choose Logo', 'hello-elementor-child'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'logo_size',
            [
                'label' => __('Logo Size', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 40,
                        'max' => 150,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-logo' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'logo_offset_x',
            [
                'label' => __('Logo Offset X', 'hello-elementor-child'),
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
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-logo' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.lumine-frame-bottom-right .lumine-logo, {{WRAPPER}}.lumine-frame-top-right .lumine-logo' => 'margin-right: {{SIZE}}{{UNIT}}; margin-left: 0;',
                ],
            ]
        );

        $this->add_control(
            'logo_offset_y',
            [
                'label' => __('Logo Offset Y', 'hello-elementor-child'),
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
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-logo' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.lumine-frame-top-left .lumine-logo, {{WRAPPER}}.lumine-frame-top-right .lumine-logo' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: 0;',
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

        // Tablet Arc Scale
        $this->add_responsive_control(
            'arc_scale_tablet',
            [
                'label' => __('Arc Scale (Tablet)', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0.1,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 0.8,
                ],
                'tablet_default' => [
                    'size' => 0.8,
                ],
                'selectors' => [
                    '(tablet) {{WRAPPER}} .lumine-hero-arc' => 'transform: scale({{SIZE}});',
                ],
            ]
        );

        // Mobile Arc Scale
        $this->add_responsive_control(
            'arc_scale_mobile',
            [
                'label' => __('Arc Scale (Mobile)', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0.1,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 0.6,
                ],
                'mobile_default' => [
                    'size' => 0.6,
                ],
                'selectors' => [
                    '(mobile) {{WRAPPER}} .lumine-hero-arc' => 'transform: scale({{SIZE}});',
                ],
            ]
        );

        // Image Container Width
        $this->add_responsive_control(
            'image_container_width',
            [
                'label' => __('Image Container Width', 'hello-elementor-child'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range' => [
                    '%' => [
                        'min' => 50,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 200,
                        'max' => 1200,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .lumine-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (empty($settings['image']['url'])) {
            return;
        }

        $this->add_render_attribute('wrapper', 'class', 'lumine-image-wrapper');
        $this->add_render_attribute('image', 'class', 'lumine-image');
        ?>
        <style>
            /* Base responsive container styles */
            .lumine-image-wrapper {
                position: relative;
                width: 100%;
                max-width: 100%;
            }

            /* Tablet Styles */
            @media (max-width: 1024px) {
                .lumine-image-wrapper {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                .lumine-image {
                    width: 100%;
                    max-width: 100%;
                    margin: 0 auto;
                }

                .lumine-hero-arc {
                    transform-origin: center;
                    /* Scale arcs slightly down for tablets */
                    transform: scale(0.8);
                }

                .lumine-frame {
                    position: relative;
                    margin-top: 20px;
                }
            }

            /* Mobile Styles */
            @media (max-width: 767px) {
                .lumine-image-wrapper {
                    padding: 20px;
                }

                .lumine-image {
                    width: 100%;
                    margin: 0 auto;
                }

                .lumine-hero-arc {
                    /* Scale arcs down more for mobile */
                    transform: scale(0.6);
                }

                .lumine-frame {
                    margin-top: 15px;
                }

                /* Ensure arcs don't overflow on mobile */
                .lumine-hero-arcs {
                    overflow: hidden;
                    width: 100%;
                    position: relative;
                }
            }

            /* Maintain existing desktop styles */
            @media (min-width: 1025px) {
                .lumine-image-wrapper {
                    display: block;
                }
            }
        </style>
        <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
            <div <?php echo $this->get_render_attribute_string('image'); ?>>
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'image'); ?>
            </div>

            <div class="lumine-hero-arcs">
                <div class="lumine-hero-arc arc1"></div>
                <div class="lumine-hero-arc arc2"></div>
            </div>

            <?php if (!empty($settings['logo']['url'])): ?>
                <div class="lumine-frame">
                    <div class="lumine-logo">
                        <img src="<?php echo esc_url($settings['logo']['url']); ?>" alt="Logo">
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}
