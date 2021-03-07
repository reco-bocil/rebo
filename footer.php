<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rebo
 */

?>

	</div><!-- #page -->
	<footer id="colophon" class="footer">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer',
				)
			);
		?>
		<div class="site-info">
			
			<span class="sep"> </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme by %2$s.', 'rebo' ), 'rebo', '<a href="https://reboart.com">Rebo</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<!--noptimize-->
	<script type="text/javascript">
	function downloadJSAtOnload() {
	var element = document.createElement("script");
	element.src = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";
	document.body.appendChild(element);
	}
	if (window.addEventListener)
	window.addEventListener("load", downloadJSAtOnload, false);
	else if (window.attachEvent)
	window.attachEvent("onload", downloadJSAtOnload);
	else window.onload = downloadJSAtOnload;
	</script>
	<!--/noptimize-->


<?php wp_footer(); ?>

</body>
</html>
