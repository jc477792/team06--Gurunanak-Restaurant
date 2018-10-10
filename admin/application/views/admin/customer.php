<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/menu'); ?>
<div class="col-md-10 col-sm-11 main ">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading" data-original-title>
          <h2><i class="fa fa-user"></i><span class="break"></span>Manage Users</h2>
          <div class="panel-actions"> <a href="table.html#" class="btn-setting"><i class="fa fa-wrench"></i></a> <a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> <a href="table.html#" class="btn-close"><i class="fa fa-times"></i></a> </div>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
              <tr>
       		    <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Pincode</th>
                <th>Address</th>
                
                <th>Password</th>
                <th>Email</th>
                <th>Registered</th>
                <th>Action</th>
                
                
                
              </tr>
            </thead>
            <tbody>
              <?php $c=1;    foreach ($customers->result_array() as $row){ ?>
              <tr>
                <td><?php echo $c; ?></td>
                <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['pincode']; ?></td>
                <td><?php echo $row['address']; ?></td>
                 
                      <td><?php echo $row['pass']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['reg_time']; ?></td>
                <td><a href="<?php echo base_url('admin/remove_customer/'.$row['pk_id']) ?>"> <i class="fa fa-trash-o "></i> </a></td>
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

