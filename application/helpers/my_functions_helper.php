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

}