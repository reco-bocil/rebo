<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rebo
 */

?>
<div class="breadcrumb">
	<?php brdcmb(); ?>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<header class="entry-header" style="margin-bottom: 20px;">
		
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="title-posts" >', '</h1>' );
		else :
			the_title( '<h2 class="title-posts"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<span style="font-size: 12px; text-transform:uppercase;"> <?php
				rebo_posted_by();
				?></span>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
	</header><!-- .entry-header -->

	<?php rebo_post_thumbnail(); ?>
	
	<div class="cs">

		
		<?php 
		$where=4;
		$content = apply_filters('the_content', get_the_content());
		$content = explode("</p>", $content);
		for($i = 0; $i <count($content);$i++){
			if ($i == $where) { ?>
				
				<a href="https://rebo.biz.id">REBO</a>
				
			<?php }echo $content[$i]."</p>";};
		?>

	</div><!-- .entry-content -->

<?php rebo_entry_footer(); ?>
</article><!-- #post-<?php the_ID(); ?> -->



