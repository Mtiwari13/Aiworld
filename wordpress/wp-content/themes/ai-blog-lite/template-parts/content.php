<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ai Blog
 */
$ai_blog_categories = get_the_category();
if ($ai_blog_categories) {
	$ai_blog_category = $ai_blog_categories[mt_rand(0, count($ai_blog_categories) - 1)];
} else {
	$ai_blog_category = '';
}
$ai_blog_lite_blog_style = get_theme_mod('ai_blog_lite_blog_style', 'list');
if ($ai_blog_lite_blog_style == 'list' && !is_single()) :
	get_template_part('template-parts/content', 'list');
elseif ($ai_blog_lite_blog_style == 'grid' && !is_single()) :
	get_template_part('template-parts/content', 'grid');
else :
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="xpost-item shadow pb-5 mb-5">
			<div class="xpost-text p-3">
				<?php ai_blog_post_thumbnail(); ?>
				<header class="entry-header pb-4">
					<?php
					if (is_singular()) :
						the_title('<h1 class="entry-title post-title">', '</h1>');
					else :
						the_title('<h2 class="entry-title post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
					endif;

					if ('post' === get_post_type() && is_single()) :
					?>
						<div class="ax-single-blog-post-author-section">
							<div class="ax-blog-post-author-detalis">
								<div class="ax-blog-post-author-img">
									<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo wp_kses_post(get_avatar(get_the_author_meta('ID'))); ?></a>
									<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="ax-blog-post-author-name"><?php echo esc_html(get_the_author_meta('display_name')); ?></a>
								</div>
								<div class="ax-single-blog-post-pub-date">
									<p><?php echo esc_html(get_the_date(get_option('date_format'))); ?></p>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
					if (is_single()) {
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'ai-blog-lite'),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post(get_the_title())
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__('Pages:', 'ai-blog-lite'),
								'after'  => '</div>',
							)
						);
					} else {
						the_excerpt();
					?>
						<a href="<?php the_permalink(); ?>" class="ai-readmore"><?php esc_html_e('Read More', 'ai-blog-lite'); ?></a>

					<?php
					}

					?>
				</div><!-- .entry-content -->
				<?php if (is_single()) : ?>
					<footer class="entry-footer">
						<?php ai_blog_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>