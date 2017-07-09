<?php
/**
* 
*/
class insert_model extends CI_Model
{
	
	public function process($data){
		$this->load->database();
		$this->db->insert('Admintable',$data);
	}
}
?>