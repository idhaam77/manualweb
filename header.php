<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php if   ( is_home() )     { bloginfo('name'); echo ' - '; bloginfo('description'); }
				elseif ( is_category() ) { single_cat_title(); echo ' - '; bloginfo('name'); }
				elseif ( is_single() )   { single_post_title(); echo ' - '; bloginfo('name'); }
				elseif ( is_page() )     { single_post_title(); echo ' - '; bloginfo('name'); } 
				else                     { wp_title('', true); } ?>
		</title>
				  
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Load Css File's -->
		<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />
		<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-grid.min.css" rel="stylesheet" />
		<link href="<?php bloginfo('template_directory'); ?>/css/bootstrap-reboot.min.css" rel="stylesheet" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>
	<body>
		
	<div class="container-fluid p-0">
		<header class="jumbotron jumbotron-fluid bg-primary text-white mb-0 pt-3 pb-3">
			<div class="container ml-0">
				<h1 class="display-4"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" class="text-white" ><?php bloginfo('name'); ?></a></h1>
					<p class="lead mb-0"><?php bloginfo('description');?></p>
					<img src="/images/header.png" alt="" style="width:600px;height:200px;">
			</div>
		</header>
		<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #e3f2fd;">
	<a class="navbar-brand" href="<?php echo home_url(); ?>">HOME</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBTPM" aria-controls="navbarBTPM" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="navbarBTPM" class="collapse navbar-collapse">
		<?php wp_nav_menu( 
			array(
				'menu'				=>	'primary',
				'theme_location'	=>	'primary',
				'depth'				=>	2,
				'container'			=>	'',
				'container_class'	=>	'',
				'container_id'		=>	'',
				'menu_class'		=>	'navbar-nav mr-auto mt-2 mt-lg-0',
				'fallback_cb'		=>	'WP_Bootstrap_Navwalker::fallback',
				'walker'			=>	new WP_Bootstrap_Navwalker()
			) 
		); ?>
		<form class="form-inline my-2 my-lg-0" method="get" action="<?php bloginfo('home'); ?>/">
			<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" onclick="this.value='';" name="s">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>