<?php
/**
 *
 * This file to add more information about Corposet.
 *
 * @package Corposet
 *
 *  Class to add more information about corposet
 *
 *  @param WP_Customize_Manager $wp_customize    Manager instance.
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

if ( ! class_exists( 'Corposet_Pro_Info_Control' ) ) {

	class Corposet_Pro_Info_Control extends WP_Customize_Control {

		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="upgrade_ubt_info">
				<ul>
					<li><a class="documentation" href="https://docs.unibirdtech.com/" target="_blank"><span class="dashicons dashicons-search"></span>&ensp;<?php esc_html_e( 'Documentation', 'corposet' ); ?> </a></li>

					<li><a class="our-support" href="https://unibirdtech.com/submit-ticket/" target="_blank"><span class="dashicons dashicons-editor-help"></span>&ensp;<?php esc_html_e( 'Satisfactory Support', 'corposet' ); ?> </a></li>

					<li><a class="free-v-pro" href="https://demo.unibirdtech.com/corposet/pro/" target="_blank"><span class="dashicons dashicons-visibility"></span>&ensp;<?php esc_html_e( 'Free Vs Pro Features', 'corposet' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="https://demo.unibirdtech.com/corposet/pro/" target="_blank"><span class="dashicons dashicons-update"></span>&ensp;<?php esc_html_e( 'Upgrade to Pro', 'corposet' ); ?> </a></li>

					<li><a class="nice-feedback" href="https://wordpress.org/support/theme/corposet/reviews/#new-post" target="_blank"><span class="dashicons dashicons-smiley"></span>&ensp;<?php esc_html_e( 'Share a Nice Review', 'corposet' ); ?> </a></li>
				</ul>
			</div>
				<?php
		}

	}

}
