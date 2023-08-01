<?php 
$menu_class     = new \Nimimini\Theme_Menus();
$header_menu_id = $menu_class->get_menu_id( 'nimimini-header-menu' );
$header_menus   = wp_get_nav_menu_items( $header_menu_id );


//  print_r($header_menus)
 // print_r(get_registered_nav_menus())
 ?>

<div class="tw-h-[4rem] tw-grow tw-flex tw-items-center tw-justify-center tw-gap-[.5rem] w-w-full tw-brder-purple8 tw-brder-b-[2px] tw-px-[1rem] tw-whitespace-nowrap md:tw-h-[3rem] md:tw-gap-[.5rem] md:tw-p-[3rem] md:tw-hidden"
    x-data="{ 
        activeNav: '',
        activeArray: [] }">


    <?php  
   if ( ! empty( $header_menus ) && is_array( $header_menus ) ):
   foreach ($header_menus as $header_menu) :
    $menu_item_id =  $header_menu->ID;
    $menu_item_parent_id =  $header_menu->menu_item_parent;


    if($menu_item_parent_id === "0" && $menu_class->hasChildren($menu_item_id,$header_menus)):
    ?>
    <div class="tw-relative pointer">
        <!-- menu title -->
        <div class="tw-pl-[.5rem] tw-text-16 tw-font-medium md:tw-text-14"
            @click="activeNav='<?php  echo $header_menu->ID ?>';console.log(activeNav)">
            <?php  echo $header_menu->title ?></div>

        <!-- dropdown -->
        <div class="tw-absolute tw-z-[5] tw-left-[50%] tw-translate-x-[-50%] tw-top-[36px] tw-mx-[auto] tw-min-w-[300px] tw-bg-ivory1 tw-transition-[max-height] tw-duration-[6000] tw-border-purple8 tw-border-[2px] tw-p-[1rem] tw-text-16 tw-font-medium  pointer md:tw-min-w-[120px]"
            style="display:none" x-show="activeNav  == <?php  echo $header_menu->ID ?>"
            @mousedown.outside="activeNav=''">
            <div class="tw-relative">
                <div class="tw-absolute tw-left-[50%] tw-translate-x-[-50%] tw-top-[-28px] tw-z-[6]">
                    <img src="<?php  echo get_template_directory_uri().'/assets/images/pointer_triangle_top.svg'; ?>"
                        alt="" class="">
                </div>
            </div>
            <div class="tw-flex tw-flex-col hide-border-t-first">
                <?php 
            $menu_class->display_children($menu_item_id,$header_menus);
            ?>
            </div>
        </div>
    </div>
    <?php 
    elseif($menu_item_parent_id === "0" && !$menu_class->hasChildren($menu_item_id,$header_menus)):
        ?>
    <div class="tw-text-16 tw-font-medium md:tw-text-14 pointer">
        <a href="<?php  echo $header_menu->url ?>" class="tw-pl-[.5rem]"><?php  echo $header_menu->title ?></a>
    </div>
    <?php  
    endif;
    endforeach;
    endif;
    ?>

</div>