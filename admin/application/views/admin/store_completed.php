<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/menu'); ?>
<div class="col-md-10 col-sm-11 main ">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading" data-original-title>
          <h2><i class="fa fa-user"></i><span class="break"></span>List Menu</h2>
          <div class="panel-actions"> <a href="table.html#" class="btn-setting"><i class="fa fa-wrench"></i></a> <a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> <a href="table.html#" class="btn-close"><i class="fa fa-times"></i></a>  <a class="btn btn-info" href="<?php echo base_url('admin/store') ?>"> Add Menu </a>
        </div>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
              <tr>
                <th>No</th>  
                <th>Categorgy Name</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                
               <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $c=1;    foreach ($stores->result_array() as $row){ ?>
              <tr>
                <td><?php echo $c; ?></td>
            	<td><?php echo $row['cat_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
               
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                
               
               
               
                <td><a class="btn btn-success" href="<?php echo base_url('admin/store/'.$row['pk_id']) ?>"> <i class="fa fa-edit "></i> </a>
                <a class="btn btn-danger" href="<?php echo base_url('admin/remove_confirm_store/'.$row['pk_id']) ?>"> <i class="fa fa-trash-o "></i> </a></td>
              </tr>
              <?php $c++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/col--> 
    
  </div>
  <!--/row--> 
  
</div>

