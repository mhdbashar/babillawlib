<?php

class Search_section extends Front_end {

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

    function inline_search() {
        
         
        
        $section_id = $this->input->post('section_id');
       
        $query = $this->input->post('query');
        $data = $this->Book_model->fetch_data($query, $section_id);
       
        $i=1;
      if(isset($query)&&!empty($query)){
          
      
        if($section_id==31){
            
            
       
        foreach ($data as $row) {

          echo "<div style='border-bottom:1px solid #3c8dbc'>";
		  echo "<h5 style='color:red'>العنوان </h5><br>";
          echo $row->book_title . "<br>";
		
          echo "<h5 style='color:red'>ملخص الحكم</h5><br>";
          echo  $row->summary_of_judgment . "<br>";
          echo "<h5 style='color:red'>الاسباب</h5><br>";
          echo $row->the_reasons . "<br>";
          echo "</div>";
           
       
         
        }
         }
         elseif ($section_id==33) {
            foreach ($data as $row) {

            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row->book_title . "</td>";
//            echo "<td><a href='#'>" . $row->url . "</a></td>";
            echo "<td>" . $row->dis . "</td>";
   echo "<td>" . $row->url . "</td>";
            echo "</tr>";
            $i++;
         
        }
     }
	 
	      elseif ($section_id==35) {
            foreach ($data as $row) {

            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row->book_title . "</td>";
//            echo "<td><a href='#'>" . $row->url . "</a></td>";
            echo "<td>" . $row->dis . "</td>";
   echo "<td>" . $row->url . "</td>";
            echo "</tr>";
            $i++;
         
        }
     }
     
	 
	 
     
            elseif ($section_id==34) {
            foreach ($data as $row) {

            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row->book_title . "</td>";
//            echo "<td><a href='#'>" . $row->url . "</a></td>";
            echo "<td>" . $row->dis . "</td>";
   echo "<td>" . $row->url . "</td>";
            echo "</tr>";
            $i++;
         
        }
     }
           elseif ($section_id==32) {
            foreach ($data as $row) {

            echo "<tr>";
            echo "<td>" . $i . "</td>";
            
  echo "<td><a target='_blank' href='".$row->url ."'>" . $row->url . "</a></td>";
//            echo "<td>" . $row->dis . "</td>";
   echo "<td>" . $row->pass . "</td>";
      echo "<td>" . $row->dis . "</td>";
        echo "<td>" . $row->history_system_m . "</td>";
          echo "<td>" . $row->date_publication_m . "</td>";
         echo "<td>" . $row->accreditation . "</td>";
         
            echo "</tr>";
            $i++;
         
        }
     }
     }
    }
    
    
    
    
    
    
    
    
    

}
