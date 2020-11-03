<?php
/**
 * The cpt page template file. 
 *  Template Name: Publications Archive
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
<h2 class="page-title"><?php echo get_the_title($post->ID); ?></h2>
</div>


<div id="content" style="margin-top: 20px;">
  <div class="container content_main">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-8 archive">
      <?php     // show speaking engagements archive posts
     $args = array(
		 'post_type' => 'moreno_publications',
		 'posts_per_page' => -1,
		 'order' => 'DESC',
		 'orderby' => 'date'
    );

     $query = new WP_Query( $args );

     ?>
     <!-- <h3 class="left-quick-search">
       Quick Search
     </h3>
     <h3 class="archive-title">Speaking Engagements</h3> -->
     <ul class="se-archive-list">
      <?php
      if($query->have_posts()) {
        while ($query->have_posts()) {
            # code...
         $query->the_post();
         ?>
         <li>
           <p class="archive-post-title"><?php the_title(); ?>, <?php the_time('F'); ?> <?php the_time('Y'); ?>: <a class="publications-link" href="<?php the_field('publications_link'); ?>" target="_blank">
          <?php the_field('publications_name'); ?>
        </a></p>
         </li>
         <?php
       }
     }

     wp_reset_postdata();
     ?>
   </ul>
   
  </div>
  
  <div class="col-md-4 col-sm-4 col-xs-12 areas-pages-sidebar">
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