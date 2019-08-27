<?php get_header(); ?>
			<div class="row m-0">
				<article class="col-md-9">
					<div class="alert alert-info mt-3" role="alert">
						<?php if (is_category()) { ?>Kumpulan Tulisan Dalam Kategori <strong><?php single_cat_title(); ?></strong>
						<?php } elseif (is_tag()) { ?>Kumpulan Tulisan Menggunakan Tag <strong><?php single_tag_title(); ?></strong>
						<?php } elseif (is_day()) { ?>Kumpulan Tulisan Pada Tanggal <strong><?php the_time('F jS, Y'); ?></strong>
						<?php } elseif (is_month()) { ?>Kumpulan Tulisan Pada Bulan <strong><?php the_time('F, Y'); ?></strong>
						<?php } elseif (is_year()) { ?>Kumpulan Tulisan Pada Tahun <strong><?php the_time('Y'); ?></strong>
						<?php } ?>
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
					<?php endwhile; wp_reset_query(); ?>
					</div>
					<?php wp_bootstrap_pagination(); ?>
				</article>
				<?php get_sidebar(); ?>
			</div>
<?php get_footer(); ?>