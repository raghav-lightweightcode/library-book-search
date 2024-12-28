<?php 

class lbsmaincontroller {

	function __construct() {

		register_activation_hook( LBS_PATH . '/library-book-search.php', array( $this, 'lbsinstall' ) );

		register_activation_hook( LBS_PATH . '/library-book-search.php', array( $this, 'lbs_check_network_activation' ) );

		add_action('init', array($this, 'lbs_create_posttype' ) );
	}

	public static function lbsinstall(){

		function lbs_create_taxonomies(){
			$author_args = array( 
				'hierarchical' => true,  
				'labels' => array(
				'name'=> _x('Author', 'author of the book' ),
				'singular_name' => _x('Author', 'author'),
				'search_items' => __('Search Author'),
				'popular_items' => __('Popular Author'),
				'all_items' => __('All Author'),
				'separate_items_with_commas' => __('Seperate Author with Commas'),
				),  
				'query_var' => true,  
				'rewrite' => array('slug' =>'author')
			);

			$publisher_args = array( 
				'hierarchical' => true,  
				'labels' => array(
				'name'=> _x('Publisher', 'publisher of the book' ),
				'singular_name' => _x('Publisher', 'publisher'),
				'search_items' => __('Search Publisher'),
				'all_items' => __('All Publishers'),
				'separate_items_with_commas' => __('Seperate Publishers with Commas'),
				),  
				'query_var' => true,  
				'rewrite' => array('slug' =>'publisher')
			);

			register_taxonomy('author', 'Book',$author_args);
			register_taxonomy('publisher', 'Book',$publisher_args);

		}

		lbs_create_taxonomies();

	}

	public static function lbs_check_network_activation($network_wide){
		if ( ! $network_wide ) {
			return;
		}

		deactivate_plugins( plugin_basename( __FILE__ ), true, true );

		header( 'Location: ' . network_admin_url( 'plugins.php?deactivate=true' ) );
		exit;
	}

	// Our custom post type function
	function lbs_create_posttype() {

		$args=array(
		  'labels' => array(
		   	'name' => __( 'book' ),
		   	'singular_name' => __( 'Books' )
		  ),
		  'public' => true,
		  'has_archive' => false,
		  'rewrite' => array('slug' => 'book'),
		);

        register_post_type( 'book', $args );
	}
}

 ?>