<div class="container">
	<div class="page-header ">
		<h4>Kontributor Wisata Sumatera Utara</h4>
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
                Daftar Kontributor
                <!--<a href="<?php echo base_url().'kontributor/dashboard/promo_wisata_baru' ?>" class="btn btn-sm btn-success pull-right">Tulis Destinasi Wisata Baru</a>
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
                   
				<th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
				<th>Daerah</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
		</tr>
            </thead>
            <?php 
			$no=1;
			foreach($kontributor as $k){
            ?>
            <?php
            $status = $k->is_active;
            if($status=='Y'){
                $aktive = "<span class='label label-sm label-success'>Aktif</span>";
            }else{
                $aktive="<span class='label label-sm label-warning'>Tidak Aktif</span>";
            }
            ?>
            <tbody>
                <tr>
                   <td><?php echo $no++ ?></td>
                   <td>
					<?php 
					echo $k->nama 
					?>
				</td>
                                <td><?php echo $k->email?></td>
				<td><?php echo $k->kota ?></td>
                                <td><?php echo $k->username ?></td>
				<td><?php echo $aktive ?></td>
                                <td>
                                    <div class="btn-group">
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="<?php echo base_url().'admin/dashboard/detail_kontributor/'.$k->id_kontributor?>" class="btn btn-xs btn-success">
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
                                </td>
                </tr>
            </tbody>
            <?php 
			}
			?>
        </table>
    
        
</div>
   