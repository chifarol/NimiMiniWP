<!DOCTYPE html>
<html lang="en" <?php language_attributes() ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title() ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <?php wp_head() ?>
</head>

<body <?php body_class("tw-bg-[#F8F7F1] tw-font-mont tw-border-purple8 tw-border-[2px]") ?>>

    <?php 
    require_once("classes/ThemeMenus.php");
    require_once("classes/Categories.php");
get_template_part("/template-parts/header/topbar");
get_template_part("/template-parts/header/nav");
 ?>