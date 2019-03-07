<?php
/**
 * Schema Post Meta Box
 *
 * @package     Schema
 * @subpackage  Schema Post Meta
 * @copyright   Copyright (c) 2016, Hesham Zebida
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.4
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;



add_action( 'init', 'schema_wp_post_meta_fields' );
/**
 * Create schema post meta fields
 *
 * @since 1.7.1
 */
function schema_wp_post_meta_fields() {

	$prefix = '_schema_';

/**
 * Schema Main Type post meta 
 *
 * @since 1.4
 */
$fields_main = apply_filters( 'schema_wp_types_post_meta_fields', array( 
	
	'schema_types' => array( // Select box
		'label'	=> __('Schema Markup Type', 'schema-wp'), // <label>
		'desc'	=> __('Select Schema type which describes your content best', 'schema-wp'), // description
		'id'	=> $prefix.'type', // field id and name
		'type'	=> 'select', // type of field
		'options' => apply_filters( 'schema_wp_types', array ( // array of options
				'Article' => array ( // array key needs to be the same as the option value
					'label' => __('Article', 'schema-wp'), // text displayed as the option
					'value'	=> __('Article', 'schema-wp'), // value stored for the option
				)
			)
		)
	), // end of array
	
	'post_meta_box_enabled' => array(
		'label' => __('Post meta', 'schema-wp'),
		'tip'	=> __('Enable custom post meta box', 'schema-wp'),
		'desc'	=> __('Enable post meta box?', 'schema-wp'), 
		'id' 	=> $prefix.'post_meta_box_enabled',
		'type'	=> 'checkbox'
	)
));

/**
 * Schema Article post meta 
 *
 * @since 1.4
 */
$fields_article = array(
	
	array( // Select box
		'label'	=> __('Article Type', 'schema-wp'), // <label>
		'desc'	=> __('Select more specific article type', 'schema-wp'), // description
		'tip'	=> __('It is recommended to set type BlogPosting for posts, and leave empty or set to General for page post type', 'schema-wp'),
		'id'	=> $prefix.'article_type', // field id and name
		'type'	=> 'select', // type of field
		'options' => array ( // array of options
			'General' => array ( // array key needs to be the same as the option value
				'label' => 'General', // text displayed as the option
				'value'	=> 'General' // value stored for the option
			),
			'BlogPosting' => array (
				'label' => 'BlogPosting',
				'value'	=> 'BlogPosting'
			),
			'NewsArticle' => array (
				'label' => 'NewsArticle',
				'value'	=> 'NewsArticle'
			),
			'Report' => array (
				'label' => 'Report',
				'value'	=> 'Report'
			),
			'ScholarlyArticle' => array (
				'label' => 'ScholarlyArticle',
				'value'	=> 'ScholarlyArticle'
			),
			'TechArticle' => array (
				'label' => 'TechArticle',
				'value'	=> 'TechArticle'
			)
		)
	),
);

/**
 * Post Types 
 *
 * @since 1.4
 */
$fields_post_types = array(
	
	array( // Post Types Select box
		'label'	=> '', // <label>
		'desc'	=> __('Enabled on specific custom post types', 'schema-wp'),  // description
		'id'	=> $prefix.'post_types', // field id and name
		'type'	=> 'cpt' // type of field
	),
);

/**
 * Post Meta Keys to Filters - post meta 
 *
 * @since 1.5.8
 */
$fields_post_meta_box =  array (
	
	'title' => array(
				'label' => __('Title', 'schema-wp'),
				'desc'	=> __('Post meta box title, default: Schema', 'schema-wp'),
				'tip' => __('This field will allow you to override the Schema post meta box title, default: Schema', 'schema-wp'),
				'id' 	=> $prefix.'post_meta_box_title',
				'type'	=> 'text',
				'size'	=> 'midum',
				'placeholder' => __('Schema', 'schema-wp'),
			),
			
	array( // Repeatable & Sortable Text inputs
		'label'	=> __('Fields', 'schema-wp'), // <label>
		'desc'	=> __('This is where you can define a source for schema.org markup fields to override its output. Select a filter name, then define post meta key name to pull data from, or tick the check box to automatically create a new custom post meta field to insert values manually when editing posts.', 'schema-wp'), // description
		'tip' => __('This feature allow you to override the schema.org markups output generated by the Schema plugin.', 'schema-wp'),
		'id'	=> $prefix.'post_meta_box', // field id and name
		'type'	=> 'repeatable_row', // type of field
		'sanitizer' => array( // array of sanitizers with matching kets to next array
			'featured' => 'schema_wp_meta_box_santitize_boolean',
			'title' => 'sanitize_text_field',
			'desc' => 'wp_kses_data'
		),
		'repeatable_fields' => array ( // array of fields to be repeated
			
			array( // Select box
				'label'	=> __('Filter', 'schema-wp'), // <label>
				'desc'	=> __('This is the filter name', 'schema-wp'), // description
				'id'	=> 'filter', // field id and name
				'type'	=> 'select', // type of field
				'class' => 'schema_type_filter', // css class
				'selectone'	=> __('Select Filter', 'schema-wp'), // type of field
				'options' => apply_filters( 'schema_wp_post_meta', array ( // array of options
					'author_name' => array ( // array key needs to be the same as the option value
						'label' => __('Author Name', 'schema-wp'), // text displayed as the option
						'value'	=> 'schema_wp_filter_author_name' // value stored for the option
					),
					'headline' => array ( 
						'label' => __('Headline', 'schema-wp'), 
						'value'	=> 'schema_wp_filter_headline' 
					),
					'description' => array ( 
						'label' => __('Description', 'schema-wp'), 
						'value'	=> 'schema_wp_filter_description' 
					),
					
				)),
			), // end of array
	
			'title' => array(
				'label' => __('Key', 'schema-wp'),
				'desc'	=> __('Add post meta key name as source', 'schema-wp'),
				'id' => 'key',
				'type' => 'text',
				'size' => 'medium',
				'placeholder' => __('Meta Key Name', 'schema-wp'),
			),
			
			'field' => array(
				'label' => __('Create?', 'schema-wp'),
				'tip'	=> __('Create custom post meta field?', 'schema-wp'),
				'desc'	=> __('Create Field?', 'schema-wp'), 
				'id' 	=> 'field',
				'type'	=> 'checkbox'
			),
			
			'div_open' => array(
				'id' => 'div_open',
				'type' => 'div_open',
			),
			
			array( 
				'label'	=> __('Type', 'schema-wp'),
				'desc'	=> __('Select field type', 'schema-wp'),
				'id'	=> 'type',
				'type'	=> 'select',
				'selectone'	=> __('Select Type', 'schema-wp'),  
				'options' => apply_filters( 'schema_wp_post_meta_type', array ( 
					'text' => array ( 
						'label' => __('Text', 'schema-wp'), 
						'value'	=> 'text' 
					),
					'textarea' => array ( 
						'label' => __('Text Area', 'schema-wp'), 
						'value'	=> 'textarea' 
					),
					'checkbox' => array (  
						'label' => __('Checkbox', 'schema-wp'), 
						'value'	=> 'checkbox' 
					),
										
				)),
			), // end of array
	
			'label' => array(
				'label' => __('Label', 'schema-wp'),
				'desc'	=> __('Field label', 'schema-wp'),
				'id' 	=> 'label',
				'type'	=> 'text',
				'size'	=> 'medium',
				'placeholder' => __('Label', 'schema-wp'),
			),
			
			'desc' => array(
				'label' => __('Description', 'schema-wp'),
				'desc'	=> __('Field description', 'schema-wp'), 
				'id' 	=> 'desc',
				'type'	=> 'textarea',
				'placeholder' => __('Description for this field', 'schema-wp'),
			),
			
			'div_close' => array(
				'id' => 'div_close',
				'type' => 'div_close',
			),
			
		)
	), // end of main array
	
);	

/**
 * Schema Premium plugin post meta message 
 *
 * @since 1.7.4
 */
$fields_schema_premium_plugin = array(
	
	array( // Post Types Select box
		'label'	=> '', // <label>
		'desc'	=> '<b>'.__('Want to enable new features?', 'schema-wp') .'<br>'. __(' Check out <a target="_blank" href="https://schema.press/downloads/schema-premium/">Schema Premium</a>.', 'schema-wp') . '</b>',  // description
		'id'	=> $prefix.'schema_premium', // field id and name
		'type'	=> 'desc' // type of field
	),
);

	/**
	 * Instantiate the class with all variables to create a meta box
	 * var $id string meta box id
	 * var $title string title
	 * var $fields array fields
	 * var $page string|array post type to add meta box to
	 * var $context string context where to add meta box at (normal, side)
	 * var $priority string meta box priority (high, core, default, low) 
	 * var $js bool including javascript or not
	 */
	$schema_box = new Schema_Custom_Add_Meta_Box( 'schema', __('Schema Settings', 'schema-wp'), $fields_main, 'schema', 'normal', 'high', true );
	$schema_article_box = new Schema_Custom_Add_Meta_Box( 'schema_article', __('Article', 'schema-wp'), $fields_article, 'schema', 'normal', 'high', true );
	$schema_cpt_box = new Schema_Custom_Add_Meta_Box( 'schema_cpt', __('Post Types', 'schema-wp'), $fields_post_types, 'schema', 'side', 'default', true );
	$schema_post_meta_box = new Schema_Custom_Add_Meta_Box( 'schema_post_meta_box', __('Post Meta', 'schema-wp'), $fields_post_meta_box, 'schema', 'normal', 'default', true );
	$schema_post_meta_box = new Schema_Custom_Add_Meta_Box( 'schema_premium_plugin', __('Go Premium', 'schema-wp'), $fields_schema_premium_plugin, 'schema', 'side', 'default', true );
}


