<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Pemandu</title>
        <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url() . 'assets1/css/bootstrap.css' ?>">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets1/css/font-awesome.css' ?>">

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url() . 'assets1/css/ace-fonts.css' ?>">

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url() . 'assets1/css/ace.css' ?>" >

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="../assets/css/ace-part2.css" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url() . 'assets1/css/ace-rtl.css' ?>">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                </div>
            </div>

            <body class="login-layout">
                <div class="main-container">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="login-container">
                                    <div class="center">
                                        <h1>
                                            <i class="ace-icon fa fa-leaf green"></i>
                                            <span class="red">Wisata Sumatra Utara</span>
                                            <span class="white" id="id-text2">Wismut 2016</span>
                                        </h1>
                                        <h4 class="blue" id="id-company-text">&copy; wismut</h4>
                                    </div>

                                    <div class="space-6"></div>

                                    <div class="position-relative">
                                        <div id="login-box" class="login-box visible widget-box no-border">
                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <h4 class="header blue lighter bigger">
                                                        <i class="ace-icon fa fa-coffee green"></i>
                                                        Please Enter Your Information
                                                    </h4>
                                                    <div class="panel-body">
                                                        <?php echo form_open("pemandu/register"); ?>
                                                        <div class="form-group">
                                                            <label for="name">Nama Lengkap</label>
                                                            <input class="form-control" name="nama" placeholder="Nama Lenkap" type="text" value="<?php echo set_value('nama'); ?>" />
                                                            <span class="text-danger"><?php echo form_error('nama'); ?></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email">Email </label>
                                                            <input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo set_value('email'); ?>" />
                                                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name">Daerah</label>
                                                            <select class="form-control" name="daerah" >
                                                                <option value="<?php echo set_value('daerah'); ?>">-Pilih Daerah-</option>
                                                                <?php foreach ($daerah as $d) { ?> 
                                                                    <option value="<?php echo $d->id_daerah ?>"><?php echo $d->kota ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <span class="text-danger"><?php echo form_error('daerah'); ?></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name">Username</label>
                                                            <input class="form-control" name="username" placeholder="Username" type="text" value="<?php echo set_value('username'); ?>" />
                                                            <span class="text-danger"><?php echo form_error('username'); ?></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="subject">Password</label>
                                                            <input class="form-control" name="password" placeholder="Password" type="password" />
                                                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                                                        </div>


                                                        <div class="form-group">

                                                            <div class="clearfix">
                                                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                                    <i class="ace-icon fa fa-refresh"></i>
                                                                    <span class="bigger-110">Reset</span>
                                                                </button>

                                                                <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                                                                    <span class="bigger-110">Register</span>

                                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                                </button>
                                                            </div>

                                                        </div>
                                                        <?php echo form_close(); ?>
                                                        <?php echo $this->session->flashdata('msg'); ?>
                                                    </div>
                                                </div>
                                                <div class="toolbar center">
                                                    <a href="<?php echo base_url(); ?>pemandu/auth" data-target="#login-box" class="back-to-login-link">
                                                        <i class="ace-icon fa fa-arrow-left"></i>
                                                        Back to login
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </body>
                                    </html>