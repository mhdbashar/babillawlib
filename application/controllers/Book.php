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

        $this->load->library('form_validation');
    }

    /*
     * Listing of book
     */

    function index() {
        $data['book'] = $this->Book_model->get_all_book();
        $data['get_sub_section'] = $this->Section_model->get_sub_section();

        $this->layout->view('book/index', $data);
    }

    function add() {

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
            } 
        } 


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


            if (isset($section_name)) {




                if ($section_name == 'السوابق القضائية') {

                    if (isset($_POST) && count($_POST) > 0) {
                        $params = array(
                            'main_section' => $result->section_id,
                            'section_id' => $result_result->section_id,
                            'book_title' => $this->input->post('book_title'),
                            'url' => $this->input->post('url'),
                            'file' => $picture
                        );
                    }



                    $book_id = $this->Book_model->add_book($params);

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
                } elseif ($section_name == 'الكتب القانونية والأبحاث') {




                    if (!empty($_FILES['mini']['name'])) {
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
                            'file' => $picture,
                            'mini' => $mini
                        );
                    }


                    $book_id = $this->Book_model->add_book($params);
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
                            'file' => $picture
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
                            'file' => $picture
                        );
                    }


                    $book_id = $this->Book_model->add_book($params);
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
                return false;
            }
        } else {
            $this->load->model('Section_model');

            $data['get_main_section'] = $this->Section_model->get_main_section();
            $data['get_sub_section'] = $this->Section_model->get_sub_section();



            $this->layout->view('book/add', $data);
        }
    }

    /*
     * Editing a book
     */

    function edit($book_id) {



        // check if the book exists before trying to edit it
        $data['book'] = $this->Book_model->get_book($book_id);
        $data['book_material'] = $this->Material_model->get_material_book($book_id);
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



        if ($section_name == 'السوابق القضائية') {

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    'section_id' => $result_result->section_id,
                    'book_title' => $this->input->post('book_title'),
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

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    // 'main_section' => $result->section_id,
                    'section_id' => $result_result->section_id,
                    'book_title' => $this->input->post('book_title'),
                    'url' => $this->input->post('url'),
                    'author' => $this->input->post('author'),
                    'publisher' => $this->input->post('publisher'),
                    'year_publication' => $this->input->post('year_publication'),
                        // 'file' => $picture
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

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    // 'main_section' => $result->section_id,
                    'section_id' => $result_result->section_id,
                    'book_title' => $this->input->post('book_title'),
                    'url' => $this->input->post('url'),
                    //'dis' => $this->input->post('dis'),
                    'history_system_m' => $this->input->post('history_system_m'),
                    'history_system_h' => $this->input->post('history_system_h'),
                    'accreditation' => $this->input->post('accreditation'),
                    'date_publication_m' => $this->input->post('date_publication_m'),
                    'date_publication_h' => $this->input->post('date_publication_h'),
                    'pass' => $this->input->post('pass'),
                        //'file' => $picture
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
        } elseif ($section_name == 'نماذج وعقود') {

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
                );


                $this->Book_model->update_book($book_id, $params);


                $data = array(
                    'description' => $_POST["dis"][0],
                  'material_number' => 0,
                    'book_id' => $book_id,
                );
                $this->Material_model->update_material_book_contracts($book_id, $data);
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

    function remove() {


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
        //$tag_name_name = "n";
//$this->input->post('query')

        $new_tag_name = str_replace(' ', '', $tag_name_name);
        $tag_name = explode(",", $new_tag_name);


        for ($i = 0; $i < count($tag_name); $i++) {

            $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
            $query = $this->db->query($sql);
            $result = $query->row();
            if ($result) {
                $arr[] = $result->tag_id;
            } else {
                return false;
            }
        }
		
		
		 /*  $sql = "SELECT section_id,book_title,file,COUNT(file) AS relevance FROM
  (SELECT book.section_id,file, book_title FROM book,book_tag,section 
    WHERE book.book_id=book_tag.book_id and book.section_id=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches
  GROUP BY  file ORDER BY relevance DESC"; */
		
		
        $sql = "SELECT section_id,book_title,file,COUNT(file) AS relevance FROM
  (SELECT book.section_id,file, book_title FROM book,book_tag,section 
    where book.file IS NOT NULL and book.book_id=book_tag.book_id and book.section_id=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches 
  GROUP BY  file ORDER BY relevance DESC";
        $query = $this->db->query($sql);
        $result = $query->result();


        $html = '';
        foreach ($result as $value) {

            $html .= '<tr>';

            $html .= '<td><a href="' . base_url() . 'uploads/images/' . $value->file . '">استعراض الكتاب</a> </td>';

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
                // $html .='<td><a href="' .base_url() . 'uploads/images/' .$value->file. '">استعراض الكتاب</a> </td>';
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


        $json = file_get_contents('php://input');

        $data = json_decode($json, true);

        $tag_name_post = $data['tag_name'];

        $new_tag = $tag_name_post;


        $new_tag_name = str_replace(' ', '', $new_tag);
        $tag_name = explode(",", $new_tag_name);


        for ($i = 0; $i < count($tag_name); $i++) {

            $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
            $query = $this->db->query($sql);
            $result = $query->row();
            if ($result) {
                $arr[] = $result->tag_id;
            } else {
                return false;
            }
        }
       $sql = "SELECT section_id,book_title,file,COUNT(file) AS relevance FROM
  (SELECT book.section_id,file, book_title FROM book,book_tag,section 
    WHERE book.file IS NOT NULL and book.book_id=book_tag.book_id and book.section_id=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches
  GROUP BY  file ORDER BY relevance DESC";
        $query = $this->db->query($sql);
        $result = $query->result();


        $html = '';
        foreach ($result as $value) {

            $html .= '<tr>';

            $html .= '<td><a href="' . base_url() . 'uploads/images/' . $value->file . '">استعراض الكتاب</a> </td>';

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
                // $html .='<td><a href="' .base_url() . 'uploads/images/' .$value->file. '">استعراض الكتاب</a> </td>';
                $html .= '<td>/</td>';
            }
            $value2->parent_id = -1;
            $html .= '</tr>';
        }

        $data = $html;
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
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

    function search_book_via_section() {


        $section_id = $this->input->post('section_id');


        $data['result'] = $this->Book_model->search_via_section($section_id);

        echo json_encode($data);
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

}
