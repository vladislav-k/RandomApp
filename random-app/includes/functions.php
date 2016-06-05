<?php
	
/** 
* GET RANDOM APP 
*/

function get_random_app() {
	
	wp_enqueue_style( 'style', plugins_url( '/css/style.css', dirname(__FILE__)  ) );
	
	$args = array('post_type'=>'random_app', 'orderby'=>'rand', 'posts_per_page'=>'1');
	$app  = new WP_Query($args);
	
	while ($app->have_posts()) : $app->the_post();
	
	$icon_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[0];
	$link = get_post_meta( get_the_ID(), 'link', true );
	$appstore = get_post_meta( get_the_ID(), 'appstore', true );
	$playmarket = get_post_meta( get_the_ID(), 'playmarket', true );
	$windows = get_post_meta( get_the_ID(), 'windows', true );
	$ios_style = get_post_meta( get_the_ID(), 'ios-style', true );
	
	?>
	<center>
		<div class="app">
			<div class="app-field">
				<a href="<?php if(!empty($link)) { echo $link; } else { echo "#"; }?>">
					<img class="app-icon <?php if (!empty($ios_style)) { echo "ios-style"; } ?>" alt="<?php the_title(); ?>" src="<?php echo $icon_url; ?>"/>
				</a>
			</div>
			
			<div class="app-field">
				<?php if(!empty($link)): ?>
					<a href="<?php echo $link; ?>">
				<?php endif; ?>
					<?php the_title(); ?>
				<?php if(!empty($link)): ?>
					</a>
				<?php endif; ?>	
			</div>
			
			<?php if( !empty( $appstore ) ) { 
					if( substr($appstore, 0, 2) != "id" ) {
						$appstore = "id" . $appstore;
					}
			?>
			<div class="app-field">
					<a href="https://itunes.apple.com/app/<?php echo $appstore; ?>">
						<img src="<?php echo plugins_url( 'images/badge-appstore.png', dirname(__FILE__)  ) ?>" class="download-badge" alt="Available on the App Store" />
					</a>
			</div>
			
			<?php } ?>
			
			<?php if( !empty( $playmarket ) ) { ?>
			<div class="app-field">
					<a href="https://play.google.com/store/apps/details?id=<?php echo $playmarket; ?>">
						<img src="<?php echo plugins_url( 'images/badge-playmarket.png', dirname(__FILE__)  ) ?>" class="download-badge" alt="Get it on Google Play" />
					</a>
			</div>
			<?php } ?>
			
			<?php if( !empty( $windows ) ) { ?>
			<div class="app-field">
					<a href="https://www.microsoft.com/store/apps/<?php echo $windows; ?>">
						<img src="<?php echo plugins_url( 'images/badge-windows.png', dirname(__FILE__)  ) ?>" class="download-badge" alt="Get from Windows Store"/>
					</a>
			</div>
			<?php } ?>
		</div>
	</center>
	<?php
	endwhile;
	wp_reset_postdata();
}

/**
* SHORT CODE 
* Value: [random_app]
*/
function random_app_func( $atts ){
	return get_random_app();
}
add_shortcode( 'random_app', 'random_app_func' );