<div class="container body-admin">
	<div class="page-header ">
		<h4>Edit Promo Wisata Baru</h4>
	</div>
	<?php 
	echo validation_errors();
	echo form_open_multipart('kontributor/dashboard/update_produk');  
	foreach($produk as $p){ 
	?>
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Judul</th>
			<td>
				<input type="hidden" name="id" class="form-control" value="<?php echo $p->id_produk ?>">
				<input type="text" name="judul" class="form-control" value="<?php echo $p->judul ?>">
			</td>
		</tr>
		<tr>
			<th>Kategori</th>
			<td>
				<select name="kategori" class="form-control">
					<option value="">- Pilih Kategori -</option>
					<?php foreach($kategori as $k){ ?>
					<option <?php if($p->kategori==$k->id_kategori){echo "selected='selected'";} ?> value="<?php echo $k->id_kategori ?>"><?php echo $k->kategori ?></option>
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
					<option <?php if($p->daerah==$d->id_daerah){echo "selected='selected'";} ?> value="<?php echo $d->id_daerah ?>"><?php echo $d->kota ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
                <tr>
			<th>Wisata</th>
			<td>
				<select name="daerah" class="form-control">
					<option value="">- Pilih Wisata -</option>
					<?php foreach($wisata as $w){ ?>
					<option <?php if($p->wisata==$w->id_destinasi){echo "selected='selected'";} ?> value="<?php echo $w->id_destinasi ?>"><?php echo $w->judul ?></option>
					<?php } ?>
				</select>
			</td>
                </tr>
		<tr>
			<th>Deskripsi</th>
			<td>
				<textarea class="ckeditor" id="ckeditor" name="deskripsi"><?php echo $p->deskripsi ?></textarea>
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