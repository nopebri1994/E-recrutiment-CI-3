<h3>Data Pendidikan</h3>

<?php 
echo form_open('Pendidikan/input_data');
?>
<?php echo $this->session->flashdata('notif');?>
<table class="table  table-striped table-bordered">
<tr>

<td width="130">Nama Pendidikan</td><td width="870"><div class="col-sm-5"><input type="text" class="form-control" name="nama" placeholder="nama"></div></td>
<td colspan='2"'><button type="submit" class="btn btn-danger btn-sm" name="submit">Tambah Data</button></td></tr>
	</table>
<hr>
<table class="table  table-striped table-bordered data"><thead>
<tr><th width="50">No</th><th width="150">Kode Pendidikan</th><th width="600">Nama Pendidikan</th><th>Proses</th></tr></thead>
<tbody>
<?php
$no=1;
	foreach($record->result() as $r)
	{
echo "<tr><td>$no</td>
		  <td>$r->id_pendidikan</td>
		  <td>$r->nama_pendidikan</td><td>";
echo anchor('pendidikan/hapus/'.$r->id_pendidikan,'Hapus',array('class'=>'btn btn-default btn-sm'));
echo anchor('pendidikan/edit_data/'.$r->id_pendidikan,'Edit',array('class'=>'btn btn-default btn-sm'));
echo "</td></tr>";
$no++;
	}
?>
</tbody>
</table>
<script type="text/javascript">

	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>

