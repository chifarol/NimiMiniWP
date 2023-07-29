<?php
require_once("classes/ThemeSetup.php");
require_once("classes/ThemeMenus.php");
use Nimimini\ThemeSetup as ThemeSetup;
use Nimimini\Theme_Menus as Theme_Menus;


new ThemeSetup();
new Theme_Menus();




// Disabling WooCommerce styles
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );