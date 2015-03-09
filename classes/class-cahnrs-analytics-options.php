<?php
class CAHNRS_Analytics_Options {

	private $settings_key = 'cahnrs_analytics_options';
	
	public function get_options(){
		
		$options = get_option( $this->settings_key  );
		
		return $options;
		
	} // end method get_options
	
	
	public function add_sections( $wp_customize ){
		
		$wp_customize->add_section('cahnrs_analytics', array(
			'title'       => 'CAHNRS Analytics',
			'description' => '',
			'priority'    => 1,
		));
	
		$wp_customize->add_setting('cahnrs_analytics_options[cahnrs_ua]', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	
		$wp_customize->add_control('cahnrs_analytics_global', array(
			'settings' => 'cahnrs_analytics_options[cahnrs_ua]',
			'label'    => 'CAHNRS Global U-A',
			'section'  => 'cahnrs_analytics',
			'type'     => 'checkbox',
		));
	
		/*$wp_customize->add_setting('cahnrs_analytics_options[extension_ua]', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	
		$wp_customize->add_control('cahnrs_analytics_extension', array(
			'settings' => 'cahnrs_analytics_options[extension_ua]',
			'label'    => 'Extension Global U-A',
			'section'  => 'cahnrs_analytics',
			'type'     => 'checkbox',
		));*/
 
		$wp_customize->add_setting('cahnrs_analytics_options[ua1]', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
	 
		));
 
		$wp_customize->add_control('cahnrs_analytics_ua1', array(
			'label'      => 'U-A Code',
			'section'    => 'cahnrs_analytics',
			'settings'   => 'cahnrs_analytics_options[ua1]',
		));
	
		$wp_customize->add_setting('cahnrs_analytics_options[ua2]', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
	 
		));
 
		$wp_customize->add_control('cahnrs_analytics_ua2', array(
			'label'      => 'Parent U-A ( Optional )',
			'section'    => 'cahnrs_analytics',
			'settings'   => 'cahnrs_analytics_options[ua2]',
		));
	
		$wp_customize->add_setting('cahnrs_analytics_options[ua3]', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
	 
		));
 
		$wp_customize->add_control('cahnrs_analytics_ua3', array(
			'label'      => 'Grandparent U-A ( Optional )',
			'section'    => 'cahnrs_analytics',
			'settings'   => 'cahnrs_analytics_options[ua3]',
		));
		
	} // end method add_customize_section
	
} // end class CAHNRS_Analytics_Options