<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Disease_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $query = $this->db->get('ak_diseases');
        return $query->result();
    }
    
    function add($data)
    {
        $query = $this->db->insert('ak_diseases',$data);
       
        return $query;
    }
    
    function get_by_id($id,$for_table=false)
    {
        $this->db->where(array('id'=>$id));
        
        $query = $this->db->get('ak_diseases',1);
        
        $query=$query->result_array();
        
        return (!$for_table) ? $query[0]: $query;
    }
    
    function get_by_crop_ids($ids)
    {
        $this->db->where('id IN('.$ids.')');
        
        $query = $this->db->get('ak_diseases');
        
        return $query->result();
    }
    
    function update($data,$id)
    {
        $query=$this->db->update('ak_diseases', $data, array('id' => $id));
        
        return $query;
    }
    
    function delete($id)
    {
        $query=$this->db->delete('ak_diseases',array('id' => $id));
        
        return $query;
    }

}

?>