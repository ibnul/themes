<?php
/**
 * Template Name: Law Areas 
 *
 * @package wsbd-morenolaw
 */

get_header(); ?> 

<div id="single-law-areas" class="page-title-img">

	<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-img' ) ); ?> 

	<h2 class="page-title"><?php echo get_the_title($post->ID); ?></h2>
	<p class="area-excerpt"><?php echo get_the_excerpt(); ?></p>

</div>

<div id="content">
	<div id="primary" class="content-area container">
	
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content('read more...'); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php echo '<p>Nothing to show</p>'; ?>

		<?php endif; ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
