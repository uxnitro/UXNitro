<?php
/**
 * UXNitro Admin Welcome Page
 *
 * Creates a branded welcome page for UXNitro theme.
 * NOTE: Menu page removed - content integrated into dashboard.
 *
 * @package uxnitro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Menu page registration removed to avoid duplicate admin menu entry.
// Welcome content is available via the main UXNitro dashboard page.

/**
 * Welcome page content
 */
function uxnitro_welcome_page_content() {
	?>
	<div class="wrap about-wrap about-wrap-new-feature">
		<h1 class="wp-heading-inline">
			<?php echo esc_html__( 'Welcome to UXNitro', 'uxnitro' ); ?> <?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?>
		</h1>
		
		<div class="about-text">
			<?php echo esc_html__( 'Thank you for choosing UXNitro — the lightweight, hosting-focused WordPress theme built for speed and modern design.', 'uxnitro' ); ?>
		</div>

		<hr class="is-large" />

		<div class="customify-about-wrap">
			<div class="feature-section col three-col">
				<div class="col">
					<h3><?php echo esc_html__( 'Lightning Fast', 'uxnitro' ); ?></h3>
					<p><?php echo esc_html__( 'Built with performance in mind. UXNitro is optimized for speed and works seamlessly with LiteSpeed Cache.', 'uxnitro' ); ?></p>
				</div>
				<div class="col">
					<h3><?php echo esc_html__( 'Beginner Friendly', 'uxnitro' ); ?></h3>
					<p><?php echo esc_html__( 'Easy to use with powerful customization options in the WordPress Customizer. No coding required.', 'uxnitro' ); ?></p>
				</div>
				<div class="col">
					<h3><?php echo esc_html__( 'Hosting Optimized', 'uxnitro' ); ?></h3>
					<p><?php echo esc_html__( 'Perfect for hosting companies, agencies, SaaS sites, blogs, and small business sites.', 'uxnitro' ); ?></p>
				</div>
			</div>
		</div>

		<hr class="is-large" />

		<div class="feature-section col two-col">
			<div>
				<h2><?php echo esc_html__( 'Get Started', 'uxnitro' ); ?></h2>
				<p>
					<?php echo esc_html__( 'UXNitro comes with powerful built-in features to optimize your site:', 'uxnitro' ); ?>
				</p>
				<ul>
					<li><?php echo esc_html__( 'Performance optimization panel', 'uxnitro' ); ?></li>
					<li><?php echo esc_html__( 'Header & Footer builder', 'uxnitro' ); ?></li>
					<li><?php echo esc_html__( 'Typography & color controls', 'uxnitro' ); ?></li>
					<li><?php echo esc_html__( 'Mobile responsive settings', 'uxnitro' ); ?></li>
					<li><?php echo esc_html__( 'Elementor, Gutenberg & SureCart compatibility', 'uxnitro' ); ?></li>
				</ul>
				<p>
					<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus%5Bpanel%5D=uxnitro_performance' ) ); ?>" class="button button-primary">
						<?php echo esc_html__( 'Open Performance Panel', 'uxnitro' ); ?>
					</a>
					<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-secondary">
						<?php echo esc_html__( 'Customize Theme', 'uxnitro' ); ?>
					</a>
				</p>
			</div>
			<div>
				<h2><?php echo esc_html__( 'Performance Features', 'uxnitro' ); ?></h2>
				<p>
					<?php echo esc_html__( 'UXNitro includes a dedicated Performance panel with optimization settings for:', 'uxnitro' ); ?>
				</p>
				<ul>
					<li><?php echo esc_html__( 'WordPress cleanup (emojis, embeds, dashicons)', 'uxnitro' ); ?></li>
					<li><?php echo esc_html__( 'Font optimization & local loading', 'uxnitro' ); ?></li>
					<li><?php echo esc_html__( 'Image & iframe lazy loading', 'uxnitro' ); ?></li>
					<li><?php echo esc_html__( 'Database & heartbeat control', 'uxnitro' ); ?></li>
					<li><?php echo esc_html__( 'Admin area optimization', 'uxnitro' ); ?></li>
				</ul>
			</div>
		</div>

		<hr class="is-large" />

		<div class="feature-section col two-col">
			<div>
				<h2><?php echo esc_html__( 'Need Help?', 'uxnitro' ); ?></h2>
				<p>
					<?php echo esc_html__( 'Check out our documentation or get in touch with our support team.', 'uxnitro' ); ?>
				</p>
				<p>
					<a href="https://uxnitro.com/docs" class="button button-secondary" target="_blank">
						<?php echo esc_html__( 'View Documentation', 'uxnitro' ); ?> ↗
					</a>
					<a href="https://uxnitro.com/support" class="button button-secondary" target="_blank">
						<?php echo esc_html__( 'Contact Support', 'uxnitro' ); ?> ↗
					</a>
				</p>
			</div>
			<div>
				<h2><?php echo esc_html__( 'More from UXNitro', 'uxnitro' ); ?></h2>
				<p>
					<?php echo esc_html__( 'Explore our premium plugins and services for hosting businesses.', 'uxnitro' ); ?>
				</p>
				<p>
					<a href="https://uxnitro.com/plugins" class="button button-secondary" target="_blank">
						<?php echo esc_html__( 'Premium Plugins', 'uxnitro' ); ?> ↗
					</a>
					<a href="https://uxnitro.com/hosting" class="button button-secondary" target="_blank">
						<?php echo esc_html__( 'Hosting Solutions', 'uxnitro' ); ?> ↗
					</a>
				</p>
			</div>
		</div>

		<hr class="is-large" />

		<style>
			.about-wrap-new-feature .col {
				margin-bottom: 30px;
			}
			.about-wrap-new-feature h3 {
				margin-top: 0;
			}
			.about-wrap-new-feature ul {
				list-style: disc;
				margin-left: 20px;
			}
			.about-wrap-new-feature .button {
				margin-right: 10px;
				margin-top: 10px;
			}
		</style>
	</div>
	<?php
}

/**
 * Redirect to welcome page on theme activation
 */
function uxnitro_activation_redirect() {
	if ( get_option( 'uxnitro_activated' ) !== 'yes' ) {
		update_option( 'uxnitro_activated', 'yes' );
		wp_safe_redirect( admin_url( 'themes.php?page=uxnitro-welcome' ) );
		exit;
	}
}
add_action( 'admin_init', 'uxnitro_activation_redirect' );

/**
 * Add admin footer text
 */
function uxnitro_admin_footer_text( $text ) {
	$screen = get_current_screen();
	
	if ( isset( $screen->id ) && strpos( $screen->id, 'uxnitro' ) !== false ) {
		$text = sprintf(
			/* translators: 1: UXNitro, 2: Theme version */
			esc_html__( 'Thank you for using %1$s %2$s', 'uxnitro' ),
			'<strong>UXNitro</strong>',
			wp_get_theme()->get( 'Version' )
		);
	}
	
	return $text;
}
add_filter( 'admin_footer_text', 'uxnitro_admin_footer_text' );
