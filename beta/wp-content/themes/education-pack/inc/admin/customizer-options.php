<?php
/**
 * Create education_pack_Startertheme_Customize
 *
 */

/**
 * Class education_pack_Customize_Options
 */
class education_pack_Customize_Options {
	/**
	 * education_pack_Customize_Options constructor.
	 */
	public function __construct() {
		add_action( 'customize_register', [ $this, 'education_pack_deregister' ] );
		add_action( 'thim_customizer_register', [ $this, 'education_pack_create_customize_options' ] );
	}

	/**
	 * Deregister customize default unnecessary
	 *
	 * @param $wp_customize
	 */
	public function education_pack_deregister( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_section( 'header_image' );
		$wp_customize->remove_control( 'blogdescription' );
		$wp_customize->remove_control( 'blogname' );
		$wp_customize->remove_control( 'display_header_text' );
		$wp_customize->remove_section( 'static_front_page' );
		// Rename existing section
		$wp_customize->add_section( 'title_tagline', array(
			'title'    => esc_html__( 'Logo', 'education-pack' ),
			'panel'    => 'general',
			'priority' => 20,
		) );
	}

	/**
	 * Create customize
	 *
	 * @param $wp_customize
	 */
	public function education_pack_create_customize_options( $wp_customize ) {

		//	Auto include sections
		foreach ( glob( EDUCATION_PACK_DIR . "inc/admin/customizer-sections/*.php" ) as $file ) {
			if ( file_exists( $file ) ) {
				require_once $file;
			}
		}
	}
}

$education_pack_customize = new education_pack_Customize_Options();