<?php get_header()?>
<?php 
global $woocommerce;
?>



<div class="tw-w-full tw-flex tw-flex-col tw-items-center tw-h-[15rem]"
    style="background-image:url(<?php get_header_image()?header_image():"" ?>)">
    <div
        class="tw-w-full tw-h-[fit-content] tw-flex tw-justify-between tw-gap-[2rem] tw-p-[.5rem_2rem] tw-bg-[rgba(0,0,0,0.3)]">

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="tw">
            <?php
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    if ( has_custom_logo() ) {?>
            <img src="<?php echo esc_url( $logo[0] ) ?>" alt="<?php echo get_bloginfo( 'name' ) ?>"
                class="tw-h-[2.5rem]" />

            <?php } else {?>

            <h1 class="tw-py-[1rm]"> <?php  echo bloginfo("name") ?> </h1>

            <?php }
    ?>
        </a>
        <ul class="tw-flex tw-items-center tw-gap-[1rem] tw-text-white tw-text-14">
            <li class="tw">Home</li>
            <li class="tw">Contact</li>
        </ul>
    </div>

    <h3 class="tw-text-24 tw-text-white tw-my-[auto] tw-mx-[auto]">Welcome</h3>
</div>

<!-- woo products -->

<div class="tw-mt-[2rem] tw-grid tw-grid-cols-[2fr_1fr] tw-gap-[2rem]">
    <div class="">
        <h4 class="tw-font-medium">Products</h4>
        <?php 
    $args=[
        "post_type"=>"product",
        "posts_per_page"=>20,
        "order_by"=>"product_type",
    ];
    $products = new WP_Query($args);
    //  var_dump($products);

   if($products->have_posts()){
    $product_categories = [];
     while ($products->have_posts()) {
        $products->the_post();
        $post_id = get_the_ID();  
         foreach ( get_the_terms( get_the_ID(), 'product_cat' ) as $cat ) {
            if(!in_array($cat->name,$product_categories,true)){
                $product_categories[]=$cat->name;
            }
            if( $product->is_type('variable')): ?>
        <div class="tw-flex tw-gap-3">
            <div class="tw">
                <p class="tw"> Variable Product </p>
                <table class="tw-min-w-[300px]">
                    <tr class="tw">
                        <th class="tw-px-[.25rem]">Product Id</th>
                        <th class="tw-px-[.25rem]">Product Name</th>
                        <th class="tw-px-[.25rem]">Variation</th>
                        <th class="tw-px-[.25rem]">Display Price</th>
                        <th class="tw-px-[.25rem]">Regular Price</th>
                        <th class="tw-px-[.25rem]">Action</th>
                    </tr>
                    <?php 
                foreach ( $product->get_available_variations() as $variation ):?>
                    <?php   // print_r($variation) ?>
                    <tr class="tw">
                        <td><?php echo $variation['variation_id'] ?></td>
                        <td><?php the_title() ?></td>
                        <td class="tw-flex tw-gap-[.25rem]">
                            <?php
                    foreach ($variation['attributes'] as $attr => $value):
                        $attribute_name = str_replace("attribute_","",$attr);
                        $attribute_name = str_replace("pa_","",$attribute_name)
                    ?>
                            <div class="tw">
                                <p class="tw-text-12">
                                    <?php  echo $attribute_name ?>
                                </p>
                                <p class="tw-mt-[.125rem]">
                                    <?php  echo $value ?>
                                </p>
                            </div>
                            <?php
                    endforeach;
                            ?>
                        </td>
                        <td>
                            <?php echo ''.get_woocommerce_currency_symbol(). $variation['display_price'] ?>
                        </td>
                        <td>
                            <?php echo $variation['display_regular_price'] ?>
                        </td>
                        <td>
                            <a href="?add-to-cart=<?php  echo $variation['variation_id'] ?>" class="tw">Add to Cart</a>
                        </td>
                    </tr>

                    <?php
                endforeach;
            ?>
                </table>
            </div>
        </div>


        <?php else: ?>
        <div class="tw-flex tw-gap-3">
            <p class="tw"> <?php  the_title() ?></p>

            <p class="tw"> <?php  wc_get_template("loop/price.php") ?></p>
            <p class="tw"> <?php  wc_get_template("loop/add-to-cart.php") ?></p>
        </div>

        <?php endif; }
      }?>
        <div class="tw-mt-[2rem]">
            <h4 class="tw-font-medium">Product Categories</h4>
            <ul class="tw-flex tw-gap-[1rem]">
                <?php 
        foreach ( $product_categories as $cat ) {?>

                <li class="tw-flex tw-gap-[1rem]">
                    <p class="tw"> <?php  echo $cat ?> </p>
                </li>

                <?php }
         ?>
            </ul>
        </div>
        <?php
    }
    else{
        echo "products empty";
    }
    
    wp_reset_query();

 ?>



    </div>
    <div class="cartcontents">
        <div class="widget_shopping_cart_content">
            <?php  
             woocommerce_mini_cart()
             //  wc_get_template("cart/mini-cart.php") ?>
        </div>
    </div>
</div>
<?php
get_footer()
?>