<?php
/**
 * @package ttf-one
 */

if ( ! function_exists( 'ttf_one_customizer_navigation' ) ) :
/**
 * Configure settings and controls for the Navigation section.
 *
 * @since  1.0
 *
 * @return void
 */
function ttf_one_customizer_navigation() {
	global $wp_customize;

	$priority = new TTF_One_Prioritizer();
	$prefix = 'ttf-one_';
	$section = 'nav';

	// Menu Label
	$setting_id = 'navigation-mobile-label';
	$wp_customize->add_setting(
		$setting_id,
		array(
			'default'           => __( 'Menu', 'ttf-one' ),
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_html',
			'theme_supports'    => 'menus'
		)
	);
	$wp_customize->add_control(
		$prefix . $setting_id,
		array(
			'settings' => $setting_id,
			'section'  => $section,
			'label'    => __( 'Mobile Menu Label', 'ttf-one' ),
			'type'     => 'text',
			'priority' => $priority->add()
		)
	);

	// Menu Label info
	$setting_id = 'navigation-mobile-lable-info';
	$wp_customize->add_control(
		new TTF_One_Customize_Misc_Control(
			$wp_customize,
			$prefix . $setting_id,
			array(
				'section'     => $section,
				'type'        => 'text',
				'description' => __( 'Resize your browser window to preview the mobile menu label.', 'ttf-one' ),
				'priority'    => $priority->add()
			)
		)
	);
}
endif;

add_action( 'customize_register', 'ttf_one_customizer_navigation', 20 );