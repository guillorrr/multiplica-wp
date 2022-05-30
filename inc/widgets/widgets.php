<?php

// Adds widget: Multiplica
class custom_widget extends WP_Widget
{

	// Register widget with WordPress
	function __construct()
	{
		parent::__construct(
			'multiplica_widget',
			esc_html__('Multiplica', 'multiplica')
		);
	}

	// Widget fields
	private $widget_fields = array(

		array(
			'label' => 'Text',
			'id' => 'Text_text',
			'type' => 'text',
		)
	);

	// Frontend display of widget
	public function widget($args, $instance)
	{
		echo $args['before_widget'];

		// Output widget title
		if (!empty($instance['title'])) {
			echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
		}

		// Output generated fields
		echo '<p>' . $instance['Text_text'] . '</p>';

		echo $args['after_widget'];
	}
	// Back-end widget fields
	public function field_generator($instance)
	{
		$output = '';
		foreach ($this->widget_fields as $widget_field) {
			$default = '';
			if (isset($widget_field['default'])) {
				$default = $widget_field['default'];
			}
			$widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'multiplica');
			switch ($widget_field['type']) {
				default:
					$output .= '<p>';
					$output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'multiplica') . ':</label> ';
					$output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form($instance)
	{
		$title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'multiplica');
?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'multiplica'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
<?php
		$this->field_generator($instance);
	}

	// Sanitize widget form values as they are saved
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		foreach ($this->widget_fields as $widget_field) {
			switch ($widget_field['type']) {
				default:
					$instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
			}
		}
		return $instance;
	}
}

function register_custom_widget()
{
	register_widget('custom_widget');
}
add_action('widgets_init', 'register_custom_widget');
