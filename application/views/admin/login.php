<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $judulform; ?></title>
    </head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css')  ?>">
    <body>
          <br />
                            <br />
                <div class="col-md-4 col-md-offset-4 kotak-login">
                    <div class="panel panel-success">
			<div class="panel-heading">
                          <h4><?php echo $judul ?></h4>
			</div>
                    <div class="panel-body">
                         <!--jalankan validasi pesan
                        -->
                        <?php if($this->session->flashdata('pesan1'))  {?>
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismis="alert">x</button>
                            <h4>Peringatan!</h4>
                            <?php echo $this->session->flashdata('pesan1');?>
                        </div>
                        <?php } else if($this->session->flashdata('pesan2')) { ?>
                        <div class="alert alert-danger" role="alert">
                             <button type="button" class="close" data-dismis="alert">x</button>
                            <h4>kesalahan!</h4>
                            <?php echo $this->session->flashdata('pesan2');?>
                        </div>
                        <?php };?>
                        <?php echo validation_errors() ?>
                    <?php echo form_open('admin/auth/proseslogin');  ?>
                    <div class="well">
                       
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            <span id="pesan"></span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" type="submit">
                                <span class="glyphicon glyphicon-log-in"></span>Login</button>
                            <button class="btn btn-default" type="reset">Batal</button>
                        </div>
                    </div>
            </div>
        </div>
                </div>
    </body>
</html>
    