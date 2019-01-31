<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/menu'); ?>

<div class="col-md-10 col-sm-11 main ">
  <div class="row inbox">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body inbox-menu"> <a href="" class="btn btn-success btn-block">Category Panel</a>
          <ul>
            <li> <a href="<?php echo base_url('admin/offer_add') ?>"><i class="fa fa-plus	"></i> Add New </a> </li>
            <li> <a href="<?php echo base_url('admin/offer_list') ?>"><i class="fa fa-list"></i> Listing <span class="label label-info"><?php echo @$total; ?></span></a> </li>
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
            <?php if(@$offer != true) { ?> Add New Offer. <?php } else { ?> Update Offer <?php echo @$offer['name'];} ?>
            
            </h2>
          <div class="panel-actions"> <a href="" class="btn-setting"><i class="fa fa-wrench"></i></a> <a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> <a href="" class="btn-close"><i class="fa fa-times"></i></a> </div>
        </div>
        <div class="panel-body">
        
        
            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="<?php if(@$offer!=true) { echo base_url('admin/offer_save'); } else { echo base_url('admin/offer_update'); } ?>">
            <div class="form-group">
            
            <input type="hidden" class="form-control" id="c_id" name="id" value="<?php echo @$offer['id']; ?>" >
            
              <label for="name" class="col-sm-2 control-label">Name:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="c_name" name="name" placeholder="Category Name" value="<?php echo @$offer['name']; ?>" required="required">
              </div>
            </div>
                 <div class="form-group">
              <label for="type" class="col-sm-2 control-label">Type:</label>
              <div class="col-sm-8">
                  <select name="type" class="form-control"> 
                      <?php if(@$offer!=true){?>
                      <option selected disabled="disabled">Choose offer type</option>
                      <?php } ?>
                      <option <?php if(@$offer['type']==1){ ?>selected="selected" <?php } ?>  value="1">Slider</option>
                      <option <?php if(@$offer['type']==2){ ?>selected="selected" <?php } ?> value="2">Favorites</option>
                      <option <?php if(@$offer['type']==2){ ?>selected="selected" <?php } ?> value="3">Beset Dishes </option>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Description:</label>
              <div class="col-sm-8">
                <textarea class="form-control" id="c_description" name="content" rows="2" placeholder="few description about category..."><?php echo @$offer['content']; ?></textarea>
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
              <?php if(@$offers != true) { ?> Save <?php } else { ?> Update <?php } ?>
              
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

