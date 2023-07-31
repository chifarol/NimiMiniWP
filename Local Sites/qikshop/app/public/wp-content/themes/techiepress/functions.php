<?php
require_once("classes/ThemeSetup.php");
require_once("classes/ThemeMenus.php");
require_once("classes/TemplateEdits.php");

use Nimimini\ThemeSetup as ThemeSetup;
use Nimimini\Theme_Menus as Theme_Menus;
use Nimimini\TemplateEdits as TemplateEdits;

if(class_exists('WooCommerce')){
new ThemeSetup();
new Theme_Menus();
new TemplateEdits();
}




// Disabling WooCommerce styles
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );