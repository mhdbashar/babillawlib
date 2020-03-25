<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Section_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get section by section_id
     */
    function get_section($section_id)
    {
        return $this->db->get_where('section',array('section_id'=>$section_id))->row_array();
    }
        
    /*
     * Get all section
     */
    function get_all_section()
    {
        $this->db->order_by('section_id', 'desc');
        return $this->db->get('section')->result();
    }
        
    /*
     * function to add new section
     */
    function add_section($params)
    {
        $this->db->insert('section',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update section
     */
    function update_section($section_id,$params)
    {
        $this->db->where('section_id',$section_id);
        return $this->db->update('section',$params);
    }
    
    /*
     * function to delete section
     */
    function delete_section($section_id)
    {
        return $this->db->delete('section',array('section_id'=>$section_id));
    }
      function get_main_section()
    {
        
       $sql="select * from section where parent_id=0";
      	$query = $this->db->query($sql);
        return $query->result();
    }
      function get_sub_section()
    {
        
       $sql="select * from section where parent_id != 0";
      	$query = $this->db->query($sql);
        return $query->result();
    }
}
