<article <?php hybrid_attr( 'post' ); ?>>

	<div class="entry-wrap">

		<div class="wrap">

			<div class="entry-header">

				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

				<div class="entry-byline">
					<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
				</div><!-- .entry-byline -->

			</div><!-- .entry-header -->

			<?php if( has_post_thumbnail() ){ ?>
			<div class="featured-image-wrap">
				<div class="featured-image">
					<?php get_the_image( array( 'attachment' => false, 'size' => 'medium' ) ); ?>
				</div><!-- .featured-image -->
			</div><!-- .featured-image-wrap -->
			<?php } // end check post thumbnail ?>

			<div <?php hybrid_attr( 'entry-summary' ); ?>>
				<?php the_excerpt(); ?>
				<?php tamatebako_read_more(); ?>
			</div><!-- .entry-summary -->

		</div><!-- .wrap -->

	</div><!-- .entry-wrap -->

</article><!-- .entry -->
