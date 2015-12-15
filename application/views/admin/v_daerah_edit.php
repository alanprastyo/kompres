<div class="container body-admin">	
	<div class="page-header ">
		<h4>Daerah Destinasi</h4>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="table-header">
                            Edit Daerah
                        </div>
			<div class="panel-body">
				<?php echo form_open('admin/dashboard/update_daerah') ?>
					<?php foreach($edit_daerah as $ek){ ?>
					<div>
						<label class="col-md-12">Nama Daerah</label>
						<div class="col-md-12">
							<input type="hidden" name="id" value="<?php echo $ek->id_daerah?>">
							<input type="text" name="daerah" class="form-control" value="<?php echo $ek->kota ?>">
							<br/>
							<input type="submit" name="submit" value="Simpan" class="btn btn-sm btn-primary pull-right">
						</div>										
					</div>
					<?php } ?>
				</form>
			</div>			
		</div>
	</div>
 
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				Daerah Destinasi							
			</div>
                    <div class="table-header">
                        Results for "Data Terakhir Daerah"
                        </div>
			<div class="panel-body">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
					<tr>
						<td width="1%">No</td>
						<td class="col-md-8">Daerah Destinasi</td>
						<td class="col-md-2">Opsi</td>
					</tr>
                            </thead>
					<?php
					$no = 1;
					foreach($daerah as $d){
					?>
                            <tbody>
					<tr>
						<td><?php echo $no++ ?></td>	
						<td><?php echo $d->kota ?></td>	
						<td>
							<div class="btn-group">
                                                              <div class="hidden-sm hidden-xs btn-group">
                                                                <a href="<?php echo base_url().'admin/dashboard/edit_daerah/'.$d->id_daerah?>" class="btn btn-xs btn-info">
                                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                                </a>
                                                                <a href="<?php echo base_url().'admin/dashboard/hapus_daerah/'.$d->id_daerah?>" class="btn btn-xs btn-danger">
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