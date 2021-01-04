<?php

class Custom_fields extends Front_end {

    function __construct() {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->model('Tag_model');
        $this->load->model('Book_tag_model');
        $this->load->library('upload');
        $this->load->model('Section_model');
        $this->load->model('Material_model');
        $this->load->model('Version_model');
        $this->load->model('Field_model');

        $this->load->library('form_validation');
    }

    /*
     * Listing of book
     */

    function index() {

  $data['get_all_field']=$this->Field_model->get_all_field();
        $this->layout->view('custom_fields/index',$data);
    }

    function add() {

        $data['section'] = $this->Section_model->get_main_section();
        $this->layout->view('custom_fields/add', $data);
    }

    function add_custom_field() {

        $section_id = $this->input->post('section_id');
        $field_label = $this->input->post('field_label');
        $field_type = $this->input->post('field_type');
        $options = $this->input->post('options');
        $requerd_field= $this->input->post('requerd_field');
        $data = array(
            'field_label' => $field_label,
            'field_type' => $field_type,
             'section_id' => $section_id,
             'requered' => $requerd_field,
             'options' => $options
        );

        $insert_id = $this->Field_model->add_custom_field($data);

$data['get_all_field']=$this->Field_model->get_all_field();
        $this->layout->view("custom_fields/index",$data);
    }
    
    function field_table() {
        $data['get_all_field']=$this->Field_model->get_all_field();
    }

}
