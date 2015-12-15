<div class="container body-admin">
	<div class="page-header ">
		<h4>Tulis Hotel Baru</h4>
	</div>
	<?php echo validation_errors() ?>
	<?php echo form_open_multipart('kontributor/dashboard/hotel_act'); ?>
	<table class="table table-bordered table-hover table-striped table-responsive">
		<tr>
			<th>Nama Hotel</th>
			<td><input type="text" name="nama_hotel" class="form-control"></td>
		</tr>
		<tr>
			<th>Jenis</th>
			<td>
				<select name="jenis" class="form-control">
					<option value="">- Pilih Kategori -</option>
					<?php foreach($jenis as $j){ ?>
					<option value="<?php echo $j ?>"><?php echo $j ?></option>
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
					<option value="<?php echo $d->id_daerah ?>"><?php echo $d->kota ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
                
		<tr>
			<th>Deskripsi</th>
			<td>
				<textarea class=" ckeditor" id="ckeditor" name="deskripsi"></textarea>
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
	<?php echo form_close(); ?>
</div>