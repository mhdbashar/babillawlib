<?php

class Book extends Front_end {

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
        $data['book'] = $this->Book_model->get_all_book();
        $data['get_sub_section'] = $this->Section_model->get_sub_section();
        $data['country'] = $this->Book_model->fetch_country();
        $this->layout->view('book/index', $data);
    }

    function _upload() {
        if (!empty($_FILES['picture']['name'])) {
            $config['upload_path'] = 'uploads/images/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = TRUE;
            $config['file_name'] = $_FILES['picture']['name'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('picture')) {
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            } else {
                $picture = null;
            }
        } else {
            $picture = null;
        }
        return $picture;
    }

    function _upload_image() {
        if (isset($_FILES['mini']['name'])) {
            $config['upload_path'] = 'uploads/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;
            $config['file_name'] = $_FILES['mini']['name'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('mini')) {
                $uploadData = $this->upload->data();
                $mini = $uploadData['file_name'];
            } else {
                $mini = '';
            }
        } else {
            $mini = '';
        }
        return $mini;
    }

    function add() {

        $section_id = $this->input->post('section_id');
        if (isset($section_id)) {




            $sql = "select * from section where section_id='" . $section_id . "'";
            $query = $this->db->query($sql);
            $result = $query->row();
            if ($result) {
                $section_name = $result->section_name;
            }
        }

        $section_sub_id = $this->input->post('sub_section');
        if (isset($section_sub_id) && !empty($section_sub_id)) {

            $sql2 = "select * from section where section_id='" . $section_sub_id . "'";
            $query = $this->db->query($sql2);
            $result_result = $query->row();
            $d = '';
            $d = $result_result->section_id;


            if (isset($section_name) && !empty($section_name)) {




                if ($section_name == 'الأحكام والسوابق القضائية') {




                    if (isset($_POST) && count($_POST) > 0) {
                        $params = array(
                            'main_section' => $result->section_id,
                            'section_id' => $result_result->section_id,
                            'book_title' => $this->input->post('book_title'),
                            'url' => $this->input->post('url'),
                            'country' => $this->input->post('country'),
                            'city' => $this->input->post('city'),
							
							
							
                            'ruling_year' => $this->input->post('ruling_year'),
							'issuer'=> $this->input->post('issuer'),
							'decision'=> $this->input->post('decision'),
							
							
                            'pronounced_judgment' => $this->input->post('pronounced_judgment'),
							
							'court' => $this->input->post('court'),
							
                            'volume_number' => $this->input->post('volume_number'),
							
							
                            'issue_classification' => $this->input->post('issue_classification'),
							
							
							
                            'summary_of_judgment' => $this->input->post('summary_of_judgment'),
							
							
                            'sentencing_text' => $this->input->post('sentencing_text'),
							
							
                            'the_reasons' => $this->input->post('the_reasons'),
							
							
                            'the_legal_bond' => $this->input->post('the_legal_bond'),
							
							
                            'appeal_decision' => $this->input->post('appeal_decision'),
							
							
							
                            'file' => $this->_upload()
                        );




                        $book_id = $this->Book_model->add_book($params);




                        if (isset($_POST["textarea"])) {
                            for ($count = 0; $count < count($_POST["textarea4"]); $count++) {



                                $data = array(
                                    'textarea' => $_POST["textarea4"][$count],
                                    'book_id' => $book_id,
                                );
                                $this->Field_model->add_field($data);
                            }
                        }


                        if (isset($_POST["input2"])) {
                            for ($count = 0; $count < count($_POST["input2"]); $count++) {
                                $data = array(
                                    'value' => $_POST["input2"][$count],
                                    'book_id' => $book_id,
                                    'field_id' => $_POST["input_id2"][$count]
                                );
                                $this->Field_model->add_field($data);
                            }
                        }
                        if (isset($_POST["select2"])) {
                            for ($count = 0; $count < count($_POST["select2"]); $count++) {
                                $data = array(
                                    'value' => $_POST["select2"][$count],
                                    'book_id' => $book_id,
                                    'field_id' => $_POST["select_id2"][$count]
                                );
                                $this->Field_model->add_field($data);
                            }
                        }



                        if (isset($_POST["checkbox2"])) {
                            for ($count = 0; $count < count($_POST["checkbox2"]); $count++) {
                                $data = array(
                                    'value' => $_POST["checkbox2"][$count],
                                    'book_id' => $book_id,
                                    'field_id' => $_POST["checkbox_id2"][$count]
                                );
                                $this->Field_model->add_field($data);
                            }
                        }
                        if (isset($_POST["number2"])) {
                            for ($count = 0; $count < count($_POST["number2"]); $count++) {
                                $data = array(
                                    'value' => $_POST["number2"][$count],
                                    'book_id' => $book_id,
                                    'field_id' => $_POST["number_id2"][$count]
                                );
                                $this->Field_model->add_field($data);
                            }
                        }
                        if (isset($_POST["textarea2"])) {
                            for ($count = 0; $count < count($_POST["textarea2"]); $count++) {
                                $data = array(
                                    'value' => $_POST["textarea2"][$count],
                                    'book_id' => $book_id,
                                    'field_id' => $_POST["textarea_id2"][$count]
                                );
                                $this->Field_model->add_field($data);
                            }
                        }
                        if (isset($_POST["datepicker2"])) {
                            for ($count = 0; $count < count($_POST["datepicker2"]); $count++) {
                                $data = array(
                                    'value' => $_POST["datepicker2"][$count],
                                    'book_id' => $book_id,
                                    'field_id' => $_POST["datepicker_id2"][$count]
                                );
                                $this->Field_model->add_field($data);
                            }
                        }




                        for ($count = 0; $count < $_POST["total_item"]; $count++) {
                            $data = array(
                                'description' => $_POST["dis"][$count],
                                'book_id' => $book_id,
                            );
                        }
                        $this->Material_model->add_material($data);


                        $tag_name_name_name = $this->input->post('tag_name');

                        $tag_name_name = explode(", ", $tag_name_name_name);
                        $tag_name = str_replace(' ', '', $tag_name_name);


                        for ($i = 0; $i < count($tag_name); $i++) {

                            $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                            $query = $this->db->query($sql);
                            $result = $query->row();

                            if ($result) {

                                $tag_book = array(
                                    'book_id' => $book_id,
                                    'tag_id' => $result->tag_id
                                );
                                $this->Book_tag_model->add_book_tag($tag_book);
                            } else {
                                // echo $tag_name[$i];

                                $paramss = array(
                                    'tag_name' => $tag_name[$i]
                                );

                                $tag_id = $this->Tag_model->add_tag($paramss);

                                $tag_book = array(
                                    'book_id' => $book_id,
                                    'tag_id' => $tag_id
                                );
                                $this->Book_tag_model->add_book_tag($tag_book);
                            }
                        }

                        redirect('book/index');
                    }
                } elseif ($section_name == 'الكتب القانونية والأبحاث') {




                    if (isset($_FILES['mini']['name'])) {
                        $config['upload_path'] = 'uploads/images/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['encrypt_name'] = TRUE;
                        $config['file_name'] = $_FILES['mini']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('mini')) {
                            $uploadData = $this->upload->data();
                            $mini = $uploadData['file_name'];
                        } else {
                            $mini = '';
                        }
                    } else {
                        $mini = '';
                    }

                    if (isset($_POST) && count($_POST) > 0) {
                        $params = array(
                            'main_section' => $result->section_id,
                            'section_id' => $result_result->section_id,
                            'book_title' => $this->input->post('book_title'),
                            'url' => $this->input->post('url'),
                            'author' => $this->input->post('author'),
                            'publisher' => $this->input->post('publisher'),
                            'year_publication' => $this->input->post('year_publication'),
                            'file' => $this->_upload(),
                            'mini' => $mini
                        );
                    }



                    $book_id = $this->Book_model->add_book($params);



                    if (isset($_POST["input4"])) {
                        for ($count = 0; $count < count($_POST["input4"]); $count++) {
                            $data = array(
                                'value' => $_POST["input4"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["input_id4"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["select4"])) {
                        for ($count = 0; $count < count($_POST["select4"]); $count++) {
                            $data = array(
                                'value' => $_POST["select4"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["select_id4"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }



                    if (isset($_POST["checkbox4"])) {
                        for ($count = 0; $count < count($_POST["checkbox4"]); $count++) {
                            $data = array(
                                'value' => $_POST["checkbox4"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["checkbox_id4"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["number4"])) {
                        for ($count = 0; $count < count($_POST["number4"]); $count++) {
                            $data = array(
                                'value' => $_POST["number4"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["number_id4"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["textarea4"])) {
                        for ($count = 0; $count < count($_POST["textarea4"]); $count++) {
                            $data = array(
                                'value' => $_POST["textarea4"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["textarea_id4"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["datepicker4"])) {
                        for ($count = 0; $count < count($_POST["datepicker4"]); $count++) {
                            $data = array(
                                'value' => $_POST["datepicker4"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["datepicker_id4"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }



                    for ($count = 0; $count < $_POST["total_item"]; $count++) {
                        $data = array(
                            'description' => $_POST["dis"][$count],
                            'book_id' => $book_id,
                        );
                    }
                    $this->Material_model->add_material($data);

                    $tag_name_name_name = $this->input->post('tag_name');

                    $tag_name_name = explode(", ", $tag_name_name_name);
                    $tag_name = str_replace(' ', '', $tag_name_name);


                    for ($i = 0; $i < count($tag_name); $i++) {

                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                        $query = $this->db->query($sql);
                        $result = $query->row();

                        if ($result) {

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $result->tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        } else {
                            //         echo $tag_name[$i];

                            $paramss = array(
                                'tag_name' => $tag_name[$i]
                            );

                            $tag_id = $this->Tag_model->add_tag($paramss);

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        }
                    }

                    redirect('book/index');
                } elseif ($section_name == 'الأنظمة السعودية') {

                    if (isset($_POST) && count($_POST) > 0) {
                        $params = array(
                            'main_section' => $result->section_id,
                            'section_id' => $result_result->section_id,
                            // 'book_title' => $this->input->post('book_title'),
                            'url' => $this->input->post('url'),
                            //'dis' => $this->input->post('dis'),
                            'history_system_m' => $this->input->post('history_system_m'),
                            //'history_system_h' => $this->input->post('history_system_h'),
                            'accreditation' => $this->input->post('accreditation'),
                            'date_publication_m' => $this->input->post('date_publication_m'),
                            //'date_publication_h' => $this->input->post('date_publication_h'),
                            'pass' => $this->input->post('pass'),
//                              'version' => $this->input->post('version'),
                            'file' => $this->_upload()
                        );
                    }



                    $book_id = $this->Book_model->add_book($params);
                    for ($count = 0; $count < $_POST["total_item"]; $count++) {
                        $data = array(
                            'description' => $_POST["dis"][$count],
                            'material_number' => $_POST["material_number"][$count],
                            'book_id' => $book_id,
                        );
                        $this->Material_model->add_material($data);
                    }
                    for ($count_ver = 0; $count_ver < $_POST["total_item_ver"]; $count_ver++) {

                        $data = array(
                            'version' => $_POST["version"][$count_ver],
                            'book_id' => $book_id,
                        );
                        $this->Version_model->add_version($data);
                    }


                    if (isset($_POST["input3"])) {
                        for ($count = 0; $count < count($_POST["input3"]); $count++) {
                            $data = array(
                                'value' => $_POST["input3"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["input_id3"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["select3"])) {
                        for ($count = 0; $count < count($_POST["select3"]); $count++) {
                            $data = array(
                                'value' => $_POST["select3"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["select_id3"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }



                    if (isset($_POST["checkbox3"])) {
                        for ($count = 0; $count < count($_POST["checkbox3"]); $count++) {
                            $data = array(
                                'value' => $_POST["checkbox3"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["checkbox_id3"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["number3"])) {
                        for ($count = 0; $count < count($_POST["number3"]); $count++) {
                            $data = array(
                                'value' => $_POST["number3"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["number_id3"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["textarea3"])) {
                        for ($count = 0; $count < count($_POST["textarea3"]); $count++) {
                            $data = array(
                                'value' => $_POST["textarea3"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["textarea_id3"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["datepicker3"])) {
                        for ($count = 0; $count < count($_POST["datepicker3"]); $count++) {
                            $data = array(
                                'value' => $_POST["datepicker3"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["datepicker_id3"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }





                    for ($count = 0; $count < $_POST["total_item"]; $count++) {
                        $data = array(
                            'dis' => $_POST["dis"][$count],
                            'book_id' => $book_id,
                        );
                    }



                    $tag_name_name_name = $this->input->post('tag_name');

                    $tag_name_name = explode(", ", $tag_name_name_name);
                    $tag_name = str_replace(' ', '', $tag_name_name);

                    for ($i = 0; $i < count($tag_name); $i++) {

                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                        $query = $this->db->query($sql);
                        $result = $query->row();

                        if ($result) {

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $result->tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        } else {
                            // echo $tag_name[$i];

                            $paramss = array(
                                'tag_name' => $tag_name[$i]
                            );

                            $tag_id = $this->Tag_model->add_tag($paramss);

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        }
                    }

                    redirect('book/index');
                } elseif ($section_name == 'نماذج وعقود') {

                    if (isset($_POST) && count($_POST) > 0) {
                        $params = array(
                            'main_section' => $result->section_id,
                            'section_id' => $result_result->section_id,
                            'book_title' => $this->input->post('book_title'),
                            'url' => $this->input->post('url'),
                            'pdf' => $this->input->post('pdf'),
                            //'dis'=>$_POST["dis"][0],
                            'file' => $this->_upload()
                        );
                    }


                    $book_id = $this->Book_model->add_book($params);




                    if (isset($_POST["input1"])) {
                        for ($count = 0; $count < count($_POST["input1"]); $count++) {
                            $data = array(
                                'value' => $_POST["input1"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["id1"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["select1"])) {
                        for ($count = 0; $count < count($_POST["select1"]); $count++) {
                            $data = array(
                                'value' => $_POST["select1"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["select_id1"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }



                    if (isset($_POST["checkbox1"])) {
                        for ($count = 0; $count < count($_POST["checkbox1"]); $count++) {
                            $data = array(
                                'value' => $_POST["checkbox1"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["checkbox_id1"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["number1"])) {
                        for ($count = 0; $count < count($_POST["number1"]); $count++) {
                            $data = array(
                                'value' => $_POST["number1"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["number_id1"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["textarea1"])) {
                        for ($count = 0; $count < count($_POST["textarea1"]); $count++) {
                            $data = array(
                                'value' => $_POST["textarea1"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["textarea_id1"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["datepicker1"])) {
                        for ($count = 0; $count < count($_POST["datepicker1"]); $count++) {
                            $data = array(
                                'value' => $_POST["datepicker1"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["datepicker_id1"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }







                    for ($count = 0; $count < $_POST["total_item"]; $count++) {
                        $data = array(
                            'description' => $_POST["dis"][$count],
                            'book_id' => $book_id,
                        );
                    }
                    $this->Material_model->add_material($data);

                    $tag_name_name_name = $this->input->post('tag_name');

                    $tag_name_name = explode(", ", $tag_name_name_name);
                    $tag_name = str_replace(' ', '', $tag_name_name);


                    for ($i = 0; $i < count($tag_name); $i++) {

                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                        $query = $this->db->query($sql);
                        $result = $query->row();
                        if ($result) {

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $result->tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        } else {
                            //  echo $tag_name[$i];

                            $paramss = array(
                                'tag_name' => $tag_name[$i]
                            );

                            $tag_id = $this->Tag_model->add_tag($paramss);

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        }
                    }

                    redirect('book/index');
                } elseif ($section_name == 'الأنظمة والتشريعات والقوانين') {

                    if (isset($_POST) && count($_POST) > 0) {
                        $params = array(
                            'main_section' => $result->section_id,
                            'section_id' => $result_result->section_id,
                            'book_title' => $this->input->post('book_title'),
                            'url' => $this->input->post('url'),
                            'country' => $this->input->post('country'),
                            'pdf' => $this->input->post('pdf'),
                            'legislative_type' => $this->input->post('legislative_type'),
                            'legislative_status' => $this->input->post('legislative_status'),
                            'material_number_legislation' => $this->input->post('material_number_legislation'),
                            'legislation_number' => $this->input->post('legislation_number'),
                            //'dis'=>$_POST["dis"][0],
                            'file' => $this->_upload()
                        );
                    }


                    $book_id = $this->Book_model->add_book($params);




                    if (isset($_POST["input5"])) {
                        for ($count = 0; $count < count($_POST["input5"]); $count++) {
                            $data = array(
                                'value' => $_POST["input5"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["input_id5"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["select5"])) {
                        for ($count = 0; $count < count($_POST["select5"]); $count++) {
                            $data = array(
                                'value' => $_POST["select5"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["select_id5"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }



                    if (isset($_POST["checkbox5"])) {
                        for ($count = 0; $count < count($_POST["checkbox5"]); $count++) {
                            $data = array(
                                'value' => $_POST["checkbox5"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["checkbox_id5"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["number5"])) {
                        for ($count = 0; $count < count($_POST["number5"]); $count++) {
                            $data = array(
                                'value' => $_POST["number5"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["number_id5"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["textarea5"])) {
                        for ($count = 0; $count < count($_POST["textarea5"]); $count++) {
                            $data = array(
                                'value' => $_POST["textarea5"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["textarea_id5"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }
                    if (isset($_POST["datepicker5"])) {
                        for ($count = 0; $count < count($_POST["datepicker5"]); $count++) {
                            $data = array(
                                'value' => $_POST["datepicker5"][$count],
                                'book_id' => $book_id,
                                'field_id' => $_POST["datepicker_id5"][$count]
                            );
                            $this->Field_model->add_field($data);
                        }
                    }







                    for ($count = 0; $count < $_POST["total_item"]; $count++) {
                        $data = array(
                            'description' => $_POST["dis"][$count],
                            'book_id' => $book_id,
                        );
                    }
                    $this->Material_model->add_material($data);

                    $tag_name_name_name = $this->input->post('tag_name');

                    $tag_name_name = explode(", ", $tag_name_name_name);
                    $tag_name = str_replace(' ', '', $tag_name_name);


                    for ($i = 0; $i < count($tag_name); $i++) {

                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                        $query = $this->db->query($sql);
                        $result = $query->row();
                        if ($result) {

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $result->tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        } else {
                            //  echo $tag_name[$i];

                            $paramss = array(
                                'tag_name' => $tag_name[$i]
                            );

                            $tag_id = $this->Tag_model->add_tag($paramss);

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        }
                    }

                    redirect('book/index');
                }
            } else {

                redirect('book/add');
            }
        } else {
            $this->load->model('Section_model');

            $data['get_main_section'] = $this->Section_model->get_main_section();
            $data['get_sub_section'] = $this->Section_model->get_sub_section();
            $data['country'] = $this->Book_model->fetch_country();


            $this->layout->view('book/add', $data);
        }
    }

    function fetch_city() {

        if ($this->input->post('country_id')) {
            echo $this->Book_model->fetch_city($this->input->post('country_id'));
        }
    }

    /*
     * Editing a book
     */

    function edit($book_id) {

        $data['field'] = $data = $this->db->query("select * from fields_values ")->result_array();

        // check if the book exists before trying to edit it
        $data['book'] = $this->Book_model->get_book($book_id);
        $data['book_material'] = $this->Material_model->get_material_book($book_id);
        $data['book_version'] = $this->Version_model->get_version_book($book_id);
        //$data['get_tag_book']=$this->Book_model->get_tag_book($book_id);

        $data['get_main_section'] = $this->Section_model->get_main_section();
        $data['get_sub_section'] = $this->Section_model->get_sub_section();

        $sql = "select * from tag,book_tag,book where book.book_id=book_tag.book_id and book_tag.tag_id=tag.tag_id and book.book_id='" . $book_id . "' ";
        $query = $this->db->query($sql);
        $result = $query->result();
        if ($result) {
            foreach ($result as $r) {
                $a[] = $r->tag_name;
            }



            $tag_name = implode(',', $a);
            $data['tag_name'] = $tag_name;
        }
        $result3 = $this->db->query("select book.city,book.country,city.city_name,country.country_name from book,country,city where book_id= '" . $book_id . "' and book.country=country.country_id and book.city=city.city_id ")->row_array();
        $result2 = $this->db->query("select * from fields_values a,custom_fields b  where a.field_id=b.id   and   a.book_id= '" . $book_id . "'")->result_array();
		
		
         $data['city1'] = $result3;
		 //$data['country1'] = $result3->country_name;
        $data['country'] = $this->Book_model->fetch_country();
       
        $data['fields'] = $result2;
        $this->layout->view('book/update_data_view', $data);
    }

    public function update($book_id) {

        $section_name = $this->input->post('section_name');

        if ($this->input->post('sub_section')) {
            $sub_section = $this->input->post('sub_section');
            $sql2 = "select * from section where section_id='" . $sub_section . "'";
            $query = $this->db->query($sql2);
            $result_result = $query->row();
            $d = '';
            $d = $result_result->section_id;
        }



        if ($section_name == 'الأحكام والسوابق القضائية') {



            $data = array();

            if ($this->input->post('remove_photo')) {

                if (file_exists('uploads/images/' . $this->input->post('remove_photo'))) {

                    unlink('uploads/images/' . $this->input->post('remove_photo'));
                }

                $data['file'] = null;
                $this->Book_model->update_book($book_id, $data);
            }


            if (!empty($_FILES['picture']['name'])) {

                $upload = $this->_upload();

                //delete file
                $add_book = $this->Book_model->get_book($book_id);
                if (file_exists('uploads/images/' . $add_book['file']) && $add_book['file'])
                    unlink('uploads/images/' . $add_book['file']);

                $data['file'] = $upload;
                $this->Book_model->update_book($book_id, $data);
            }





            if (isset($_POST) && count($_POST) > 0) {








                $params = array(
                    'section_id' => $result_result->section_id,
                    'ruling_year' => $this->input->post('ruling_year'),
                    'book_title' => $this->input->post('book_title'),
                    'url' => $this->input->post('url'),
                    'country' => $this->input->post('country'),
                    'city' => $this->input->post('city'),
                    'ruling_year' => $this->input->post('ruling_year'),
                    'pronounced_judgment' => $this->input->post('pronounced_judgment'),
                    'volume_number' => $this->input->post('volume_number'),
                    'issue_classification' => $this->input->post('issue_classification'),
                    'summary_of_judgment' => $this->input->post('summary_of_judgment'),
                    'sentencing_text' => $this->input->post('sentencing_text'),
                    'the_reasons' => $this->input->post('the_reasons'),
                    'the_legal_bond' => $this->input->post('the_legal_bond'),
                    'appeal_decision' => $this->input->post('appeal_decision'),
					'issuer'=> $this->input->post('issuer'),
					'decision'=> $this->input->post('decision'),
					'court'=> $this->input->post('court'),
					
                    //'file' => $picture,
                    'url' => $this->input->post('url'),
                );
            }


            $this->Book_model->update_book($book_id, $params);






            $count = 0;

            $m = $this->input->post("mmm");

            for ($count = 0; $count < $m; $count++) {

                $data = array(
                    'description' => $_POST["dis"][$count],
                    'material_number' => $_POST["material_number"][$count],
                );
                $this->Material_model->update_material_book($_POST["material_id"][$count], $data);
            }




            if (isset($_POST["input2"])) {
                for ($count = 0; $count < count($_POST["input2"]); $count++) {
                    $data = array(
                        'value' => $_POST["input2"][$count],
                    );
                    $this->Field_model->update_field($_POST["input_id2"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["textarea2"])) {
                for ($count = 0; $count < count($_POST["textarea2"]); $count++) {
                    $data = array(
                        'value' => $_POST["textarea2"][$count],
                    );
                    $this->Field_model->update_field($_POST["textarea_id2"][$count], $book_id, $data);
                }
            }



            if (isset($_POST["number2"])) {
                for ($count = 0; $count < count($_POST["number2"]); $count++) {
                    $data = array(
                        'value' => $_POST["number2"][$count],
                    );
                    $this->Field_model->update_field($_POST["number_id2"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["datepicker2"])) {
                for ($count = 0; $count < count($_POST["datepicker2"]); $count++) {
                    $data = array(
                        'value' => $_POST["datepicker2"][$count],
                    );
                    $this->Field_model->update_field($_POST["datepicker_id2"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["select2"])) {
                for ($count = 0; $count < count($_POST["select2"]); $count++) {
                    $data = array(
                        'value' => $_POST["select2"][$count],
                    );
                    $this->Field_model->update_field($_POST["select_id2"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["checkbox2"])) {
                for ($count = 0; $count < count($_POST["checkbox2"]); $count++) {
                    $data = array(
                        'value' => $_POST["checkbox2"][$count],
                    );
                    $this->Field_model->update_field($_POST["checkbox_id2"][$count], $book_id, $data);
                }
            }




            $tag_name_name_name = $this->input->post('tag_name');
//                $sql1 = "delete from tag,book_tag using tag,book_tag ,book where "
//                       . "tag.tag_id=book_tag.tag_id and "
//                       . "tag_name not in ('" . $tag_name_name_name . "') and"
//                       . "  book.book_id=book_tag.book_id and book.book_id='" . $book_id . "' ";
//               $this->db->query($sql1);

            if ($tag_name_name_name) {

                $tag_name_name = explode(",", $tag_name_name_name);
                $tag_name = str_replace(' ', '', $tag_name_name);

                for ($i = 0; $i < count($tag_name); $i++) {

                    $sql = "select * from tag where tag_name='" . $tag_name[$i] . "' and tag_id not in(select book_tag.tag_id from book_tag where  book_tag.book_id='" . $book_id . "')";
                    $query = $this->db->query($sql);
                    $result = $query->row();
                    if ($result) {

                        $tag_book = array(
                            'book_id' => $book_id,
                            'tag_id' => $result->tag_id
                        );
                        $this->Book_tag_model->add_book_tag($tag_book);
                    } else {
                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                        $query = $this->db->query($sql);
                        $result = $query->row();
                        if (!$result) {

                            $paramss = array(
                                'tag_name' => $tag_name[$i]
                            );

                            $tag_id = $this->Tag_model->add_tag($paramss);

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        }
                    }
                }
            }


            redirect('book/index');
        } else if ($section_name == 'الكتب القانونية والأبحاث') {





            $data = array();

            if ($this->input->post('remove_photo')) {

                if (file_exists('uploads/images/' . $this->input->post('remove_photo'))) {

                    unlink('uploads/images/' . $this->input->post('remove_photo'));
                }

                $data['file'] = null;

                $this->Book_model->update_book($book_id, $data);
            }


            if (!empty($_FILES['picture']['name'])) {

                $upload = $this->_upload();

                //delete file
                $add_book = $this->Book_model->get_book($book_id);
                if (file_exists('uploads/images/' . $add_book['file']) && $add_book['file'])
                    unlink('uploads/images/' . $add_book['file']);

                $data['file'] = $upload;

                $this->Book_model->update_book($book_id, $data);
            }


            $data_image = array();

            if (!empty($_FILES['mini']['name'])) {

                $upload_mini = $this->_upload_image();

                //delete file
                $add_book = $this->Book_model->get_book($book_id);
                if (file_exists('uploads/images/' . $add_book['mini']) && $add_book['mini'])
                    unlink('uploads/images/' . $add_book['mini']);

                $data_image['mini'] = $upload_mini;
                $this->Book_model->update_book($book_id, $data_image);
            }

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    // 'main_section' => $result->section_id,
                    'section_id' => $result_result->section_id,
                    'book_title' => $this->input->post('book_title'),
                    'url' => $this->input->post('url'),
                    'author' => $this->input->post('author'),
                    'publisher' => $this->input->post('publisher'),
                    'year_publication' => $this->input->post('year_publication'),
                        //'file' => $picture,
                        //'mini' => $this->_upload_image()
                );
            }

            $this->Book_model->update_book($book_id, $params);

            $count = 0;

            $m = $this->input->post("mmm");

            for ($count = 0; $count < $m; $count++) {

                $data = array(
                    'description' => $_POST["dis"][$count],
                    'material_number' => $_POST["material_number"][$count],
                );
                $this->Material_model->update_material_book($_POST["material_id"][$count], $data);
            }


            if (isset($_POST["input4"])) {
                for ($count = 0; $count < count($_POST["input4"]); $count++) {
                    $data = array(
                        'value' => $_POST["input4"][$count],
                    );
                    $this->Field_model->update_field($_POST["input_id4"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["textarea4"])) {
                for ($count = 0; $count < count($_POST["textarea4"]); $count++) {
                    $data = array(
                        'value' => $_POST["textarea4"][$count],
                    );
                    $this->Field_model->update_field($_POST["textarea_id4"][$count], $book_id, $data);
                }
            }



            if (isset($_POST["number4"])) {
                for ($count = 0; $count < count($_POST["number4"]); $count++) {
                    $data = array(
                        'value' => $_POST["number4"][$count],
                    );
                    $this->Field_model->update_field($_POST["number_id4"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["datepicker4"])) {
                for ($count = 0; $count < count($_POST["datepicker4"]); $count++) {
                    $data = array(
                        'value' => $_POST["datepicker4"][$count],
                    );
                    $this->Field_model->update_field($_POST["datepicker_id4"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["select4"])) {
                for ($count = 0; $count < count($_POST["select4"]); $count++) {
                    $data = array(
                        'value' => $_POST["select4"][$count],
                    );
                    $this->Field_model->update_field($_POST["select_id4"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["checkbox4"])) {
                for ($count = 0; $count < count($_POST["checkbox4"]); $count++) {
                    $data = array(
                        'value' => $_POST["checkbox4"][$count],
                    );
                    $this->Field_model->update_field($_POST["select4_id4"][$count], $book_id, $data);
                }
            }





            $tag_name_name_name = $this->input->post('tag_name');
//                $sql1 = "delete from tag,book_tag using tag,book_tag ,book where "
//                       . "tag.tag_id=book_tag.tag_id and "
//                       . "tag_name not in ('" . $tag_name_name_name . "') and"
//                       . "  book.book_id=book_tag.book_id and book.book_id='" . $book_id . "' ";
//               $this->db->query($sql1);

            if ($tag_name_name_name) {

                $tag_name_name = explode(",", $tag_name_name_name);
                $tag_name = str_replace(' ', '', $tag_name_name);

                for ($i = 0; $i < count($tag_name); $i++) {

                    $sql = "select * from tag where tag_name='" . $tag_name[$i] . "' and tag_id not in(select book_tag.tag_id from book_tag where  book_tag.book_id='" . $book_id . "')";
                    $query = $this->db->query($sql);
                    $result = $query->row();
                    if ($result) {

                        $tag_book = array(
                            'book_id' => $book_id,
                            'tag_id' => $result->tag_id
                        );
                        $this->Book_tag_model->add_book_tag($tag_book);
                    } else {
                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                        $query = $this->db->query($sql);
                        $result = $query->row();
                        if (!$result) {

                            $paramss = array(
                                'tag_name' => $tag_name[$i]
                            );

                            $tag_id = $this->Tag_model->add_tag($paramss);

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        }
                    }
                }
            }


            redirect('book/index');
        } elseif ($section_name == 'الأنظمة السعودية') {

            $data = array();

            if ($this->input->post('remove_photo')) {

                if (file_exists('uploads/images/' . $this->input->post('remove_photo'))) {

                    unlink('uploads/images/' . $this->input->post('remove_photo'));
                }

                $data['file'] = null;

                $this->Book_model->update_book($book_id, $data);
            }


            if (!empty($_FILES['picture']['name'])) {

                $upload = $this->_upload();

                //delete file
                $add_book = $this->Book_model->get_book($book_id);
                if (file_exists('uploads/images/' . $add_book['file']) && $add_book['file'])
                    unlink('uploads/images/' . $add_book['file']);

                $data['file'] = $upload;

                $this->Book_model->update_book($book_id, $data);
            }

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    'section_id' => $result_result->section_id,
                    'url' => $this->input->post('url'),
                    'history_system_m' => $this->input->post('history_system_m'),
                    'accreditation' => $this->input->post('accreditation'),
                    'date_publication_m' => $this->input->post('date_publication_m'),
                    'pass' => $this->input->post('pass'),
                );
            }

            $this->Book_model->update_book($book_id, $params);
            $count = 0;

            $m = $this->input->post("mmm");

            for ($count = 0; $count < $m; $count++) {

                $data = array(
                    'description' => $_POST["dis"][$count],
                    'material_number' => $_POST["material_number"][$count],
                );
                $this->Material_model->update_material_book($_POST["material_id"][$count], $data);
            }

            for ($i = 0; $i < $_POST["total_item"]; $i++) {
                $data1 = array(
                    'description' => $_POST["dis1"][$i],
                    'material_number' => $_POST["material_number1"][$i],
                    'book_id' => $book_id,
                );
                $this->Material_model->add_material($data1);
            }



            $count_ver = 0;

            $vv = $this->input->post("vv");

            for ($count_ver = 0; $count_ver < $vv; $count_ver++) {

                $data_ver = array(
                    'version' => $_POST["version"][$count_ver],
                );
                $this->Version_model->update_version_book($_POST["version_id"][$count_ver], $data_ver);
            }

            for ($j = 0; $j < $_POST["total_item_ver"]; $j++) {
                $data2 = array(
                    'version' => $_POST["version1"][$j],
                    'book_id' => $book_id,
                );
                $this->Version_model->add_version($data2);
            }


            if (isset($_POST["input3"])) {
                for ($count = 0; $count < count($_POST["input3"]); $count++) {
                    $data = array(
                        'value' => $_POST["input3"][$count],
                    );
                    $this->Field_model->update_field($_POST["input_id3"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["textarea3"])) {
                for ($count = 0; $count < count($_POST["textarea3"]); $count++) {
                    $data = array(
                        'value' => $_POST["textarea3"][$count],
                    );
                    $this->Field_model->update_field($_POST["textarea_id3"][$count], $book_id, $data);
                }
            }



            if (isset($_POST["number3"])) {
                for ($count = 0; $count < count($_POST["number3"]); $count++) {
                    $data = array(
                        'value' => $_POST["number3"][$count],
                    );
                    $this->Field_model->update_field($_POST["number_id3"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["datepicker3"])) {
                for ($count = 0; $count < count($_POST["datepicker3"]); $count++) {
                    $data = array(
                        'value' => $_POST["datepicker3"][$count],
                    );
                    $this->Field_model->update_field($_POST["datepicker_id3"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["select3"])) {
                for ($count = 0; $count < count($_POST["select3"]); $count++) {
                    $data = array(
                        'value' => $_POST["select3"][$count],
                    );
                    $this->Field_model->update_field($_POST["select_id3"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["checkbox3"])) {
                for ($count = 0; $count < count($_POST["checkbox3"]); $count++) {
                    $data = array(
                        'value' => $_POST["checkbox3"][$count],
                    );
                    $this->Field_model->update_field($_POST["checkbox_id3"][$count], $book_id, $data);
                }
            }





            $tag_name_name_name = $this->input->post('tag_name');
//                $sql1 = "delete from tag,book_tag using tag,book_tag ,book where "
//                       . "tag.tag_id=book_tag.tag_id and "
//                       . "tag_name not in ('" . $tag_name_name_name . "') and"
//                       . "  book.book_id=book_tag.book_id and book.book_id='" . $book_id . "' ";
//               $this->db->query($sql1);

            if ($tag_name_name_name) {

                $tag_name_name = explode(",", $tag_name_name_name);
                $tag_name = str_replace(' ', '', $tag_name_name);

                for ($i = 0; $i < count($tag_name); $i++) {

                    $sql = "select * from tag where tag_name='" . $tag_name[$i] . "' and tag_id not in(select book_tag.tag_id from book_tag where  book_tag.book_id='" . $book_id . "')";
                    $query = $this->db->query($sql);
                    $result = $query->row();
                    if ($result) {

                        $tag_book = array(
                            'book_id' => $book_id,
                            'tag_id' => $result->tag_id
                        );
                        $this->Book_tag_model->add_book_tag($tag_book);
                    } else {
                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                        $query = $this->db->query($sql);
                        $result = $query->row();
                        if (!$result) {

                            $paramss = array(
                                'tag_name' => $tag_name[$i]
                            );

                            $tag_id = $this->Tag_model->add_tag($paramss);

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        }
                    }
                }
            }


            redirect('book/index');
        } elseif ($section_name == 'الأنظمة والتشريعات والقوانين') {

            $data = array();

            if ($this->input->post('remove_photo')) {

                if (file_exists('uploads/images/' . $this->input->post('remove_photo'))) {

                    unlink('uploads/images/' . $this->input->post('remove_photo'));
                }

                $data['file'] = null;
                $this->Book_model->update_book($book_id, $data);
            }


            if (!empty($_FILES['picture']['name'])) {

                $upload = $this->_upload();

                //delete file
                $add_book = $this->Book_model->get_book($book_id);
                if (file_exists('uploads/images/' . $add_book['file']) && $add_book['file'])
                    unlink('uploads/images/' . $add_book['file']);

                $data['file'] = $upload;

                $this->Book_model->update_book($book_id, $data);
            }








            if ($this->input->post('table_column')) {

                $params = array(
                    'section_id' => $result_result->section_id,
                    $this->input->post('table_column') => $this->input->post('value')
                );




                $this->Book_model->update_book($book_id, $params);
            } elseif ($this->input->post('description_value')) {


                $data = array(
                    $this->input->post('description') => $this->input->post('description_value')
                );
                $this->Material_model->update_material_book_contracts($book_id, $data);
            }



            if ($_POST["dis"][0]) {

                $params = array(
                    'section_id' => $result_result->section_id,
                    'book_title' => $this->input->post('book_title'),
                    'url' => $this->input->post('url'),
                    'pdf' => $this->input->post('pdf'),
                    'legislative_type' => $this->input->post('legislative_type'),
                    'legislative_status' => $this->input->post('legislative_status'),
                    'material_number_legislation' => $this->input->post('material_number_legislation'),
                    'legislation_number' => $this->input->post('legislation_number'),
					 'country' => $this->input->post('country'),
                        //'file' => $picture,
                );


                $this->Book_model->update_book($book_id, $params);


                $data = array(
                    'description' => $_POST["dis"][0],
                    'material_number' => 0,
                    'book_id' => $book_id,
                );
                $this->Material_model->update_material_book_contracts($book_id, $data);
            }

            if (isset($_POST["input5"])) {
                for ($count = 0; $count < count($_POST["input5"]); $count++) {
                    $data = array(
                        'value' => $_POST["input5"][$count],
                    );
                    $this->Field_model->update_field($_POST["input_id5"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["textarea5"])) {
                for ($count = 0; $count < count($_POST["textarea5"]); $count++) {
                    $data = array(
                        'value' => $_POST["textarea5"][$count],
                    );
                    $this->Field_model->update_field($_POST["textarea_id5"][$count], $book_id, $data);
                }
            }



            if (isset($_POST["number5"])) {
                for ($count = 0; $count < count($_POST["number5"]); $count++) {
                    $data = array(
                        'value' => $_POST["number5"][$count],
                    );
                    $this->Field_model->update_field($_POST["number_id5"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["datepicker5"])) {
                for ($count = 0; $count < count($_POST["datepicker5"]); $count++) {
                    $data = array(
                        'value' => $_POST["datepicker5"][$count],
                    );
                    $this->Field_model->update_field($_POST["datepicker_id5"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["select5"])) {
                for ($count = 0; $count < count($_POST["select5"]); $count++) {
                    $data = array(
                        'value' => $_POST["select5"][$count],
                    );
                    $this->Field_model->update_field($_POST["select_id5"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["checkbox5"])) {
                for ($count = 0; $count < count($_POST["checkbox5"]); $count++) {
                    $data = array(
                        'value' => $_POST["checkbox5"][$count],
                    );
                    $this->Field_model->update_field($_POST["checkbox_id5"][$count], $book_id, $data);
                }
            }




            $tag_name_name_name = $this->input->post('tag_name');
//                $sql1 = "delete from tag,book_tag using tag,book_tag ,book where "
//                       . "tag.tag_id=book_tag.tag_id and "
//                       . "tag_name not in ('" . $tag_name_name_name . "') and"
//                       . "  book.book_id=book_tag.book_id and book.book_id='" . $book_id . "' ";
            //  $this->db->query($sql1);

            if ($tag_name_name_name) {

                $tag_name_name = explode(",", $tag_name_name_name);
                $tag_name = str_replace(' ', '', $tag_name_name);

                for ($i = 0; $i < count($tag_name); $i++) {

                    $sql = "select * from tag where tag_name='" . $tag_name[$i] . "' and tag_id not in(select book_tag.tag_id from book_tag where  book_tag.book_id='" . $book_id . "')";
                    $query = $this->db->query($sql);
                    $result = $query->row();
                    if ($result) {

                        $tag_book = array(
                            'book_id' => $book_id,
                            'tag_id' => $result->tag_id
                        );
                        $this->Book_tag_model->add_book_tag($tag_book);
                    } else {
                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                        $query = $this->db->query($sql);
                        $result = $query->row();
                        if (!$result) {

                            $paramss = array(
                                'tag_name' => $tag_name[$i]
                            );

                            $tag_id = $this->Tag_model->add_tag($paramss);

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        }
                    }
                }
            }


            redirect('book/index');
        } elseif ($section_name == 'نماذج وعقود') {

            $data = array();

            if ($this->input->post('remove_photo')) {

                if (file_exists('uploads/images/' . $this->input->post('remove_photo'))) {

                    unlink('uploads/images/' . $this->input->post('remove_photo'));
                }

                $data['file'] = null;
                $this->Book_model->update_book($book_id, $data);
            }


            if (!empty($_FILES['picture']['name'])) {

                $upload = $this->_upload();

                //delete file
                $add_book = $this->Book_model->get_book($book_id);
                if (file_exists('uploads/images/' . $add_book['file']) && $add_book['file'])
                    unlink('uploads/images/' . $add_book['file']);

                $data['file'] = $upload;

                $this->Book_model->update_book($book_id, $data);
            }








            if ($this->input->post('table_column')) {

                $params = array(
                    'section_id' => $result_result->section_id,
                    $this->input->post('table_column') => $this->input->post('value')
                );




                $this->Book_model->update_book($book_id, $params);
            } elseif ($this->input->post('description_value')) {


                $data = array(
                    $this->input->post('description') => $this->input->post('description_value')
                );
                $this->Material_model->update_material_book_contracts($book_id, $data);
            }



            if ($_POST["dis"][0]) {

                $params = array(
                    'section_id' => $result_result->section_id,
                    'book_title' => $this->input->post('book_title'),
                    'url' => $this->input->post('url'),
                        //'file' => $picture,
                );


                $this->Book_model->update_book($book_id, $params);


                $data = array(
                    'description' => $_POST["dis"][0],
                    'material_number' => 0,
                    'book_id' => $book_id,
                );
                $this->Material_model->update_material_book_contracts($book_id, $data);
            }

            if (isset($_POST["input1"])) {
                for ($count = 0; $count < count($_POST["input1"]); $count++) {
                    $data = array(
                        'value' => $_POST["input1"][$count],
                    );
                    $this->Field_model->update_field($_POST["input_id1"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["textarea1"])) {
                for ($count = 0; $count < count($_POST["textarea1"]); $count++) {
                    $data = array(
                        'value' => $_POST["textarea1"][$count],
                    );
                    $this->Field_model->update_field($_POST["textarea_id1"][$count], $book_id, $data);
                }
            }



            if (isset($_POST["number1"])) {
                for ($count = 0; $count < count($_POST["number1"]); $count++) {
                    $data = array(
                        'value' => $_POST["number1"][$count],
                    );
                    $this->Field_model->update_field($_POST["number_id1"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["datepicker1"])) {
                for ($count = 0; $count < count($_POST["datepicker1"]); $count++) {
                    $data = array(
                        'value' => $_POST["datepicker1"][$count],
                    );
                    $this->Field_model->update_field($_POST["datepicker_id1"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["select1"])) {
                for ($count = 0; $count < count($_POST["select1"]); $count++) {
                    $data = array(
                        'value' => $_POST["select1"][$count],
                    );
                    $this->Field_model->update_field($_POST["select_id1"][$count], $book_id, $data);
                }
            }
            if (isset($_POST["checkbox1"])) {
                for ($count = 0; $count < count($_POST["checkbox1"]); $count++) {
                    $data = array(
                        'value' => $_POST["checkbox1"][$count],
                    );
                    $this->Field_model->update_field($_POST["checkbox_id1"][$count], $book_id, $data);
                }
            }




            $tag_name_name_name = $this->input->post('tag_name');
//                $sql1 = "delete from tag,book_tag using tag,book_tag ,book where "
//                       . "tag.tag_id=book_tag.tag_id and "
//                       . "tag_name not in ('" . $tag_name_name_name . "') and"
//                       . "  book.book_id=book_tag.book_id and book.book_id='" . $book_id . "' ";
            //  $this->db->query($sql1);

            if ($tag_name_name_name) {

                $tag_name_name = explode(",", $tag_name_name_name);
                $tag_name = str_replace(' ', '', $tag_name_name);

                for ($i = 0; $i < count($tag_name); $i++) {

                    $sql = "select * from tag where tag_name='" . $tag_name[$i] . "' and tag_id not in(select book_tag.tag_id from book_tag where  book_tag.book_id='" . $book_id . "')";
                    $query = $this->db->query($sql);
                    $result = $query->row();
                    if ($result) {

                        $tag_book = array(
                            'book_id' => $book_id,
                            'tag_id' => $result->tag_id
                        );
                        $this->Book_tag_model->add_book_tag($tag_book);
                    } else {
                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                        $query = $this->db->query($sql);
                        $result = $query->row();
                        if (!$result) {

                            $paramss = array(
                                'tag_name' => $tag_name[$i]
                            );

                            $tag_id = $this->Tag_model->add_tag($paramss);

                            $tag_book = array(
                                'book_id' => $book_id,
                                'tag_id' => $tag_id
                            );
                            $this->Book_tag_model->add_book_tag($tag_book);
                        }
                    }
                }
            }


            redirect('book/index');
        } else {
            // check if the book exists before trying to edit it
            $data['book'] = $this->Book_model->get_book($book_id);

//$data['get_tag_book']=$this->Book_model->get_tag_book($book_id);

            $data['get_main_section'] = $this->Section_model->get_main_section();
            $data['get_sub_section'] = $this->Section_model->get_sub_section();

            $sql = "select * from tag,book_tag,book where book.book_id=book_tag.book_id and book_tag.tag_id=tag.tag_id and book.book_id='" . $book_id . "' ";
            $query = $this->db->query($sql);
            $result = $query->result();
            if ($result) {
                foreach ($result as $r) {
                    $a[] = $r->tag_name;
                }



                $tag_name = implode(',', $a);
                $data['tag_name'] = $tag_name;
            }
            $this->layout->view('book/update_data_view', $data);
        }
    }

    /*
     * Deleting book
     */

    function remove($book_id) {


        $book = $this->Book_model->get_book($book_id);

        // check if the book exists before trying to delete it
        if (isset($book['book_id'])) {

            $this->Book_model->delete_book($book_id);
            $this->Material_model->delete_material($book_id);
            $this->Version_model->delete_version($book_id);





            redirect('book/index');
        } else
            show_error('The book you are trying to delete does not exist.');
    }

    function remove_contracts() {

        $book = $this->Book_model->get_book($this->input->post('book_id'));

        // check if the book exists before trying to delete it
        if (isset($book['book_id'])) {

            $this->Book_model->delete_book($this->input->post('book_id'));
            $this->Material_model->delete_material($this->input->post('book_id'));

            redirect('book/index');
        } else
            show_error('The book you are trying to delete does not exist.');
    }

    function search_book() {

        $tag_name_name = $this->input->post('query');


        $new_tag_name = str_replace(' ', '', $tag_name_name);
        $tag_name = explode(",", $new_tag_name);


        for ($i = 0; $i < count($tag_name); $i++) {

            $sql = "select * from tag where  tag_name  like '%" . $tag_name[$i] . "%'";
            $query = $this->db->query($sql);

            $result = $query->result();
            foreach ($result as $value) {
                $arr[] = $value->tag_id;
            }
        }


        /*  $sql = "SELECT section_id,book_title,file,COUNT(file) AS relevance FROM
          (SELECT book.section_id,file, book_title FROM book,book_tag,section
          WHERE book.book_id=book_tag.book_id and book.section_id=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches
          GROUP BY  file ORDER BY relevance DESC"; */

        //        $sql = "SELECT section_id,book_title,url,file,book_id,COUNT(file) AS relevance FROM
//  (SELECT book.section_id,file, url,book_title,materials.book_id FROM materials,book,book_tag,section 
//    where  materials.book_id=book.book_id and    book.book_id=book_tag.book_id and book.section_id=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches 
//  GROUP BY  url,file,book_id ORDER BY relevance DESC";

        $sql = "SELECT section_id,book_id,book_title,url,file,COUNT(book_title) AS relevance FROM
  (SELECT book.section_id,book.book_id,file,url, book_title FROM book,book_tag,section 
    WHERE  book.book_id=book_tag.book_id and book.main_section=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches
  GROUP BY book_id, book_title,file,book_id,url ORDER BY relevance DESC";


        $query = $this->db->query($sql);
        $result = $query->result();


        $html = '';
        foreach ($result as $value) {
            $url = $value->url;
            $file = $value->file;
            //$description = $value->description;

            $html .= '<tr  style="border-bottom:1px dotted gray;margin-top:20px;">';
            if ($file != null) {
                $html .= '<td>عنوان الكتاب</td>';
                $html .= '<td>' . $value->book_title . '</td>';
                $html .= '<td><a target="_blank" href="' . base_url() . 'uploads/images/' . $value->file . '">  رابط الملف</a> </td>';
                $html .= '<td><a target="_blank" href="' . base_url() . 'book/edit/' . $value->book_id . '"> رابط الى محتوى حقول الكتاب</a> </td>';
            }



            if ($file == null && $url == null) {
                $html .= '<td>عنوان الكتاب</td>';
                $html .= '<td>' . $value->book_title . '</td>';
                $html .= '<td><a target="_blank" href="' . base_url() . 'book/edit/' . $value->book_id . '"> رابط الى محتوى حقول الكتاب</a> </td>';
            }


            if ($file == null && $url != null) {
                $html .= '<td>عنوان الكتاب</td>';
                $html .= '<td>' . $value->book_title . '</td>';
                $html .= '<td><a target="_blank" href="' . $url . '"> الرابط</a></td>';
                $html .= '<td><a target="_blank" href="' . base_url() . 'book/edit/' . $value->book_id . '"> رابط الى محتوى حقول الكتاب</a> </td>';
            }



            $html .= '</tr>';
            $html .= '<tr style="border-bottom:1px solid #337ab7;margin-top:20px;">';
            $html .= '<td> اسم القسم</td>';

            $sql2 = "SELECT c.*
    FROM (
        SELECT
            @r AS _id,
            (SELECT @r := parent_id FROM section WHERE section_id = _id) AS parent_id,
            @l := @l + 1 AS level
        FROM
            (SELECT @r := " . $value->section_id . ", @l := 0) vars, section m
        WHERE @r <> 0) d
    JOIN section c
    ON d._id = c.section_id ORDER BY section_id ASC";

            $query2 = $this->db->query($sql2);

            $result2 = $query2->result();
            foreach ($result2 as $value2) {

                $html .= '<td>&nbsp&nbsp</td>';
                $html .= '<td><a class="cc"  href="' . base_url() . 'book/search_all_book_in_sub_section/?section_id=' . $value2->section_id . '">' . $value2->section_name . '</a> </td>';

                $html .= '<td>/</td>';
            }
            $value2->parent_id = -1;
            $html .= '</tr>';
        }

        $data = $html;


        echo json_encode($data);
    }

    function serch_view() {

        $this->layout->view("book/search");
    }

    function search_book_api() {
        if ($this->input->post()) {
            $tags_array = $this->input->post();
            if (isset($tags_array['tags']) && !empty($tags_array['tags'])) {
                $new_tag_name = str_replace(' ', '', $tags_array['tags']);
                $tags_name = explode(',', $new_tag_name);

                foreach ($tags_name as $tag) {
                    $this->db->like('tag_name', $tag);
                    $result[] = $this->db->get('tag')->result();
                }
                if ($result) {
                    foreach ($result as $value => $key) {
                        foreach ($result[$value] as $item) {
                            $arr[] = $item->tag_id;
                        }
                    }
                    $sql = "SELECT section_id, main_section, book_id,book_title,url,file,
                        COUNT(book_title) AS relevance 
                        FROM
                        (SELECT book.section_id, book.main_section, book.book_id,file,url, book_title 
                         FROM book,book_tag,section 
                         WHERE  book.book_id = book_tag.book_id 
                         AND book.main_section = section.section_id 
                         AND tag_id IN('" . implode("','", $arr) . "')
                         ) AS matches
                         GROUP BY section_id, main_section, book_id, book_title, url, file 
                         ORDER BY relevance DESC";
                    $books = $this->db->query($sql)->result();

                    foreach ($books as $book) {
                        $sql2 = "SELECT c.*
                            FROM (
                                SELECT
                                    @r AS _id,
                                    (SELECT @r := parent_id FROM section WHERE section_id = _id) AS parent_id,
                                    @l := @l + 1 AS level
                                FROM
                                    (SELECT @r := " . $book->section_id . ", @l := 0) vars, section m
                                WHERE @r <> 0) d
                            JOIN section c
                            ON d._id = c.section_id ORDER BY section_id ASC";
                        $sections = $this->db->query($sql2)->result();
                        $book->sections = $sections;
                    }
                    // set response code - 200 OK
                    http_response_code(200);
                    echo json_encode(array("message" => "success", "books" => $books), JSON_UNESCAPED_UNICODE);
                } else {
                    // set response code - 503 service unavailable
                    http_response_code(503);
                    echo json_encode(array("message" => "No data found."));
                }
            } else {
                // set response code - 400 bad request
                http_response_code(400);
                echo json_encode(array("message" => "Unable to read tags. The data is incomplete."));
            }
        } else {
            // set response code - 405 method not allowed
            http_response_code(405);
            echo json_encode(array("message" => "Method Not Allowed"));
        }
    }

    function search_via_section($section_id) {



        $data = $this->Book_model->search_via_section($section_id);

        echo json_encode($data);
    }

    function search_via_section_to_edit() {

        $section_id = $this->input->post('sub_section');

        $data['book'] = $this->Book_model->search_via_section_to_edit($section_id);

        $this->layout->view('book/search_via_section', $data);
    }

    function book_search_via_section() {


        $data['result1'] = $this->Section_model->get_section_via_parent(32);

        $section_id = $this->input->post('section_id');


        $data['result'] = $this->Book_model->search_via_section_k($section_id);
        $data['result2'] = $this->Book_model->search_material_book_via_section($section_id);
        $data['result3'] = $this->Book_model->search_version_book_via_section($section_id);


        $this->layout->view('main_sections/saudi_regulations', $data);
    }

    function book_page_for_saudi_regulations() {


        $data['result1'] = $this->Section_model->get_section_via_parent(32);

        $section_id = $this->input->get('section_id');


        $data['result'] = $this->Book_model->search_via_section_k($section_id);
        $data['result2'] = $this->Book_model->search_material_book_via_section($section_id);

        $this->layout->view('main_sections/saudi_regulations', $data);
    }

    function book_pagination($rowno = 0) {

        $section_id = $this->input->post("section_id");
        // Row per page
        $rowperpage = 6;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        // All records count
        $allcount = $this->Book_model->getbooksCount($section_id);

        // Get  records
        $users_record = $this->Book_model->books($rowno, $rowperpage, $section_id);

        // Pagination Configuration
        $config['base_url'] = base_url() . 'book/book_pagination';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        //styling
        $config['full_tag_open'] = '<ul class="pagination-area">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="previous">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';



        // Initialize
        $this->pagination->initialize($config);

        // Initialize $data Array
        if ($users_record) {
            $data['pagination'] = $this->pagination->create_links();
        } else {
            $data['pagination'] = '';
        }

        $data['result'] = $users_record;
        $data['row '] = $rowno;
        $data['get_main_section'] = $this->Section_model->get_main_section();
        echo json_encode($data);
    }

    function book_pagination_modal($rowno = 0) {

        $section_id = $this->input->post("section_id");
        // Row per page
        $rowperpage = 6;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        // All records count
        $allcount = $this->Book_model->getbooksCount_modal($section_id);

        // Get  records
        $users_record = $this->Book_model->books_modal($rowno, $rowperpage, $section_id);

        // Pagination Configuration
        $config['base_url'] = base_url() . 'book/book_pagination';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;


        //styling
        $config['full_tag_open'] = '<ul class="pagination-area">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="previous">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';



        // Initialize
        $this->pagination->initialize($config);

        // Initialize $data Array
        if ($users_record) {
            $data['pagination'] = $this->pagination->create_links();
        } else {
            $data['pagination'] = '';
        }

        $data['result'] = $users_record;
        $data['row '] = $rowno;
        $data['get_main_section'] = $this->Section_model->get_main_section();
        echo json_encode($data);
    }

    function datelias_searh() {
            $data['country'] = $this->Book_model->fetch_country();
        $data['get_main_section'] = $this->Section_model->get_main_section();


        $this->layout->view('datelia_search/search', $data);
    }

    function search() {
        $section_id = $this->input->post('section_id');
        if ($section_id = 31) {
            if (isset($_POST) && count($_POST) > 0) {
                $this->db->select("*");
                $this->db->from("book");
                $this->db->where("main_section", $section_id);
                $this->db->like('book_title', $query);
                $this->db->or_like('url', $query);

                $query = $this->db->get();
            }
        }
        if ($section_id = 32) {
            if (isset($_POST) && count($_POST) > 0) {
                $this->db->select("*");
                $this->db->from("book");
                $this->db->where("main_section", $section_id);
                $this->db->like('pass', $query);
                $this->db->or_like('dis', $query);


                $this->db->or_like('history_system_m', $query);
                $this->db->or_like('date_publication_m', $query);
                $this->db->or_like('accreditation', $query);
                $this->db->or_like('url', $query);
                $query = $this->db->get();
            }
        }
        if ($section_id = 33) {
            if (isset($_POST) && count($_POST) > 0) {
                $this->db->select("*");
                $this->db->from("book");
                $this->db->where("main_section", $section_id);
                $this->db->like('book_title', $query);
                $this->db->or_like('url', $query);
                $this->db->or_like('publisher', $query);
                $this->db->or_like('author', $query);
                $this->db->or_like('year_publication', $query);
                $this->db->or_like('dis', $query);
                $query = $this->db->get();
            }
        }
        if ($section_id = 34) {
            if (isset($_POST) && count($_POST) > 0) {
                $this->db->select("*");
                $this->db->from("book");
                $this->db->where("main_section", $section_id);
                $this->db->like('book_title', $query);
                $this->db->or_like('url', $query);

                $query = $this->db->get();
            }
        }
    }

    function search_book_via_section() {


        $section_id = $this->input->post('section_id');


        $data['result'] = $this->Book_model->search_via_section($section_id);

        echo json_encode($data);
    }

    function country_legislation() {

        $data = $this->Book_model->country_legislation();
        foreach ($data as $value) {
            echo $value['allcount'];
            echo $value['country_name'];
        }
        die();
    }

    function search_all_book_in_sub_section() {
        //$section_id=$this->input->get('section_id');
        //  $data = $this->Book_model->search_via_section($section_id);
        //   echo json_encode($data);
        $this->layout->view("book/search");
    }

    function returnfunction() {


//        $sql3="BEGIN
//    DECLARE rv VARCHAR(1024);
//    DECLARE cm CHAR(1);
//    DECLARE ch INT;
//
//    SET rv = '';
//    SET cm = '';
//    SET ch = GivenID;
//    WHILE ch > 0 DO
//        SELECT IFNULL(parent_id,-1) INTO ch FROM
//        (SELECT parent_id FROM section WHERE section_id = ch) A;
//        IF ch > 0 THEN
//            SET rv = CONCAT(rv,cm,ch);
//            SET cm = ',';
//        END IF;
//    END WHILE;
//    RETURN rv;
//END";

        $childCategoryID = 148;
        $sql2 = "SELECT c.*
    FROM (
        SELECT
            @r AS _id
            (SELECT @r := parent_id FROM section WHERE section_id = _id) AS parent_id,
            @l := @l + 1 AS level
        FROM
            (SELECT @r := " . $childCategoryID . ", @l := 0) vars, section m
        WHERE @r <> 0) d
    JOIN section c
    ON d._id = c.section_id ";
        $sql3 = "select * from section where parent_id=32 and section_id not in (select parent_id from section)";




        $query2 = $this->db->query($sql3);
        $row = $query2->result();


        foreach ($row as $value) {
            echo '<br>';
            echo $value->section_id;
            // echo $value->parent_id;

            echo '<br>';
        }
    }

    function s() {
        $sql = "select * from section where parent_id !=0 and section_id  not in (select parent_id from section)";




        $query2 = $this->db->query($sql);
        $row = $query2->result();


        foreach ($row as $value) {
            echo '<br>';
            echo $value->section_id;
            // echo $value->parent_id;

            echo '<br>';
        }
        die();
    }

    function search_datelias() {
        $section_id=  $this->input->post('section_id');
        
        
        $dat = $this->Section_model->get_main_section_name($section_id);
        $section_name=$dat->section_name;
        
        if ($section_name == 'الأحكام والسوابق القضائية') {




            if (isset($_POST) && count($_POST) > 0) {



                $book_title = $this->input->post('book_title');
                $url = $this->input->post('url');
                $country = $this->input->post('country');
                $city = $this->input->post('city');
                $ruling_year = $this->input->post('ruling_year');
                $pronounced_judgment = $this->input->post('pronounced_judgment');
                $volume_number = $this->input->post('volume_number');
                $issue_classification = $this->input->post('issue_classification');
                $summary_of_judgment = $this->input->post('summary_of_judgment');
                $sentencing_text = $this->input->post('sentencing_text');
                $the_reasons = $this->input->post('the_reasons');
                $the_legal_bond = $this->input->post('the_legal_bond');
                $appeal_decision = $this->input->post('appeal_decision');


                $this->db->select("*");
                $this->db->from("book");
                $this->db->where("book_title", $book_title);
                $this->db->where("url", $url);
                $this->db->where("country", $country);
                $this->db->where("city", $city);
                $this->db->where("ruling_year", $ruling_year);
                $this->db->where("pronounced_judgment", $pronounced_judgment);
                $this->db->where("volume_number", $volume_number);
                $this->db->where("issue_classification", $issue_classification);
                $this->db->where("summary_of_judgment", $summary_of_judgment);
                $this->db->where("sentencing_text", $sentencing_text);
                $this->db->where("the_reasons", $the_reasons);
                $this->db->where("the_legal_bond", $the_legal_bond);
                $this->db->where("appeal_decision", $appeal_decision);
				$this->db->where("main_section", $section_id);
				
                $query = $this->db->get();
                 $data['section_name']=$section_name;
                $data['result']= $query->result();
            }
        }
        
        
                elseif ($section_name == 'الكتب القانونية والأبحاث') {




            if (isset($_POST) && count($_POST) > 0) {



                $book_title = $this->input->post('book_title');
                $url = $this->input->post('url');
                $author = $this->input->post('author');
                $publisher = $this->input->post('publisher');
                $year_publication = $this->input->post('year_publication');
               
             


                $this->db->select("*");
                $this->db->from("book");
                $this->db->where("book_title", $book_title);
                $this->db->where("url", $url);
                $this->db->where("author", $author);
                $this->db->where("publisher", $publisher);
                $this->db->where("year_publication", $year_publication);
            

                $query = $this->db->get();
                 $data['section_name']=$section_name;
               $data['result']= $query->result();
            }
        }
        
               elseif ($section_name == 'الأنظمة السعودية') {



            if (isset($_POST) && count($_POST) > 0) {



       
                $url = $this->input->post('url');
                $history_system_m = $this->input->post('history_system_m');
                $accreditation = $this->input->post('accreditation');
                $date_publication_m = $this->input->post('date_publication_m');
                $pass = $this->input->post('pass');
                
               

                $this->db->select("*");
                $this->db->from("book");
             
                $this->db->where("url", $url);
                $this->db->where("history_system_m", $history_system_m);
                $this->db->where("accreditation", $accreditation);
                $this->db->where("date_publication_m", $date_publication_m);
                
                $this->db->where("pass", $pass);
                

                $query = $this->db->get();
                 $data['section_name']=$section_name;
                 $data['result']= $query->result();
            }
        }
        
          elseif ($section_name == 'نماذج وعقود') {




            if (isset($_POST) && count($_POST) > 0) {



                $book_title = $this->input->post('book_title');
                $url = $this->input->post('url');
           


                $this->db->select("*");
                $this->db->from("book");
                $this->db->where("book_title", $book_title);
                $this->db->where("url", $url);
               

                $query = $this->db->get();
              $data['section_name']=$section_name;
            $data['result']= $query->result();
            }
        }
                elseif ($section_name == 'الأنظمة والتشريعات والقوانين') {




            if (isset($_POST) && count($_POST) > 0) {


                

                $book_title = $this->input->post('book_title');
                $url = $this->input->post('url');
                $country = $this->input->post('country');
                $city = $this->input->post('city');
                $legislative_type = $this->input->post('legislative_type');
                $legislative_status = $this->input->post('legislative_status');
                $material_number_legislation = $this->input->post('material_number_legislation');
                $legislation_number = $this->input->post('legislation_number');
             


                $this->db->select("*");
                $this->db->from("book");
                $this->db->where("book_title", $book_title);
                $this->db->where("url", $url);
                $this->db->where("country", $country);
                $this->db->where("city", $city);
                $this->db->where("legislative_type", $legislative_type);
                $this->db->where("legislative_status", $legislative_status);
                $this->db->where("material_number_legislation", $material_number_legislation);
                $this->db->where("legislation_number", $legislation_number);
                

                $query = $this->db->get();
                 $data['result']= $query->result();
                 $data['section_name']=$section_name;
            }
        }
        
        $this->layout->view('datelia_search/result',$data);
        
    }
	
	function index_search(){
		
		$query=$this->input->post('query');
		   $data['result']  = $this->db->query("select * from book  where book_title  LIKE '%" . $query . "%' or url LIKE '%" . $query . "%' ;  ")->result_array();
		   $this->layout->view('datelia_search/index_search',$data);
		
	}

}
