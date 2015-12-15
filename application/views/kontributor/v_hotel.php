<div class="container">
	<div class="page-header ">
		<h4>Daftar Hotel</h4>
	</div>
	<?php
	$link = $this->uri->segment('4'); 
	if($link == "dihapus"){
		echo "<div class='alert alert-success'>Hotel berhasil di hapus !</div>";
	}else if($link == "oke"){
		echo "<div class='alert alert-success'>Hotel berhasil di tambah !</div>";
	}else if($link == "diupdate"){
		echo "<div class='alert alert-success'>Hotel berhasil di update !</div>";
	}
	?>
	
		<div class="panel panel-heading">
			Data Hotel
			<a href="<?php echo base_url().'kontributor/dashboard/hotel_new' ?>" class="btn btn-sm btn-success pull-right">Tulis Hotel Baru</a>
		</div>
		<div class="clearfix">
                     <div class="pull-right tableTools-container"></div>
                </div>
                
                <div class="table-header">
                Results for "Data Terakhir Hotel"
                 </div>
	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
			<tr>
				<th width="1%">No</th>
				<th >Tanggal</th>
				<th >Author</th>
				<th >Jenis</th>
                                <th >Daerah</th>
				<th >Nama Hotel</th>								
				<th >Opsi</th>								
			</tr>
            </thead>
			<?php 
			$no=1;
			foreach($hotel as $h){
			?>	
            <tbody>
			<tr>
				<td><?php echo $no++ ?></td>
				<td>
					<?php 
					echo $h->tanggal 
					?>
				</td>
				<td><?php echo $h->username ?></td>
				<td><?php echo $h->jenis ?></td>
                                <td><?php echo $h->kota ?></td>
				<td><?php echo $h->nama_hotel?></td>
				<td>
					<div class="btn-group">
                                        <div class="hidden-sm hidden-xs btn-group">
                                        <a href="#" class="btn btn-xs btn-success">
					<i class="ace-icon fa fa-check bigger-120"></i>
					</a>
					<a href="<?php echo base_url().'kontributor/dashboard/edit_hotel/'.$h->id_hotel?>" class="btn btn-xs btn-info ">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </a>
					<a href="<?php echo base_url().'kontributor/dashboard/hapus_hotel/'.$h->id_hotel ?>" class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </a>
					</div>
				</td>
			</tr>
            </tbody>
			<?php 
			}
			?>
		</table>
	</div>