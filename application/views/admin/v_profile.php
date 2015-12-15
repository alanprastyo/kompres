<div class="panel-body">
    <?php 
	echo validation_errors();
	echo form_open_multipart('admin/dashboard/update_profile');  
	foreach($profile as $p){ 
	?>
<div class="page-header">
    <h1>
    Profile Admin 
    <i class="ace-icon fa fa-angle-double-right"></i>
    <b><?php echo $p->nama ?></b>
    </h1>
    
    <br />
    <?php
	$link = $this->uri->segment('4'); 
	if($link == "error"){
		echo "<div class='alert alert-warning'>Update Profile Error !</div>";
	}else if($link == "diupdate"){
		echo "<div class='alert alert-success'>Artikel berhasil di update !</div>";
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
                <input type="hidden" name="id" value="<?php echo $p->id_admin?>">
                <input type="text" id="form-field-1" name="nama" value="<?php echo $p->nama ?>" class="col-xs-8 col-sm-5 " />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> Email </label>
            <div class="col-sm-10">
                <input type="text" id="form-field-1-1" name="email" value="<?php echo $p->email ?>" class="col-xs-8 col-sm-5" />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> Username </label>
            <div class="col-sm-10">
                <input type="text"  name="username" id="form-field-1-1" value="<?php echo $p->username ?>" class="col-xs-8 col-sm-5" />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> Current Password </label>
            <div class="col-sm-10">
                <input type="password" id="form-field-1-1" name="password" value="" placeholder="password lama" class="col-xs-8 col-sm-5" />
            </div>
	</div>
        
        <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> New password </label>
            <div class="col-sm-10">
                <input type="password" id="form-field-1-1" name="new_pass" value="" placeholder="password baru" class="col-xs-8 col-sm-5" />
            </div>
	</div>
        
       <div class="form-group">
	<label class="col-sm-2" for="form-field-1-1"> Foto Profile </label>
            <div class="col-sm-10">
                <input type="file" name="pp" id="form-field-1-1" class="col-xs-8 col-sm-5 " />
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