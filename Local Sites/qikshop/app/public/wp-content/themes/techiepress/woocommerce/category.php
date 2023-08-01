<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;


get_header( 'shop' );
$cat_class = new Nimimini\Categories();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
    <h1 class="woocommerce-products-header__title page-name"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>

<?php
if ( woocommerce_product_loop() ) {?>
<div class="tw-flex tw-items-center tw-gap-[1rem] tw-justify-between">
    <?php
	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );?>
</div>


<div
    class="tw-grid tw-grid-cols-[1fr_2fr] tw-gap-[4rem] md:tw-flex md:tw-flex-col-reverse md:tw-gap-[0] md:tw-mb-[2rem]">
    <div class="tw-mt-[.75rem]">
        <div class="tw md:tw-hidden">
            <h3 class="tw-font-morphend tw-text-40">Category <span class="tw-font-mont tw-text-24">:</span></h3>
            <?php 
            global $wp_query;
            $cat = $wp_query->get_queried_object();

            // get the thumbnail id using the queried category term_id
            $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); 
        
            // get the image URL
            $cat_image = wp_get_attachment_url( $thumbnail_id ); 
        
             ?>
            <!-- category thumbnail -->
            <div class="tw-w-full tw-h-[300px] tw-flex tw-flex-col tw-justify-end tw-bg-cover tw-bg-center tw-bg-no-repeat tw-border-purple8 tw-border-[2px] tw-bg-[#d1d1d1] pointer"
                style="background-image: url('<?php  echo $cat_image ?>')">
                <p
                    class="tw-mb-[auto] tw-p-[1.5rem] tw-bg-[#000000]/50 tw-border-purple8 tw-border-b-[2px] tw-text-white tw-font-morphend tw-text-32 tw-text-right">
                    <?php  echo $cat->name; ?></p>
            </div>
        </div>

        <!-- category list & dropdown -->
        <div class="tw-mt-[3rem]">
            <h3 class="tw-font-morphend tw-text-32 tw-mb-[1rem]">All Categories <span
                    class="tw-font-mont tw-text-24">:</span>
            </h3>
            <div class="tw-w-full tw-flex tw-flex-col tw-items-center tw-justify-center tw-w-full tw-bg-ivory1 tw-border-purple8 tw-border-[2px] tw-px-[1rem] hide-border-t-first"
                x-data="{ 
                    activeNav: '',
                    activeArray: [] 
                }">


                <?php  
            $all_categories = $cat_class->get_categories();
   if ( ! empty( $all_categories ) && is_array( $all_categories ) ):
   foreach ($all_categories as $category) :
    $cat_id =  $category->term_id;
    $cat_parent_id =  $category->category_parent;
    // print_r($all_categories);

    if($cat_parent_id == "0" && $cat_class->Sidebar_hasChildren($cat_id,$all_categories)):
        
// echo($cat_id.'-'.$cat_parent_id.' ');
$plus_icon_url = get_template_directory_uri().'/assets/images/plus_icon.svg';
		$minus_icon_url = get_template_directory_uri().'/assets/images/minus_icon.svg';
		$hasChildren = $cat_class->Sidebar_hasChildren($category->term_id, $all_categories);
        printf(
            "<div class='tw-flex tw-flex-col tw-text-16 tw-border-purple8 tw-border-t-[2px] tw-w-full ' 
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
			"<a href='/product-category/$category->slug' class=''>   $category->name </a>",
            $category->term_id,
            $category->term_id,
            $category->term_id,
            $hasChildren ? "<img src='$plus_icon_url' alt='' class='tw-h-16 pointer' x-bind:src='activeArray.includes($category->term_id) ? `$minus_icon_url` : `$plus_icon_url`' >" : "",
            $category->term_id,
        );

        $cat_class->Sidebar_display_children($category->term_id,$all_categories);

        echo "</div> </div>";

    ?>

                <?php 
    elseif($cat_parent_id == "0" && !$cat_class->Sidebar_hasChildren($cat_id,$all_categories)):
        ?>
                <div
                    class="tw-flex tw-flex-col tw-text-16 tw-border-purple8 tw-border-t-[2px] tw-w-full tw-py-[.75rem] ">
                    <a href="/product-category/<?php  echo $category->slug ?>"
                        class=""><?php  echo $category->name ?></a>
                </div>
                <?php  
    endif;
    endforeach;
    endif;
    ?>

            </div>
        </div>
    </div>
    <div class="tw">
        <?php woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();
    /**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}?>
    </div>

</div>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );