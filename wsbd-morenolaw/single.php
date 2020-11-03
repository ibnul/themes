<?php

/**
 * single post template
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
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php if ( has_post_thumbnail() ) :?>

			<div class="post_image">

				<?php the_post_thumbnail('full'); ?>

			</div>

		<?php endif; ?>
		<div class="post-date">
			<?php echo get_the_date('d'); ?>
			<?php echo get_the_date('M'); ?>
		</div>
		<div class="post-container">			

			<div class="single_post_title">

				<?php the_title(); ?>

			</div>
			<div class="single_post_meta">
				<ul>
					<li><i class="fa fa-user" aria-hidden="true"></i> <?php echo get_the_author(); ?></li>
					<li><i class="fa fa-eye" aria-hidden="true"></i> <?php echo arixWp_PostViews( get_the_ID(), 'display' ); ?></li>
					<li><i class="fa fa-comment-o" aria-hidden="true"></i> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comments', '1 Comments', '% Comments' ); ?></a></li>
				</ul>
				
			   
				
			</div>

			<div class="single_post_excerpt">

				<?php the_content(); ?>

			</div>
			
		</div>
		<?php comments_template(); ?>
		<div class="clearfix"></div>
        <?php endwhile; ?>
        <?php else : ?>
        </p>
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

<?php get_footer(); ?>
