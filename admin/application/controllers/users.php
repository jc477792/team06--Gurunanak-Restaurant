
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		
		$this->load->model("users_model");		
    }
	
	public function create()
	{
		
		$un = $this->input->post("username");
		$sql = "SELECT * FROM customers WHERE username = '".$un."'";
		$r = $this->db->query($sql);
		
		if($r->num_rows() > 0 )
		{
			//die( "Username Exist, Please Select Another One.");
			
			$this->session->set_flashdata('error','Username Exist, Please Select Another One.');	
			redirect('en/register');
			//redirect("/en/register");
		
		}
		else
		{	
			
			foreach($_POST as $k=>$v)
			{
				if($k != "rtpass")
				{
					$data[$k] = $v;
				}
				
			}
			
			$data["pass"]= $this->input->post('pass');		
			$data["reg_time"] = date('d-m-Y');
			$this->db->insert("customers",$data);
		
					$this->session->set_flashdata('success','Register Sucessfully, login to add store');	
			redirect('en/register');
		}
	}
	
	public function business_create()
	{
		
		$un = $this->input->post("username");
		$sql = "SELECT * FROM customers WHERE username = '".$un."'";
		$r = $this->db->query($sql);
		
		if($r->num_rows() > 0 )
		{
			die( "Username Exist, Please Select Another One.");
		}
		
		//customer
		$data["fname"] = $this->input->post("fname");
		$data["lname"] = $this->input->post("lname");
		$data["username"] = $this->input->post("username");
		$data["pass"] = $this->input->post("pass");
		$data["add"] = $this->input->post("add");
		$data["email"] = $this->input->post("email");
		$data["contact"] = $this->input->post("contact");
		$data["reg_time"] =date('d-m-Y');
		$this->db->insert("customers",$data);
		$id=$this->db->insert_id();
		
		//business
		$data1["cust_id"] = $id;
		$data1["name"] = $this->input->post("name");
		$data1["address"] = $this->input->post("address");
		$data1["phone_no"] = $this->input->post("pnone_no");
		$data1["mobile_no"] = $this->input->post("mobile_no");
		$data1["email"] = $this->input->post("email");
		$this->db->insert("business_info",$data1);
		$id=$this->db->insert_id();
	}
	
	 function auth()
	{
		$username = $this->input->post("user");
		$password = $this->input->post("pass");
	
		$this->db->select('pk_id,username,pass');
		$this->db->from('customers');
		$this->db->where('username',$username);
		$this->db->where('pass',$password);
		$this->db->limit(1);
		$query=$this->db->get();
		
		//echo "<h2>You have logged in Successfully....</h2>";
		if($query->num_rows()==1)
		{
			$r   = $query->row();
			$uid = $r->pk_id;
			$this->session->set_userdata('uid',$uid);
			//echo $this->session->userdata("uid");
			redirect("/users/home");
		}
		else
		{
			$this->session->set_flashdata('ww','Username or password is wrong Please Try Again!!!!.');	
			redirect('en/login');
		}
	}
	
	 function mailauth()
	{
		$email = $this->input->post("email");
		$this->db->select('pk_id,username,pass');
		$this->db->from('customers');
		$this->db->where('email',$email);
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows()==1)
		{
			$r   = $query->row();
			$uid = $r->pk_id;
			$un  = $r->username;
			$pw  = $r->pass;	
		
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
		  echo "<script>alert('Your username and password sent in your mail'); </script>";
		  $this->load->view("login");
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
		 $this->load->view("forget_pasword");
		}

}

	public function home()
	{
		 $id = $this->session->userdata("uid");		 
		 $user = $this->users_model->get_user($id);
		 $data["user"] = $user;
		 $data["stores"] = $this->users_model->get_user_stores($id);
		 $this->load->view("users/home", $data);
	}	
	
	public function stores()
	{
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		$this->load->view("users/stores",$data);
	}
	
	
	/*public function stores_test()
	{
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		$this->load->view("users/stores_test",$data);
	}*/
	
	
	
	public function mystores()
	{
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		$data["stores"] = $this->users_model->get_user_stores($id);
		
		$this->load->view("users/store",$data);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("");
	}
	
	
	public function view($id = 0)
	{
		if($id == 0)
		{
			redirect("/users/home");
		}
		$data["store"] = $this->users_model->get_store_details($id);
		$data["sid"] = $id;
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;		
		$this->load->view("users/view",$data);
	}
	
	public function store_create()
	{
		$url = $this->input->post("url");
		$sql = "SELECT * FROM stores WHERE url = '".$url."'";
		$r = $this->db->query($sql);
		if($r->num_rows() > 0 )
		{
			$this->session->set_flashdata('error',$url.' Store alerady exits please try again');
			redirect('users/stores');	
		}
		else
		{
			$img_name = "";
			$config['upload_path'] = './logos/';
			$config['allowed_types']='gif|jpg|png|jpeg';		
			$this->load->library('upload', $config);		
			if($this->upload->do_upload())
			{
				$img=$this->upload->data();
				$img_name=$img["file_name"];
			}else {
				die("opps!");
			}
			$data2["store_cat"] = $this->input->post("store_cat");
			$data2["name"] = $this->input->post("name");
			$data2["address"] = $this->input->post("address");
			$data2["city"] = $this->input->post("city");
			$data2["url"] = strtolower(url_title($this->input->post("url")));
			$data2["logo"] = $img_name;
			$data2["theme_name"] = $this->input->post("theme_name");
			$data2["cust_id"] = $this->session->userdata("uid");	
			$data2["dateadded"]= date('d-m-Y');
			$this->db->insert("stores",$data2);		
			$sid = $this->db->insert_id();
			$data3["store_id"] = $sid;
			$data3["name"] = "about";
			$data3["contents"] = "About Page";
			$data3["c_date"] = date('d-m-Y');
			$this->db->insert("pages",$data3);		
			$data4["store_id"] = $sid;
			$data4["name"] = "contact";
			$data4["contents"] = "Contact Page";
			$data4["c_date"] =date('d-m-Y');
			$this->db->insert("pages",$data4);		
			redirect("users/home");
		}
	}
	
	public function store_create_test()
	{
		$url = $this->input->post("url");
		$sql = "SELECT * FROM stores WHERE url = '".$url."'";
		$r = $this->db->query($sql);
		
		if($r->num_rows() > 0 )
		{
			$this->session->set_flashdata('error',$url.' Store alerady exits please try again');
			redirect('users/stores');	
		}
		else
		{
			$img_name = "";
			$config['upload_path'] = './logos/';
			$config['allowed_types']='gif|jpg|png|jpeg';		
			$this->load->library('upload', $config);		
			if($this->upload->do_upload())
			{
				$img=$this->upload->data();
				$img_name=$img["file_name"];
				
			}else {
				die("opps!");
			}
			$data2["name"] = $this->input->post("name");
			$data2["address"] = $this->input->post("address");
			$data2["city"] = $this->input->post("city");
			$data2["url"] = strtolower(url_title($this->input->post("url")));
			$data2["logo"] = $img_name;
			$data2["theme_name"] = $this->input->post("theme_name");
			$data2["cust_id"] = $this->session->userdata("uid");	
			$data2["dateadded"] =date('d-m-Y');
			$this->db->insert("stores_test",$data2);		
					
			echo 'subdomain generate for store';		
		
		//	redirect("users/home");
	
	
		}
	}
	

	public function profile()
	{
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		$this->load->view("users/profile",$data);
	}
	public function changepass()
	{
		$id = $this->session->userdata("uid");		 
		$user = $this->users_model->get_user($id);
		$data["user"] = $user;
		$this->load->view("users/changepassword",$data);
	}
	
	public function update()
	{
		$id = $this->session->userdata("uid");	
		$data["fname"] = $this->input->post("fname");
		$data["lname"] = $this->input->post("lname");
		$data["username"] = $this->input->post("username");
		$data["add"] = $this->input->post("add");
		$data["email"] = $this->input->post("email");
		$data["contact"] = $this->input->post("contact");
		$this->db->where("pk_id",$id);
		$this->db->update("customers",$data);
		redirect("users/profile");
	}
	
	public function updatepass()
	{
		$id = $this->session->userdata("uid");	
		$data["pass"] =$this->input->post("newpwd");
		$this->db->where("pk_id",$id);
		$this->db->update("customers",$data);
		redirect("users/home");
	}

	
	public function report()
	{
		 $id = $this->session->userdata("uid");		 
		 $user = $this->users_model->get_user($id);
		 $data["user"] = $user;
		 $data["stores"] = $this->users_model->get_user_stores($id);
		 $this->load->view("users/report", $data);
	}	
}
?>