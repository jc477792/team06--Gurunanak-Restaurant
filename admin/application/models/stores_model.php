<?php
class stores_model extends CI_Model {

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
	
	public function get_store_user($id)
	{
		$sql = "SELECT * FROM users WHERE id = ". $id;
		$r = $this->db->query($sql);
		return $r->row();
	}
	
	public function get_store_details($id)
	{
		$sql = "SELECT * FROM stores WHERE pk_id = ". $id;
		$r = $this->db->query($sql);
		return $r->row();
	}
	
	public function get_store_details_by_url($name)
	{
		$sql = "SELECT * FROM stores WHERE url  = '". $name ."'";
		$r = $this->db->query($sql);
		return $r->row_array();
	}
	
	public function get_store_cats($id)
	{
		$row = $this->db->query("SELECT * FROM categories WHERE store_id = ".$id);		
		return $row->result_array();
		//$this->load->view("shopview/view",$data);
	}
	
	public function get_store_page($id, $page)
	{
		$row = $this->db->query("SELECT * FROM pages WHERE store_id = ".$id." AND name = '{$page}'");		
		return $row->row();
		//$this->load->view("shopview/view",$data);
	}
	public function get_store_con($id, $page)
	{
		$row = $this->db->query("SELECT * FROM contact WHERE store_id = ".$id."");		
		return $row->row();
		//$this->load->view("shopview/view",$data);
	}
	
	public function get_store_products($id)
	{
		$row = $this->db->query("SELECT * FROM products WHERE store_id = ".$id." ORDER BY views DESC");		
		return $row->result();
		//$this->load->view("shopview/view",$data);
	}
	public function get_store_products_by_search($term,$id)
	{
		$row = $this->db->query("SELECT * FROM products WHERE (name LIKE '%".$term."%' OR description LIKE '%".$term."%') AND store_id = $id ORDER BY pk_id DESC");		
		return $row->result();
		//$this->load->view("shopview/view",$data);
	}
	
	public function get_store_product($id, $in = FALSE)
	{
		if($in)
		{
			 $this->increase_view($id);
		}
		$row = $this->db->query("SELECT * FROM products WHERE pk_id = ".$id);		
		return $row->row();
		//$this->load->view("shopview/view",$data);
	}
	public function get_store_products_by_category($id)
	{
		$row = $this->db->query("SELECT * FROM products WHERE cat_id = ".$id);		
		return $row->result();
		//$this->load->view("shopview/view",$data);
	}
	public function increase_view($id)
	{
		$sql = "SELECT * FROM products WHERE pk_id = ".$id;
		$results = $this->db->query($sql);
		$row = $results->row();
		$h = (int)$row->views;
		$h = $h + 1;
		$sql = "UPDATE products SET views = $h WHERE pk_id = $id";
		$this->db->query($sql);		
	}
	public function get_product_review($id)
	{
	
		$row = $this->db->query("SELECT * FROM  `reviews` WHERE product_id =".$id);		
		return $row->result();
	
		//$this->load->view("shopview/view",$data);
	}
	
}

?>