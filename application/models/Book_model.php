<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Book_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get book by book_id
     */
    function get_book($book_id)
    {
        return $this->db->get_where('book',array('book_id'=>$book_id))->row_array();
    }
        
    /*
     * Get all book
     */
    function get_all_book()
    {
        $this->db->order_by('book_id', 'desc');
        return $this->db->get('book')->result_array();
    }
        
    /*
     * function to add new book
     */
    function add_book($params)
    {
        $this->db->insert('book',$params);
        return $this->db->insert_id();
    }
    
    
    /*
     * function to update book
     */
    function update_book($book_id,$params)
    {
        $this->db->where('book_id',$book_id);
        return $this->db->update('book',$params);
    }
    
    /*
     * function to delete book
     */
    function delete_book($book_id)
    {
     
        
      //  return $this->db->delete('book',array('book_id'=>$book_id));
        
        
         // $sql = "delete from book ,book_tag  using book,  book_tag where (book.book_id=book_tag.book_id)  and (book.book_id='".$book_id."' )";
         
        
  

$sql2="delete from tag using tag where tag_id in (select tag_id from book_tag where book_id='".$book_id."') and tag_id NOT IN "
        . "(SELECT tag_id FROM book_tag WHERE book_id != '".$book_id."')";
  $this->db->query($sql2);
         $sql1="delete from book,book_tag using book,book_tag where  book.book_id=book_tag.book_id and book.book_id='".$book_id."' ";
        $this->db->query($sql1);

        
        
        
    }
       function search_via_section($section_id){
        
        
        $sql="select * from book where section_id='".$section_id."'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function get_tag_book($book_id) {
        $sql="select * from tag,book_tag,book where book.book_id=book_tag.book_id and book_tag.tag_id=tag.tag_id and book.book_id='".$book_id."' ";
          $query = $this->db->query($sql);
        return $query->row();
    }
 
}
