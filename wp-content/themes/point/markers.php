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
$results2 = thdk_get_markers_by_categoryname("Museum");
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
								                               
								<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next','mythemeshop'), 'previouspagelink' => __('Previous','mythemeshop'), 'pagelink' => '%','echo' => 1 )); ?>
							</div><!--.post-content box mark-links-->
						</div>
					</div>
					<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
			</div>
		</article>
		<aside class="sidebar c-4-12">
			<div class="sidebar">

				<?php 
				
					if(!empty($results)) { 
						$category ="";?>
						<ul>
							<li>
						<?php
							$numItems = count($arr);
							$i = 0;
					     foreach($results as $r) {	
					     	if ($catname == "") 
					     	{
					     		echo "<h2>".$r->catname."</h2><ul>";
					     		$catname = $r->catname;

							}
							if ($catname != $r->catname) {
								echo "</ul><h2>".$r->catname."</h2><ul>";
								$catname = $r->catname;
							}
					     	 
					          echo "<li>".$r->name."</li>";

					          if(++$i === $numItems) {
							    echo "</ul>!";
							  }
					     }
					     echo "</li></ul>";					     
					}
				?>
			</div>
		</aside>
		
<?php get_footer(); ?>