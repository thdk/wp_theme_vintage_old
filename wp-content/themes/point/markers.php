<?php
/**
 * Template Name: Markers
 */
?> 
<?php $mts_options = get_option('point'); ?>
<?php get_header(); ?>

<?php
wp_enqueue_script('markers', get_stylesheet_directory_uri() . '/js/markers.js');

$results = thdk_get_all_markers();
?>  

<script type="text/javascript">
jsonmarkers =  <?= json_encode($results); ?>
</script>

<style type="text/css">
#map-canvas {
width: 100%;
height: 400px;
}
</style>

<div id="page" class="single">
	<div class="content">
		<article class="article">
			<div id="content_box" >
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
						<div class="single_page">
							<header>
								<h1 class="title"><?php the_title(); ?></h1>
							</header>
							<div class="post-content box mark-links">
								<?php the_content(); ?>
								<div id="map-canvas"></div>
								<!-- // if(!empty($results)) { 
								//      foreach($results as $r) {	 
								//           echo "<p>".$r->name.": ".$r->xpos." - ".$r->ypos."</p>";
								//      }
								// } else {
								//      echo "<p>Boo, we couldn't find anything that is in all these groups. Try removing a category!</p>";	 	 
								// }  -->

								                               
								<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next','mythemeshop'), 'previouspagelink' => __('Previous','mythemeshop'), 'pagelink' => '%','echo' => 1 )); ?>
							</div><!--.post-content box mark-links-->
						</div>
					</div>
					<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
			</div>
		</article>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>