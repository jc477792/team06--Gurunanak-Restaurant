<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/menu'); ?>

<div class="col-md-10 col-sm-11 main ">
  <div class="row inbox">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body inbox-menu"> <a href="" class="btn btn-success btn-block">Menu Panel</a>
          <ul>
            <li> <a href="<?php echo base_url('admin/store') ?>"><i class="fa fa-plus	"></i> Add New </a> </li>
            <li> <a href="<?php echo base_url('admin/store_completed') ?>"><i class="fa fa-list"></i> Listing </a> </li>
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
                    <?php if(@$store_categories != true) { ?>
                    Add New Menu.
                    <?php } else { ?>
                    Update Menu <?php echo @$store_categories['name'];} ?> </h2>
                  <div class="panel-actions"> <a href="" class="btn-setting"><i class="fa fa-wrench"></i></a> <a href="" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> <a href="" class="btn-close"><i class="fa fa-times"></i></a> </div>
                </div>
                <div class="panel-body">
                    <form name="proadd" enctype="multipart/form-data" action="<?php if(@$store_categories!=true) { echo base_url('admin/products_create'); } else { echo base_url('admin/products_update'); } ?>" method="post"  >
                  <?php if(@$store_categories){?>
                   <input type=hidden id="m_id" name="m_id" value="<?php echo @$store_categories['pk_id']?>" />
     <?php }?>
                     
                                                   <div style="padding:20px;box-shadow:0px 0px 10px #999999">
                      <table  width="100%">
                        <tr>
                       
                          <td>Category</td>
                          <td><select name="cat_id" class="form-control">
                              <option <?php if(@$store_categories!=true) {?> selected="selected" <?php } ?> >SELECT CATEGORY</option>
                              <?php   $query = $this->db->query("SELECT * FROM store_categories;"); ?>
                              <?php  foreach ($query->result() as $row){ ?>
                              <option value="<?php echo $row->c_name; ?>" <?php if(@$store_categories) {if(@$store_categories['cat_id']==$row->c_name){?> selected="selected" <?php }} ?> ><?php echo $row->c_name; ?> </option>
                              <?php } ?>
                            </select></td>
                        </tr>
                        <tr>
                          <td colspan="2"><br /></td>
                        </tr>
                        <tr>
                          <td> Title</td>
                          <td><input id="pnm" <?php if(@$store_categories) {?> value="<?php echo @$store_categories['name'] ?>" <?php } ?>  required="required" type="text" name="name" placeholder="Name" class="form-control"/></td>
                        </tr>
                        <tr>
                          <td colspan="2"><br /></td>
                        </tr>
                        <tr>
                          <td> Description</td>
                          <td><input required="required" <?php if(@$store_categories) {?> value="<?php echo @$store_categories['description'] ?>" <?php } ?> type="text" name="description" placeholder="Description" class="form-control"/></td>
                        </tr>
                        <tr>
                          <td colspan="2"><br /></td>
                        </tr>
                        <tr>
                          <td> Price</td>
                          <td><input required="required"  <?php if(@$store_categories) {?> value="<?php echo @$store_categories['price'] ?>" <?php } ?> type="number" name="price"  placeholder="Price" min="0" class="form-control"/></td>
                        </tr>
                         <tr>
                          <td colspan="2"><br /></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td> <input type="file" name="userimage" class="form-control"></td>
                        </tr>
                        
                        <tr>
                          <td colspan="2"><br /></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td ><input type="submit" class="btn btn-info" name="submit" value=" <?php if(@$store_categories){?>Update <?php }else{?> Add <?php } ?>" /></td>
                        </tr>
                      </table>
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
