<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ai Blog
 */

?>

<footer id="colophon" class="site-footer pt-3 pb-3">
	<div class="container">
		<div class="site-info text-center">
			<a href="<?php echo esc_url(__('https://wordpress.org/', 'ai-blog')); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf(esc_html__('Proudly powered by %s', 'ai-blog'), 'WordPress');
				?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf(esc_html__('Built with %1$s free theme By %2$s.', 'ai-blog'), '<a href="https://wpthemespace.com/product/ai-blog/">Ai Blog</a>', 'Wp Theme Space');
			?>

		</div><!-- .site-info -->
	</div><!-- .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>