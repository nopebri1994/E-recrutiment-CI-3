
<h3>Informasi SIM</h3>
  <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#input-data" align="right">Tambah Data</a>
<hr>
<table class="table table-striped table-bordered data">
<thead>
<tr align="center"><th>No</th>
<th>Info</th>
<th>Status</th>
<th></th>
</tr>	

</thead>
<tbody>
<?php
$no=1;
foreach ($info->result() as $in){
	if($in->status=='Y'){
		$status="Aktif";
	}else{
		$status="Tidak Aktif";
	}
?>
<tr>
	<td><?php echo $no ;?></td>
	<td><?php echo $in->info?></td>
	<td><?php echo $status?></td>
	<td></td>
</tr>
<?php
		$no++;
		} 
?>
</tbody>
</table>


  <div class="modal fade" id="input-data" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Input Informasi</h4>
        </div>
        <div class="modal-body">
		<?php echo form_open('info/add_info'); ?>  
        <table class="table">

          <tr>
        <td> Info</td>
            <td><textarea class="form-control" name="info">Masukan Informasi</textarea></textarea></td>
          </tr>
         <tr>
        <td>status</td>
            <td><select class="form-control" name="status">
            		<option value="Y">Aktif</option>
            		<option value="T">Tidak Aktif</option>
            		</select>

            </td>
       

        </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
          <?php echo form_close(); ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
