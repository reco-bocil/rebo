<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rebo
 */

get_header();
?>

	<main id="single" class="single">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );		

		endwhile; // End of the loop.
		

		?>
	
	
	<div class="nav-single">
		<div class="prev-posts">
		<?php
		$prev_post = get_previous_post();
		if($prev_post) {
		   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
		   echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="link-theme">
		   <div class="prev-single"><div class="col-right"><img src="'.get_the_post_thumbnail_url($prev_post->ID,'thumbnail').' " alt=""/></div>
		   <div class="col-left"><strong><<< SEBELUMNYA </strong></br>'. $prev_title . '&quot;</div></div></a>' . "\n";
						}
		?>
		</div>

		<div class="next-posts">
		<?php
		$next_post = get_next_post();
		if($next_post) {
		   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
		   echo "\t" . '<a rel="prev" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="link-theme">
		   <div class="next-single"><div class="col-right"><strong>SELANJUTNYA >>></strong></br>'. $next_title . '&quot;</div>
		   <div class="col-left"><img src="'.get_the_post_thumbnail_url($next_post->ID,'thumbnail').' " alt=""/></div></div></a>' . "\n";
						}
		?>
		</div>
	</div>

<h3>Related Post :</h3>
  <div class="relatedpost">
  <?php $this_post = $post;$category = get_the_category();
  $category = $category[0]; $category = $category->cat_ID;
  $posts = get_posts('numberposts=11&offset=0&orderby=rand&order=DESC&category='.$category);$count = 0;
  foreach ( $posts as $post ) {if ( $post->ID == $this_post->ID || $count == 6) {unset($posts[$count]);}
  else{$count ++;}}?>
  <?php if ( $posts ) : ?><div class="rel-post">
  <?php foreach ( $posts as $post ) : ?>
  <article><?php rebo_post_thumbnail(); ?><a href="<?php the_permalink() ?>" target="_blank"><?php if ( get_the_title() ){ the_title(); } else { echo "Tidak ada artikel terkait"; } ?></a></article>
  
  <?php endforeach
  // $posts as $post ?></div>
  <?php endif
  // $posts ?>
	  <?php $post = $this_post;unset($this_post);?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
