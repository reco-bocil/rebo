<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rebo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<meta name="clckd" content="bbc816a6019cf29aaa6f50b334d26b37" />
	<meta name='dailymotion-domain-verification' content='dmtzfv99v5v93cvqz' />
	<meta name="p:domain_verify" content="392739aa7f11c047b1d14efc8e065d7e"/>
	<meta name="msvalidate.01" content="984C1EB2D3A78D92B50557BB50089E7B" />
	
	
	<link rel="alternate" href="https://reboart.com/id/" hreflang="x-default">
	<link rel="alternate" href="https://reboart.com/en/" hreflang="en">
	<link rel="alternate" href="https://reboart.com/fr/" hreflang="fr">
	<link rel="alternate" href="https://reboart.com/es/" hreflang="es">
	<link rel="alternate" href="https://reboart.com/mx/" hreflang="es-mx">
	<link rel="alternate" href="https://reboart.com/uk/" hreflang="uk">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	
	<header id="masthead" class="site-header">
		
		<nav class="main-navigation">
	      <input type="checkbox" id="check">
	      <label for="check" class="checkbtn">
	        <i class="fas fa-bars"></i>
	      </label>
	      <label class="logo-nav">
			  <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$rebo_description = get_bloginfo( 'description', 'display' );
			if ( $rebo_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $rebo_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
				</label>
	
	        <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
			<nav class="mobile-navigation">
		      <?php
				the_custom_logo();
			 ?>
		      
		        <?php
				wp_nav_menu(
					array(
						'theme_location' => 'mobile',
						'menu_id'        => 'mobile',
					)
				);
				?>
		     
		    </nav>
	     
	    </nav>
	    

		
	</header><!-- #masthead -->
	<div id="page" class="site">
