<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $title ?></title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

                <!--CKeditor-->
                	<script type="text/javascript" src="<?php echo base_url().'assets/ckeditor/ckeditor.js' ?>"></script>  

                 <!-- Profile user dasboard -->
                  
                  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/jquery.gritter.css" />
                  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/select2.css" />
                  <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/bootstrap-editable.css" />

		<!--font awesome and bootstrap-->
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.css" />
                
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/chosen.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/datepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/daterangepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/bootstrap-datetimepicker.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/colorpicker.css" />
                
                
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/ace-fonts.css" />
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
                <script src="<?php echo base_url(); ?>assets1/js/ace-extra.js"></script>
                
                
                <!--
		<link href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets2/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/font-awesome.min.css" />
		-->

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		
                
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<!--
        <style type="text/css">
	.tombol{
		margin-left: 1%;
	}
	.logo{
		padding-bottom: 13%;
	}

	.panel-notif{
		background-color: #FFA400;
		color: white;
		font-size: 13pt;

	}
	.form-laporan{
	width: 300px;
	}
.poto img{
	max-width: 15%;
	max-height: 15%;
}
	
	</style>
 -->
 
 <body class="no-skin">
     
		<!-- navbar -->
                <?php $this->load->view('kontributor/navbar'); ?>
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				

				<!-- nav list -->
				<?php $this->load->view('kontributor/nav_list'); ?>

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
                    
                    <div class="main-content">
                        
				<div class="breadcrumbs" id="breadcrumbs">
                                    <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="#">Home</a>

							
						</li>
						<li class="active">Data</li>
					</ul><!--.breadcrumb-->
                                        
				</div>
                            
                            
