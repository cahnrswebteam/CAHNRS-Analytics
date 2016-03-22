<?php
class CAHNRS_Analytics_Tracker {
	
	public function the_tracker( $settings ){
			
		$trackers = array();
			
		$tracker['default'] = $settings['ua1'];
			
		$tracker['parent'] = ( $settings['ua2'] ) ? $settings['ua2'] : false ;
			
		$tracker['grandparent'] = ( $settings['ua3'] ) ? $settings['ua3'] : false ;
			
		$tracker['cahnrsGlobal'] = ( ! $settings['cahnrs_ua_off'] ) ? 'UA-47963191-1' : false ;
			
		$tracker['wsu'] = ( ! $settings['wsu_ua'] ) ? 'UA-55791317-1' : false ;
	
		echo '<script>';
			
		echo 'var ca_trackers = ' . json_encode( $tracker ) . ';';
			 
		include CAHNRSANALYTICSDIR . 'js/cahnrs-tracker-analytics.min.js';
			
		echo '</script>';
		
	}
	
}