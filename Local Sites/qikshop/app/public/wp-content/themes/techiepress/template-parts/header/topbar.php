<?php 



 ?>

<div class="tw-h-[4rem] tw-flex tw-items-center tw-w-full tw-border-purple8 tw-border-b-[2px] t-px-[2.5rem]">


    <a href="<?php echo home_url() ?>" class="tw-px-[2.5rem] tw-w-full tw-font-morphend tw-text-[2.6rem]">
        <?php  bloginfo("name") ?>
    </a>

    <div class="tw-flex tw-items-center tw-h-full">

        <div class="tw-grid tw-place-items-center tw-w-[4.5rem] tw-h-full tw-border-l-[2px] tw-border-purple8">
            <img src="<?php echo(get_template_directory_uri().'/assets/images/search_icon.svg') ?>" alt=""
                class="!tw-h-[1.5rem]">
        </div>
        <div class="tw-grid tw-place-items-center tw-w-[4.5rem] tw-h-full tw-border-l-[2px] tw-border-purple8">
            <img src="<?php echo(get_template_directory_uri().'/assets/images/account_icon.svg') ?>" alt=""
                class="!tw-h-[1.5rem]">
        </div>
        <div class="tw-grid tw-place-items-center tw-w-[4.5rem] tw-h-full tw-border-purple8 tw-border-l-[2px] pointer"
            x-data="{
            openMiniCart:false
        }" @click="openMiniCart=!openMiniCart" @mousedown.outside="openMiniCart=false">
            <div class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"
                title="<?php _e( 'View your shopping cart' ); ?>">


                <img src="<?php echo(get_template_directory_uri().'/assets/images/shopping_bag_icon.svg') ?>" alt=""
                    class="!tw-h-[1.5rem]">

                <div class="tw-absolute tw-left-[50%] tw-translate-x-[-50%] tw-top-[6px] tw-text-10">
                    <?php 
                    echo WC()->cart->get_cart_contents_count()
                    ?>
                </div>

                <!-- dropdown -->
                <div class="tw-absolute tw-z-[5] tw-right-[-25px] tw-top-[36px] tw-mx-[auto] tw-min-w-[300px] tw-bg-ivory1 tw-transition-[max-height] tw-duration-[6000] tw-border-purple8 tw-border-[2px] tw-p-[1rem] tw-text-16 tw-font-medium pointer"
                    style="display:none" x-show="openMiniCart">
                    <div class="tw-relative">
                        <div class="tw-absolute tw-right-[0]  tw-top-[-28px] tw-z-[6]">
                            <img src="<?php  echo get_template_directory_uri().'/assets/images/pointer_triangle_top.svg'; ?>"
                                alt="" class="">
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-col hide-border-t-first custom-mini-cart">
                        <?php  echo  wc_get_template("cart/mini-cart.php") ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>