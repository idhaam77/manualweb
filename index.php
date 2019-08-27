<?php get_header(); ?>
	<div class="row m-0">
	<article class="col-md-9">
	<div class="row">
	<?php while(have_posts()) : the_post(); ?>
		<div class="col-md-4 mt-3">
			<div class="card border-primary">
				<a href="<?php the_permalink(); ?>"><img class="card-img-top" src="<?php btpm_get_thumb($post->ID, 'medium') ?>" alt="<?php the_title(); ?>" /></a>
				<div class="card-body">
					<a href="<?php the_permalink(); ?>" class="text-primary"><p class="card-text"><?php the_title(); ?></p></a>
				</div>
			</div>
		</div>
	<?php endwhile; wp_reset_query(); ?>
	</div>
	<?php wp_bootstrap_pagination(); ?>
<?php get_sidebar(); ?>
	</div>
	
</div>
<?php get_footer(); ?>