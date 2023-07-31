<?php 

 
Namespace Nimimini;

class ThemeSetup{
    public function __construct(){
        $this->setup_hooks();
        // $this->register_menus();
    }
    public function setup_hooks(){
        add_action("after_setup_theme",[$this,'theme_supports']);
        add_action("after_setup_theme",[$this,'set_content_width']);
        add_action("wp_enqueue_scripts",[$this,'enqueue_scripts']);
    }

    function set_content_width(){
        if ( ! isset( $content_width ) ) {
            $content_width = 600;
        }
    }

    function theme_supports(){
        add_theme_support("title-tag");
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-background' );
        add_theme_support( 'custom-header',[
            'default-image'      => get_template_directory_uri() . 'assets/images/header1.png',
            'default-text-color' => '000',
            'width'              => 1440,
            'height'             => 700,
            'flex-width'         => true,
            'flex-height'        => true,
        ] );
        add_theme_support( 'custom-logo', array(
            'height'               => 200,
            'width'                => 200,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => ['site-title', 'site-description'],
            'unlink-homepage-logo' => true,
        ) );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 255,
			'single_image_width'	=> 255,
			'product_grid' 			=> array(
	            'default_rows'    => 10,
	            'min_rows'        => 5,
	            'max_rows'        => 10,
	            'default_columns' => 4,
	            'min_columns'     =>2,
	            'max_columns'     => 4,				
			)
		) );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
    }
    function enqueue_scripts() {
        // wp_enqueue_style( 'tailwind-flowbite-css', 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css' );
        wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri().'/assets/css/tailwind.css' );
        wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri().'/assets/css/custom.css' );
        wp_enqueue_style( 'custom-woocommerce-css', get_stylesheet_directory_uri().'/assets/css/custom-woocommerce.css' );
        wp_enqueue_style( 'custom-sass', get_stylesheet_directory_uri().'/assets/css/custom-sass.css' );
        wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri().'/assets/js/custom.js', [], '1.0.0', true );
        wp_enqueue_script( 'alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', [], '1.0.0', true );
        // wp_enqueue_script( 'tailwind-flowbite-js', 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js', [], '1.0.0', true );
    }
    
}

// enqueue scripts & styles



?>