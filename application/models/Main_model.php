<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
 
    function getDetails(){ 
          // Select record
        $this->db->select('*'); 
        $this->db->limit('10'); 
        $this->db->order_by('id','DESC'); 
          $records = $this->db->get('cordinates');
          $response = $records->result_array();
      
        return $response;
    }
    function getCordinates($id=NULL){ 
          // Select record
          $this->db->select('cordinates');
     if($id != NULL){ 
          $this->db->where('id', $id);
		 } 
        $this->db->limit('1'); 
        $this->db->order_by('id','DESC'); 
          $records = $this->db->get('cordinates');
          $response = $records->result_array();
      
        return $response;
    }
    function saveDetails($postData){ 
          // Select record 
	$this->db->insert('cordinates',$postData);
	return $this->db->insert_id();
    }
	
	

}