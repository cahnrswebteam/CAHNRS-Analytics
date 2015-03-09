<?php
class CAHNRS_Analytics_Tracker {
	
	public function the_tracker( $settings ){
	
		if( ! empty( $settings['ua1'] ) ){
			
			$trackers = array();
			
			$tracker['default'] = $settings['ua1'];
			
			$tracker['parent'] = ( $settings['ua2'] ) ? $settings['ua2'] : false ;
			
			$tracker['grandparent'] = ( $settings['ua3'] ) ? $settings['ua3'] : false ;
			
			$tracker['cahnrsGlobal'] = ( $settings['cahnrs_ua'] ) ? 'UA-47963191-1' : false ;
	
			echo '<script>';
			
			echo 'var ca_trackers = ' . json_encode( $tracker ) . ';';
			 
			include CAHNRSANALYTICSDIR . 'js/cahnrs-tracker.min.js';
			
			echo '</script>';
			
		} // end if
		
	}
	
}