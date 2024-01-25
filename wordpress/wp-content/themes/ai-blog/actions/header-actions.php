<?php

/**
 * The file for header all actions
 *
 *
 * @package Ai Blog
 */

function ai_blog_header_menu_output()
{
?>
	<nav id="site-navigation" class="main-navigation">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'main-menu',
			'menu_id'        => 'ai-blog-menu',
			'menu_class'        => 'ai-blog-menu',
		));
		?>
	</nav><!-- #site-navigation -->
<?php
}
add_action('ai_blog_main_menu', 'ai_blog_header_menu_output');


function ai_blog_header_logo_output()
{
	$ai_blog_site_tagline_show = get_theme_mod('ai_blog_site_tagline_show');

?>

	<?php if (has_custom_logo()) : ?>
		<div class="site-branding brand-logo">
			<?php
			the_custom_logo();
			?>
		</div>
	<?php endif; ?>
	<?php
	if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
		<div class="site-branding brand-text">
			<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
				$ai_blog_description = get_bloginfo('description', 'display');
				if (($ai_blog_description || is_customize_preview()) && empty($ai_blog_site_tagline_show)) :
				?>
					<p class="site-description"><?php echo $ai_blog_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?></p>
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .site-branding -->
	<?php endif; ?>

<?php
}
add_action('ai_blog_header_logo', 'ai_blog_header_logo_output');




// header style one
function ai_blog_header_style1()
{
?>
	<div class="container-fluid pxm-style1">
		<div class="navigation mx-4">
			<div class="d-flex">
				<div class="pxms1-logo">
					<?php do_action('ai_blog_header_logo'); ?>
				</div>
				<div class="pxms1-menu ms-auto">
					<?php do_action('ai_blog_main_menu'); ?>
				</div>
			</div>
		</div>
	</div>


<?php
}
add_action('ai_blog_header_style2', 'ai_blog_header_style1');

// header style one
function ai_blog_header_style2()
{

?>
	<div class="ai-blog-logo-section">
		<div class="container">
			<div class="head-logo-sec">
				<?php do_action('ai_blog_header_logo'); ?>
			</div>
		</div>
	</div>

	<div class="menu-bar text-center">
		<div class="container">
			<div class="ai-blog-container menu-inner">
				<?php do_action('ai_blog_main_menu'); ?>
			</div>
		</div>
	</div>
	<div id="particles-js"></div>

<?php
}
add_action('ai_blog_header_style1', 'ai_blog_header_style2');


// Ai Blog mobile menu
function ai_blog_mobile_menu_output()
{
?>
	<div class="mobile-menu-bar">
		<div class="container">
			<nav id="mobile-navigation" class="mobile-navigation">
				<button id="mmenu-btn" class="menu-btn" aria-expanded="false">
					<span class="mopen"><?php esc_html_e('Menu', 'ai-blog'); ?></span>
					<span class="mclose"><?php esc_html_e('Close', 'ai-blog'); ?></span>
				</button>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'main-menu',
					'menu_id'        => 'wsm-menu',
					'menu_class'        => 'wsm-menu',
				));
				?>
			</nav><!-- #site-navigation -->
		</div>
	</div>

<?php
}
add_action('ai_blog_mobile_menu', 'ai_blog_mobile_menu_output');
