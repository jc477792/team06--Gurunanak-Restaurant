<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System_access extends CI_Controller {
	
	public function index()
	{
		redirect('');
	}
	public function login()
	{
		$this->load->view("admin/login");
	}
	public function authenticate()
	{
		        $username = $this->input->post("username");
				$password = $this->input->post("password");
			
				$user = $this->db->get_where("admin" ,array( "username" => $username , "password" => $password))->row_array();
				if( count($user) > 0 )
				{
					
						$this->session->set_userdata("admin", $user);
						
						redirect('admin/index');
				}
				else{
						$this->session->unset_userdata("admin");
						$this->session->set_flashdata("success", "Sorry <b>Login Failed!</b> Invalid UserName or Password.");
						redirect("system_access/login");
				}
	}
}