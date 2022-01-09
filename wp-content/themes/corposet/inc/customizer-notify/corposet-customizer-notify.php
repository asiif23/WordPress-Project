<?php

class Corposet_Customizer_Notify {

	private $recommended_actions;

	
	private $recommended_plugins;

	
	private static $instance;

	
	private $recommended_actions_title;

	
	private $recommended_plugins_title;

	
	private $dismiss_button;

	
	private $install_button_label;

	
	private $activate_button_label;

	
	private $corposet_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Corposet_Customizer_Notify ) ) {
			self::$instance = new Corposet_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $corposet_customizer_notify_recommended_plugins;
		global $corposet_customizer_notify_recommended_actions;

		global $install_button_label;
		global $activate_button_label;
		global $corposet_deactivate_button_label;

		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->recommended_actions_title = isset( $this->config['recommended_actions_title'] ) ? $this->config['recommended_actions_title'] : '';
		$this->recommended_plugins_title = isset( $this->config['recommended_plugins_title'] ) ? $this->config['recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$corposet_customizer_notify_recommended_plugins = array();
		$corposet_customizer_notify_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$corposet_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->recommended_actions ) ) {
			$corposet_customizer_notify_recommended_actions = $this->recommended_actions;
		}

		$install_button_label    = isset( $this->config['install_button_label'] ) ? $this->config['install_button_label'] : '';
		$activate_button_label   = isset( $this->config['activate_button_label'] ) ? $this->config['activate_button_label'] : '';
		$corposet_deactivate_button_label = isset( $this->config['corposet_deactivate_button_label'] ) ? $this->config['corposet_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'corposet_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'corposet_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'corposet_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'corposet_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function corposet_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'corposet-customizer-notify-css', get_template_directory_uri() . '/inc/customizer-notify/css/corposet-customizer-notify.css', array());

		wp_enqueue_style( 'corposet-plugin-install' );
		wp_enqueue_script( 'corposet-plugin-install' );
		wp_add_inline_script( 'corposet-plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'corposet-updates' );

		wp_enqueue_script( 'corposet-customizer-notify-js', get_template_directory_uri() . '/inc/customizer-notify/js/corposet-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'corposet-customizer-notify-js', 'CorposetCustomizercompanionObject', array(
				'corposet_ajaxurl'            => esc_url(admin_url( 'admin-ajax.php' )),
				'corposet_template_directory' => esc_url(get_template_directory_uri()),
				'corposet_base_path'          => esc_url(admin_url()),
				'corposet_activating_string'  => __( 'Activating', 'corposet' ),
			)
		);

	}

	
	public function corposet_plugin_notification_customize_register( $wp_customize ) {

		
		require_once CORPOSET_INCLUDE . 'customizer-notify/corposet-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Corposet_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Corposet_Customizer_Notify_Section(
				$wp_customize,
				'Corposet-customizer-notify-section',
				array(
					'title'          => $this->recommended_actions_title,
					'plugin_text'    => $this->recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function corposet_customizer_notify_dismiss_recommended_action_callback() {

		global $corposet_customizer_notify_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			
			if ( get_theme_mod( 'corposet_customizer_notify_show' ) ) {

				$corposet_customizer_notify_show_recommended_actions = get_theme_mod( 'corposet_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$corposet_customizer_notify_show_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$corposet_customizer_notify_show_recommended_actions[ $action_id ] = false;
						break;
				}
				echo esc_html($corposet_customizer_notify_show_recommended_actions);
				
			} else {
				$corposet_customizer_notify_show_recommended_actions = array();
				if ( ! empty( $corposet_customizer_notify_recommended_actions ) ) {
					foreach ( $corposet_customizer_notify_recommended_actions as $corposet_lite_customizer_notify_recommended_action ) {
						if ( $corposet_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$corposet_customizer_notify_show_recommended_actions[ $corposet_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$corposet_customizer_notify_show_recommended_actions[ $corposet_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					echo esc_html($corposet_customizer_notify_show_recommended_actions);
				}
			}
		}
		die(); 
	}

	
	public function corposet_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			$corposet_lite_customizer_notify_show_recommended_plugins = get_theme_mod( 'corposet_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$corposet_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$corposet_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			// echo esc_html($corposet_customizer_notify_show_recommended_actions);
			update_option( 'corposet_customizer_notify_show_recommended_actions', $corposet_lite_customizer_notify_show_recommended_plugins );
		}
		die(); 
	}

}
