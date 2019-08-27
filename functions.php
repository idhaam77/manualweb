<?php
require ('inc/wp_bootstrap_navwalker.php');
// Register for navigation menu
register_nav_menus(
	array(
		'primary'	=>__('Primary Menu', 'btpm'),
		)
	);
// Function image for thumbnail
require ('inc/wp_btpm_img_attac.php');
// Function page Navigation
require ('inc/wp_bootstrap_pagination.php');
//Register Sidebar
if (function_exists('register_sidebar')) {
	register_sidebar( array(
		'id'			=>	'sidebar-widget',
		'name'			=>	'Sidebar Utama',
		'description'	=>	'Sidebar Samping',
		'before_widget'	=>	'<div class="card border-primary mt-3">',
		'after_widget'	=>	'</div></div>',
		'before_title'	=>	'<div class="card-header text-primary">',
		'after_title'	=>	'</div><div class="card-body text-primary">',
	));
}// Function add class to content area
function add_class_content($content){
    return str_replace(
    	array('<img class="', 'alignleft', 'alignright', 'aligncenter', '<p>', '<li>'),
    	array('<img class="img-fluid img-thumbnail ', 'float-left', 'float-right', 'mx-auto d-block', '<p class="text-justify">', '<li class="text-justify">'),
    	$content
    );
}
add_filter('the_content','add_class_content');
function add_class_the_tags($html){
	return str_replace('<a', '<a class="text-white"', $html);
}
add_filter('the_tags', 'add_class_the_tags');
 
