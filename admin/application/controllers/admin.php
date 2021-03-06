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
	
        function showReservation(){
                $data=array();
		$query = $this->db->query("SELECT * FROM tbl_reservation");
		$data['reservations']=$query;
		$n=$query->num_rows();
		$data['total_cat']=$n;
		$this->load->view('admin/showReservation',$data);
            
        }
        function acceptReservation(){
            $id=$this->input->get('id');
            $update=array(
                'status' =>2,
                'updated'=>date('Y-m-d H:i:s')
            );
            $this->db->where('id', $id);
            $this->db->update("tbl_reservation", $update);
            redirect('admin/showReservation');
        }
        function declineReservation(){
            $id=$this->input->post('id');
            $comment= $this->input->post('comment');
            $update=array(
                'status' =>3,
                'comment'=>$comment,
                 'updated'=>date('Y-m-d H:i:s')
            );
            $this->db->where('id', $id);
            $this->db->update("tbl_reservation", $update);
            redirect('admin/showReservation');
        }
}

function showOrders(){
            $groups= $this->db->query('Select DISTINCT orderGroup from tbl_orders')->result_array();
            foreach ($groups as $g=>$o){
           $query= $this->db->query("SELECT *,DATE(`date`) < DATE(curdate()) AS is_old FROM tbl_orders where orderGroup=".$o['orderGroup']);
           $orders=$query->result_array();
            //$data['orders'][$o['orderGroup']]=$query->result_array();
            $t=[];
            foreach($orders as $d=>$q){
                $data['orders'][$o['orderGroup']]['is_old']=$q['is_old'];
                $data['orders'][$o['orderGroup']]['orderGroup']=$q['orderGroup'];
                $data['orders'][$o['orderGroup']]['date']=$q['date'];
                 if(isset($t[$q['item_id']])){
                $t[$q['item_id']]+=$q['quantity'];
                 }else{
                      $t[$q['item_id']]=$q['quantity'];
                 }
                $customer=$this->db->query("SELECT fname,lname FROM customers where pk_id=".$q['user_id'])->row();
                $menu=$this->db->query("SELECT pk_id,name,price FROM menu where pk_id=".$q['item_id'])->result_array();
                if(isset($customer)){
                $data['orders'][$o['orderGroup']]['customers']=$customer->fname." ".$customer->lname;
                }
                if(isset($menu)){
                    foreach($menu as $m){
                        $data['orders'][$o['orderGroup']]['menu'][$m['pk_id']]=$m;
                        $data['orders'][$o['orderGroup']]['menu'][$m['pk_id']]['total']=$m['price']*$t[$m['pk_id']];
                        $data['orders'][$o['orderGroup']]['menu'][$m['pk_id']]['quantity']=$t[$m['pk_id']];
                    }
                        
                }
                
                
            }
        }
		$this->load->view('admin/orders',$data);
        }
        
        public function offer_add()
                {
		
	$query = $this->db->query("SELECT * FROM tbl_offers");
		$n=$query->num_rows();
		$data['total']=$n;
		$this->load->view('admin/offer_add',$data);
	}
	public function offer_save() {
        $filename = "";
        if (!empty($_FILES)) {
            $config['upload_path'] = '././uploads/offer/';
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
        $data['type']=$this->input->post('type');
        $data["name"] = $this->input->post("name");
        $data["content"] = $this->input->post("content");
        if ($data['name'] != null || $data['name'] != "") {
            $this->db->insert("tbl_offers", $data);
            $this->session->set_flashdata("success", "Offer Add Sucessfully");
            redirect('admin/offer_list');
        } else {
            $this->session->set_flashdata("success", "Offer Name cannot be blank");
            redirect('admin/offer_add');
        }
    }
	
	public function offer_list()
	{
		$data=array();
		$query = $this->db->query("SELECT * FROM tbl_offers");
		$data['offers']=$query;
		$n=$query->num_rows();
		$data['total']=$n;
		$this->load->view('admin/offer_list',$data);	
	}
	
	public function offer_edit($c_id)
	{
		$data=array();
		$query = $this->db->get_where("tbl_offers" ,array( "id" => $c_id))->row_array();
		$data['offer']=$query;
               
		
		$n=$this->db->query("SELECT * FROM tbl_offers")->num_rows();
		$data['total']=$n;
		$this->load->view('admin/offer_add',$data);
			
		
	}
	
	public function offer_update() {

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $type=$this->input->post('type');
        $content = $this->input->post('content');
        $filename = "";
        if (!empty($_FILES)) {
            $config['upload_path'] = '././uploads/offer/';
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
            'name' => $name,
            'content' => $content,
            'type'=>$type,
            'filename' => $filename
        );
        if ($name != null || $name != "") {
            $this->db->where('id', $id);
            $this->db->update('tbl_offers', $data);
            $this->session->set_flashdata("success", "Offer sucessfully update.");
            redirect('admin/offer_list');
        } else {
            $this->session->set_flashdata("error", "Offer update error.");
            redirect('admin/offer_edit', $id);
        }
    }
	
	public function offer_remove($c_id)
	{
		
		$this->db->delete('tbl_offers', array('id' => $c_id)); 
		$this->session->set_flashdata("success", "Offer Remove Sucessfully.");
		redirect('admin/offer_list');	
	}
	
}
