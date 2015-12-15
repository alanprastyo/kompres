<div class="container">
	<div class="page-header ">
		<h4>Promo Destinasi Wisata</h4>
	</div>
	<?php
	$link = $this->uri->segment('4'); 
	if($link == "dihapus"){
		echo "<div class='alert alert-success'>Destinasi berhasil di hapus !</div>";
	}else if($link == "oke"){
		echo "<div class='alert alert-success'>Destinasi berhasil di tambah !</div>";
	}else if($link == "diupdate"){
		echo "<div class='alert alert-success'>Destinasi berhasil di update !</div>";
	}
	?>
    
       
   
            <div class="panel panel-heading">
                Data Destinasi Wisata
                <a href="<?php echo base_url().'kontributor/dashboard/promo_wisata_baru' ?>" class="btn btn-sm btn-success pull-right">Tulis Destinasi Wisata Baru</a>

            </div>
    <div class="clearfix">
	<div class="pull-right tableTools-container"></div>
    </div>
    
    <div class="table-header">
    Results for "Data Terakhir Wisata Baru"
    </div>
    
        
	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                   
				<th>No</th>
                                <th >Tanggal</th>
                                <th >Author</th>
				<th >Kategori</th>
                                <th >Daerah</th>
                                <th >Judul</th>
                                <th >Action</th>
		</tr>
            </thead>
            <?php 
			$no=1;
			foreach($promo_wisata as $pw){
            ?>
            
            <tbody>
                <tr>
                   <td><?php echo $no++ ?></td>
                   <td>
					<?php 
					echo $pw->tanggal 
					?>
				</td>
				<td><?php echo $pw->username ?></td>
				<td><?php echo $pw->kategori ?></td>
                                <td><?php echo $pw->kota ?></td>
				<td><?php echo $pw->judul ?></td>
                                <td>
                                    <div class="btn-group">
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="#" class="btn btn-xs btn-success">
					<i class="ace-icon fa fa-check bigger-120"></i>
					</a>
                                        
                                        <a href="<?php echo base_url().'kontributor/dashboard/edit_promo_wisata/'.$pw->id_destinasi?>" class="btn btn-xs btn-info">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>
                                        <a href="<?php echo base_url().'kontributor/dashboard/hapus_promo_wisata/'.$pw->id_destinasi ?>" class="btn btn-xs btn-danger">
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
   