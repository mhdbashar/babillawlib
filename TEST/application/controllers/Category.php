<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categorymodel', 'cat');
    }

    function index() {
        $data['categories'] = $this->cat->category_menu();
        $this->load->view('category', $data);
    }

}


