<?php
class users_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	public function get_user($id)
	{
		$sql = "SELECT * FROM customers WHERE pk_id = ". $id;
		$r = $this->db->query($sql);
		return $r->row();
	}
	
	public function get_user_stores($id)
	{
		$sql = "SELECT * FROM stores WHERE cust_id = ". $id;
		$r = $this->db->query($sql);
		return $r->result();
	}
	
	
	public function get_store_details($id)
	{
		$sql = "SELECT * FROM stores WHERE pk_id = ". $id;
		$r = $this->db->query($sql);
		return $r->row();
	}
	
	public function get_store_cats($id)
	{
		$row = $this->db->query("SELECT * FROM categories WHERE store_id = ".$id);		
		return $row->result();
		//$this->load->view("shopview/view",$data);
	}
		
	public function get_store_products($id)
	{
		$row = $this->db->query("SELECT * FROM products WHERE store_id = ".$id);		
		return $row->result();
		//$this->load->view("shopview/view",$data);
	}
	
		
	public function get_cinfo($id)
	{
		$row = $this->db->query("SELECT * FROM store_contact_info WHERE s_id = ".$id);		
		return $row->result();
		//$this->load->view("shopview/view",$data);
	}
	
}

?>