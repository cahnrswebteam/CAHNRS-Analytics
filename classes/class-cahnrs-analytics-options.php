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
		
		$wp_customize->add_setting('cahnrs_analytics_options[wsu_ua]', array(
			'default'        => '0',
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	
		$wp_customize->add_control('cahnrs_analytics_wsu_global', array(
			'settings' => 'cahnrs_analytics_options[wsu_ua]',
			'label'    => 'Disable WSU Global U-A',
			'section'  => 'cahnrs_analytics',
			'type'     => 'checkbox',
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
		
		
		$wp_customize->add_setting('cahnrs_analytics_options[campus]', array(
			'default'        => 'none',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
	 
		));
 
		$wp_customize->add_control('cahnrs_analytics_campus', array(
			'label'      => 'Campus ( Optional )',
			'section'    => 'cahnrs_analytics',
			'settings'   => 'cahnrs_analytics_options[campus]',
			'type'       => 'select',
			'choices'    => array(
				'none'         => 'None',
				'pullman'      => 'Pullman',
				'spokane'      => 'Spokane',
				'everett'      => 'Everett',
				'globalcampus' => 'Global Campus',
				'vancouver'    => 'Vancouver',
			)
		));
		
		$wp_customize->add_setting('cahnrs_analytics_options[unit_type]', array(
			'default'        => 'none',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
	 
		));
 
		$wp_customize->add_control('cahnrs_analytics_unit_type', array(
			'label'      => 'Unit Type ( Optional )',
			'section'    => 'cahnrs_analytics',
			'settings'   => 'cahnrs_analytics_options[unit_type]',
			'type'       => 'select',
			'choices'    => array(
				'none'       => 'None',
				'unit'       => 'Unit',
				'office'     => 'Office',
				'school'     => 'School',
				'department' => 'Department',
				'program'    => 'Program',
				'center'     => 'Center',
				'laboratory' => 'Laboratory',
			)
		));
		
		$wp_customize->add_setting('cahnrs_analytics_options[site_url]', array(
			'default'        => $_SERVER['SERVER_NAME'],
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
	 
		));
 
		$wp_customize->add_control('cahnrs_analytics_site_url', array(
			'label'      => 'Base URL ( Optional )',
			'section'    => 'cahnrs_analytics',
			'settings'   => 'cahnrs_analytics_options[site_url]',
		));
		
	} // end method add_customize_section
	
} // end class CAHNRS_Analytics_Options