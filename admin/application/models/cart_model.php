<?php
class cart_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	
	function validate_add_cart_item(){  
    	
		$id = $this->input->post('product_id'); 
    	$cty = $this->input->post('quantity'); 
		$this->db->where('pk_id', $id);   
    	$query = $this->db->get('products', 1); 
		
		if($query->num_rows > 0){  
 			foreach ($query->result() as $row)  
        	{  
            
				$data = array(  
						'id'      => $id,  
						'qty'     => $cty,  
						'price'   => $row->price,  
						'name'    => $row->name ,
						'options' => array('store_id' => $row->store_id)
				);  
            	$this->cart->insert($data);   
            return TRUE; 
        	}			  
		}else{  
			
			return FALSE;  
		}  
	
	}  
	function validate_update_cart(){  
  
    // Get the total number of items in cart  
    $total = $this->cart->total_items();  
  
    // Retrieve the posted information  
    $item = $this->input->post('rowid');  
    $qty = $this->input->post('qty');  
  
   		 // Cycle true all items and update them  
		for($i=0;$i < $total;$i++)  
		{  
			// Create an array with the products rowid's and quantities.  
			$data = array(  
				  'rowid' => $item[$i], 
				  'qty'   => $qty[$i]  
			   );  
	  
			   // Update the cart with the new information  
			$this->cart->update($data);  
		}  
  
	}  
	
	
	
}

?>