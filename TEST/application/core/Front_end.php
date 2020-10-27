<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Front_end
 *
 * @author Administrator
 */
class Front_end extends CI_Controller {

    public $layout_view = 'layouts/index';

    public function __construct() {
        parent::__construct();

      
        $this->load->library('layout');
      


    }

}
