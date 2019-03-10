<?php

/*
Since we're not using WordPress for pages, we have to manually handle routing to the proper template. This switch statement will need to reflect the entire catalog of pages.
*/

if ( get_site_url() !== "http://162.198.226.17" ) {
  add_action('init', 'customRouter');
}

function customRouter() {
  $load;
  $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
  switch ($url_path) {
      case "platform": $load = locate_template('platform.php', true); break;
      case "platform/agent-less-auto-discovery": $load = locate_template('platform/agent-less-auto-discovery.php', true); break;
      case "platform/machine-learning": $load = locate_template('platform/machine-learning.php', true); break;
      case "platform/transaction-to-infra-correlation": $load = locate_template('platform/transaction-to-infra-correlation.php', true); break;
      case "platform/architecture": $load = locate_template('platform/architecture.php', true); break;
      case "platform/ecosystem": $load = locate_template('platform/ecosystem.php', true); break;
      case "platform/ecosystem/oracle": $load = locate_template('platform/ecosystem/oracle.php', true); break;
      case "solutions": $load = locate_template('solutions.php', true); break;
      case "resources": $load = locate_template('resources.php', true); break;
      case "customers": $load = locate_template('customers.php', true); break;
      case "customers/broadcom": $load = locate_template('customers/broadcom.php', true); break;
      case "customers/maxim": $load = locate_template('customers/maxim.php', true); break;
      case "customers/colv": $load = locate_template('customers/colv.php', true); break;
      case "customers/bt": $load = locate_template('customers/bt.php', true); break;
      case "whats-aiops": $load = locate_template('whats-aiops.php', true); break;
      case "company": $load = locate_template('company.php', true); break;
      case "blog": $load = locate_template('blog.php', true); break;
      case "free-trial": $load = locate_template('free-trial.php', true); break;
      default:
  }
  if (!empty($load)) {
    exit();
  }
}


add_action( 'init', 'custom_post_types' );
function custom_post_types() {
  register_post_type( 'resources',
      array(
        'labels'         => array(
        'name'           => __( 'Resources' ),
        'singular_name'  => __( 'Resource' )
      ),
        'public'         => true,
        'has_archive'    => true,
        'menu_icon'      => 'dashicons-format-aside',
        'supports'       => array('excerpt', 'title'),
        'rewrite'        => array( 'with_front' => false, 'slug' => 'resources'),
      )
    );  register_post_type( 'news',
      array(
        'labels'         => array(
        'name'           => __( 'News Items' ),
        'singular_name'  => __( 'News Item' )
      ),
        'public'         => true,
        'has_archive'    => true,
        'menu_icon'      => 'dashicons-megaphone',
        'supports'       => array('excerpt', 'title'),
        'rewrite'        => array( 'with_front' => false, 'slug' => 'news'),
      )
    );  register_post_type( 'team',
      array(
        'labels'         => array(
        'name'           => __( 'Team' ),
        'singular_name'  => __( 'Member' )
      ),
        'public'         => true,
        'has_archive'    => true,
        'menu_icon'      => 'dashicons-groups',
        'supports'       => array(),
        'rewrite'        => array( 'with_front' => false, 'slug' => 'team'),
      )
    );  register_post_type( 'jobs',
      array(
        'labels'         => array(
        'name'           => __( 'Private Jobs' ),
        'singular_name'  => __( 'Private Job' )
      ),
        'public'         => true,
        'has_archive'    => true,
        'menu_icon'      => 'dashicons-businessman',
        'supports'       => array(),
        'rewrite'        => array( 'with_front' => false, 'slug' => 'jobs'),
      )
    );  register_post_type( 'events',
      array(
        'labels'         => array(
        'name'           => __( 'Events' ),
        'singular_name'  => __( 'Event' )
      ),
        'public'         => true,
        'has_archive'    => true,
        'menu_icon'      => 'dashicons-location',
        'supports'       => array(),
        'rewrite'        => array( 'with_front' => false, 'slug' => 'events'),
      )
    );}

