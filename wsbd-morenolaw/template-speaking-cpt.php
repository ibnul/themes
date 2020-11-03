<?php
/**
 * The cpt page template file. 
 *  Template Name: Speaking / Publications
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
      <div class="col-xs-12 col-sm-6 col-md-4 archive">
      <?php     // show speaking engagements archive posts
     $args = array(
      'post_type' => 'speaking_engagements',
      'posts_per_page' => 10
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
		  
   <h3 class="archive-title"><?php _e('Publications', 'morenolaw'); ?></h3>
   <ul class="pub-archive-list">

      <?php     // show publication archive posts
  $args = array(
    'post_type' => 'moreno_publications',
    'posts_per_page' => 10
  );

  $query = new WP_Query( $args );

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

    <div class="expand-list">
	   <?php icl_link_to_element(1829,'page',__('Expand List')); ?>
	</div>	  
</div>
<div class="col-xs-12 col-sm-6 col-md-8">
  <div class="col-xs-12 col-sm-6 col-md-6">  
   <div class="row">
    <h3 class="archive-tab se-posts">
     <a href="#" class="active"><?php _e('Speaking Engagements', 'morenolaw'); ?></a>
   </h3>
 </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">  
 <div class="row">
  <h3 class="archive-tab publications-posts">
   <a href="#"><?php _e('Publications', 'morenolaw'); ?></a>
  </h3>
</div>
</div>
<div id="se-posts">
<?php $i=10; ?>
<?php
$args = array(
  'post_type' => 'speaking_engagements',
  'posts_per_page' => 10
);

$query = new WP_Query( $args );
?>
<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
 
  <?php endwhile; ?>
	<?php echo do_shortcode('[ajax_load_more id="se-posts" container_type="div" post_type="speaking_engagements" posts_per_page="10" post_format="standard" scroll="false" transition_container="false" button_label="Load More"]'); ?>
  <?php else : ?>
    I'm not sure what you're looking for.
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
  </div>

  <div id="publications-posts" style="display: none;">
<?php $i=0; ?>
<?php
$args = array(
  'post_type' => 'moreno_publications',
  'posts_per_page' => 10
);

$query = new WP_Query( $args );
?>
<?php if($query->have_posts()) { while($query->have_posts()) { $query->the_post(); ?>
  
	  
  <?php } ?>
	<?php echo do_shortcode('[ajax_load_more id="se-posts" container_type="div" post_type="moreno_publications" posts_per_page="10" post_format="standard" scroll="false" transition_container="false" button_label="Load More"]'); ?>
  <?php } else { ?>
    I'm not sure what you're looking for.
  <?php } ?>
  <?php wp_reset_postdata(); ?>
    

  </div>
</div>
</div>
</div>
<?php get_footer(); ?>