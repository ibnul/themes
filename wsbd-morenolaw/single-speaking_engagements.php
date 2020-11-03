<?php

/**
 * single post template
 *
 * 
 * @package morenolaw
 */



?>
<?php get_header(); ?>

<div class="page-title-img">

	<?php echo get_the_post_thumbnail( 1605, 'full', array( 'class' => 'featured-img' ) ); ?> 

	<h2 class="page-title"><?php _e('Speaking Engagements', 'morenolaw'); ?></h2>

</div>

<div id="content" style="margin-top: 20px;">
<div class="container content_main">
  <div class="row">
    <div class="single_latest_news">
      <div class="col-md-8 col-sm-8 col-xs-12">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php if ( has_post_thumbnail() ) :?>

			<div class="single_post_image">

				<?php the_post_thumbnail('full'); ?>

			</div>

		<?php endif; ?>
		<div class="post-date">
			<?php echo get_the_date('d'); ?>
			<?php echo get_the_date('M'); ?>
		</div>
		<div class="post-container">			

			<div class="single_post_title">

				<h2><?php the_title(); ?></h2>

			</div>
			<div class="single_post_meta">
				<ul>
					<li><i class="fa fa-user" aria-hidden="true"></i> <?php echo get_the_author(); ?></li>
					<li><i class="fa fa-eye" aria-hidden="true"></i> <?php echo arixWp_PostViews( get_the_ID(), 'display' ); ?></li>
					<li><i class="fa fa-comment-o" aria-hidden="true"></i> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comments', '1 Comments', '% Comments' ); ?></a></li>
				</ul>
				
			   
				
			</div>

			<div class="single_post_content">

				<?php the_content(); ?>
				<?php arixWp_PostViews( get_the_ID(), 'count' ); ?>
			</div>
			
		</div>
		<div class="clearfix"></div>
		
		<div class="post-author">
			<h5 class="title-bottom about-author"><?php _e('About The Author', 'morenolaw'); ?></h5>
			<div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></div>
			<div class="author-description">
				<p class="author-name"><?php echo get_the_author(); ?></p>
				<p class="author-bio"><?php echo get_the_author_meta('description', get_the_author_meta('ID') ); ?></p>
				<p><a href="mailto:<?php echo get_the_author_meta( 'user_email', get_the_author_meta('ID') ); ?>"><?php
    echo get_the_author_meta( 'user_email', get_the_author_meta('ID') ); ?></a></p>
			</div>
			<div class="clearfix"></div>
		</div>
		
		<div class="post-comments">
			<?php comments_template( '', true ); ?>
		</div>
        <?php endwhile; ?>
        <?php else : ?>
        I'm not sure what you're looking for.
        <?php endif; ?>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 areas-pages-sidebar">
        
		  <div class="archive">
			  <?php     // show speaking engagements archive posts
     $args = array(
      'post_type' => 'speaking_engagements',
      'post_per_page' => 10,
      'offset' => 2
    );

     $query = new WP_Query( $args );

     ?>
     <h3 class="left-quick-search"><?php _e('Quick Search', 'morenolaw'); ?></h3>
     <h3 class="archive-title"><?php _e('Speaking Engagements', 'morenolaw'); ?></h3>
     <ul class="se-archive-list">
      <?php
      if($query->have_posts()) {
        while ($query->have_posts()) {
            # code...
         $query->the_post();
         ?>
         <li>
           <a href="<?php the_permalink(); ?>" class="archive-post-title"><?php the_title(); ?>,</a>
           <p class="news-place">
         <?php echo vp_metabox('place_of_event.place_of_event'); ?>, <?php the_time(F); ?>
         <?php the_time(j); ?>, <?php the_time(Y); ?>
       </p>
         </li>
         <?php
       }
     }

     wp_reset_postdata();
     ?>
   </ul>
    <div class="expand-list">
	   <?php icl_link_to_element(1827,'page',__('Expand List')); ?>
	</div>
 <br>
		  </div>
		  <?php if ( is_active_sidebar( 'latest_news_sidebar' ) ) : ?>
        <div id="sidebar">
          <?php dynamic_sidebar( 'latest_news_sidebar' ); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
