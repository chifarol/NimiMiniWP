<?php 
get_header();

$cat_class = new Nimimini\Categories();
?>

<?php 
global $woocommerce;
?>
<div class="tw-flex tw-flex-col tw-gap-[6rem] tw-mt-[6rem] tw-mb-[9rem]">
    <!-- header section -->
    <div class="">
        <p class="tw-ml-[2.5rem] tw-text-100x tw-font-morphend tw-mb-[-3px] ">
            <?php  echo bloginfo("description") ?>
        </p>
        <div class="tw-ml-[auto] tw-w-[98%] tw-h-full tw-max-h-[700px]">
            <img src="<?php header_image() ?>" alt=""
                class="tw-w-full tw-h-full tw-object-cover  tw-border-purple8 tw-border-[2px] tw-border-r-[0]">
        </div>
    </div>
    <!-- shop by categories -->
    <div class=" tw-px-[2.5rem]">
        <div class="tw-text-60 tw-font-morphend tw-mb-[1.5rem] ">Shop By Categories</div>
        <div class="tw-grid tw-grid-cols-2 tw-gap-[1.5rem]">
            <?php 
    $all_categories = $cat_class->get_categories();
    foreach ($all_categories as $index => $cat):
        $counter = 1;
        $term_slug    = 't-shirts';
        $taxonomy     = 'product_cat';
        // $term_id      = get_term_by( 'slug', $term_slug, $taxonomy )->term_id;
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        if(!$cat->category_parent && $image):
            $counter++;
?>
            <a href="/product-category/<?php  echo $cat->slug ?>"
                class="tw-w-full tw-h-[300px] tw-flex tw-flex-col tw-justify-end tw-bg-cover tw-bg-center tw-bg-no-repeat tw-border-purple8 tw-border-[2px] pointer"
                style="background-image: url('<?php  echo $image ?>')">
                <p
                    class="tw-mt-[auto] tw-p-[1.5rem] tw-bg-[#000000]/50 tw-border-purple8 tw-border-t-[2px] tw-text-white tw-font-morphend tw-text-32">
                    <?php  echo $cat->name; ?></p>
            </a>


            <?php 
    endif;
    endforeach;
    // print_r($all_categories);
 ?>
        </div>
    </div>

    <!-- newly added -->
    <div class=" tw-px-[2.5rem]">
        <div class="tw-text-60 tw-font-morphend tw-mb-[1.5rem] ">Newly Added</div>
        <div class="tw-grid tw-grid-cols-3 tw-gap-[1.5rem]">
            <?php 
                $args=[
                    "post_type"=>"product",
                    "posts_per_page"=>6,
                    "order_by"=>["post_date"=> 'DESC'],
                ];
                $products = new WP_Query($args);
                if($products->have_posts()):
                    while ($products->have_posts()):
                        global $product;
                        $products->the_post();
            ?>
            <a href="<?php  echo get_permalink( $product->ID ) ?>" class="tw">
                <div class="tw-w-full tw-h-[300px] tw-border-purple8 tw-border-[2px] tw-bg-cover tw-bg-center tw-bg-no-repeat"
                    style="background-image: url('<?php echo has_post_thumbnail( $product->ID ) ? wp_get_attachment_url(get_post_thumbnail_id($product->ID)):wc_placeholder_img_src()  ?>')">
                </div>
                <div class="tw-mt-[.5rem] tw-flex tw-items-center tw-gap-[2rem] tw-justify-between tw-text-16">
                    <p class="tw-font-semiBold"><?php  the_title() ?></p>
                    <p class="tw"><?php echo $product->get_price_html() ?></p>
                </div>
            </a>

            <?php 
                endwhile;
                endif;
            ?>
        </div>
    </div>

    <!-- explore -->
    <div class=" tw-pr-[2.5rem]">
        <div class="tw-pl-[2.5rem] tw-text-60 tw-font-morphend tw-mb-[1.5rem] ">Explore</div>
        <div id="exploreScroll"
            class="tw-pl-[2.5rem] tw-flex tw-items-center tw-gap-[1.5rem] tw-w-full tw-overflow-x-scroll tw-py-[2rem] scroll">
            <?php 
            $all_categories = $cat_class->get_categories();
            // print_r( $all_categories);
            foreach ($all_categories as $key => $cat):
                // echo $cat->name;
                $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                // $cat_class->displayParents($cat,$all_categories);
                if($image):
            
            
            ?>

            <div class=" tw-min-w-[300px] tw-min-h-[300px] tw-max-w-[500px] tw-max-h-[500px] tw-grid
            tw-place-items-center">
                <a href="/product-category/<?php  echo $cat->slug ?>" class="tw">
                    <img src="<?php  echo $image ?>" alt=""
                        class="tw-border-purple8 tw-border-[2px] tw-object-cover tw-w-full">
                    <div class="tw-flex tw-w-full tw-mt-[rem]">
                        <p class="tw-ml-[auto] tw-text-14 tw-font-medium"><?php  echo $cat->name ?></p>
                    </div>
                </a>
            </div>

            <?php 
            endif;
            endforeach;
            ?>
        </div>
    </div>

    <!-- instagram -->
    <div class="" x-date="{hx:1}">
        <div class="tw-pl-[2.5rem] tw-text-60 tw-font-morphend tw-mb-[1.5rem] ">Instagram</div>
        <div class="tw-w-full tw-h-full tw-max-h-[700px]">
            <img src="<?php echo get_stylesheet_directory_uri().'/assets/images/instagram-pic.png' ?>" alt=""
                class="tw-w-full tw-h-full tw-object-cover  tw-border-purple8 tw-border-b-[2px] tw-border-t-[2px]">
        </div>
    </div>

</div>
<?php
get_footer()
?>