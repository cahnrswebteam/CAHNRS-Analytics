<?php 
class CAHNRS_Analytics_Post_Data {
	
	public function the_data( $post ){
		
		$data = array();
		
		$data['post_type'] = $post->post_type;
		
		$data['published_date'] = $this->get_post_published_date( $post );
		
		$data['modified_date'] = $this->get_post_modified_date( $post );
		
		$data['author'] = $this->get_post_author( $post 
		);
		
		$data['categories'] = $this->get_post_categories( $post );
		
		$data['tags'] = $this->get_post_tags( $post );
		
		echo '<script>';
		
			echo 'var ca_page_data = ' . json_encode( $data ) . ';';
		
		echo '</script>';
		
	} // end method the_data
	
	private function get_post_author( $post ) {
		
		$meta = get_the_author_meta( 'user_email', $post->post_author );;
		
		return $meta;
		
	} // end method get_post_author

	
	private function get_post_modified_date( $post ) {
		
		$date = explode( ' ' , $post->post_modified );
		
		return $date[0];
		
	} // end method get_post_modified
	
	private function get_post_published_date( $post ) {
		
		$date = explode( ' ' , $post->post_date );
		
		return $date[0];
		
	} // end method get_post_published_date
	
	private function get_post_categories( $post ) {
		
		$data = wp_get_post_categories( $post->ID, array( 'fields' => 'names' ) );;
		
		return implode( ',' , $data );
		
	} // end method get_post_categories
	
	private function get_post_tags( $post ) {
		
		$data = wp_get_post_tags( $post->ID, array( 'fields' => 'names' ) );;
		
		return implode( ',' , $data );
		
	} // end method get_post_tags
	
} // end class CAHNRS_Analytics_Post_Data