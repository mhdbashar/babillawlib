<?php

if (!function_exists('get_main_section')) {

    function get_main_section() {

        $CI = & get_instance();
        $CI->db->from('section');
        $CI->db->where('parent_id', 0);
        $query = $CI->db->get();
        return $query->result();
    }

    function custom_fields() {
         $CI = & get_instance();
         
      $CI->load->model('Field_model');
      $data=$CI->Field_model->get_custom_fields();
      return $data;
      
        
    }
       function get_book($section_id) {

        $CI = & get_instance();
          $data = $CI->db->query("select * from book where section_id= $section_id")->result_array();
          return $data;
    }
    function get_last_node(){
         $CI = & get_instance();
          $data = $CI->db->query("select * from section where section_id not in (select parent_id from section)")->result_array();
        return $data;
    }
	
	function get_main_section_via_section_id($section_id){
		$CI = & get_instance();
          $data = $CI->db->query("select main_section from book where section_id= $section_id")->row();
		  return $data;
		
		
	}
	
    

}