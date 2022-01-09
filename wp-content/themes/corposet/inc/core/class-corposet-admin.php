<?php

/**
 *  This file load for backend admin panel functions.
 */

class Corposet_Admin {

	/**
	 *  This function used to add customizer section & control.
	 *
	 *  @param object $wp_customize the customizer manager.
	 */
	public function corposet_pro_info( $wp_customize ) {

		$wp_customize->add_section(
			'upgrade_premium',
			array(
				'title'    => __( 'Upgrade to Pro', 'corposet' ),
				'priority' => 1,
			)
		);

		$wp_customize->add_setting(
			'upgrade_ubt_info_buttons',
			array(
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'corposet_sanitize_text',
			)
		);

		$wp_customize->add_control(
			new Corposet_Pro_Info_Control(
				$wp_customize,
				'upgrade_ubt_info_buttons',
				array(
					'section' => 'upgrade_premium',
				)
			)
		);

	}

	public function shapro_theme_customizer() {
		wp_enqueue_script( 'shapro-theme-customizer', get_template_directory_uri() . '/assets/js/customizer-api.js', array( 'jquery' ), '20131205', true );
	}

	public function corposet_preview_register() {
		wp_enqueue_script(
			'shapro-theme-customizer-preview',
			get_stylesheet_directory_uri() . '/assets/js/customizer-view.js',
			array( 'jquery', 'customize-preview' ),
			true
		);

	}
}
