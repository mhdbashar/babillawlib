<?php

class Book extends Front_end {

    function __construct() {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->model('Tag_model');
        $this->load->model('Book_tag_model');
        $this->load->library('upload');
        $this->load->model('Section_model');
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
            } else {
                $picture = '';
            }
        } else {
            $picture = '';
        }


        $section_name = $this->input->post('section_name');
        $sql = "select * from section where section_name='" . $section_name . "'";
        $query = $this->db->query($sql);
        $result = $query->row();
        
        
        
        $section_sub_id = $this->input->post('sub_section');
        if (isset($section_sub_id) && !empty($section_sub_id)) {

            $sql2 = "select * from section where section_id='" . $section_sub_id . "'";
            $query = $this->db->query($sql2);
            $result_result = $query->row();
            $d = '';
            $d = $result_result->section_id;





            if ($section_name == 'مجلدات الأحكام') {

                if (isset($_POST) && count($_POST) > 0) {
                    $params = array(
                        'section_id' => $d,
                        'main_section' => $result->section_id,
                        'subject' => $this->input->post('subject'),
                        'volume_number' => $this->input->post('volume_number'),
                        'year' => $this->input->post('year'),
                        'book_title' => $this->input->post('book_title'),
                        'url' => $this->input->post('url'),
                        'dis' => $this->input->post('dis'),
                        'file' => $picture
                    );
                }
                $book_id = $this->Book_model->add_book($params);



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
            } elseif ($section_name == 'المدونات القضائية') {

                if (isset($_POST) && count($_POST) > 0) {
                    $params = array(
                        'main_section' => $result->section_id,
                        'section_id' => $result_result->section_id,
                        'subject' => $this->input->post('subject'),
                        'volume_number' => $this->input->post('volume_number'),
                        'year' => $this->input->post('year'),
                        'book_title' => $this->input->post('book_title'),
                        'url' => $this->input->post('url'),
                        'dis' => $this->input->post('dis'),
                        'file' => $picture
                    );
                }


                $book_id = $this->Book_model->add_book($params);



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

                if (isset($_POST) && count($_POST) > 0) {
                    $params = array(
                        'main_section' => $result->section_id,
                        'section_id' => $result_result->section_id,
                        'book_title' => $this->input->post('book_title'),
                        'url' => $this->input->post('url'),
                        'dis' => $this->input->post('dis'),
                        'author' => $this->input->post('author'),
                        'publisher' => $this->input->post('publisher'),
                        'year_publication' => $this->input->post('year_publication'),
                        'file' => $picture
                    );
                }


                $book_id = $this->Book_model->add_book($params);

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
                        'book_title' => $this->input->post('book_title'),
                        'url' => $this->input->post('url'),
                        'dis' => $this->input->post('dis'),
                        'history_system_m' => $this->input->post('history_system_m'),
                        'history_system_h' => $this->input->post('history_system_h'),
                        'accreditation' => $this->input->post('accreditation'),
                        'date_publication_m' => $this->input->post('date_publication_m'),
                        'date_publication_h' => $this->input->post('date_publication_h'),
                        'pass' => $this->input->post('pass'),
                        'file' => $picture
                    );
                }


                $book_id = $this->Book_model->add_book($params);

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
                        'dis' => $this->input->post('dis'),
                        'file' => $picture
                    );
                }


                $book_id = $this->Book_model->add_book($params);

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


        $section_sub_id = $this->input->post('sub_section');


        $this->form_validation->set_rules('sub_section', 'sub section', 'required');

        if ($this->form_validation->run() == TRUE) {

            if ($this->input->post('sub_section')) {
                $sub_section = $this->input->post('sub_section');
                $sql2 = "select * from section where section_id='" . $sub_section . "'";
                $query = $this->db->query($sql2);
                $result_result = $query->row();
                $d = '';
                $d = $result_result->section_id;
            }








            if ($section_name == 'مجلدات الأحكام') {

                if (isset($_POST) && count($_POST) > 0) {

                    $params = array(
                        'section_id' => $d,
                       // 'main_section' => $result->section_id,
                        'subject' => $this->input->post('subject'),
                        'volume_number' => $this->input->post('volume_number'),
                        'year' => $this->input->post('year'),
                        'book_title' => $this->input->post('book_title'),
                        'url' => $this->input->post('url'),
                        'dis' => $this->input->post('dis'),
                       // 'file' => $picture
                    );
                }

                $this->Book_model->update_book($book_id, $params);

                $tag_name_name_name = $this->input->post('tag_name');


//                  $sql2="delete from book_tag using book,book_tag,tag where  book.book_id=book_tag.book_id and  book_tag.tag_id=tag.tag_id and tag_name not in ('" . $tag_name_name_name . "') and book.book_id='".$book_id."' ";
//        $this->db->query($sql2);
//        
//                $sql1 = "delete from book_tag using book_tag where tag_id in (select tag_id from book_tag where  book_id='".$book_id."') and tag_id NOT IN "
//        . "(SELECT tag_id FROM book_tag WHERE book_id != '".$book_id."') and "
//                       . "tag_name not in ('" . $tag_name_name_name . "')" ;
//               $this->db->query($sql1);


                if ($tag_name_name_name) {

                    $tag_name_name = explode(",", $tag_name_name_name);
                    $tag_name = str_replace(' ', '', $tag_name_name);

                    for ($i = 0; $i < count($tag_name); $i++) {

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
//                        $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
//                    $query = $this->db->query($sql);
//                    $result_r = $query->row();
//                 if($result_r){
//                     $book_tag=array(
//                          'book_id' => $book_id,
//                         'tag_id'=>$result_r->tag_id
//                         
//                     );
//                     $this->Book_tag_model->add_book_tag($book_tag);
//                 }
                    }
                }
                redirect('book/index');
            } else if ($section_name == 'المدونات القضائية') {

                if (isset($_POST) && count($_POST) > 0) {

                    $params = array(
                       // 'main_section' => $result->section_id,
                        'section_id' => $result_result->section_id,
                        'subject' => $this->input->post('subject'),
                        'volume_number' => $this->input->post('volume_number'),
                        'year' => $this->input->post('year'),
                        'book_title' => $this->input->post('book_title'),
                        'url' => $this->input->post('url'),
                        'dis' => $this->input->post('dis'),
                       // 'file' => $picture
                    );
                }

                $this->Book_model->update_book($book_id, $params);

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


                redirect('book/index');
            } else if ($section_name == 'الكتب القانونية والأبحاث') {

                if (isset($_POST) && count($_POST) > 0) {

                    $params = array(
                       // 'main_section' => $result->section_id,
                        'section_id' => $result_result->section_id,
                        'book_title' => $this->input->post('book_title'),
                        'url' => $this->input->post('url'),
                        'dis' => $this->input->post('dis'),
                        'author' => $this->input->post('author'),
                        'publisher' => $this->input->post('publisher'),
                        'year_publication' => $this->input->post('year_publication'),
                       // 'file' => $picture
                    );
                }

                $this->Book_model->update_book($book_id, $params);

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


                redirect('book/index');
            } elseif ($section_name == 'الأنظمة السعودية') {

                if (isset($_POST) && count($_POST) > 0) {

                    $params = array(
                       // 'main_section' => $result->section_id,
                        'section_id' => $result_result->section_id,
                        'book_title' => $this->input->post('book_title'),
                        'url' => $this->input->post('url'),
                        'dis' => $this->input->post('dis'),
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


                redirect('book/index');
            } elseif ($section_name == 'نماذج وعقود') {

                if (isset($_POST) && count($_POST) > 0) {

                    $params = array(
                       // 'main_section' => $result->section_id,
                        'section_id' => $result_result->section_id,
                        'book_title' => $this->input->post('book_title'),
                        'url' => $this->input->post('url'),
                        'dis' => $this->input->post('dis'),
                        //'file' => $picture
                    );
                }

                $this->Book_model->update_book($book_id, $params);

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


                redirect('book/index');
            }
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

            redirect('book/index');
        } else
            show_error('The book you are trying to delete does not exist.');
    }

    function search_book() {

        $tag_name_name = $this->input->post('query');


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
        $sql = "SELECT section_name,book_title,file,COUNT(book_title) AS relevance FROM
  (SELECT section_name,file, book_title FROM book,book_tag,section 
    WHERE book.book_id=book_tag.book_id and book.main_section=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches
  GROUP BY book_title ORDER BY relevance DESC";
        $query = $this->db->query($sql);
        $result = $query->result();

        $data = $result;
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
          $sql = "SELECT section_name,book_title,file,COUNT(book_title) AS relevance FROM
  (SELECT section_name,file, book_title FROM book,book_tag,section 
    WHERE book.book_id=book_tag.book_id and book.main_section=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches
  GROUP BY book_title ORDER BY relevance DESC";
        $query = $this->db->query($sql);
        $result = $query->result();

        $data = $result;
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    function search_via_section() {
        $section_id = $this->input->post('sub_section');


        $data['book'] = $this->Book_model->search_via_section($section_id);
        $this->layout->view('book/search_via_section', $data);
    }



    function section() {

        $this->layout->view('section');
    }
   

}
