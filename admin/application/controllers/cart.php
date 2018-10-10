<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
	
	function cart()  
    {  
       	parent::__construct(); // We define the the Controller class is the parent. 
		$this->load->model("cart_model");
		$this->load->model("users_model");
    } 
    
	function add_cart_item()
	{
		
		if($this->cart_model->validate_add_cart_item() == TRUE){  
  			
			$id = $this->input->post("store_id");
			$store = $this->users_model->get_store_details($id);
			redirect(base_url("shop/".$store->url."/cart"));						
			
		}
    }  
	
	function update_cart(){  
		$this->cart_model->validate_update_cart();  
		redirect($_SERVER['HTTP_REFERER']);  
	}
	
	function empty_cart(){  
		$this->cart->destroy(); // Destroy all cart data  
		redirect($_SERVER['HTTP_REFERER']);  
	} 
	
}
