<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Book_tag extends Front_end{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Book_tag_model');
    } 

    /*
     * Listing of book_tag
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('book_tag/index?');
        $config['total_rows'] = $this->Book_tag_model->get_all_book_tag_count();
        $this->pagination->initialize($config);

        $data['book_tag'] = $this->Book_tag_model->get_all_book_tag($params);
        
        $data['_view'] = 'book_tag/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new book_tag
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'book_id' => $this->input->post('book_id'),
				'tag_id' => $this->input->post('tag_id'),
            );
            
            $book_tag_id = $this->Book_tag_model->add_book_tag($params);
            redirect('book_tag/index');
        }
        else
        {
			$this->load->model('Book_model');
			$data['all_book'] = $this->Book_model->get_all_book();

			$this->load->model('Tag_model');
			$data['all_tag'] = $this->Tag_model->get_all_tag();
            
            $data['_view'] = 'book_tag/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a book_tag
     */
    function edit($book_tag_id)
    {   
        // check if the book_tag exists before trying to edit it
        $data['book_tag'] = $this->Book_tag_model->get_book_tag($book_tag_id);
        
        if(isset($data['book_tag']['book_tag_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'book_id' => $this->input->post('book_id'),
					'tag_id' => $this->input->post('tag_id'),
                );

                $this->Book_tag_model->update_book_tag($book_tag_id,$params);            
                redirect('book_tag/index');
            }
            else
            {
				$this->load->model('Book_model');
				$data['all_book'] = $this->Book_model->get_all_book();

				$this->load->model('Tag_model');
				$data['all_tag'] = $this->Tag_model->get_all_tag();

                $data['_view'] = 'book_tag/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The book_tag you are trying to edit does not exist.');
    } 

    /*
     * Deleting book_tag
     */
    function remove($book_tag_id)
    {
        $book_tag = $this->Book_tag_model->get_book_tag($book_tag_id);

        // check if the book_tag exists before trying to delete it
        if(isset($book_tag['book_tag_id']))
        {
            $this->Book_tag_model->delete_book_tag($book_tag_id);
            redirect('book_tag/index');
        }
        else
            show_error('The book_tag you are trying to delete does not exist.');
    }
    
}