add_action( 'init', 'enable_taxonomies', 0 );
function enable_taxonomies() {
  $labels = array(
      'name'              => _x( 'Resource Types', 'taxonomy general name', 'textdomain' ),
      'singular_name'     => _x( 'Resource Type', 'taxonomy singular name', 'textdomain' ),
      'search_items'      => __( 'Search Resource Types', 'textdomain' ),
      'all_items'         => __( 'All Resource Types', 'textdomain' ),
      'parent_item'       => __( 'Parent Resource Type', 'textdomain' ),
      'parent_item_colon' => __( 'Parent Resource Type:', 'textdomain' ),
      'edit_item'         => __( 'Edit Resource Type', 'textdomain' ),
      'update_item'       => __( 'Update Resource Type', 'textdomain' ),
      'add_new_item'      => __( 'Add New Resource Type', 'textdomain' ),
      'new_item_name'     => __( 'New Resource Type Name', 'textdomain' ),
      'menu_name'         => __( 'Resource Types', 'textdomain' ),
    );
  
    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
    );
  
    register_taxonomy( 'resource-type', array( 'resources' ), $args );  $labels = array(
      'name'              => _x( 'News Types', 'taxonomy general name', 'textdomain' ),
      'singular_name'     => _x( 'News Type', 'taxonomy singular name', 'textdomain' ),
      'search_items'      => __( 'Search News Types', 'textdomain' ),
      'all_items'         => __( 'All News Types', 'textdomain' ),
      'parent_item'       => __( 'Parent News Type', 'textdomain' ),
      'parent_item_colon' => __( 'Parent News Type:', 'textdomain' ),
      'edit_item'         => __( 'Edit News Type', 'textdomain' ),
      'update_item'       => __( 'Update News Type', 'textdomain' ),
      'add_new_item'      => __( 'Add New News Type', 'textdomain' ),
      'new_item_name'     => __( 'New News Type Name', 'textdomain' ),
      'menu_name'         => __( 'News Types', 'textdomain' ),
    );
  
    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
    );
  
    register_taxonomy( 'news-type', array( 'news' ), $args );  $labels = array(
      'name'              => _x( 'Groups', 'taxonomy general name', 'textdomain' ),
      'singular_name'     => _x( 'Group', 'taxonomy singular name', 'textdomain' ),
      'search_items'      => __( 'Search Groups', 'textdomain' ),
      'all_items'         => __( 'All Groups', 'textdomain' ),
      'parent_item'       => __( 'Parent Group', 'textdomain' ),
      'parent_item_colon' => __( 'Parent Group:', 'textdomain' ),
      'edit_item'         => __( 'Edit Group', 'textdomain' ),
      'update_item'       => __( 'Update Group', 'textdomain' ),
      'add_new_item'      => __( 'Add New Group', 'textdomain' ),
      'new_item_name'     => __( 'New Group Name', 'textdomain' ),
      'menu_name'         => __( 'Groups', 'textdomain' ),
    );
  
    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
    );
  
    register_taxonomy( 'group', array( 'team' ), $args );}


add_action( 'admin_menu', 'remove_pages_from_menu' );
function remove_pages_from_menu(){
  remove_menu_page( 'edit.php?post_type=page' );
  remove_menu_page( 'edit-comments.php' );
}


function remove_yoast_meta_desc_specific_page ( $removedTag ) {
    if ( is_page ( 'index' ) ) {
        return $removedTag;
    }
}
add_filter( 'wpseo_metadesc', 'remove_yoast_meta_desc_specific_page' );
add_filter( 'wpseo_opengraph_title', 'remove_yoast_meta_desc_specific_page' );
add_filter( 'wpseo_opengraph_url', 'remove_yoast_meta_desc_specific_page' );
add_filter( 'wpseo_opengraph_type', 'remove_yoast_meta_desc_specific_page' );
add_filter( 'wpseo_opengraph_site_name', 'remove_yoast_meta_desc_specific_page' );
add_filter( 'wpseo_locale', 'remove_yoast_meta_desc_specific_page' );
add_filter( 'wpseo_twitter_title', 'remove_yoast_meta_desc_specific_page' );
add_filter( 'wpseo_twitter_card_type', 'remove_yoast_meta_desc_specific_page' );


function copyright_year() {
  $startYear = 2018;
  $curYear = date('Y');
  return $startYear . (($startYear != $curYear) ? '-' . $curYear : '');
}

if ( !is_admin() ) add_filter( 'wp_default_scripts', 'remove_jquery' );
function remove_jquery( &$scripts) {
  $scripts->remove( 'jquery');    
}


function makeSingleCategory($id) {
  if (get_post_type($id) !== 'post') {
    $terms = get_the_terms( $id, 'resource-type' );
    $termName = $terms[0]->name;
    $singular;
    $class;
    switch ($termName) {
        case 'Case Studies':
            $singular = 'Case Study';
            $class = 'case-study';
            break;
        case 'Whitepapers':
            $singular = 'Whitepaper';
            $class = 'whitepaper';
            break;
        case 'Videos':
            $singular = 'Video';
            $class = 'video';
            break;
        case 'Tech Docs':
            $singular = 'Tech Doc';
            $class = 'tech-doc';
            break;
        default:
            $singular = 'Resource';
            $class = 'resource';
            break;
    }
  } elseif (get_post_type($id) == 'post') {
    $termName = null;
    $singular = 'Blog';
    $class = 'blog';
  }
  $array = array(
    'termName' => $termName,
    'singular' => $singular,
    'class' => $class);
  return $array;
}










