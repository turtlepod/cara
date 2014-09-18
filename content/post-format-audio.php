<article <?php hybrid_attr( 'post' ); ?>>

	<div class="entry-wrap">

		<div class="wrap">

			<div class="entry-header">

				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

				<div class="entry-byline">
					<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
				</div><!-- .entry-byline -->

			</div><!-- .entry-header -->

			<div class="entry-media">
				<?php echo hybrid_media_grabber( array( 'type' => 'audio' ) ); ?>
			</div><!-- .entry-media -->

			<div <?php hybrid_attr( 'entry-summary' ); ?>>
				<?php the_excerpt(); ?>
				<?php tamatebako_read_more(); ?>
			</div><!-- .entry-summary -->

		</div><!-- .wrap -->

	</div><!-- .entry-wrap -->

</article><!-- .entry -->
