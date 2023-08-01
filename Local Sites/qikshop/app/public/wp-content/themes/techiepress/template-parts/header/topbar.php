<?php 



 ?>

<div
    class="tw-fixed tw-top-[0] tw-left-[50%] tw-translate-x-[-50%] tw-max-w-[1440px] tw-bg-ivory0 tw-h-[4rem] tw-w-full tw-z-[10] tw-flex tw-items-center tw-w-full tw-border-purple8 tw-border-[2px] md:tw-h-[4rem] md:tw-border-[1.5px] md:tw-justify-between">


    <a href="<?php echo home_url() ?>" class="tw-px-[1.5rem]  tw-font-morphend tw-text-[2.6rem] tw-border-r-[2px] 
tw-border-purple8 md:tw-px-[1rem] md:tw-text-32 md:tw-border-r-[0]">
        <?php  bloginfo("name") ?>
    </a>


    <?php 

get_template_part("/template-parts/header/nav");
 ?>


    <div class="tw-flex tw-items-center tw-h-full">

        <div class="tw-grid tw-place-items-center tw-w-[fit-content] tw-h-full tw-border-l-[2px] tw-px-[1.5rem]  md:tw-hidden tw-border-purple8 pointer"
            x-data="{open:false}" @mouseover="open=true" @mouseout="open=false">

            <?php  echo get_search_form() ?>
        </div>

        <!-- accounts -->
        <div class="tw-relative tw-grid tw-place-items-center tw-w-[4.5rem] tw-h-full tw-border-l-[2px] tw-border-purple8 md:tw-w-[3.5rem] md:tw-hidden pointer"
            x-data="{
            openAccounts:false
        }" @click="openAccounts=!openAccounts" @mousedown.outside="openAccounts=false">
            <!-- acct icon -->
            <img src="<?php echo(get_template_directory_uri().'/assets/images/account_icon.svg') ?>" alt=""
                class="!tw-h-[1.5rem]">
            <!-- dropdown -->
            <div class="tw-absolute tw-z-[5] tw-right-[-2px] tw-top-[60px] tw-mx-[auto] tw-min-w-[300px] tw-bg-ivory1 tw-transition-[max-height] tw-duration-[6000] tw-border-purple8 tw-border-[2px] tw-p-[1rem] tw-text-16 tw-font-medium"
                style="display:none" x-show="openAccounts">
                <div class="tw-relative">
                    <div class="tw-absolute tw-right-[0]  tw-top-[-28px] tw-z-[6]">
                        <img src="<?php  echo get_template_directory_uri().'/assets/images/pointer_triangle_top.svg'; ?>"
                            alt="" class="">
                    </div>
                </div>
                <div class="tw-flex tw-flex-col hide-border-t-first custom-mini-cart">
                    <?php if( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ?>"
                        class="nav-link tw-border-purple8 tw-border-b-[2px]  tw-py-[.75rem]">My Account</a>
                    <a href="<?php echo esc_url( wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ) ?>"
                        class="nav-link  tw-py-[.75rem]">Logout</a>
                    <?php else: ?>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ?>"
                        class="nav-link  tw-py-[.75rem]">Login / Register</a>
                    <?php endif; ?>
                </div>
            </div>


        </div>

        <!-- minicart -->
        <div class="tw-grid tw-place-items-center tw-w-[4.5rem] tw-h-full tw-border-purple8 tw-border-l-[2px] md:tw-hidden pointer"
            x-data="{
            openMiniCart:false
        }" @click="openMiniCart=!openMiniCart" @mousedown.outside="openMiniCart=false">
            <div class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"
                title="<?php _e( 'View your shopping cart' ); ?>">


                <img src="<?php echo(get_template_directory_uri().'/assets/images/shopping_bag_icon.svg') ?>" alt=""
                    class="!tw-h-[1.5rem] ">

                <div class="tw-absolute tw-left-[50%] tw-translate-x-[-50%] tw-top-[6px] tw-text-10">
                    <?php 
                    echo WC()->cart->get_cart_contents_count()
                    ?>
                </div>

                <!-- dropdown -->
                <div class="tw-absolute tw-z-[5] tw-right-[-25px] tw-top-[41px] tw-mx-[auto] tw-min-w-[300px] tw-bg-ivory1 tw-transition-[max-height] tw-duration-[6000] tw-border-purple8 tw-border-[2px] tw-p-[1rem] tw-text-16 tw-font-medium pointer"
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

        <!-- mobile menu -->
        <?php  get_template_part("/template-parts/header/mobilemenu"); ?>
    </div>


</div>