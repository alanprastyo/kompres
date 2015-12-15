<div class="container body-admin">
	<div class="page-header ">
		<h4>Detail Kontributor</h4>
	</div>
    <?php
	$link = $this->uri->segment('4'); 
	if($link == "error"){
		echo "<div class='alert alert-success'>Detail Kontributor Error !</div>";
	}else if($link == "success"){
		echo "<div class='alert alert-success'>Detail Kontributor Success !</div>";
	}
	?>
	<?php 
	echo validation_errors();
	echo form_open_multipart('admin/dashboard/kontributor_action');  
	foreach($detail as $d){ 
	?>
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Nama</th>
			<td>
                              <input type="hidden" name="id" class="form-control" value="<?php echo $d->id_kontributor ?>">
                              <input type="text" disabled=""  class="form-control" value="<?php echo $d->nama ?>">
			</td>
		</tr>
                <tr>
			<th>Email</th>
			<td>
                                <input type="text" disabled="" class="form-control" value="<?php echo $d->email ?>">
			</td>
		</tr>
                <tr>
			<th>Username</th>
			<td>
                                <input type="text" disabled=""  class="form-control" value="<?php echo $d->username ?>">
			</td>
		</tr>
                <tr>
			<th>Daerah</th>
			<td>
                                <input type="text" disabled=""  class="form-control" value="<?php echo $d->kota ?>">
			</td>
		</tr>
                <tr>
			<th>Jenis Kelamin</th>
			<td>
                                <input type="text" disabled=""  class="form-control" value="<?php echo $d->jk ?>">
			</td>
		</tr>
                <tr>
			<th>Alamat</th>
			<td>
                            <input type="text" disabled=""  class="form-control" value="<?php echo $d->alamat ?>">
			</td>
		</tr>
                <tr>
			<th>No Handphone</th>
			<td>
                                <input type="text" disabled=""  class="form-control" value="<?php echo $d->no_hp ?>">
			</td>
		</tr>
                <tr>
			<th>Tanggal Lahir</th>
			<td>
                                <input type="text" disabled=""  class="form-control" value="<?php echo $d->tgl_lahir ?>">
			</td>
		</tr>
                <tr>
			<th>Tempat Lahir</th>
			<td>
                                <input type="text" disabled=""  class="form-control" value="<?php echo $d->tempat_lahir ?>">
			</td>
		</tr>
                <tr>
			<th>Foto</th>
			<td>
                            <img src="<?php echo base_url() ?>foto/<?php echo $d->foto ?>">
			</td>
		</tr>
		<tr>
			<th>Status</th>
                        <?php  
                        $status = $d->is_active;
                            if($status=='Y'){
                                 $aktive = "Aktif";
                             }else{
                                $aktive="Tidak Aktif";
                            }
                        ?>
			<td>
                                <input type="text" disabled=""  class="form-control" value="<?php echo $aktive ?>">
			</td>
		</tr>
                <tr>
			<th>Action</th>
			<td>
                        <select name="is_active">
                            <option>--Choose Action--</option>
                            <option value="Y">Active</option>
                            <option value="N">Suspend</option>
                        </select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" value="Simpan" class="btn btn-sm btn-success">
			</td>
		</tr>
	</table>
	<?php 
	}
	echo form_close(); 
	?>
</div>