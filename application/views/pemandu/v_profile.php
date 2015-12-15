<div class="panel-body">
    <?php 
	echo validation_errors();
	echo form_open_multipart('pemandu/dashboard/update_profile');  
	foreach($profile as $p){ 
	?>
<div class="page-header">
    <h1>
    Profile Pemandu
    <i class="ace-icon fa fa-angle-double-right"></i>
    <b><?php echo $p->nama ?></b>
    </h1>
    
    <br />
    <?php
	$link = $this->uri->segment('4'); 
	if($link == "error"){
		echo "<div class='alert alert-warning'>Update Profile Error !</div>";
	}else if($link == "diupdate"){
		echo "<div class='alert alert-success'>Profile berhasil di update !</div>";
	}
	?>
    <br/>
   
    <div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<!-- #section:elements.form -->
        
	<div class="form-group">
	<label class="col-sm-2" for="form-field-1"> Nama </label>
            <div class="col-sm-10">
                <input type="hidden" name="id" value="<?php echo $p->id_pemandu?>">
                <input type="text" id="form-field-1" name="nama" value="<?php echo $this->session->userdata('nama') ?>" class="col-xs-8 col-sm-5 " />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> Email </label>
            <div class="col-sm-10">
                <input type="text" id="form-field-1-1" name="email" value="<?php echo $this->session->userdata('email') ?>" class="col-xs-8 col-sm-5" />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> Username </label>
            <div class="col-sm-10">
                <input type="text"  name="username" id="form-field-1-1" value="<?php echo $this->session->userdata('username')?>" class="col-xs-8 col-sm-5" />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> Password </label>
            <div class="col-sm-10">
                <input type="password" id="form-field-1-1" name="password" value="" placeholder="password" class="col-xs-8 col-sm-5" />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> Jenis Kelamin </label>
            <div class="col-sm-10">
                <select name="jk">
                    <option>--Pilih Jenis Kelamin--</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" > Alamat </label>
            <div class="col-sm-10">
                <input type="text"  name="alamat" value="<?php echo $this->session->userdata('alamat') ?>" placeholder="alamat" class="col-xs-8 col-sm-5" />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" > No Handphone </label>
            <div class="col-sm-10">
                <input type="tel"  name="noTelpon" value="<?php echo $this->session->userdata('noTelpon') ?>" placeholder="nomor handphone" class="col-xs-8 col-sm-5" />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" > Tanggal Lahir </label>
            <div class="col-sm-10">
                <input type="text"  class="form-control date-picker col-xs-8 col-sm-5"  id="id-date-picker-1" data-date-format="dd-mm-yyyy" name="tgl_lahir" value="<?php echo $p->tgl_lahir ?>" placeholder="Tanggal Lahir"  />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" > Tempat Lahir </label>
            <div class="col-sm-10">
                <input type="text"   name="tempat_lahir" value="<?php echo $p->tempat_lahir ?>" placeholder="Tempat Lahir" class="col-xs-8 col-sm-5" />
            
            </div>
	</div>
        
        
       <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> Foto Profile </label>
            <div class="col-sm-10">
                <input type="file" name="foto" id="form-field-1-1" class="col-xs-8 col-sm-5 " />
            </div>
	</div>

         <div class="form-group">
            <div class="col-sm-10">
                <input type="submit" value="Update" class="btn btn-success">
            </div>
	</div>
    </div><!-- /.page-header -->

    
    <?php 
	}
	echo form_close(); 
	?>

</div>
   
</div>
</div>