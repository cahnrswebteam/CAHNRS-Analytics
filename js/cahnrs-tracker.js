(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

( function( document, window ) { 

	var cahnrsc = 'gaHitSessions';
	
	window.get_session_hits = function(){
		
		// from http://www.w3schools.com/js/js_cookies.asp
		
		var name = cahnrsc + "=";
		
		var ca = document.cookie.split(';');
		
		for(var i=0; i<ca.length; i++) {
			
			var c = ca[i];
			
			while (c.charAt(0)==' ') c = c.substring(1);
			
			if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
			
		}
		
		return "";		
		
	} // end get_session_hits
	
	window.add_session_hit = function() {
		
		var c_value = get_session_hits(); 
		
		c_value = ( c_value )? ( parseInt( c_value ) + 1 ): 1;
		
		document.cookie = cahnrsc + "=" + c_value + ';path=/' ;
		
	} // end get_session_hits

	window.ca_send_event = function( category, action, label, value, interact ){
	
		value = typeof value !== 'undefined' ? value : 0;
	
		interact = typeof interact !== 'undefined' ? interact : 0;
		
		if ( typeof ca_trackers !== 'undefined' ){
			
			for ( var key in ca_trackers ) {
				
				if ( ca_trackers.hasOwnProperty( key ) && ca_trackers[ key ] ){
					
					var trackerName = 'send';
				
					if ( 'default' != key ){
						
						var trackerName = key + '.' + trackerName;
						
					}
						
					ga( trackerName, 'event', category, action, label, value , {'nonInteraction': interact } );
					
					console.log( trackerName + ', event, ' + category + ', '+ action + ', '+ label + ', '+ value + ', {nonInteraction: ' + interact + ' }' );
					
				} // end if
				
				add_session_hit();
				
			} // end for
			
		} // end if
		
	} // end function ca_send_event
	
	/*
	 * Set Dimensions:
	 * ( 20 ) Post Type|Hit
	 * ( 19 ) Author|Hit
	 * ( 18 ) Published Date|Hit
	 * ( 17 ) Modified Date|Hit
	 * ( 16 ) Categories|Hit
	 * ( 15 ) Tags|Hit
	 * ( 14 ) Session Hits
	*/
	
	window.set_dimensions = function( trackerName ){
		
		trackerName = typeof trackerName !== 'undefined' ? trackerName : 'default';
		
		if ( typeof ca_page_data !== 'undefined' ){
			
			ca_page_data.hits = get_session_hits(); 
			
			for ( var key in ca_page_data ) {
				
				if ( ca_page_data.hasOwnProperty( key ) ){
					
					var index = false;
					
					switch( key ){
						
						case 'post_type':
							index = 20;
							break;
						case 'author':
							index = 19;
							break;
						case 'published_date':
							index = 18;
							break;
						case 'modified_date':
							index = 17;
							break;
						case 'categories':
							index = 16;
							break;
						case 'tags':
							index = 15;
							break;
						case 'hits':
							index = 14;
							break;
						
					}
					
					var setName = 'set';
				
					if ( 'default' != trackerName ){
						
						var setName = trackerName + '.' + setName;
						
					}
					
					ga( setName, 'dimension' + index, ca_page_data[ key ] );
					
					console.log( setName +', dimension' + index + ',' + ca_page_data[ key ] );
				
				} // end if
				
			} // end for
			
		} // end if
		
	} // end set_dimensions
	
	/*
	 * ( 20 ) Session Hits
	*/
	
	window.set_metrics = function( trackerName ){
		
		
		
	} // end set metrics
	
	if ( typeof ca_trackers !== 'undefined' ){
	
		for ( var key in ca_trackers ) {
			
			if ( ca_trackers.hasOwnProperty( key ) && ca_trackers[ key ] ){
				
				var trackerName = 'send';
				
				if ( 'default' != key ){
					
					var trackerName = key + '.' + trackerName;
					
				}
				
				ga( 'create', ca_trackers[ key ], 'auto' );
				
				set_dimensions( key );
				
				console.log( trackerName + ', pageview' );
					
				ga( trackerName, 'pageview' );
			
			} // end if 
			
			add_session_hit();
			
		} // end for
		
	} // end if typeof ca_tracker

} )( document, window );


