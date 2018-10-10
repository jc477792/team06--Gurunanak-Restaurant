<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {
	
	function Store()  
    {  
       	parent::__construct(); 
        $this->load->model("users_model");
		$this->load->model("stores_model");
    }  
	public function delete_cat($id)
	{
		$sql = "DELETE FROM categories WHERE pk_id = ".$id;
		$this->db->query($sql);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete_product($id)
	{
		$sql = "DELETE FROM products WHERE pk_id = ".$id;
		$this->db->query($sql);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function cats($id)
	{	
		if($id == 0)
		{
			redirect("/users/home");
		}
		$data["sid"] = $id;
		
		$data["store"] = $this->users_model->get_store_details($id);
		$data["cats"] = $this->users_model->get_store_cats($id);
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		
		$this->load->view("store/cats",$data);
	}
	
	public function order($store_id = "", $order_id = "") 
	{
		$this->load->model('order_model');
    	if($store_id != "" && $order_id == "")
		{
			$data["orders"] = $this->order_model->get_orders($store_id);    	
			$this->load->view('store/order', $data);
			//var_dump($orders);
		}
		else if($order_id != "" && $order_id != "")
		{
			$order = $this->order_model->get_order_details( $order_id, $store_id);    	
			//var_dump($order);
		}
		else
		{
			show404();
		}
	
	}
	
  /* public function order()
   { 
      $this->load->model("users_model"); 
	  $data["order"]=$this->users_model->get_orders(); 
	  $this->load->view("order",$data);
   }*/
	
	//public function order($sid)
	//{	
		//echo $sid;
		
		//$query =$this->db->get_where('order', array('sid' => $sid));
		//$result = $query->result_array();
		
		//var_dump($result);
		//$query = $this->db->get_where('order', array('sid' => $sid));
		//var_dump($query);
		//return $result;
		//$this->load->view("/store/order",$result);
//	}
public function order_done()
	{	
			$data["store_id"] = $this->input->post("store_id");
			$store_id = $data["store_id"];
			$query = $this->db->get_where('stores', array('pk_id' => $store_id));
		 	$row = $query->row(); 
		
		 	$store_url=$row->url;
			 
				$data=$this->cart->contents();
	
			foreach($data as $k)
			{
				$product = array();
				$product["sid"]= $store_id;
				$product["pid"] = $k['id'];
				$product["pname"] = $k['name'];
				$product["qty"] = $k['qty'];
				$product["price"] = $k['price'];
				$product["subtotal"] = $k['subtotal'];
				$product["by"] =$this->session->userdata("eid");
				$product["name"]= $this->input->post("name");
				$product["address"] = $this->input->post("address");
				$product["state"] = $this->input->post("state");
				$product["city"] = $this->input->post("city");
				$product["pincode"] = $this->input->post("pincode");
				$product["mobile"] = $this->input->post("mobile");
				$this->db->insert("order",$product);	
			}
			$this->cart->destroy(); // Destroy all cart data 
			$this->session->set_flashdata('success','Your Order sucessfully store');	
			redirect(base_url("shop/".$store_url."/cart"));
	}
	
	public function cats_create()
	{	
		$data["store_id"] = $this->input->post("store_id");
		$data["catname"] = $this->input->post("cat_name");
		$data["description"] = $this->input->post("cat_des");
		$this->db->insert("categories",$data);
		redirect("store/cats/".$this->input->post("store_id"));
	}
	public function products($id)
	{
		if($id == 0)
		{
			redirect("/users/home");
		}
		$data["sid"] = $id;
		$data["rows"] = $this->users_model->get_store_products($id);
		$data["store"] = $this->users_model->get_store_details($id);
		$data["cats"] = $this->users_model->get_store_cats($id);
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		
		$this->load->view("store/products",$data);
	}
	public function products_add($id)
	{
		$data["sid"] = $id;
		$data["cats"] = $this->users_model->get_store_cats($id);
		$data["store"] = $this->users_model->get_store_details($id);
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		$this->load->view("store/product_add",$data);
	}
	public function report($id)
	{
		$data["sid"] = $id;
		$data["rows"] = $this->users_model->get_store_products($id);
		$data["store"] = $this->users_model->get_store_details($id);
		$data["cats"] = $this->users_model->get_store_cats($id);
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		$this->load->view("store/report",$data);
	}
	
	public function report_create($id)
	{
		 $pid = $this->input->post("product");
	     $start = date('Y-m-d 00:00:00');
    	 $end = date('Y-m-d 23:59:59');
		 $this->db->where("sid",$id);
		 $this->db->where("pid",$pid);		 
		 $this->db->where("ctime BETWEEN '$start' AND '$end'");					 
		 $query['report']= $this->db->get("order");
		 //$query['report'] = $this->db->get_where('order', array('pid' => $pid , 'sid' => '$id'));
		 $this->load->view("store/view-report",$query);
	}
	
	public function report_create_month($id)
	{
		$month=$this->input->post("month");
		$year=$this->input->post("year");
		$day=$this->input->post("day");
		$pid = $this->input->post("product");		
	    $start = date('Y-m-d 00:00:00');
   		$end = date('Y-m-d 23:59:59');
		$end = date($year.'-'.$month.'-'.$day.' 23:59:59');
		$this->db->where("sid",$id);
		$this->db->where("pid",$pid);		 
		$this->db->where("ctime BETWEEN '$start' AND '$end'");					 
		$query['report']= $this->db->get("order");
			
		 //$query['report'] = $this->db->get_where('order', array('pid' => $pid , 'sid' => '$id'));
		
		 $this->load->view("store/view-report",$query);	
	}
	
	
	public function report_create_months($id)
	{		
		$pid = $this->input->post("product");
		$month = $this->input->post("month");
		$year = $this->input->post("year");
		$this->db->where('month(ctime)', $month);
		$this->db->where('year(ctime)', $year);
		$this->db->where("sid",$id);
		$this->db->where("pid",$pid); 
		$query['report']= $this->db->get("order");
		$this->load->view("store/view-report",$query);	
	}
	
	public function report_create_year($id)
	{

		$pid = $this->input->post("product");
		//echo $month = $this->input->post("month");
		$year = $this->input->post("year");
		//$this->db->where('month(ctime)', $month);
		$this->db->where('year(ctime)', $year);
		$this->db->where("sid",$id);
		$this->db->where("pid",$pid);
		$query['report']= $this->db->get("order");	
		$this->load->view("store/view-report",$query);	
	}
	public function products_create($id)
	{
		$img_name = "";
		$config['upload_path'] = './images/';
		$config['allowed_types']='gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$img=$this->upload->data();
			$img_name=$img["file_name"];
		}else {
			die("opps!");
		}
		
		$data["store_id"] = $this->input->post("store_id");
		$data["cat_id"] = $this->input->post("cat_id");
		$data["name"] = $this->input->post("name");
		$data["description"] = $this->input->post("description");
		$data["price"] = $this->input->post("price");
		$data["dateadded"] =date('d-m-Y');
		$data["img"] = $img_name;
		$this->db->insert("products",$data);
		redirect("store/products/".$this->input->post("store_id"));
	}
	
	public function get_user($sid)
	{
		$sql = "SELECT * FROM customers WHERE pk_id = ". $id;
		$r = $this->db->query($sql);
		return $r->row();
	}
	public function cashdel()
	{
	$this->load->view();
	}
	public function settings($id)
	{
		if($id <= 0)
		{
			redirect("/users/home");
		}
		$data["sid"] = $id;
		$data["store"] = $this->users_model->get_store_details($id);		
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		
		$this->load->view("store/settings",$data);
	}
	public function update($id)
	{
		$data2["name"] = $this->input->post("name");
		$data2["address"] = $this->input->post("address");
		$data2["url"] = $this->input->post("url");
		$data2["theme_name"] = $this->input->post("theme_name");
		$this->db->where("pk_id",$id);
		$this->db->update("stores", $data2);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function pages($id)
	{
		if($id <= 0)
		{
			redirect("/users/home");
		}
		$data["sid"] = $id;
		$data["page"] = $this->stores_model->get_store_page($id,"about");
		$data["store"] = $this->users_model->get_store_details($id);		
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		$this->load->view("store/about",$data);
		
	}
	
	
	public function contactus($id)
	{

		if($id <= 0)
		{
			redirect("/users/home");
		}
		$data["sid"] = $id;
		$data["page"] = $this->stores_model->get_store_page($id,"contact");
		$data["store"] = $this->users_model->get_store_details($id);		
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		
		$this->load->view("store/contact",$data);
	}
	
	
	
	
	public function update_page($id,$page_id)
	{
	
		//echo $page_id;
		$data["contents"] = $this->input->post("description");
		$this->db->where("pk_id",$page_id);
		$this->db->update("pages",$data);
		
		redirect($_SERVER['HTTP_REFERER']."?msg=true");
	}
	
	public function register_user()
	{ 
		 $data["name"] = $this->input->post("name");
		 $data["email"] = $this->input->post("email");
		 $data["password"] =$this->input->post("password");
		 $data["mobile"] = $this->input->post("mobile");
		 $data["store_id"] = $this->input->post("store_id");
		 $data["c_date"] = date('d-m-Y');
		 $this->db->insert("users",$data);
		 redirect($_SERVER['HTTP_REFERER']."?msg=true");
	}
	
	public function subscribe()
	{ 
		 
$this->db->where("email",$this->input->post("email"));
//$this->db->where("c_date",date('d-m-Y'));
$row = $this->db->get("subscription");	 
		 
		 if($row->num_rows() > 0)
		 {	 
		 	// $row = $row->row();
 		redirect($_SERVER['HTTP_REFERER']."?subscribe=false");

		 }
		 else{
			 
		$data["email"] = $this->input->post("email"); 
		 $data["c_date"] = date('d-m-Y');
		 $this->db->insert("subscription",$data);
	 redirect($_SERVER['HTTP_REFERER']."?subscribe=true");	 
			 
			 }

	}
	
	public function register_contact()
	{ 
		 $data["name"] = $this->input->post("name");
		 $data["email"] = $this->input->post("email");
		 $data["contact"] = $this->input->post("contact");
		 $data["message"] = $this->input->post("message");
		 $this->db->insert("store_contact",$data);
		 redirect($_SERVER['HTTP_REFERER']."?msg=true");
	}
	
	public function guest_comment()
	{ 
		 $data["name"] = $this->input->post("name");
		 $data["email"] = $this->input->post("email");
		 $data["mobile_no"] = $this->input->post("mobile");
		 $data["message"] = $this->input->post("message");
		 $data["s_id"] = $this->input->post("store_id");
		 $this->db->insert("store_contact_info",$data);
		 redirect($_SERVER['HTTP_REFERER']."?msg=true");
	}
	
	public function login_user()
	{ 
		 
		 $this->db->where("email",$this->input->post("email"));
		 $this->db->where("password",$this->input->post("password"));
		 $this->db->where("store_id",$this->input->post("store_id"));
		 
		 $row = $this->db->get("users");
		 
		 
		 if($row->num_rows() > 0)
		 {	 
		 	 $row = $row->row();
			
			 $this->session->set_userdata("user_id",$row->id);
			 $this->session->set_userdata("eid",$row->email);
			 $this->session->set_userdata("sid",$row->store_id);

	
			 redirect($_SERVER['HTTP_REFERER']);
		 }
		 else
		 {
			 redirect($_SERVER['HTTP_REFERER']."?msg=false");
		 }
	}
	
	
	public function bill($id)
	{
		//$this->session->userdata("uid");
		
		$query['order'] = $this->db->get_where('order', array('oid' => $id));
		
		
		$this->load->view("store/bill",$query);
		
		
	}
	
	
}