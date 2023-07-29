<?php
/**
 * Register Menus
 *
 * @package Advanced WooCommerce Theme
 */
Namespace Nimimini;

class Theme_Menus {

	public function __construct() {

		// load class.
		$this->setup_hooks();
	}

	public function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'register_menus' ] );
	}

	public function register_menus(){
        if ( function_exists( 'register_nav_menus' ) ) {
            register_nav_menus([
                "nimimini-header-menu"=>"Header",
                "nimimini-footer1-menu"=>"Footer 1",
                "nimimini-footer2-menu"=>"Footer 2",
                "nimimini-footer3-menu"=>"Footer 3",
            ]);
        } 
    }

	/**
	 * Get the menu id by menu location.
	 *
	 * @param string $location
	 *
	 * @return integer
	 */
	public function get_menu_id( $location ) {

		// Get all locations
		$locations = get_nav_menu_locations();
        // print_r($location);
		// Get object id by location.
		$menu_id = $locations[$location];

		return ! empty( $menu_id ) ? $menu_id : '';

	}

	/**
	 * Get all child menus that has given parent menu id.
	 *
	 * @param array   $menu_array Menu array.
	 * @param integer $parent_id Parent menu id.
	 *
	 * @return array Child menu array.
	 */
	public function get_child_menu_items( $menu_array, $parent_id ) {

		$child_menus = [];

		if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {

			foreach ( $menu_array as $menu ) {
				if ( intval( $menu->menu_item_parent ) === $parent_id ) {
					array_push( $child_menus, $menu );
				}
			}
		}

		return $child_menus;
	}
	public function menuitembox( $header_menu,$header_menus) {
		$plus_icon_url = get_template_directory_uri().'/assets/images/plus_icon.svg';
		$minus_icon_url = get_template_directory_uri().'/assets/images/minus_icon.svg';
		$hasChildren = $this->hasChildren($header_menu->ID, $header_menus);
        printf(
            "<div class='tw-flex tw-flex-col tw-text-16 tw-border-purple8 tw-border-t-[2px]' 
			 >	
            <div class='tw-w-full tw-flex tw-items-center tw-gap-[2rem] tw-justify-between tw-py-[.75rem] '
			@click='
			activeArray.includes(%s) ? 
			activeArray=activeArray.filter(item=>item!==%s) : 
			activeArray.push(%s);
			console.log(activeArray)'
			>
				%s
                %s
			
            </div>
			<div class='tw-flex tw-flex-col tw-pl-[.5rem] nav-h-transition overflow-y-hidden' 
			:class='activeArray.includes(%s) ? 
			`max-h-200` :
			`max-h-0` '
			 >
            ",
            $header_menu->ID,
            $header_menu->ID,
            $header_menu->ID,
			$hasChildren ? "<p>  $header_menu->title  </p>" : "<a href=' $header_menu->url' class=''>   $header_menu->title </a>",
            $hasChildren ? "<img src='$plus_icon_url' alt='' class='tw-h-16' x-bind:src='activeArray.includes($header_menu->ID) ? `$minus_icon_url` : `$plus_icon_url`' >" : "",
            $header_menu->ID,
        );

        $this->display_children($header_menu->ID,$header_menus);

        echo "</div> </div>";
    }
	public function display_children( $parent_id, $header_menus) {
        foreach ($header_menus as $header_menu) :
            if($header_menu->menu_item_parent == $parent_id):
                // echo "<div>$header_menu->title</div>";
                $this->menuitembox($header_menu,$header_menus);
        
            endif;
        endforeach;
        
    }
	public function hasChildren( $parent_id, $header_menus) {
       $holder = false;
        foreach ($header_menus as $header_menu) :
            if($header_menu->menu_item_parent == $parent_id):
                $holder = true;
            endif;
        endforeach;

		return $holder;
        
    }

}