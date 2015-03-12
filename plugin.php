<?php
/**
 * Plugin Name: CAHNRS Analytics.
 * Plugin URI: https://github.com/cahnrswebteam/CAHNRS-Analytics/wiki
 * Description: Custom Analytics for CAHNRS.
 * Version: 1.0.3
 * Author: CAHNRS Communications, Danial Bleile
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: GPL2
*/

define( 'CAHNRSANALYTICS' , true );

define( 'CAHNRSANALYTICSURL' , plugin_dir_url( __FILE__ ) ); // Plugin Base url
		
define( 'CAHNRSANALYTICSDIR' , plugin_dir_path( __FILE__ ) ); // Plugin Directory Path 

require_once CAHNRSANALYTICSDIR .'classes/class-cahnrs-analytics-options.php';

require_once CAHNRSANALYTICSDIR .'classes/class-cahnrs-analytics-tracker.php';

require_once CAHNRSANALYTICSDIR .'classes/class-cahnrs-analytics-post-data.php';

class CAHNRS_Analytics {
	
	private $options;
	
	private $tracker;
	
	private $post_data;
	
	public function __construct(){
		
		$this->options = new CAHNRS_Analytics_Options();
		
		$this->tracker = new CAHNRS_Analytics_Tracker();
		
		$this->post_data = new CAHNRS_Analytics_Post_data();
		
		add_action( 'customize_register', array( $this , 'add_customize_section' ) );
		
		add_action('wp_head', array( $this , 'add_tracker' ), 99 );
		
		add_action( 'wp_enqueue_scripts', array( $this , 'add_tracker_script' ), 99 );
		
	} // end method __construct
	
	public function add_customize_section( $wp_customize ){
		
		$this->options->add_sections( $wp_customize );
		
	} // end method add_customize_section
	
	public function add_tracker(){
		
		global $wp_query;
		
		//var_dump( $wp_query->post );
		
		$this->post_data->the_data( $wp_query->post );
		
		$settings = $this->options->get_options();
		
		$this->tracker->the_tracker( $settings );
		
	} // end method add_tracker
	
	public function add_tracker_script(){
		
		wp_enqueue_script( 'cahnrs-analytics.js', CAHNRSANALYTICSURL . 'js/cahnrs-analytics.min.js', array(), '0.0.5', true );
		
	} // end method add_tracker_script
	
} // end class CAHNRS_Analytics

$cahnrs_anlaytics = new CAHNRS_Analytics();