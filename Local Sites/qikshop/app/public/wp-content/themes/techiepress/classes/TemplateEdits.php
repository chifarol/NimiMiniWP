<?php
/**
 * Register Menus
 *
 * @package Advanced WooCommerce Theme
 */
Namespace Nimimini;

class TemplateEdits {

	public function __construct() {
		$this->move_up_excerpt();
		$this->move_up_meta();
		$this->move_up_price();
		// $this->ajax_addtocart();

		// single product item in loop eg related products
		$this->ProductLoopItem_move_up_title();
		$this->ProductLoopItem_move_down_rating();
		$this->ProductLoopItem_move_up_addtocart();

		// archive-products.php eg. search results
		$this->ArchiveProductsLoop_move_up_notices();



		// ajaxify add to cart button
	add_filter( 'woocommerce_add_to_cart_fragments', [$this,'ajaxify_add_to_cart_fragment'] );
	}

	// single product 
		// details page
	public function move_up_excerpt() {

		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',  6 );
	}
	public function move_up_meta() {
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',40 );
		add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',  18 );
	}
	public function move_up_price() {
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price' );
		add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',  20 );
	}
	public function ajax_addtocart() {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );
	}

		// single product item in loop eg related products
	public function ProductLoopItem_move_up_title() {
		remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
		add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_title',  5 );
	}
	public function ProductLoopItem_move_down_rating() {
		remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating',5 );
		add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating',  15 );
	}
	public function ProductLoopItem_move_up_addtocart() {
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
		add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart',  15 );
	}
	public function ArchiveProductsLoop_move_up_notices() {
		remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices' );
		add_action('woocommerce_archive_description', 'woocommerce_output_all_notices',  15 );
	}


	public function ajaxify_add_to_cart_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		?>
<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>"
    title="<?php _e('View your shopping cart', 'woothemes'); ?>">

    <img src="<?php echo(get_template_directory_uri().'/assets/images/shopping_bag_icon.svg') ?>" alt=""
        class="!tw-h-[1.5rem]" />
    <div class="tw-absolute tw-left-[50%] tw-translate-x-[-50%] tw-top-[6px] tw-text-10">
        <?php  echo WC()->cart->get_cart_contents_count() ?>
    </div>

</a>
<?php
			$fragments['a.cart-customlocation'] = ob_get_clean();
			return $fragments;
		}

}