<?php

/**
 * About setup
 *
 * @package Ai Blog
 */

require_once trailingslashit(get_template_directory()) . 'inc/about/class.about.php';

if (!function_exists('ai_blog_about_setup')) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function ai_blog_about_setup()
	{
		$theme = wp_get_theme();
		$xtheme_name = $theme->get('Name');
		$xtheme_domain = $theme->get('TextDomain');




		$config = array(
			// Menu name under Appearance.
			'menu_name'               => sprintf(esc_html__('%s Info', 'ai-blog'), $xtheme_name),
			// Page title.
			'page_name'               => sprintf(esc_html__('%s Info', 'ai-blog'), $xtheme_name),
			/* translators: Main welcome title */
			'welcome_title'         => sprintf(esc_html__('Welcome to %s! - Version ', 'ai-blog'), $theme['Name']),
			// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf(esc_html__('%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'ai-blog'), $theme['Name']),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__('Getting Started', 'ai-blog'),
				'recommended_actions' => esc_html__('Recommended Actions', 'ai-blog'),
				'useful_plugins'  => esc_html__('Useful Plugins', 'ai-blog'),
				'free_pro'  => esc_html__('Free Vs Pro', 'ai-blog'),
			),

			// Quick links.
			'quick_links' => array(
				'xmagazine_url' => array(
					'text'   => esc_html__('UPGRADE Ai Blog PRO', 'ai-blog'),
					'url'    => 'https://wpthemespace.com/product/ai-blog-pro/?add-to-cart=8864',
					'button' => 'danger',
				),

				'update_url' => array(
					'text'   => esc_html__('Ai Blog PRO Video', 'ai-blog'),
					'url'    => 'https://www.youtube.com/watch?v=Bcf5Ve1eObE',
					'button' => 'danger',
				),

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__('Demo Content', 'ai-blog'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('Demo content is pro feature. To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'ai-blog'), esc_html__('One Click Demo Import', 'ai-blog')),
					'button_text' => esc_html__('UPGRADE For  Demo Content', 'ai-blog'),
					'button_url'  => 'https://wpthemespace.com/product/ai-blog-pro/?add-to-cart=8864',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),

				'two' => array(
					'title'       => esc_html__('Theme Options', 'ai-blog'),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__('Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'ai-blog'),
					'button_text' => esc_html__('Customize', 'ai-blog'),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
				),
				'three' => array(
					'title'       => esc_html__('Show Video', 'ai-blog'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('You may show Ai Blog short video for better understanding', 'ai-blog'), esc_html__('One Click Demo Import', 'ai-blog')),
					'button_text' => esc_html__('Show video', 'ai-blog'),
					'button_url'  => 'https://www.youtube.com/watch?v=Bcf5Ve1eObE',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),
				'five' => array(
					'title'       => esc_html__('Set Widgets', 'ai-blog'),
					'icon'        => 'dashicons dashicons-tagcloud',
					'description' => esc_html__('Set widgets in your sidebar, Offcanvas as well as footer.', 'ai-blog'),
					'button_text' => esc_html__('Add Widgets', 'ai-blog'),
					'button_url'  => admin_url() . '/widgets.php',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'six' => array(
					'title'       => esc_html__('Theme Preview', 'ai-blog'),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__('You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'ai-blog'),
					'button_text' => esc_html__('View Demo', 'ai-blog'),
					'button_url'  => 'https://blog.wpteamx.com/ai/ai-demos/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'seven' => array(
					'title'       => esc_html__('Contact Support', 'ai-blog'),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__('Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'ai-blog'),
					'button_text' => esc_html__('Contact Support', 'ai-blog'),
					'button_url'  => 'https://wpthemespace.com/support/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
			),

			'useful_plugins'        => array(
				'description' => esc_html__('Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'ai-blog'),
				'already_activated_message' => esc_html__('Already activated', 'ai-blog'),
				'version_label' => esc_html__('Version: ', 'ai-blog'),
				'install_label' => esc_html__('Install and Activate', 'ai-blog'),
				'activate_label' => esc_html__('Activate', 'ai-blog'),
				'deactivate_label' => esc_html__('Deactivate', 'ai-blog'),
				'content'                   => array(
					array(
						'slug' => 'magical-addons-for-elementor',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-products-display'
					),
					array(
						'slug' => 'magical-posts-display'
					),
					array(
						'slug' => 'click-to-top'
					),
					array(
						'slug' => 'gallery-box',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-blocks'
					),
					array(
						'slug' => 'easy-share-solution',
						'icon' => 'svg',
					),
					array(
						'slug' => 'wp-edit-password-protected',
						'icon' => 'svg',
					),
				),
			),
			// Required actions array.
			'recommended_actions'        => array(
				'install_label' => esc_html__('Install and Activate', 'ai-blog'),
				'activate_label' => esc_html__('Activate', 'ai-blog'),
				'deactivate_label' => esc_html__('Deactivate', 'ai-blog'),
				'content'            => array(
					'magical-blocks' => array(
						'title'       => __('Magical Posts Display', 'ai-blog'),
						'description' => __('Now you can add or update your site elements very easily by Magical Products Display. Supercharge your Elementor block with highly customizable Magical Blocks For WooCommerce.', 'ai-blog'),
						'plugin_slug' => 'magical-products-display',
						'id' => 'magical-posts-display'
					),
					'go-pro' => array(
						'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/ai-blog-pro/?add-to-cart=8864">' . __('UPGRADE Ai Blog PRO', 'ai-blog') . '</a>',
						'description' => __('You will get more frequent updates and quicker support with the Pro version.', 'ai-blog'),
						//'plugin_slug' => 'x-instafeed',
						'id' => 'go-pro'
					),

				),
			),
			// Free vs pro array.
			'free_pro'                => array(
				'free_theme_name'     => $xtheme_name,
				'pro_theme_name'      => $xtheme_name . __(' Pro', 'ai-blog'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/ai-blog-pro/',
				/* translators: View link */
				'get_pro_theme_label' => sprintf(__('Get %s', 'ai-blog'), 'Ai Blog Pro'),
				'features'            => array(
					array(
						'title'       => esc_html__('Daring Design for Devoted Readers', 'ai-blog'),
						'description' => esc_html__('Ai Blog\'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'ai-blog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Mobile-Ready For All Devices', 'ai-blog'),
						'description' => esc_html__('Ai Blog makes room for your readers to enjoy your articles on the go, no matter the device their using. We shaped everything to look amazing to your audience.', 'ai-blog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Home slider', 'ai-blog'),
						'description' => esc_html__('Ai Blog gives you extra slider feature. You can create awesome home slider in this theme.', 'ai-blog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Widgetized Sidebars To Keep Attention', 'ai-blog'),
						'description' => esc_html__('Ai Blog comes with a widget-based flexible system which allows you to add your favorite widgets over the Sidebar as well as on offcanvas too.', 'ai-blog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Auto Set-up Feature', 'ai-blog'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'ai-blog'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Multiple Header Layout', 'ai-blog'),
						'description' => esc_html__('Ai Blog gives you extra ways to showcase your header with miltiple layout option you can change it on the basis of your requirement', 'ai-blog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('One Click Demo install', 'ai-blog'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'ai-blog'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Extra Drag and drop support', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advanced News Filter', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('News/posts Carousel', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Diffrent Style Blog', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Flexible Home Page Design', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Pro Service Section', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Animation Home Text', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Customizer Options', 'ai-blog'),
						'description' => esc_html__('Advance control for each element gives you different way of customization and maintained you site as you like and makes you feel different.', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Pagination', 'ai-blog'),
						'description' => esc_html__('Multiple Option of pagination via customizer can be obtained on your site like Infinite scroll, Ajax Button On Click, Number as well as classical option are available.', 'ai-blog'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),

					array(
						'title'       => esc_html__('Premium Support and Assistance', 'ai-blog'),
						'description' => esc_html__('We offer ongoing customer support to help you get things done in due time. This way, you save energy and time, and focus on what brings you happiness. We know our products inside-out and we can lend a hand to help you save resources of all kinds.', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('No Credit Footer Link', 'ai-blog'),
						'description' => esc_html__('You can easily remove the Theme: Ai Blog by Ai Blog copyright from the footer area and make the theme yours from start to finish.', 'ai-blog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
				),
			),

		);

		ai_blog_About::init($config);
	}

endif;

add_action('after_setup_theme', 'ai_blog_about_setup');



function ai_blog_pnotice_output()
{

?>
	<div class="mgadin-hero">
		<div class="mge-info-content">
			<div class="mge-info-hello">
				<?php
				$current_theme = wp_get_theme();
				$current_theme_name = $current_theme->get('Name');
				$current_user = wp_get_current_user();
				$demo_link = esc_url('https://wpthemespace.com/product/ai-blog-pro/');
				$pro_link = esc_url('https://wpthemespace.com/product/ai-blog-pro/?add-to-cart=8864');

				esc_html_e('Hello, ', 'ai-blog');
				echo esc_html($current_user->display_name);
				?>

				<?php esc_html_e('👋🏻', 'ai-blog'); ?>
			</div>
			<div class="mge-info-desc">
				<div><?php printf(esc_html__('Your Site Running %s Free Version. Upgrade to Ai Blog Pro and take your website to the next level! With advanced features and a simple one-click demo installation, you can easily create a professional-grade website that stands out from the crowd. Don\'t wait any longer, get Ai Blog Pro now and start building the website of your dreams!', 'ai-blog'), $current_theme_name); ?></div>
				<div class="mge-offer"><?php printf(esc_html__('Unlock the power of Ai Blog Pro for an unbeatable price of $21!', 'ai-blog'), $current_theme_name); ?></div>
			</div>
			<div class="mge-info-actions">
				<a href="<?php echo esc_url($pro_link); ?>" target="_blank" class="button button-primary upgrade-btn">
					<?php esc_html_e('Upgrade Pro', 'ai-blog'); ?>
				</a>
				<!-- <a href="<?php // echo esc_url($demo_link); 
								?>" target="_blank" class="button button-primary demo-btn">
					<?php // esc_html_e('View Details', 'ai-blog'); 
					?>
				</a> -->
				<button class="button button-info btnend"><?php esc_html_e('Dismiss this notice', 'ai-blog') ?></button>
			</div>

		</div>

	</div>
<?php
}


//Admin notice 
function ai_blog_new_optins_texts()
{
	$hide_date = get_option('ai_blog_pro_info_date');
	if (!empty($hide_date)) {
		$clickhide = round((time() - strtotime($hide_date)) / 24 / 60 / 60);
		if ($clickhide < 25) {
			return;
		}
	}


?>
	<div class="mgadin-notice notice notice-success mgadin-theme-dashboard mgadin-theme-dashboard-notice mge is-dismissible meis-dismissible">
		<?php ai_blog_pnotice_output(); ?>
	</div>
<?php

}
add_action('admin_notices', 'ai_blog_new_optins_texts');



function ai_blog_new_optins_texts_init()
{
	if (isset($_GET['xbnotice']) && $_GET['xbnotice'] == 1) {
		update_option('ai_blog_pro_info_date', current_time('mysql'));
	}
}
add_action('init', 'ai_blog_new_optins_texts_init');
