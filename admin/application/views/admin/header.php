<?php
		
        if($this->session->userdata("admin") === FALSE)
        {
		$this->session->set_flashdata("success", "dont try to access");
		redirect('system_access/login');
		}
		else
		{
			$admin=$this->session->userdata("admin");
        	
		}
?>


<!DOCTYPE html>
<html lang="en">
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="shortcut icon" href="<?php echo base_url() ?>script/device1/ico/favicon.png">
		<title>Guru Nanak Restaurant</title>
		<link href="<?php echo base_url() ?>script/device1/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>script/device1/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>script/device1/css/jquery-ui.min.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>script/device1/css/fullcalendar.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>script/device1/css/morris.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>script/device1/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>script/device1/css/climacons-font.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>script/device1/css/style.min.css" rel="stylesheet">
		
    
    
    			<script src="<?php echo base_url() ?>script/device1/js/jquery-2.1.0.min.js"></script>
	<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url() ?>script/device1/js/jquery-2.1.0.min.js'>"+"<"+"/script>");
		</script>
	<script src="<?php echo base_url() ?>script/device1/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/bootstrap.min.js"></script>	
	<script src="<?php echo base_url() ?>script/device1/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/custom.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/core.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/pages/table.js"></script>
    <script src="<?php echo base_url() ?>script/device1/js/jquery.cleditor.min.js"></script>

   
	<script src="<?php echo base_url() ?>script/device1/js/jquery.chosen.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/jquery.cleditor.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/jquery.autosize.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/jquery.placeholder.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/jquery.inputlimiter.1.3.1.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/bootstrap-timepicker.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/moment.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/daterangepicker.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/jquery.hotkeys.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/bootstrap-wysiwyg.min.js"></script>
	<script src="<?php echo base_url() ?>script/device1/js/bootstrap-colorpicker.min.js"></script>
	

	<script src="<?php echo base_url() ?>script/device1/js/pages/form-elements.js"></script>
    	</head>
		</head>

		<body>
<!-- Header -->
<div class="navbar" role="navigation">
          <div class="container-fluid">
    <div class="navbar-header">
        
              <a class="navbar-brand" href="#"> Guru Nanak Restaurant</a> </div>
          
        
        
    <ul class="nav navbar-nav navbar-actions navbar-left">
            
              <li>  <?php if($this->session->flashdata('success') == true){ ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="green"  style="padding-left:20px">
              <button type="button" class="close" data-dismiss="alert" style="margin-top:18px;">&times;</button>
              <?php echo $this->session->flashdata('success'); ?> </div>
          </div>
        </div>
        <?php } ?>
              </li>
       
            </ul>
    <ul class="nav navbar-nav navbar-right">
              	
              <li>Welcome : <?php echo ucwords($admin['username']) ?></li>
              <li class="dropdown"> <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                 <ul class="dropdown-menu">
                 
                    <li><a href="<?php echo base_url('admin/logout') ?>"><i class="fa fa-lock"></i> Logout</a></li>
                </ul> 
              </li>
             
     </ul>
  		</div>
</div>
  		
<!--Header End-->
<div class="container-fluid content">
<div class="row">