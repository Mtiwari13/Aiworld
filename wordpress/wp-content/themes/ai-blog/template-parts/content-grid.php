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
?>
<div class="col-lg-6 mb-4 js-scroll fade-in-bottom">
	<article id="post-<?php the_ID(); ?>" <?php post_class('ai-blog-list-item'); ?>>
		<div class="ax-single-blog-post">

			<?php if (has_post_thumbnail()) : ?>
				<div class="ax-single-blog-post-img">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="ax-single-blog-post-details">
				<div class="ai-blog-meta">
					<div class="ax-blog-post-author-detalis">
						<div class="ax-blog-post-author-img">
							<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo wp_kses_post(get_avatar(get_the_author_meta('ID'))); ?></a>
							<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="ax-blog-post-author-name"><?php echo esc_html(get_the_author_meta('display_name')); ?></a>
						</div>
						<div class="ax-single-blog-post-pub-date">
							<p><?php echo esc_html(get_the_date(get_option('date_format'))); ?></p>
						</div>
						<a class="blog-categrory" href="<?php echo esc_url(get_category_link($ai_blog_category)); ?>"><?php echo esc_html($ai_blog_category->name); ?></a>
					</div>

				</div>
				<h2 class="ax-single-blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="ax-single-blog-post-dres">
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="ai-readmore"><?php esc_html_e('Read More', 'ai-blog'); ?></a>
				</div>

			</div>
		</div>

	</article><!-- #post-<?php the_ID(); ?> -->
</div>