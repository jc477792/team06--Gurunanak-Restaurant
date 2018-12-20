<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/menu'); ?>

        

<div class="col-md-10 col-sm-11 main ">
			
			
			<div class="row inbox">
				
				<div class="col-md-3">
					
					<div class="panel panel-default">
						
						<div class="panel-body inbox-menu">
														
							<a href="" class="btn btn-success btn-block">Category Panel</a>

							<ul>
								<li>
									<a href="<?php echo base_url('admin/cat_add') ?>"><i class="fa fa-plus	"></i> Add New</a>
								</li>
                                <li>
									<a href="<?php echo base_url('admin/cat_list') ?>"><i class="fa fa-list"></i> Listing <span class="label label-info"><?php echo @$total_cat; ?></span></a>
								</li>
								
							</ul>
							
						</div>	
						
					</div>
					
								
					
				</div><!--/.col-->
				
				<div class="col-md-9">
					
					<div class="panel panel-default">
						
						<div class="panel-body message">
							
							
 							<div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading" data-original-title>
          <h2><i class="fa fa-list"></i><span class="break"></span>Category Listing.</h2>
          <div class="panel-actions"> <a href="" class="btn-setting"><i class="fa fa-wrench"></i></a> <a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> <a href="" class="btn-close"><i class="fa fa-times"></i></a> </div>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  $i=1;  foreach ($store_categories->result_array() as $row){ ?>
              <tr>
              <td><?php echo $i; ?></td>
                <td><?php echo $row['c_name']; ?></td>
              
                
                 <td><?php echo $row['c_description']; ?></td>
               
                
                
                <td><a class="btn btn-success" href="<?php echo base_url('admin/cat_edit/'.$row['c_id']) ?>"> <i class="fa fa-edit "></i> </a> &nbsp;<a class="btn btn-danger" href="<?php echo base_url('admin/cat_remove/'.$row['c_id']) ?>"> <i class="fa fa-trash-o "></i> </a></td>
              </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/col--> 
    
  </div>
 
  
</div>
							
</div>	
						
</div>	
					
</div><!--/.col-->	
						
</div><!--/row-->
			
      
					
</div>
     <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>Here settings can be configured...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>


