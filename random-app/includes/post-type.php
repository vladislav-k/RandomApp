<?php
	
function random_app_init_post_type() 
{
	/**
	* ADDING CUSTOM POST TYPE
	*/
	function register_cpt_random_app() 
	{ 
	    $labels = array(
	        'name' => __( 'All Apps', 'random_app' ),
	         'all_items' => __( 'All Apps', 'random_app' ),
	        'singular_name' => __( 'App', 'random_app' ),
	        'add_new' => __( 'Add new', 'random_app' ),
	        'add_new_item' => __( 'Add new app', 'random_app' ),
	        'edit_item' => __( 'Edit app', 'random_app' ),
	        'new_item' => __( 'New app', 'random_app' ),
	        'view_item' => __( 'View app', 'random_app' ),
	        'search_items' => __( 'Search app', 'random_app' ),
	        'not_found' => __( 'No apps found', 'random_app' ),
	        'not_found_in_trash' => __( 'No apps found in Trash', 'random_app' ),
	        'parent_item_colon' => __( 'Parent app:', 'random_app' ),
	        'menu_name' => __( 'Random App', 'random_app' ),
	    );
	 
	    $args = array(
	        'labels' => $labels,
	        'hierarchical' => true,
	        'supports' => array( 'title','thumbnail' ),
	        'public' => true,
	        'show_ui' => true,
	        'show_in_menu' => true,
	        'menu_position' => 100,
	        'menu_icon' => 'dashicons-smartphone',
	        'show_in_nav_menus' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'has_archive' => true,
	        'query_var' => true,
	        'can_export' => true,
	        'rewrite' => true,
	    );
	 
	    register_post_type( 'random_app', $args );
	}
	 
	add_action( 'init', 'register_cpt_random_app' );
	
	function prfx_app_meta() 
	{
	    add_meta_box( 'prfx_meta', __( 'App Data', 'prfx-textdomain' ), 'prfx_meta_callback', 'random_app', 'normal', 'high' );
	}
	
	add_action( 'add_meta_boxes', 'prfx_app_meta' );
	
	/**
	 * Outputs the content of the meta box
	 */
	function prfx_meta_callback( $post ) 
	{
		wp_enqueue_style( 'style', plugins_url( '/css/style.css', dirname(__FILE__)  ) );
			
		wp_nonce_field( basename( dirname(__FILE__)  ), 'prfx_nonce' );
	    $prfx_stored_meta = get_post_meta( $post->ID );
	    ?>
		
		<table style="width: 100%">
			<tr>
				<td class="row-icon"><img class="link-icon" src="<?php echo plugins_url( 'images/link.png', dirname(__FILE__)  ) ?>"/></td>
				<td class="row-title"><span class="prfx-row-title"><?php _e( 'Web-site URL', 'random_app' )?></span></td>
				<td><input class="row-field" placeholder="http://" type="text" name="link" id="link" value="<?php if ( isset ( $prfx_stored_meta['link'] ) ) echo $prfx_stored_meta['link'][0]; ?>" /></td>
			</tr>
			
			<tr>
				<td class="row-icon"><img class="link-icon" src="<?php echo plugins_url( 'images/app-store.png', dirname(__FILE__)  ) ?>"/></td>
				<td class="row-title"><span class="prfx-row-title"><?php _e( 'App Store ID', 'random_app' )?></span></td>
				<td><input class="row-field" placeholder="id0123456789" type="text" name="appstore" id="appstore" value="<?php if ( isset ( $prfx_stored_meta['appstore'] ) ) echo $prfx_stored_meta['appstore'][0]; ?>" /></td>
			</tr>
			
			<tr>
				<td class="row-icon"><img class="link-icon" src="<?php echo plugins_url( 'images/play-store.png', dirname(__FILE__)  ) ?>"/></td>
				<td class="row-title"><span class="prfx-row-title"><?php _e( 'Play Market Package', 'random_app' )?></span></td>
				<td><input class="row-field" placeholder="com.example.app" type="text" name="playmarket" id="playmarket" value="<?php if ( isset ( $prfx_stored_meta['playmarket'] ) ) echo $prfx_stored_meta['playmarket'][0]; ?>" /></td>
			</tr>
			
			<tr>
				<td class="row-icon"><img class="link-icon" src="<?php echo plugins_url( 'images/windows-store.png', dirname(__FILE__)  ) ?>"/></td>
				<td class="row-title"><span class="prfx-row-title"><?php _e( 'Windows Store ID', 'random_app' )?></span></td>
				<td><input class="row-field" placeholder="8wyqtcrbv22g" type="text" name="windows" id="windows" value="<?php if ( isset ( $prfx_stored_meta['windows'] ) ) echo $prfx_stored_meta['windows'][0]; ?>" /></td>
			</tr>
			
		</table>
	 
		<p>
			<label style="font-weight: bold;" for="ios-style">
	            <input type="checkbox" name="ios-style" id="ios-style" value="yes" <?php if ( isset ( $prfx_stored_meta['ios-style'] ) ) checked( $prfx_stored_meta['ios-style'][0], 'yes' ); ?> />
	            <?php _e( 'iOS icon style', 'prfx-textdomain' )?>
	        </label>
		</p>
	 
	    <?php
	}
	
	/**
	 * Saves the custom meta input
	 */
	function prfx_meta_save( $post_id ) 
	{ 
	    // Checks save status
	    $is_autosave = wp_is_post_autosave( $post_id );
	    $is_revision = wp_is_post_revision( $post_id );
	    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( dirname(__FILE__)  ) ) ) ? 'true' : 'false';
	 
	    // Exits script depending on save status
	    if ( $is_autosave || $is_revision || !$is_valid_nonce ) 
	    {
	        return;
	    }
	 
	    // Checks for input and sanitizes/saves if needed
	    if( isset( $_POST[ 'link' ] ) ) 
	    {
	        update_post_meta( $post_id, 'link', sanitize_text_field( $_POST[ 'link' ] ) );
	    }
	    
		if( isset( $_POST[ 'appstore' ] ) )
		{
	        update_post_meta( $post_id, 'appstore', sanitize_text_field( $_POST[ 'appstore' ] ) );
	    }
	    
	    if( isset( $_POST[ 'playmarket' ] ) ) 
	    {
	        update_post_meta( $post_id, 'playmarket', sanitize_text_field( $_POST[ 'playmarket' ] ) );
	    }
	    
		if( isset( $_POST[ 'windows' ] ) ) 
		{
	        update_post_meta( $post_id, 'windows', sanitize_text_field( $_POST[ 'windows' ] ) );
	    }
	 
		if( isset( $_POST[ 'ios-style' ] ) ) 
		{
			update_post_meta( $post_id, 'ios-style', 'yes' );
		} 
		else 
		{
			update_post_meta( $post_id, 'ios-style', '' );
		}
	}
	add_action( 'save_post', 'prfx_meta_save' );

}