<?php

/**
 * main index file
 *
 * 
 * @package morenolaw
 */



?>
<?php get_header(); ?>

<div id="content" style="margin-top: 120px;">
<div class="container content_main">
  <div class="row">
    <div class="side-padding cont-practice-page">
      <div class="col-md-8 col-sm-8 col-xs-12">
        <?php //if(have_posts()) : while(have_posts()) : the_post(); ?>
	<?php  $args = array( 'post_type' => 'latest_news', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
		  if($loop->have_posts()):
while ( $loop->have_posts() ) : $loop->the_post();
		  ?>
        <h2 class="news-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php //the_content(); ?>
        <?php endwhile; ?>
        <?php else : ?>
        I'm not sure what you're looking for.
        <?php endif; ?>
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
<div class="container-fluid">
  <div class="row">
    <div class="newsletter-cont">
      <div class="col-md-offset-2 col-md-3 col-sm-4 col-xs-12">
        <p class="newsletter-p">
          <?php _e('Subscribe to our Latest News','morenolaw'); ?>
        </p>
      </div>
      <div class="col-md-7 col-xs-12 col-sm-8">
        <?php if ( dynamic_sidebar('newsletter') ) : else : endif; ?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
