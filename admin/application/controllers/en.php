<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class en extends CI_Controller {
	function __construct()
    {
        parent::__construct();		
		$this->load->model("users_model");		
    }
	public function index()
	{
		$data = array();
		$q = $this->db->query("SELECT * FROM stores WHERE status = '1' ORDER BY pk_id DESC LIMIT 10");
		$data["stores"] = $q->result();
		if($this->session->userdata("uid") == TRUE){
			$id = $this->session->userdata("uid");		 
			$user = $this->users_model->get_user($id);
			$data["user"] = $user;
		}
		$this->load->view("home",$data);
	}	
	public function search($id = 0)
	{
		$s = $_GET['search'];
		$query = $this->db->get("stores");		
		$count = $query->num_rows();
		$data = array();
		if($this->session->userdata("uid") === TRUE){
			$id = $this->session->userdata("uid");		 
			$user = $this->users_model->get_user($id);
			$data["user"] = $user;
		}
		
		$this->load->library('pagination');		
		$config['base_url'] = base_url("en/showcase");
		$config['total_rows'] = $count;
		$config['per_page'] = 8;
		
		$q = $this->db->query("SELECT * FROM stores WHERE name LIKE '%$s%' ORDER BY name LIMIT $id, 8");
		$data["count"] = $count;
		$data["stores"] = $q->result();
		$this->pagination->initialize($config);			
		$this->load->view("showcase",$data);
	}
	
	public function showcase($id = 0)
	{
		$query = $this->db->get("stores");		
		$count = $query->num_rows();
		$data = array();
		if($this->session->userdata("uid") === TRUE){
			$id = $this->session->userdata("uid");		 
			$user = $this->users_model->get_user($id);
			$data["user"] = $user;
		}
		
		$this->load->library('pagination');		
		$config['base_url'] = base_url("en/showcase");
		$config['total_rows'] = $count;
		$config['per_page'] = 8;
		
		$q = $this->db->query("SELECT * FROM stores ORDER BY name LIMIT $id, 8");
		$data["count"] = $count;
		$data["stores"] = $q->result();
		$this->pagination->initialize($config);			
		$this->load->view("showcase",$data);
	}
	
	public function features()
	{
		$data = array();
		if($this->session->userdata("uid") === TRUE){
			$id = $this->session->userdata("uid");		 
			$user = $this->users_model->get_user($id);
			$data["user"] = $user;
		}
		$this->load->view("features",$data);
	}
	
	public function pricing()
	{
		$data = array();
		if($this->session->userdata("uid") === TRUE){
			$id = $this->session->userdata("uid");		 
			$user = $this->users_model->get_user($id);
			$data["user"] = $user;
		}
		$this->load->view("pricing",$data);
	}
	public function faq()
	{
		$data = array();
		if($this->session->userdata("uid") === TRUE){
			$id = $this->session->userdata("uid");		 
			$user = $this->users_model->get_user($id);
			$data["user"] = $user;
		}
		$this->load->view("faq",$data);
	}
	public function contact()
	{
		$data = array();
		if($this->session->userdata("uid") === TRUE){
			$id = $this->session->userdata("uid");		 
			$user = $this->users_model->get_user($id);
			$data["user"] = $user;
		}
		$this->load->view("contact",$data);
	}
	
	public function register()
	{
		$this->load->view("register");
	}
	
	public function business_register()
	{
		$this->load->view("business");
	}
	
	public function login()
	{
		$this->load->view("login");
	}
	public function about()
	{
		$this->load->view("about");
	}
	public function home()
	{
		$this->load->view("home");
	}
	public function forgetpass()
	{
		$this->load->view("forget_pasword");
	}
	public function forgetpass_update()
	{
		
	}
	public function privacy_policy()
	{
		$this->load->view("privacy_policy");
	}
	public function termofservice()
	{
		$this->load->view("termofservice");
	}
	
	
	public function search_store()
	{
		$s = $_GET['search'];
		$sc = $_GET['store_cat'];
		$query = $this->db->get("stores");		
		$count = $query->num_rows();
		$data = array();
		
		
		
	$q = $this->db->query("SELECT * FROM stores WHERE name LIKE '%$s%' OR  store_cat LIKE '%$sc%'");
		$data["count"] = $count;
		$data["stores"] = $q->result();
	
		$this->load->view("search",$data);
	}
	
}