<div class="container body-admin">	
<div class="page-header ">
		<h4>Kategori Produk</h4>
	</div>
<?php
$pesan = $this->uri->segment(4); 
if($pesan == "ditambah"){
	echo "<div class='alert alert-success'>Kategori berhasil di tambah</div>";
}else if($pesan == "diupdate"){
	echo "<div class='alert alert-success'>Kategori berhasil di update</div>";
}else if($pesan == "dihapus"){
	echo "<div class='alert alert-success'>Kategori berhasil di hapus</div>";
}
?>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="table-header">
                       Tambah Kategori
                     </div>
			<div class="panel-body">
				<?php echo form_open('admin/dashboard/tambah_kategori') ?>
				<div>
					<label class="col-md-12">Nama kategori</label>
					<div class="col-md-12">
						<input type="text" name="kategori" class="form-control" placeholder="Nama kategori ..">
						<br/>
						<input type="submit" name="submit" value="Simpan" class="btn btn-sm btn-primary pull-right">
					</div>										
				</div>
				</form>
			</div>			
		</div>
	</div>
 
	<div class="col-md-8">
		<div class="panel panel-default">
                    
			<div class="panel-heading">
				Kategori							
			</div>
                    <div class="table-header">
                        Results for "Data Terakhir Kategori"
                        </div>
			<div class="panel-body">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
					<tr>
						<td width="1%">No</td>
						<td class="col-md-8">Kategori</td>
						<td class="col-md-2">Opsi</td>
					</tr>
                                </thead>
					<?php
					$no = 1;
					foreach($kategori as $k){
					?>
                                <tbody>
					<tr>
						<td><?php echo $no++ ?></td>	
						<td><?php echo $k->kategori ?></td>	
						<td>
							<div class="btn-group">
                                                            <div class="hidden-sm hidden-xs btn-group">
                                                                <a href="<?php echo base_url().'admin/dashboard/edit_kategori/'.$k->id_kategori?>" class="btn btn-xs btn-info">
                                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                                </a>
                                                                <a href="<?php echo base_url().'admin/dashboard/hapus_kategori/'.$k->id_kategori?>" class="btn btn-xs btn-danger">
                                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                </a>
								</div>
                                                        </div>
								
						
						</td>	
					</tr>
                                </tbody>
					<?php
					}
					?>
				</table>
			</div>			
		</div>
	</div>
</div>