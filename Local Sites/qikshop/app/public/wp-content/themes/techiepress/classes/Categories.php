<?php
/**
 * Register Menus
 *
 * @package Advanced WooCommerce Theme
 */
Namespace Nimimini;

class Categories {

	public function __construct() {

	}
	public function get_categories() {
		$args = array(
			'taxonomy'     => 'product_cat',
			'orderby'      => 'name',
			'show_count'   => 0,
			'pad_counts'   => 0,
			'hierarchical' => 1,
			'title_li'     => '',
			'hide_empty'   => 0
		);
	
		$all_categories = get_categories( $args );
		return $all_categories;
	}
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
	public function display_children( $category, $categories) {
            if($this->hasChildren( $category->term_id,$categories)):
                // echo "<div>$header_menu->title</div>";
                echo $category->name.' - ';
				$this->display_children( $this->get_children($category->term_id,$categories),$categories);
            endif;
        
    }
	public function get_children( $parent_id, $categories) {
        foreach ($categories as $category) :
            if($category->category_parent == $parent_id):
                return $category;
            endif;
        endforeach;
        
    }
	public function hasChildren( $parent_id, $categories) {
       $holder = false;
        foreach ($categories as $category) :
            if($category->category_parent == $parent_id):
                $holder = true;
            endif;
        endforeach;

		return $holder;
        
    }

	public function displayParents( $category, $categories) {
		// echo $category->category_parent;
		// print_r( $categories[0]);
		echo $category->name;
		if($this->hasParents( $category->category_parent,$categories)):
			// echo "<div>$header_menu->title</div>";
			echo '->';
			$parent = $this->getParents($category->category_parent,$categories);
			$this->displayParents($parent,$categories);
		else:
			echo("<br>");
		endif;
	
}

	public function getParents( $target_id, $categories) {
        foreach ($categories as $cat) :
            if($cat->term_id == $target_id):
                return $cat;
            endif;
        endforeach;
        
    }
	public function hasParents( $target_id, $categories) {
       $holder = false;
	   if(!$target_id){
		return $holder;
	   }
        foreach ($categories as $cat) :
            if($cat->term_id == $target_id):
                $holder = true;
            endif;
        endforeach;

		return $holder;
        
    }

}