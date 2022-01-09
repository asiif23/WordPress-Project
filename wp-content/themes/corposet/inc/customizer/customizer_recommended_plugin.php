<?php

require CORPOSET_INCLUDE . 'customizer-notify/corposet-customizer-notify.php';
$corposet_config_customizer = array(
	'recommended_plugins'       => array(
		'pluglab' => array(
			'recommended' => true,
			'description' => sprintf( 
                /* translators: %s: plugin name */
                esc_html__( 'To get advance features and business sections on the FrontPage, please install and activate the %s plugin.', 'corposet' ), '<strong>PlugLab</strong>' 
            ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'corposet' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'corposet' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'corposet' ),
	'activate_button_label'     => esc_html__( 'Activate', 'corposet' ),
	'corposet_deactivate_button_label'   => esc_html__( 'Deactivate', 'corposet' ),
);
Corposet_Customizer_Notify::init( apply_filters( 'corposet_customizer_notify_array', $corposet_config_customizer ) );