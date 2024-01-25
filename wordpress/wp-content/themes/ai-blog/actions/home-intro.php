<?php
/*
*
* Home intro section
*
*
*/



function ai_blog_hbanner_section_output()
{
  $ai_blog_hbanner_show = get_theme_mod('ai_blog_hbanner_show');
  if (empty($ai_blog_hbanner_show)) {
    return;
  }
  $ai_blog_dfimgh = get_template_directory_uri() . '/assets/img/banner.jpg';
  $ai_blog_hbanner_img = get_theme_mod('ai_blog_hbanner_img', $ai_blog_dfimgh);
  $ai_blog_hbanner_subtitle = get_theme_mod('ai_blog_hbanner_subtitle', __('Challenges in the World of AI', 'ai-blog'));
  $ai_blog_hbanner_title = get_theme_mod('ai_blog_hbanner_title', __('The AI Revolution', 'ai-blog'));
  $ai_blog_color_title = get_theme_mod('ai_blog_color_title', __('Leading AI Experts ', 'ai-blog'));
  $ai_blog_hbanner_desc = get_theme_mod('ai_blog_hbanner_desc');
  $ai_blog_btn_text_one = get_theme_mod('ai_blog_btn_text_one', __('Read More', 'ai-blog'));
  $ai_blog_btn_url_one = get_theme_mod('ai_blog_btn_url_one', '#');

?>
  <!-- home -->
  <section class="aghome" id="home">
    <div id="ax-praticals"></div>
    <div class="ax-home-single-slide-all-content">
      <?php if ($ai_blog_hbanner_img) : ?>
        <div class="ax-home-bg">
          <img src="<?php echo esc_url($ai_blog_hbanner_img); ?>" alt="<?php esc_attr($ai_blog_hbanner_title); ?>">
        </div>
      <?php endif; ?>
      <div class="ax-home-details">
        <div class="container">
          <?php if ($ai_blog_hbanner_subtitle) : ?>
            <div class="ax-home-subtitle">
              <p><?php echo esc_html($ai_blog_hbanner_subtitle); ?></p>
            </div>
          <?php endif; ?>
          <?php if ($ai_blog_hbanner_title || $ai_blog_color_title) : ?>
            <div class="ax-home-title">
              <?php if ($ai_blog_hbanner_title) : ?>
                <h1><?php echo esc_html($ai_blog_hbanner_title); ?>
                </h1>
              <?php endif; ?>
              <?php if ($ai_blog_color_title) : ?>
                <h1 class="ax-section-title"><?php echo esc_html($ai_blog_color_title); ?>
                <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if ($ai_blog_hbanner_desc) : ?>
            <div class="ax-home-dres">
              <p><?php echo wp_kses_post($ai_blog_hbanner_desc); ?></p>
            </div>
          <?php endif; ?>
          <?php if ($ai_blog_btn_url_one) : ?>
            <div class="ax-home-btn">
              <a href="<?php echo esc_url($ai_blog_btn_url_one); ?>" class="ax-home-first-btn"><?php echo esc_html($ai_blog_btn_text_one); ?></a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

<?php
}
add_action('ai_blog_hbanner', 'ai_blog_hbanner_section_output');
