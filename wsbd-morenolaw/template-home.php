<?php
/**
 * Template Name: Home 
 *
 * @package wsbd-morenolaw
 */ 

get_header(); ?>

<div class="ei_slideshow">
     <?php echo do_shortcode('[rev_slider homepage]'); ?>
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
