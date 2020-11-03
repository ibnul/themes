<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage moreno_law
 * @since Moreno-Law
 */
 ?>
<?php get_header(); ?>

<div class="page-title-img">
  <?php echo get_the_post_thumbnail( 1605, 'full', array( 'class' => 'featured-img' ) ); ?>

<h2 class="page-title"><?php _e('Search Results', 'morenolaw'); ?></h2>
</div>

<div id="content" style="margin-top: 20px;">
<div class="container content_main">
  <div class="row">
    <div class="single_latest_news">
      <div class="col-md-8 col-sm-8 col-xs-12 archive">
          
<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>
        <h2 class='search-title'>
			<?php _e('Search Results for', 'morenolaw'); ?>: <?php echo get_query_var('s'); ?>
		</h2>
    
    <ul class="search-list">
    <?php
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?>
                    <li>
                       <a href="<?php the_permalink(); ?>" class="archive-post-title"><?php the_title(); ?>,</a>
                    </li>
                 <?php
        }
    ?>
    </ul>
    <?php
    }else{
?>
			<h2 class="nothing-found-title"><?php _e('Nothing Found', 'morenolaw'); ?></h2>
        <div class="alert alert-info">
          <p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'morenolaw'); ?></p>
        </div>
<?php } ?>
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
