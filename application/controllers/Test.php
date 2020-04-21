<?php

class Book extends Front_end {

    function __construct() {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->model('Tag_model');
        $this->load->model('Book_tag_model');
        $this->load->library('upload');
        $this->load->model('Section_model');
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

        if ($this->input->post('section_sub_name')) {
            $section_sub_name = $this->input->post('section_sub_name');
            $sql2 = "select * from section where section_name='" . $section_sub_name . "'";
            $query = $this->db->query($sql2);
            $result_result = $query->row();
            $d = '';
            $d = $result_result->section_id;
        }



        if ($section_name == 'مجلدات الأحكام') {

            if (isset($_POST) && count($_POST) > 0) {





                $params = array(
                    'section_id' => $d,
                    'main_section' => $result->section_id,
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'subject' => $this->input->post('subject'),
                    'volume_number' => $this->input->post('volume_number'),
                    'year' => $this->input->post('year'),
                    'book_title' => $this->input->post('book_title'),
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
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'subject' => $this->input->post('subject'),
                    'volume_number' => $this->input->post('volume_number'),
                    'year' => $this->input->post('year'),
                    'book_title' => $this->input->post('book_title'),
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
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'book_title' => $this->input->post('book_title'),
                    'date_publication' => $this->input->post('date_publication'),
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
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'book_title' => $this->input->post('book_title'),
                    'the_main_domain' => $this->input->post('the_main_domain'),
                    'subdomain' => $this->input->post('subdomain'),
                    'history_system' => $this->input->post('history_system'),
                    'accreditation' => $this->input->post('accreditation'),
                    'date_publication' => $this->input->post('date_publication'),
                    'adjustments' => $this->input->post('adjustments'),
                    'accessories' => $this->input->post('accessories'),
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
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'book_title' => $this->input->post('book_title'),
                    'date_publication' => $this->input->post('date_publication'),
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
        foreach ($result as $r) {
            $a[] = $r->tag_name;
        }
        $tag_name = implode(',', $a);
        $data['tag_name'] = $tag_name;

        $this->layout->view('book/update_data_view', $data);
    }

    public function update($book_id) {






//$_FILES['picture']['name']=$this->input->post('picture');

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

        if ($this->input->post('section_sub_name')) {
            $section_sub_name = $this->input->post('section_sub_name');
            $sql2 = "select * from section where section_name='" . $section_sub_name . "'";
            $query = $this->db->query($sql2);
            $result_result = $query->row();
            $d = '';
            $d = $result_result->section_id;
        }



        if ($section_name == 'مجلدات الأحكام') {

            if (isset($_POST) && count($_POST) > 0) {





                $params = array(
                    'section_id' => $d,
//                    'main_section' => $result->section_id,
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'subject' => $this->input->post('subject'),
                    'volume_number' => $this->input->post('volume_number'),
                    'year' => $this->input->post('year'),
                    'book_title' => $this->input->post('book_title'),
//                    'file' => $this->input->post('picture')
                );
            }


            if (isset($_POST['tag_name'])) {
                $tag_name_name_name= $this->input->post('tag_name');

                $tag_name_name = explode(", ", $tag_name_name_name);
                $tag_name = str_replace(' ', '', $tag_name_name);

                for ($i = 0; $i < count($tag_name); $i++) {


                    $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                    $query = $this->db->query($sql);
                    $result = $query->row();
                    if (!$result) {


                        echo $tag_name[$i];
                        echo ' <br>';


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
            
            
            
            
            
            
            
                       $sql2="delete from tag using tag where tag_name  not in ('".$tag_name_name_name."') and tag_id NOT IN "
        . "(SELECT tag_id FROM book_tag WHERE book_id != '".$book_id."')";
 $this->db->query($sql2);
         $sql1="delete from book_tag using tag,book_tag where  book.book_id=book_tag.book_id and tag.tag_id=book_tag.tag_id and tag_name  not in ('".$tag_name_name_name."')and book.book_id='".$book_id."' ";
     $this->db->query($sql1);
            
            
            
            
            
            
            
            
            
            $this->Book_model->update_book($book_id, $params);

           redirect('book/index');
        } elseif ($section_name == 'المدونات القضائية') {

            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
//                    'main_section' => $result->section_id,
                    'section_id' => $result_result->section_id,
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'subject' => $this->input->post('subject'),
                    'volume_number' => $this->input->post('volume_number'),
                    'year' => $this->input->post('year'),
                    'book_title' => $this->input->post('book_title'),
//                      'file' => $this->input->post('picture')
                );
            }



            $this->Book_model->update_book($book_id, $params);



            $tag_name_name_name = $this->input->post('tag_name');

            $tag_name_name = explode(", ", $tag_name_name_name);
            $tag_name = str_replace(' ', '', $tag_name_name);

            for ($i = 0; $i < count($tag_name); $i++) {


                $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                $query = $this->db->query($sql);
                $result = $query->row();
                if (!$result) {


                    // echo $tag_name[$i];

                    $params = array(
                        'tag_name' => $tag_name[$i]
                    );

                    $tag_id = $this->Tag_model->add_tag($params);

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
//                    'main_section' => $result->section_id,
                    'section_id' => $result_result->section_id,
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'book_title' => $this->input->post('book_title'),
                    'date_publication' => $this->input->post('date_publication'),
//                   'file' => $this->input->post('picture')
                );
            }


            $this->Book_model->update_book($book_id, $params);



            $tag_name_name_name = $this->input->post('tag_name');

            $tag_name_name = explode(", ", $tag_name_name_name);
            $tag_name = str_replace(' ', '', $tag_name_name);

            for ($i = 0; $i < count($tag_name); $i++) {


                $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                $query = $this->db->query($sql);
                $result = $query->row();
                if (!$result) {


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
        } elseif ($section_name == 'الأنظمة السعودية') {

            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
//                    'main_section' => $result->section_id,
                    'section_id' => $result_result->section_id,
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'book_title' => $this->input->post('book_title'),
                    'the_main_domain' => $this->input->post('the_main_domain'),
                    'subdomain' => $this->input->post('subdomain'),
                    'history_system' => $this->input->post('history_system'),
                    'accreditation' => $this->input->post('accreditation'),
                    'date_publication' => $this->input->post('date_publication'),
                    'adjustments' => $this->input->post('adjustments'),
                    'accessories' => $this->input->post('accessories'),
                    'pass' => $this->input->post('pass'),
//                   'file' => $this->input->post('picture')
                );
            }
            $this->Book_model->update_book($book_id, $params);



            $tag_name_name_name = $this->input->post('tag_name');

            $tag_name_name = explode(", ", $tag_name_name_name);
            $tag_name = str_replace(' ', '', $tag_name_name);

            for ($i = 0; $i < count($tag_name); $i++) {


                $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                $query = $this->db->query($sql);
                $result = $query->row();
                if (!$result) {







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
//                    'main_section' => $result->section_id,
                    'section_id' => $result_result->section_id,
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'book_title' => $this->input->post('book_title'),
                    'date_publication' => $this->input->post('date_publication'),
//                  'file' => $this->input->post('picture')
                );
            }
            $this->Book_model->update_book($book_id, $params);



            $tag_name_name_name = $this->input->post('tag_name');

            $tag_name_name = explode(", ", $tag_name_name_name);
            $tag_name = str_replace(' ', '', $tag_name_name);

            for ($i = 0; $i < count($tag_name); $i++) {


                $sql = "select * from tag where tag_name='" . $tag_name[$i] . "'";
                $query = $this->db->query($sql);
                $result = $query->row();
                if (!$result) {


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




        $tag_name = $this->input->post('query');


        $new_tag_name = str_replace(' ', '', $tag_name);
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
        $sql = "SELECT section_name,book_name,file,COUNT(book_name) AS relevance FROM
  (SELECT section_name,file, book_name FROM book,book_tag,section 
    WHERE book.book_id=book_tag.book_id and book.main_section=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches
  GROUP BY book_name ORDER BY relevance DESC";
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
        $sql = "SELECT section_name,book_name,file,COUNT(book_name) AS relevance FROM
  (SELECT section_name,file, book_name FROM book,book_tag,section 
    WHERE book.book_id=book_tag.book_id and book.main_section=section.section_id AND tag_id  IN('" . implode("','", $arr) . "')) AS matches
  GROUP BY book_name ORDER BY relevance DESC";
        $query = $this->db->query($sql);
        $result = $query->result();

        $data = $result;
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    function search_via_section() {
        $section_id = $this->input->post('section_id');


        $data['book'] = $this->Book_model->search_via_section($section_id);
        $this->layout->view('book/search_via_section', $data);
    }

    function test($book_id) {

        if ($this->input->post('section_sub_name')) {
            $section_sub_name = $this->input->post('section_sub_name');
            $sql2 = "select * from section where section_name='" . $section_sub_name . "'";
            $query = $this->db->query($sql2);
            $result_result = $query->row();
            $d = '';
            $d = $result_result->section_id;
        }



        $section_name = $this->input->post('section_name');




        if ($section_name == 'مجلدات الأحكام') {

            if (isset($_POST) && count($_POST) > 0) {

                $params = array(
                    'section_id' => $d,
                    'book_name' => $this->input->post('book_name'),
                    'author' => $this->input->post('author'),
                    'year_publication' => $this->input->post('year_publication'),
                    'subject' => $this->input->post('subject'),
                    'volume_number' => $this->input->post('volume_number'),
                    'year' => $this->input->post('year'),
                    'book_title' => $this->input->post('book_title'),
                );
            }

            $this->Book_model->update_book($book_id, $params);

            $tag_name_name_name = $this->input->post('tag_name');
              $sql1 = "delete from tag,book_tag using tag,book_tag ,book where "
                       . "tag.tag_id=book_tag.tag_id and "
                       . "tag_name not in ('" . $tag_name_name_name . "') and"
                       . "  book.book_id=book_tag.book_id and book.book_id='" . $book_id . "' ";
               $this->db->query($sql1);
            

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

           echo $tag_name_name_name;
    //       die();
               
             
            }


            redirect('book/index');
        }
    }

}
