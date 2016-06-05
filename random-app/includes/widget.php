<?php 
	
function random_app_widget_init()
{
	class random_app_widget extends WP_Widget 
	{
		// constructor
		function random_app_widget() 
		{
			parent::WP_Widget(false, $name = __('Random app', 'random_app_widget') );
		}
	
		// widget form creation
		function form($instance) 
		{	
			// Check values
			if( $instance) 
			{
			     $title = esc_attr($instance['title']);
			} 
			else 
			{
			     $title = '';
			}
			?>
			
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'random_app_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			<?php
		}
	
		// widget update
		function update($new_instance, $old_instance) 
		{
			$instance = $old_instance;
		    // Fields
		    $instance['title'] = strip_tags($new_instance['title']);
		    
		   return $instance;
		}
	
		// widget display
		function widget($args, $instance) 
		{
			extract( $args );
			// these are the widget options
			$title = apply_filters('widget_title', $instance['title']);
			
			echo $before_widget;
		    // Display the widget
		    echo '<div class="widget-text wp_widget_plugin_box">';
		    
		    // Check if title is set
		    if ( $title ) {
		       echo $before_title . $title . $after_title;
		    }

		    // Show random app
		    get_random_app();

		    echo '</div>';
			echo $after_widget;
		}
	}
	
	// register widget
	add_action('widgets_init', create_function('', 'return register_widget("random_app_widget");'));	
}
