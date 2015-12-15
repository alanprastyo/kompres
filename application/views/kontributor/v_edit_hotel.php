<div class="container body-admin">
	<div class="page-header ">
		<h4>Edit Hotel</h4>
	</div>
	<?php 
	echo validation_errors();
	echo form_open_multipart('kontributor/dashboard/update_hotel');  
	foreach($hotel as $h){ 
	?>
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Nama hotel</th>
			<td>
				<input type="hidden" name="id" class="form-control" value="<?php echo $h->id_hotel ?>">
				<input type="text" name="nama_hotel" class="form-control" value="<?php echo $h->nama_hotel ?>">
			</td>
		</tr>
		<tr>
			<th>Jenis</th>
			<td>
				<select name="jenis" class="form-control">
					<option value="">- Pilih Jenis -</option>
					<?php foreach($jenis as $j){ ?>
					<option <?php if($h->jenis){echo "selected='selected'";} ?> value="<?php echo $j ?>"><?php echo $j ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
                <tr>
			<th>Daerah</th>
			<td>
				<select name="daerah" class="form-control">
					<option value="">- Pilih Daerah -</option>
					<?php foreach($daerah as $d){ ?>
					<option <?php if($h->daerah==$d->id_daerah){echo "selected='selected'";} ?> value="<?php echo $d->id_daerah ?>"><?php echo $d->kota ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
                
		<tr>
			<th>Deskripsi</th>
			<td>
				<textarea class="ckeditor" id="ckeditor" name="deskripsi"><?php echo $h->deskripsi ?></textarea>
			</td>
		</tr>
		<tr>
			<th>Gambar</th>
			<td>
				<input type="file" value="Posting" class="form-control" name="gambar">
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" value="Posting" class="btn btn-sm btn-success">
			</td>
		</tr>
	</table>
	<?php 
	}
	echo form_close(); 
	?>
</div>