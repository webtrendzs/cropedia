<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Crop_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $query = $this->db->get('ak_crops');
        
        return $query->result();
    }
    
    function add($data)
    {
        $query = $this->db->insert('ak_crops',$data);
       
        return $query;
    }
    
    function get_by_id($id,$for_table=false)
    {
        $this->db->where(array('id'=>$id));
        
        $query = $this->db->get('ak_crops',1);
        
        $query=$query->result_array();
        
        return (!$for_table) ? $query[0]: $query;
    }
    
    function update($data,$id)
    {
        $query=$this->db->update('ak_crops', $data, array('id' => $id));
        
        return $query;
    }
    
    function delete($id)
    {
        $query=$this->db->delete('ak_crops',array('id' => $id));
        
        return $query;
    }

}

?>