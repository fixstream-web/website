<?php

/*
Since we're not using WordPress for pages, we have to manually handle routing to the proper template. This switch statement will need to reflect the entire catalog of pages.
*/
// **TODO this needs to handle nested pages (i.e. /platform/ecosystem/oracle)
  // ideally nested depth is flexible (right now hard coded up to 3 levels deep)
  // Basically just need the URL path and the locate_template source to include nesting i.e. platform/subpage
add_action('init', 'customRouter');
function customRouter() {
  $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
  switch ($url_path) {
    case "platform": $load = locate_template('platform.php', true); break;
    case "platform/agent-less-auto-discovery": $load = locate_template('platform/agent-less-auto-discovery.php', true); break;
    case "platform/transaction-to-infra-correlation": $load = locate_template('platform/transaction-to-infra-correlation.php', true); break;
    case "platform/machine-learning": $load = locate_template('platform/machine-learning.php', true); break;
    case "platform/architecture": $load = locate_template('platform/architecture.php', true); break;
    case "platform/ecosystem": $load = locate_template('platform/ecosystem.php', true); break;
    case "platform/ecosystem/oracle": $load = locate_template('platform/ecosystem/oracle.php', true); break;
    case "platform/ecosystem/sap": $load = locate_template('platform/ecosystem/sap.php', true); break;
    case "platform/ecosystem/cherwell": $load = locate_template('platform/ecosystem/cherwell.php', true); break;
    case "platform/ecosystem/servicenow": $load = locate_template('platform/ecosystem/servicenow.php', true); break;
    case "platform/ecosystem/new-relic": $load = locate_template('platform/ecosystem/new-relic.php', true); break;
    case "solutions": $load = locate_template('solutions.php', true); break;
    case "solutions/auto-discovery-and-cmdb-update": $load = locate_template('solutions/auto-discovery-and-cmdb-update.php', true); break;
    case "solutions/application-mapping-and-event-correlation": $load = locate_template('solutions/application-mapping-and-event-correlation.php', true); break;
    case "solutions/infrastructure-monitoring": $load = locate_template('solutions/infrastructure-monitoring.php', true); break;
    case "solutions/capacity-exhausting-prediction": $load = locate_template('solutions/capacity-exhausting-prediction.php', true); break;
    case "solutions/noise-reduction": $load = locate_template('solutions/noise-reduction.php', true); break;
    case "solutions/incident-prediction": $load = locate_template('solutions/incident-prediction.php', true); break;
    case "solutions/migration": $load = locate_template('solutions/migration.php', true); break;
    case "solutions/oracle": $load = locate_template('solutions/oracle.php', true); break;
    case "solutions/sap": $load = locate_template('solutions/sap.php', true); break;
    case "solutions/cherwell": $load = locate_template('solutions/cherwell.php', true); break;
    case "solutions/servicenow": $load = locate_template('solutions/servicenow.php', true); break;
    case "solutions/new-relic": $load = locate_template('solutions/new-relic.php', true); break;
    case "solutions/managed-service-providers": $load = locate_template('solutions/managed-service-providers.php', true); break;
    case "resources": $load = locate_template('resources.php', true); break;
    case "resources/dummies": $load = locate_template('resources/dummies.php', true); break;
    case "resources/videos": $load = locate_template('resources/videos.php', true); break;
    case "resources/whitepapers": $load = locate_template('resources/whitepapers.php', true); break;
    case "resources/case-studies": $load = locate_template('resources/case-studies.php', true); break;
    case "resources/tech-docs": $load = locate_template('resources/tech-docs.php', true); break;
    case "customers": $load = locate_template('customers.php', true); break;
    case "customers/broadcom": $load = locate_template('customers/broadcom.php', true); break;
    case "customers/spxflow": $load = locate_template('customers/spxflow.php', true); break;
    case "customers/colv": $load = locate_template('customers/colv.php', true); break;
    case "customers/bt": $load = locate_template('customers/bt.php', true); break;
    case "whats-aiops": $load = locate_template('whats-aiops.php', true); break;
    case "company": $load = locate_template('company.php', true); break;
    case "blog": $load = locate_template('blog.php', true); break;
    default:
  }
  if ($load) {
        exit();
  }
}


add_action( 'init', 'custom_post_types' );
function custom_post_types() {
  register_post_type( 'resources',
      array(
        'labels' => array(
        'name' => __( 'Resources' ),
        'singular_name' => __( 'Resource' )
      ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array(  ),
      )
    );  register_post_type( 'news',
      array(
        'labels' => array(
        'name' => __( 'News Items' ),
        'singular_name' => __( 'News Item' )
      ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array(  ),
      )
    );  register_post_type( 'team',
      array(
        'labels' => array(
        'name' => __( 'Team' ),
        'singular_name' => __( 'Member' )
      ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array(  ),
      )
    );  register_post_type( 'jobs',
      array(
        'labels' => array(
        'name' => __( 'Private Jobs' ),
        'singular_name' => __( 'Private Job' )
      ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array(  ),
      )
    );}

add_action( 'init', 'resource_taxonomies', 0 );
function resource_taxonomies() {
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
      'rewrite'           => array( 'slug' => 'resource-type' ),
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
      'rewrite'           => array( 'slug' => 'news-type' ),
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
      'rewrite'           => array( 'slug' => 'group' ),
    );
  
    register_taxonomy( 'group', array( 'team' ), $args );}

add_action( 'admin_menu', 'remove_pages_from_menu' );
function remove_pages_from_menu(){
  remove_menu_page( 'edit.php?post_type=page' );
  remove_menu_page( 'edit-comments.php' );
}

