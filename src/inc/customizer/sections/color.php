<?php
/**
 * @package ttf-one
 */

if ( ! function_exists( 'ttf_one_customizer_color' ) ) :
/**
 * Configure settings and controls for the Colors section.
 *
 * @since  1.0.0
 *
 * @param  object    $wp_customize    The global customizer object.
 * @param  string    $section         The section name.
 *
 * @return void
 */
function ttf_one_customizer_color( $wp_customize, $section ) {
	$priority = new TTF_One_Prioritizer();
	$control_prefix = 'ttf-one_';
	$setting_prefix = str_replace( $control_prefix, '', $section );

	// Primary Color
	$setting_id = $setting_prefix . '-primary';
	$wp_customize->add_setting(
		$setting_id,
		array(
			'default'           => ttf_one_get_default( $setting_id ),
			'type'              => 'theme_mod',
			'sanitize_callback' => 'maybe_hash_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$control_prefix . $setting_id,
			array(
				'settings' => $setting_id,
				'section'  => $section,
				'label'    => __( 'Primary Color', 'ttf-one' ),
				'priority' => $priority->add()
			)
		)
	);

	// Secondary Color
	$setting_id = $setting_prefix . '-secondary';
	$wp_customize->add_setting(
		$setting_id,
		array(
			'default'           => ttf_one_get_default( $setting_id ),
			'type'              => 'theme_mod',
			'sanitize_callback' => 'maybe_hash_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$control_prefix . $setting_id,
			array(
				'settings' => $setting_id,
				'section'  => $section,
				'label'    => __( 'Secondary Color', 'ttf-one' ),
				'priority' => $priority->add()
			)
		)
	);

	// Text Color
	$setting_id = $setting_prefix . '-text';
	$wp_customize->add_setting(
		$setting_id,
		array(
			'default'           => ttf_one_get_default( $setting_id ),
			'type'              => 'theme_mod',
			'sanitize_callback' => 'maybe_hash_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$control_prefix . $setting_id,
			array(
				'settings' => $setting_id,
				'section'  => $section,
				'label'    => __( 'Text Color', 'ttf-one' ),
				'priority' => $priority->add()
			)
		)
	);

	// Detail Color
	$setting_id = $setting_prefix . '-detail';
	$wp_customize->add_setting(
		$setting_id,
		array(
			'default'           => ttf_one_get_default( $setting_id ),
			'type'              => 'theme_mod',
			'sanitize_callback' => 'maybe_hash_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$control_prefix . $setting_id,
			array(
				'settings' => $setting_id,
				'section'  => $section,
				'label'    => __( 'Detail Color', 'ttf-one' ),
				'priority' => $priority->add()
			)
		)
	);
}
endif;