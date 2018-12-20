<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/menu'); ?>

<div class="col-md-10 col-sm-11 main ">
  <div class="row inbox">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body inbox-menu"> <a href="" class="btn btn-success btn-block">Category Panel</a>
          <ul>
            <li> <a href="<?php echo base_url('admin/cat_add') ?>"><i class="fa fa-plus	"></i> Add New </a> </li>
            <li> <a href="<?php echo base_url('admin/cat_list') ?>"><i class="fa fa-list"></i> Listing <span class="label label-info"><?php echo @$total_cat; ?></span></a> </li>
          </ul>
        </div>
      </div>
    </div>
    <!--/.col-->
    
    <div class="col-md-9">
					
					<div class="panel panel-default">
						
						<div class="panel-body message">
							
							
 							<div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading" data-original-title>
          <h2><i class="fa fa-list"></i><span class="break"></span>
            <?php if(@$store_categories != true) { ?> Add New Category. <?php } else { ?> Update Category <?php echo @$store_categories['name'];} ?>
            
            </h2>
          <div class="panel-actions"> <a href="" class="btn-setting"><i class="fa fa-wrench"></i></a> <a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> <a href="" class="btn-close"><i class="fa fa-times"></i></a> </div>
        </div>
        <div class="panel-body">
        
        
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="<?php if(@$store_categories!=true) { echo base_url('admin/cat_save'); } else { echo base_url('admin/cat_update'); } ?>">
            <div class="form-group">
            
            <input type="hidden" class="form-control" id="c_id" name="c_id" value="<?php echo @$store_categories['c_id']; ?>" >
            
              <label for="name" class="col-sm-2 control-label">Name:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Category Name" value="<?php echo @$store_categories['c_name']; ?>" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Description:</label>
              <div class="col-sm-8">
                <textarea class="form-control" id="c_description" name="c_description" rows="2" placeholder="few description about category..."><?php echo @$store_categories['c_description']; ?></textarea>
              </div>
            </div>
              <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Image:</label>
              <div class="col-sm-8">
               <input type="file" name="userimage">
              </div>
            </div>
            </div>
            <div class="form-group col-sm-10">
              <button type="submit" class="btn btn-success pull-right">
              <?php if(@$store_categories != true) { ?> Save <?php } else { ?> Update <?php } ?>
              
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/col--> 
    
  </div>
 
  
</div>
						
						</div>	
						
					</div>
    
    
    
  </div>
  <!--/.col--> 
  
</div>
<!--/row-->

</div>

