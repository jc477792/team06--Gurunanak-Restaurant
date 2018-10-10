<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">



<title>Guru Nanak Restaurant</title>

<link href="<?php echo base_url() ?>script/device1/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>script/device1/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>script/device1/css/jquery-ui.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>script/device1/css/style.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>script/device1/css/jquery-ui.min.css" rel="stylesheet">
	
<script src="<?php echo base_url() ?>script/device1/js/jquery-2.1.0.min.js"></script> 
<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url() ?>script/device1/js/jquery-2.1.0.min.js'>"+"<"+"/script>");
		</script> 
<script src="<?php echo base_url() ?>script/device1/js/jquery-migrate-1.2.1.min.js"></script> 
<script src="<?php echo base_url() ?>script/device1/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url() ?>script/device1/js/jquery.icheck.min.js"></script> 
<script src="<?php echo base_url() ?>script/device1/js/custom.min.js"></script> 
<script src="<?php echo base_url() ?>script/device1/js/core.min.js"></script> 
<script src="<?php echo base_url() ?>script/device1/js/pages/login.js"></script>
    	
</head>
</head>

<body>
<div class="container-fluid content">
  <div class="row">
    <div id="content" class="col-sm-12 full">
      <div class="row">
        <div class="login-box" style="box-shadow:0 0 20px #999999">
        
        <?php if($this->session->flashdata('success') == true){ ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->flashdata('success'); ?> </div>
          </div>
        </div>
        <?php } ?>
      
      <script language="javascript" type="text/javascript">
      	$(document).ready(function(e) {
            $('#fp').click(function(){
					$('#login-form').hide();
					$('#forger-password-form').show();
				})
        });
      	
		$(document).ready(function(e) {
            $('#back').click(function(){
					$('#login-form').show();
					$('#forger-password-form').hide();
				})
        });
      </script>
      
          <div class="text-with-hr"> <span>Guru Nanak Restaurant Admin Panel</span> </div>
          <form class="form-horizontal login"  id="login-form"action="<?php echo base_url('system_access/authenticate'); ?>" method="post">
            <fieldset class="col-sm-12">
              <div class="form-group">
                <div class="controls row">
                  <div class="input-group col-sm-12">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                     <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="controls row">
                  <div class="input-group col-sm-12">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>  <input type="password" name="password" class="form-control" id="password" placeholder="Password"/>
                   </div>
                </div>
              </div>
            
              <div class="row">
                <button type="submit" class="btn btn-primary">Login</button>
                
<a class="pull-right" href="#" id="fp">Forget Password??</a>
              </div>
            </fieldset>
          </form>
          
          <form class="form-horizontal login" style="display:none" name="recover-password"  id="forger-password-form" action="<?php echo base_url('admin/recover'); ?>" method="post">
            <fieldset class="col-sm-12">
              <div class="form-group">
                <div class="controls row">
                  <div class="input-group col-sm-12">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                     <input type="email" class="form-control" name="email" id="email" placeholder="email" required />
                    </div>
                </div>
              </div>
             
              <div class="row">
                <button type="submit" class="btn btn-primary">Recover</button>
                
<a class="pull-right" href="#" id="back">Back</a>
              </div>
            </fieldset>
          </form>
          <div class="clearfix"></div>
        </div>
      </div>
      <!--/row--> 
      
    </div>
  </div>
  <!--/row--> 
  
</div>
<!--/container--> 


</body>
</html>