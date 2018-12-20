<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/menu'); ?>

<div class="col-md-10 col-sm-11 main ">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2><i class="fa fa-asterisk"></i><span class="break"></span>Quick Links</h2>
        </div>
        <div class="panel-body">
          <div class="col-sm-3"> <a href="<?php echo base_url('admin/customer'); ?>" class="quick-button"> <i class="fa fa-group"></i>
            <p>Manage Users</p>
            </a> </div>
          <div class="col-sm-3"> <a href="<?php echo base_url('admin/cat_list'); ?>" class="quick-button"> <i class="fa fa-comments-o"></i>
            <p>Categories</p>
            </a> </div>
          <div class="col-sm-3"> <a href="<?php echo base_url('admin/store'); ?>" class="quick-button"> <i class="fa fa-list"></i>
            <p>Manage Menu</p>
            </a> </div>
          <div class="col-sm-3"> <a href="" class="quick-button"> <i class="fa fa-group"></i>
            <p>Manage Latest Deals</p>
            </a> </div>
          
          
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!--/col--> 
    
  </div>
</div>

