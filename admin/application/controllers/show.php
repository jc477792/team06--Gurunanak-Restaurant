<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {
	
	function Show()  
    {  
       	parent::__construct(); // We define the the Controller class is the parent. 
		$this->load->model("stores_model");
    }  
	
	public function history()
	{
		 $eid=$this->session->userdata("eid");
		 $sid=$this->session->userdata("sid");
		 //$this->db->where("by",$eid);
		 //$this->db->where("sid",$sid);
		 //$data['row'] 
		  $sql="SELECT * FROM `order` WHERE sid =".$sid." order by oid desc";
		  $query = $this->db->query($sql);
		  foreach ($query->result_array() as $row)
	{
	   	 $pid=$row['pid'];
		  $sql1="SELECT * FROM `products` WHERE pk_id =".$pid;
		  $row1 = $this->db->query($sql1);
		  $row1 = $row1	->row();

		 echo '<div style=""><br/>';
		 echo 'ORDER ID : '. $row['oid'] .'<br/>';
		 echo '______________________________________________<br/>';
		 echo 'Product Id : '. $row['pid'] .'<br/>';
		 echo 'Product Name : '. $row['pname'] .'<br/>';
		 echo 'Product Quantity : '. $row['qty'] .'<br/>';
		 echo 'Product Price : '. $row['price'] .'<br/>';
		 echo 'Product SubTotal : '. $row['subtotal'] .'<br/>';
		 echo 'Product Order Time : '. $row['ctime'] .'<br/>';
		 echo '<img src="../images/'. $row1-> img .'" width="259" height="195" />';
		 //$this->load->image("../../images/".$row1-> img);
		 echo '<br/>______________________________________________';
		
	}
	//$this->load->view("history.php");
	}
	public function store_by_url_name($url = null, $action = null, $id = 0, $name = null)
	{
		
		$data["detail"] = $this->stores_model->get_store_details_by_url($url);
		if(count($data["detail"]) == 0)
		{
			//redirect(base_url());
		}
	
		$data["store_id"] = $data["detail"]["pk_id"];
		$data["store_url"] = $url;
		$data["name"] = $data["detail"]["name"];
		$data["cats"] = $this->stores_model->get_store_cats($data["detail"]["pk_id"]);
		$data["user"] = array();
		if($this->session->userdata("user_id") > 0)
			{
				$data["user"] = $this->stores_model->get_store_user($this->session->userdata("user_id"));
			}
		if($action == "category")
		{
			$data["cat"] = $name;
			$data["products"] = $this->stores_model->get_store_products_by_category($id);
			$this->load->view("store_templates/category",$data);
			
		}
		
		else if($action == "product")
		{
			$data["detail"] = $this->stores_model->get_store_details_by_url($url);
			
			$data["store_id"] = $data["detail"]["pk_id"];
		
			$data["user"] = array();
		
			if($this->session->userdata("user_id") > 0)
			{
				$data["user"] = $this->stores_model->get_store_user($this->session->userdata("user_id"));
			}
			else
			{
				$data["user"]=array();
			}
			
			$data["product"] = $this->stores_model->get_store_product($id,TRUE);
			
			$data["reviews"] = $this->stores_model->get_product_review($id);
			$data["reviews_total"]=count($data["reviews"]);
			$this->load->view("store_templates/product", $data);
			
		}
		else if($action == "page")
		{
			$data["page_name"] 		=  		ucwords($id);
			$data["page"]	   		=  		$this->stores_model->get_store_page($data["store_id"],$id);
			
			$this->load->view("store_templates/pages",$data);
		}
		else if($action == "rr")
		{
			$data["page_name"] 		=  		ucwords($id);
			
			$data["page"]	   		=  		$this->stores_model->get_store_page($data["store_id"],$id);
			
			$this->load->view("store_templates/cons",$data);
	
		}
		
		
		else if($action == "cart")
		{
			$this->load->helper("form");
			$this->load->view("store_templates/cart",$data);
		}
		
		
		else if($action == "buy")
		{
			$this->load->helper("form");
			$this->load->view("store_templates/buy",$data);
		}
		else if($action == "save")
		{
			//var_dump($data);
			$store_id = $data["store_id"];
		
			$store_url = $data["store_url"];
		
		    //redirect($_SERVER['HTTP_REFERER']);  
		   	//redirect(base_url("shop/".$data["store_url"]."buy"));
			//redirect(base_url("shop/".$store->url."/cart"));
			redirect(base_url("shop/".$store_url."/buy"));
		}
		
		else if($action == "logout")
		{
			$this->session->unset_userdata("user_id");
			redirect(base_url("shop/".$data["store_url"]));
		}
		else if($action == "checkout")
		{
			if($this->session->userdata("user_id") == FALSE)
			{
				redirect(base_url("shop/".$data["store_url"]."/login/checkout"));
			}
			$this->load->helper("form");
			$this->load->view("store_templates/checkout",$data);
		}
		
		else if($action == "register")
		{
			if($this->session->userdata("user_id") > 0)
			{
				redirect(base_url("shop/".$data["store_url"]));
			}
			$this->load->helper("form");
			$this->load->view("store_templates/register",$data);
		}
		
		else if($action == "support")
		{
			if($this->session->userdata("user_id") > 0)
			{
				redirect(base_url("shop/".$data["store_url"]));
			}
			$this->load->helper("form");
			$this->load->view("store_templates/support",$data);
		}
		
		else if($action == "forgetpass"){
			
		$this->load->view("store_templates/forget_password",$data);
	}
		else if($action == "getpass")
		{
			$store_url = $data["store_url"];
		
		
		$email = $this->input->post("email");
	
		$this->db->select('id,email,password');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->limit(1);
		
		$query=$this->db->get();
		
		if($query->num_rows()==1)
		{
			
			$r   = $query->row();
			$uid = $r->id;
			$un  = $r->email;
			$pw  = $r->password;	
		
	   $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => '', // change it to yours
  'smtp_pass' => '', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

      $message = 'Your password of storelink: '.$pw;
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from(''); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject('Recover password for your account of storelink');
      $this->email->message($message);
      if($this->email->send())
     {
		 echo "<script>alert('Your username and password sent in your mail');</script>";
		 $this->load->view("store_templates/login",$data);
	 }
     else
    {
		echo "Server error please try again";
     show_error($this->email->print_debugger());
    }
	}
		else
		{
				
		 $this->session->set_flashdata('error',' invalid emailid please enter correct id.');
		 $this->load->view("store_templates/forget_password",$data);
		}
}
		else if($action == "login")
		{
			if($this->session->userdata("user_id") > 0)
			{
				if($id == "checkout")
				{
					redirect(base_url("shop/".$data["store_url"]."/checkout"));
				}
				
				redirect(base_url("shop/".$data["store_url"]));
			}
			if($id == "checkout"){
				$data["please"] = "true";
			}
			$this->load->view("store_templates/login",$data);
		}
		else
		{
			$var = explode("?",$action);
			
			if($var[0] == "search")
			{
				$srch = $_GET["sPattern"];
				$data["cat"] = $srch;
				$data["products"] = $this->stores_model->get_store_products_by_search($srch, $data["store_id"]);
				$this->load->view("store_templates/search",$data);
				
			}else{
				$data["products"] = $this->stores_model->get_store_products($data["store_id"]);
				$this->load->view("store_templates/home",$data);
			}
		}
	}
			
	public function review_add(){
		$store_url=$this->input->post('store_url');
		$store_id=$this->input->post('store_id');
		$product_id=$this->input->post('product_id');
		$review_title=$this->input->post('review_title');
		$review_message=$this->input->post('review_message');
		$star1=$this->input->post('star1');
		$name=$this->input->post('name');
		$data=array();
		
		$data=array(
			'store_id'=>$store_id,
			'product_id'=>$product_id,
			'review_title'=>$review_title,
			'review_message'=>$review_message,
			'rating'=>$star1,
			'name'=>$name
		);
		$this->db->insert('reviews',$data);
			$this->session->set_flashdata('success','<b>success</b>,your review stored.');	
			redirect("shop/".$store_url.'/product/'.$product_id);
		}
}