<?php get_header(); ?>
			<div class="row m-0">
				<article class="col-md-9">
					<div class="alert alert-success mt-3" role="alert">
						<strong>Selamat Bro..!</strong> Tulisan dengan kata kunci <strong><?php the_search_query(); ?></strong> berhasil ditemukan.
					</div>
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
					<?php endwhile; wp_reset_query(); 
					$the_query = new WP_Query( array( 'posts_per_page' => 2, 'orderby' => 'rand', ) ); // the query order by random
					while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<div class="col-md-4 mt-3">
							<div class="card border-primary">
								<a href="<?php the_permalink(); ?>"><img class="card-img-top" src="<?php btpm_get_thumb($post->ID, 'medium') ?>" alt="<?php the_title(); ?>" /></a>
								<div class="card-body">
									<a href="<?php the_permalink(); ?>" class="text-primary"><p class="card-text"><?php the_title(); ?></p></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
					<?php wp_bootstrap_pagination(); ?>
				</article>
				<?php get_sidebar(); ?>
			</div>
<?php get_footer(); ?>