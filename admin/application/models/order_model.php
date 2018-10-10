<?php
class order_model extends CI_Model {

	public function __construct()	
  	{
  		$this->load->database(); 
  	}
	public function get_orders($id)
  	{
 		if($id != FALSE) 
		{
    		$query = $this->db->get_where('order', array('sid' => $id));
    		return $query->result();
 	 	}
  		else
		{
    		return FALSE;
  		}	
	}
	public function get_order_details($order_id, $store_id)
  	{
 		
    		$query = $this->db->get_where('order', array('oid' => $order_id, 'sid' => $store_id));
    		return $query->row_array();
 	 	
	}
}
?>