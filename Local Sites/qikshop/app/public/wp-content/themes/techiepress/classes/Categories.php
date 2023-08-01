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
	public function display_children( $category, $categories) {
            if($this->hasChildren( $category->term_id,$categories)):
                // echo "<div>$category->title</div>";
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
			// echo "<div>$category->title</div>";
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


	// category page sidebar function

	public function Sidebar_menuitembox( $category,$categories) {
		$plus_icon_url = get_template_directory_uri().'/assets/images/plus_icon.svg';
		$minus_icon_url = get_template_directory_uri().'/assets/images/minus_icon.svg';
		$hasChildren = $this->Sidebar_hasChildren($category->term_id, $categories);
        printf(
            "<div class='tw-flex tw-flex-col tw-text-16 tw-border-purple8 tw-border-t-[2px] tw-w-full' 
			 >	
            <div class='tw-w-full tw-flex tw-items-center tw-gap-[2rem] tw-justify-between tw-py-[.75rem] '
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

        $this->Sidebar_display_children($category->term_id,$categories);

        echo "</div> </div>";
    }
	public function Sidebar_display_children( $parent_id, $categories) {
        foreach ($categories as $category) :
            if($category->category_parent == $parent_id):
                // echo "<div>$category->title</div>";
                $this->Sidebar_menuitembox($category,$categories);
        
            endif;
        endforeach;
        
    }
	public function Sidebar_hasChildren( $parent_id, $categories) {
       $holder = false;
        foreach ($categories as $category) :
            if($category->category_parent == $parent_id):
                $holder = true;
            endif;
        endforeach;

		return $holder;
        
    }

}