<div class="container">
	<div class="page-header ">
		<h4>Destinasi Wisata</h4>
	</div>
	<?php
	$link = $this->uri->segment('4'); 
	if($link == "dihapus"){
		echo "<div class='alert alert-success'>Artikel berhasil di hapus !</div>";
	}else if($link == "oke"){
		echo "<div class='alert alert-success'>Artikel berhasil di tambah !</div>";
	}else if($link == "diupdate"){
		echo "<div class='alert alert-success'>Artikel berhasil di update !</div>";
	}
	?>
	
		<div class="panel panel-heading">
			Daftar Destinasi Wisata
		<!--	<a href="<?php echo base_url().'admin/dashboard/promo_wisata_baru' ?>" class="btn btn-sm btn-success pull-right">Tulis Destinasi Wisata Baru</a>
		-->
                
                </div>
     <div class="clearfix">
	<div class="pull-right tableTools-container"></div>
    </div>
    
    <div class="table-header">
    Results for "Data Terakhir Kontributor"
    </div>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
			<tr>
				<th width="1%">No</th>
				<th>Tanggal</th>
				<th >Author</th>
				<th >Kategori</th>
                                <th >Daerah</th>
				<th >Judul</th>								
				<th >Action</th>								
			</tr>
                    </thead>
			<?php 
			$no=1;
			foreach($promo_wisata as $pd){
			?>	
                    <tbody>
			<tr>
				<td><?php echo $no++ ?></td>
				<td>
					<?php 
					echo $pd->tanggal 
					?>
				</td>
				<td><?php echo $pd->username ?></td>
				<td><?php echo $pd->kategori ?></td>
                                <td><?php echo $pd->kota ?></td>
				<td><?php echo $pd->judul ?></td>
				<td>
					<div class="btn-group">
                                            
                                             <div class="btn-group">
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="#" class="btn btn-xs btn-success">
					<i class="ace-icon fa fa-check bigger-120"></i>
					</a>
                                        
                                        <a href="" class="btn btn-xs btn-info">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>
                                        <a href="" class="btn btn-xs btn-danger">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
					</a>

                                    </div>
                                    </div>
                                            <!--
					<a href="<?php echo base_url().'admin/dashboard/edit_promo_wisata/'.$pd->id_destinasi?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-wrench"></span></a>
					<a href="<?php echo base_url().'admin/dashboard/hapus_promo_wisata/'.$pd->id_destinasi ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash"></span></a>
					-->
                                            </div>
				</td>
			</tr>
                    </tbody>
			<?php 
			}
			?>
		</table>
	</div>