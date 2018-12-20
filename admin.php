<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
			
			$this->load->view('admin/index');
	
		
	}
	
	public function user()
	{
		$data=array();
		$query = $this->db->query("SELECT * FROM deals");
		$data['users']=$query;

		
		$this->load->view('admin/user',$data);
	}
	
	public function user_remove($id)
	{
		$this->db->delete('deals', array('id' => $id));
		$this->session->set_flashdata("success", " <b>Sucess</b> Sucessfully reomove.....");
		redirect("admin/user_list");
	}
	
	public function customer()
	{
		$data=array();
		$query = $this->db->query("SELECT * FROM customers");
		$data['customers']=$query;
		$this->load->view('admin/customer',$data);
	}
	public function remove_customer($id)
	{
		$this->db->delete('customers', array('pk_id' => $id));
		$this->session->set_flashdata("success", " <b>Sucess</b> Customer sucessfully reomove.....");
		redirect("admin/customer");
	}
	
	public function store($m_id=0)
	{
		$data=array();
		$query = $this->db->query("SELECT * FROM menu");
		if($m_id){
			$storedetails=$this->db->get_where("menu" ,array( "pk_id" => $m_id))->row_array();
			$data['store_categories']=$storedetails;
		}
		$data['menu']=$query;
		
		
		$this->load->view('admin/store',$data);
	}
	
	public function remove_store($id)
	{
		$this->db->delete('stores', array('pk_id' => $id));
		$this->session->set_flashdata("success", " <b>Sucess</b> Menu Sucessfully reomove.....");
		redirect("admin/store");
	}

	public function remove_confirm_store($id)
	{
		$this->db->delete('menu', array('pk_id' => $id));
		$this->session->set_flashdata("success", " <b>Sucess</b> Menu Sucessfully reomove.....");
		redirect("admin/store_completed");
	}

	
	 public function complete_store($id)
	 {
	 	$data=array();
	 	$query = $this->db->query("UPDATE  stores SET status = '1' where pk_id = '$id'");
	 	$this->session->set_flashdata("success", " <b>Sucess</b> Menu Sucessfully Confirm.....");
	 	redirect("admin/store");
	 }
	
	
	public function store_completed()
	{
		$data=array();
		$query = $this->db->query("SELECT * FROM menu");
		$data['stores']=$query;

		
		$this->load->view('admin/store_completed',$data);
	}
	
	public function recover()
	{

		$email=$this->input->post('email');
		$data=array();
		$query = $this->db->query("SELECT * FROM admin WHERE email='$email'");
		if($query->num_rows()>0)
		{
			$row=$query->row_array();
			$username = $row['username'];
			$password = $row['password'];
		
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

        $message = 'Your login details of storelink:<br/>username='.$username.'<br/>Password='.$password;
 
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from(''); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject('Recover password for your admin account of storelink');
      $this->email->message($message);
      if($this->email->send())
     {
      echo "<script>
								alert('Your username and password sent in your mail');
						
		
							 </script>";
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
	public function logout()
	{
	
		
		$this->session->unset_userdata("admin");
		$this->session->set_flashdata("success", "Logout successfully");
	
		redirect("system_access/login");
		
	}
	
	public function profile()
	{
		
		$this->load->view('admin/profile');
	}
	
	public function update_profile()
	{
		$id=$this->input->post('id');
		$username=$this->input->post('username');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$data = array(
               'name' => $name,
               'username' => $username,
               'email' => $email
            );

		$this->db->where('id', $id);
		$this->db->update('admin', $data); 
		$this->session->set_flashdata("success", "Hurray <b>Success</b>Profile change successfully");
		
		redirect("admin/profile");
		
	}
	public function change_password()
	{
		
		$admin = $this->session->userdata("admin");
		$data['admin']=$admin;
		$this->load->view('admin/change_password',$data);
	}
	public function update_password()
	{
		$id=$this->input->post('id');
		$pwd=$this->input->post('newpwd');
		$data = array(
               'password' => $pwd,
             
            );

		$this->db->where('id', $id);
		$this->db->update('admin', $data); 
		$this->session->set_flashdata("success", "Hurray <b>Success</b>Password change successfully");
		
		redirect('admin/change_password');		
		
	}
	public function cat_add()
	{
		
	$query = $this->db->query("SELECT * FROM store_categories");
		$n=$query->num_rows();
		$data['total_cat']=$n;
		$this->load->view('admin/cat_add',$data);
	}
	public function cat_save() {
        $filename = "";
        if (!empty($_FILES)) {
            $config['upload_path'] = '././uploads/cat/';
            $config['max_size'] = 0;
            $config['overwrite'] = true;
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('userimage')) {
                $upload_data = $this->upload->data();
                $filename = $upload_data['file_name'];
            } else {

				$error = $this->upload->display_errors();
				$this->session->set_flashdata("error",$error);
                $upData = array('upload_data' => $this->upload->data());
            }
        }
        $data['filename'] = $filename;
        $data["c_name"] = $this->input->post("c_name");
        $data["c_description"] = $this->input->post("c_description");
        if ($data['c_name'] != null || $data['c_name'] != "") {
            $this->db->insert("store_categories", $data);
            $this->session->set_flashdata("success", "Category Add Sucessfully");
            redirect('admin/cat_list');
        } else {
            $this->session->set_flashdata("success", "Category Name cannot be blank");
            redirect('admin/cat_add');
        }
    }
	
	public function cat_list()
	{
		$data=array();
		$query = $this->db->query("SELECT * FROM store_categories");
		$data['store_categories']=$query;
		$n=$query->num_rows();
		$data['total_cat']=$n;
		$this->load->view('admin/cat_list',$data);	
	}
	
	public function cat_edit($c_id)
	{
		$data=array();
		$query = $this->db->get_where("store_categories" ,array( "c_id" => $c_id))->row_array();
		$data['store_categories']=$query;
		$this->load->view('admin/cat_add',$data);
			
		
	}
	
	public function cat_update() {

        $c_id = $this->input->post('c_id');
        $c_name = $this->input->post('c_name');
        $c_description = $this->input->post('c_description');
        $filename = "";
        if (!empty($_FILES)) {
            $config['upload_path'] = '././uploads/cat/';
            $config['max_size'] = 0;
            $config['overwrite'] = false;
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('userimage')) {
                $upload_data = $this->upload->data();
                $filename = $upload_data['file_name'];
            } else {

				$error = $this->upload->display_errors();
				$this->session->set_flashdata("error",$error);
                $upData = array('upload_data' => $this->upload->data());
            }
        }
       
        $data = array(
            'c_name' => $c_name,
            'c_description' => $c_description,
            'filename' => $filename
        );
        if ($c_name != null || $c_name != "") {
            $this->db->where('c_id', $c_id);
            $this->db->update('store_categories', $data);
            $this->session->set_flashdata("success", "Category sucessfully update.");
            redirect('admin/cat_list');
        } else {
            $this->session->set_flashdata("error", "Category update error.");
            redirect('admin/cat_edit', $c_id);
        }
    }
	
	public function cat_remove($c_id)
	{
		
		$this->db->delete('store_categories', array('c_id' => $c_id)); 
		$this->session->set_flashdata("success", "Category Remove Sucessfully.");
		redirect('admin/cat_list');	
	}
	
	public function products_create() {
        $filename = "";
        if (!empty($_FILES)) {
            $config['upload_path'] = './uploads/menu/';
            $config['max_size'] = 0;
            $config['overwrite'] = true;
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('userimage')) {
                $upload_data = $this->upload->data();
                $filename = $upload_data['file_name'];
            } else {

                $error = $this->upload->display_errors();
                $upData = array('upload_data' => $this->upload->data());
            }
        }
        $data['img'] = $filename;

        $data["name"] = $this->input->post("name");
        $data["cat_id"] = $this->input->post("cat_id");
        $data["description"] = $this->input->post("description");
        $data["price"] = $this->input->post("price");
        $data["dateadded"] = date('d-m-Y');

        $this->db->insert("menu", $data);
        redirect('admin/store');
    }

    public function products_update() {
        $c_id = $this->input->post('m_id');
        if ($c_id) {
            $filename = "";
            if (!empty($_FILES)) {
                $config['upload_path'] = './uploads/menu/';
                $config['max_size'] = 0;
                $config['overwrite'] = true;
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('userimage')) {
                    $upload_data = $this->upload->data();
                    $filename = $upload_data['file_name'];
                } else {

                    $error = $this->upload->display_errors();
                    $upData = array('upload_data' => $this->upload->data());
                }
            }
            $data['img'] = $filename;
            $data["name"] = $this->input->post("name");
            $data["cat_id"] = $this->input->post("cat_id");
            $data["description"] = $this->input->post("description");
            $data["price"] = $this->input->post("price");
            $data["dateadded"] = date('d-m-Y');
            $update = array(
                'name' => $data['name'],
                'description' => $data['description'],
                'cat_id' => $data["cat_id"],
                'price' => $data["price"],
                'img'=>$data['img']
                
            );
            $this->db->where('pk_id', $c_id);
            $this->db->update("menu", $update);
            redirect('admin/store_completed');
        } else {
            redirect('admin/store');
        }
    }

	
	public function cat_deals()
	{

		$data["c_name"] = $this->input->post("c_name");
		$data["c_description"] = $this->input->post("c_description");;
		$this->db->insert("deals",$data);
		$this->session->set_flashdata("success", "Add Sucessfully");
		redirect('admin/user');		
	}
	
	
	public function user_list()
	{
		$data=array();
		$query = $this->db->query("SELECT * FROM deals");
		$data['store_categories']=$query;
		$n=$query->num_rows();
		$data['total_cat']=$n;
		$this->load->view('admin/user_list',$data);	
	}
	
	public function catshow($cat_id=""){
		if($cat_id){
			$query=$this->db->get_where("menu" ,array( "cat_id" => $cat_id))->row_array();
			$query_cat=$this->db->get_where("store_categories",array("c_name"=>$cat_id))->row_array();
			$data['menu']=$query;
			//$n=$data['menu'];
			// $data['total_menu']=$n;
			$data['cat']=$query_cat;
			$this->load->view('menu_list',$data);

		}
	}
	function ajax_call() {
	
		if( $_REQUEST["name"] )
		{
		  $name = $_REQUEST['name'];
		  echo "Welcome ". $name;
		}
	}
	
}