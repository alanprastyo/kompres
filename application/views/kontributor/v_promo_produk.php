<div class="container">
	<div class="page-header ">
		<h4>Promo Produk</h4>
	</div>
	<?php
	$link = $this->uri->segment('4'); 
	if($link == "dihapus"){
		echo "<div class='alert alert-success'>Produk berhasil di hapus !</div>";
	}else if($link == "oke"){
		echo "<div class='alert alert-success'>Produk berhasil di tambah !</div>";
	}else if($link == "diupdate"){
		echo "<div class='alert alert-success'>Produk berhasil di update !</div>";
	}
	?>
	
		<div class="panel panel-heading">
			Data Produk
			<a href="<?php echo base_url().'kontributor/dashboard/promo_produk_baru' ?>" class="btn btn-sm btn-success pull-right">Tulis Produk Baru</a>
		</div>
		<div class="clearfix">
                <div class="pull-right tableTools-container"></div>
                </div>
                <div class="table-header">
                Results for "Data Terakhir Produk"
                 </div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
			<tr>
				<th width="1%">No</th>
				<th>Tanggal</th>
				<th>Author</th>
				<th>Kategori</th>
                                <th>Daerah</th>
				<th>Judul</th>								
				<th>Opsi</th>								
			</tr>
            </thead>
			<?php 
			$no=1;
			foreach($promo_produk as $pp){
			?>
            <tbody>
			<tr>
				<td><?php echo $no++ ?></td>
				<td>
					<?php 
					echo $pp->tanggal 
					?>
				</td>
				<td><?php echo $pp->username ?></td>
				<td><?php echo $pp->kategori ?></td>
                                <td><?php echo $pp->kota ?></td>
				<td><?php echo $pp->judul?></td>
				<td>
					<div class="btn-group">
                                        <div class="hidden-sm hidden-xs btn-group">
                                        <a href="#" class="btn btn-xs btn-success">
					<i class="ace-icon fa fa-check bigger-120"></i>
					</a>
					<a href="<?php echo base_url().'kontributor/dashboard/edit_produk/'.$pp->id_produk?>" class="btn btn-xs btn-info ">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </a>
					<a href="<?php echo base_url().'kontributor/dashboard/hapus_produk/'.$pp->id_produk ?>" class="btn btn-xs btn-danger">
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
