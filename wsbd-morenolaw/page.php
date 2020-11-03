<?php
/**
 * The page template file. 
 *
 * 
 * @package morenolaw
 */
?>
<?php get_header(); ?>

<div class="page-title-img">
	<?php if( has_post_thumbnail($post_id) ) { ?>
	<?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'featured-img' ) ); ?> 
	<?php } else { ?>
		<img class="featured-img" src="<?php bloginfo('template_url'); ?>/images/featured-img-about.png" alt="featured image" />
	<?php } ?>
	
	<?php 
	if(is_page('immigration-paralegal')){ ?>
	<div class="job-details-wrapper container">
		<div class="job-details-header">
			<h2 class="job-details-page-title"><?php echo get_the_title($post->ID); ?></h2>
			<p class="job-posted-date"><?php _e('Posted on:', 'morenolaw'); ?> <?php echo get_the_date(__('F j, Y','Dates')); ?></p>
			<a href="#contact_form_job_apply" class="fancybox job-apply-button"><?php _e('APPLY','morenolaw'); ?></a>
			<div class="fancybox-hidden" style="display: none;">
				<div id="contact_form_job_apply"><?php echo do_shortcode('[contact-form-7 id="2114" title="Job Apply"]'); ?></div>
			</div>
		</div>
	</div>
	
	<?php 
	} else{ ?>
		<h2 class="page-title"><?php echo get_the_title($post->ID); ?></h2>
	<?php } ?>
	
	
</div>
<div id="content" style="margin-top: 20px;">
<div class="container content_main">
  <div class="row">
    <div class="col-md-12">
      <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; ?>
      <?php else : ?>
      I'm not sure what you're looking for.
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>