/**
* Create post meta box
*
* Uses class Schema_Custom_Add_Meta_Box
*
* @todo this function is not used, make sure it's important before removing it!
*
* @since 1.5.7
* @return true 
*/
function schema_wp_do_post_meta( $args ) {
	
	if ( empty( $args ) ) return;
	
	$id 		 = $args['id'];
	$title 		 = $args['title'];
	$schema_type = $args['type'];
	$fields 	 = $args['fields'];
	
	if ( empty( $fields ) ) return;
	
	/**
	* Get enabled post types to create a meta box on
	*/
	$schemas_enabled = array();
	
	// Get schame enabled array
	$schemas_enabled = schema_wp_cpt_get_enabled();
	
	if ( empty($schemas_enabled) ) return;

	// Get post type from current screen
	$current_screen = get_current_screen();
	$post_type = $current_screen->post_type;
	
	foreach( $schemas_enabled as $schema_enabled ) : 
		
		$type = $schema_enabled['type'];
		
		if ( ! isset($type) || $type == '' ) return;
		
		// Get Schema enabled post types array
		$schema_cpt = $schema_enabled['post_type'];
	
		if ( ! empty($schema_cpt) && in_array( $post_type, $schema_cpt, true ) ) {
			
			if ( $type == $schema_type && $schema_enabled['post_type'][0] == $post_type ) {
				$new_post_meta = new Schema_Custom_Add_Meta_Box( $id, $title, $fields, $post_type, 'normal', 'high', true );
			}

		}
		
		// debug
		//print_r($schema_enabled);
		
	endforeach;
	
	return true;
}
