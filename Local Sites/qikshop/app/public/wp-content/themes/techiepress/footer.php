<?php 
$menu_class     = new \Nimimini\Theme_Menus();
$footer1_menu_id = $menu_class->get_menu_id( 'nimimini-footer1-menu' );
$footer2_menu_id = $menu_class->get_menu_id( 'nimimini-footer2-menu' );
$footer3_menu_id = $menu_class->get_menu_id( 'nimimini-footer3-menu' );
$footer1_menus   = wp_get_nav_menu_items( $footer1_menu_id );
$footer2_menus   = wp_get_nav_menu_items( $footer2_menu_id );
$footer3_menus   = wp_get_nav_menu_items( $footer3_menu_id );

//  print_r($menuPseudoObject)
 // print_r(get_registered_nav_menus())
 ?>

<div class="tw-w-full tw-flex tw-gap-[1rem] tw-w-full tw-border-purple8 tw-border-t-[2px]">
    <div class="tw-p-[3.5rem_4.5rem] tw-flex tw-gap-[2rem] tw-grow">
        <!-- footer1 -->
        <div class="tw-flex tw-flex-col tw-gap-[.125rem]">
            <?php  
        if ( ! empty( $footer1_menus ) && is_array( $footer1_menus ) ):
            ?>
            <h4 class="tw-font-semiBold tw-uppercase tw-mb-[.35rem]">
                <?php  echo wp_get_nav_menu_object($footer1_menu_id)->name ?></h4>
            <?php  
            
            foreach ($footer1_menus as $footer1_menu) :
                $menu_item_id =  $footer1_menu->ID;
                $menu_item_parent_id =  $footer1_menu->menu_item_parent;


                if($menu_item_parent_id === "0"):
                ?>
            <a href="<?php echo $footer1_menu->url ?>" class="tw-text-14"><?php  echo $footer1_menu->title ?></a>

            <?php  
                endif;
                endforeach;
                endif;
                ?>
        </div>

        <!-- footer2 -->
        <div class="tw-flex tw-flex-col tw-gap-[.125rem]">
            <?php  
        if ( ! empty( $footer2_menus ) && is_array( $footer2_menus ) ):
            ?>
            <h4 class="tw-font-semiBold tw-uppercase tw-mb-[.35rem]">
                <?php  echo wp_get_nav_menu_object($footer2_menu_id)->name ?></h4>
            <?php  
            
            foreach ($footer2_menus as $footer2_menu) :
                $menu_item_id =  $footer2_menu->ID;
                $menu_item_parent_id =  $footer2_menu->menu_item_parent;


                if($menu_item_parent_id === "0"):
                ?>
            <a href="<?php echo $footer2_menu->url ?>" class="tw-text-14"><?php  echo $footer2_menu->title ?></a>

            <?php  
                endif;
                endforeach;
                endif;
                ?>
        </div>

        <!-- footer3 -->
        <div class="tw-flex tw-flex-col tw-gap-[.125rem]">
            <?php  
            if ( ! empty( $footer3_menus ) && is_array( $footer3_menus ) ):
            ?>
            <h4 class="tw-font-semiBold tw-uppercase tw-mb-[.35rem]">
                <?php  echo wp_get_nav_menu_object($footer3_menu_id)->name ?></h4>
            <?php  
            foreach ($footer3_menus as $footer3_menu) :
                $menu_item_id =  $footer3_menu->ID;
                $menu_item_parent_id =  $footer3_menu->menu_item_parent;


                if($menu_item_parent_id === "0"):
                ?>
            <a href="<?php echo $footer3_menu->url ?>" class="tw-text-14"><?php  echo $footer3_menu->title ?></a>

            <?php  
                endif;
                endforeach;
                endif;
                ?>
        </div>
    </div>
    <div
        class="tw-w-full tw-max-w-[300px] tw-px-[2rem] tw-flex tw-flex-col tw-justify-center tw-border-purple8 tw-border-l-[2px] tw-text-right tw-p-[3.5rem_4.5rem]">
        <h3 class="tw-font-morphend tw-text-32"><?php  echo bloginfo("name") ?></h3>
        <p class="tw-text-14">© 2023 All rights reserved.</p>
    </div>

</div>

<div class="tw">

</div>
<?php wp_footer() ?>
</body>

</html>