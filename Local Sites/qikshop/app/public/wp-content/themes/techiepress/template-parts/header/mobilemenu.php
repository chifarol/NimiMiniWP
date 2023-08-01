<?php 
$menu_class     = new \Nimimini\Theme_Menus();
$header_menu_id = $menu_class->get_menu_id( 'nimimini-header-menu' );
$header_menus   = wp_get_nav_menu_items( $header_menu_id );
 ?>

<div class="tw-hidden md:tw-block">
    <div class="tw-ml-[auto]" @click="openMenu=!openMenu">
        <img src="" alt=""
            x-bind:src="!openMenu?'<?php  echo get_template_directory_uri().'/assets/images/menu_icon.svg' ?>':'<?php  echo get_template_directory_uri().'/assets/images/cancel.svg' ?>'"
            class="!tw-h-[1.5rem] tw-px-[1rem] pointer">

    </div>
    <div class="tw-absolute tw-left-[0] tw-top-[0] tw-z-[50] tw-min-h-[100vh] tw-w-full tw-max-[100vw] tw-flex tw-flex-col"
        style="display:none" x-show="openMenu">
        <!-- trnasparent menu -->
        <div class="tw-bg-[#000000]/60 tw-h-full tw-grow" @click="openMenu=false"></div>

        <!-- main mobile menu -->

        <div
            class="tw-min-h-[400px] tw-mt-[auto] tw-bg-ivory1 tw-w-full tw-border-purple8 tw-border-t-[1.5px] tw-p-[2rem_1rem]">
            <!-- search form -->
            <div class="tw-mb-[1.5rem] tw-w-full tw-font-medium">
                MENU
            </div>
            <!-- search form -->
            <div class="tw-mb-[1.5rem] tw-w-full">
                <?php  echo get_search_form() ?>
            </div>
            <!-- menu links -->
            <div class="tw-border-purple8 tw-border-[1.5px] tw-p-[2rem_1rem] tw-max-h-[700px] tw-overflow-y-auto"
                x-data="{ 
                activeNav: '',
                activeArray: [] 
            }">

                <?php 
        foreach ($header_menus as $header_menu) :
            $menu_item_id =  $header_menu->ID;
            $menu_item_parent_id =  $header_menu->menu_item_parent;
        
        
            if($menu_item_parent_id === "0" && $menu_class->hasChildren($menu_item_id,$header_menus)):

            $plus_icon_url = get_template_directory_uri().'/assets/images/plus_icon.svg';
            $minus_icon_url = get_template_directory_uri().'/assets/images/minus_icon.svg';
            $hasChildren = $menu_class->hasChildren($header_menu->ID, $header_menus);
            printf(
                "<div class='tw-flex tw-flex-col tw-text-16 tw-brder-purple8 tw-brder-t-[1.5px] tw-w-full ' 
                >	
                <div class='tw-w-full tw-flex tw-items-center tw-gap-[2rem] tw-justify-between tw-py-[.75rem]'
                >
                    %s
                    <div @click='
                    activeArray.includes(%s) ? 
                    activeArray=activeArray.filter(item=>item!==%s) : 
                    activeArray.push(%s);
                    console.log(activeArray)'>
                    %s
                    </div>
                    
                
                </div>
                <div class='tw-flex tw-flex-col tw-pl-[.5rem] nav-h-transition overflow-y-hidden' 
                :class='activeArray.includes(%s) ? 
                `max-h-200` :
                `max-h-0` '
                >
                ",
                "<a href='$header_menu->url' class=''>   $header_menu->title </a>",
                $header_menu->ID,
                $header_menu->ID,
                $header_menu->ID,
                $hasChildren ? "<img src='$plus_icon_url' alt='' class='tw-h-16 pointer' x-bind:src='activeArray.includes($header_menu->ID) ? `$minus_icon_url` : `$plus_icon_url`' >" : "",
                $header_menu->ID,
            );

            $menu_class->display_children($header_menu->ID,$header_menus);

            echo "</div> </div>";

            elseif($menu_item_parent_id === "0" && !$menu_class->hasChildren($menu_item_id,$header_menus)):
                ?>
                <div class="tw-boder-purple8 tw-boder-t-[1.5px] tw-w-full tw-py-[.75rem] pointer">
                    <a href="<?php  echo $header_menu->url ?>" class=""><?php  echo $header_menu->title ?></a>
                </div>
                <?php 
            
            endif;
        endforeach;
            ?>
                <div class="tw tw-py-[.75rem]">
                    <a href="<?php echo wc_get_cart_url(); ?>" class="tw">My Cart</a>
                </div>
                <div class="tw-flex tw-flex-col hide-border-t-first custom-mini-cart">
                    <?php if( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ?>"
                        class="nav-link tw-py-[.75rem]">My Account</a>
                    <a href="<?php echo esc_url( wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ) ?>"
                        class="nav-link  tw-py-[.75rem]">Logout</a>
                    <?php else: ?>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ?>"
                        class="nav-link  tw-py-[.75rem]">Login / Register</a>
                    <?php endif; ?>
                </div>
            </div>


        </div>


    </div>
</div>