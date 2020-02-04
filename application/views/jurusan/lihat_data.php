<html>
<head><title></title>
</head>
<body>
<h3>Data Jurusan</h3>
<?php 
echo form_open('jurusan/input_data');
?>
<table class="table table-striped table-bordered">
	<tr>
	<td width="100">Jurusan</td><td width="900"><div class="col-sm-5"><input type="text" name="jurusan" placeholder="Jurusan" class="form-control"></div></td>
	<td colspan="2"><button type="submit" name="submit" class="btn btn-danger btn-sm">Tambah Data</button></td></tr>
	</table>



<hr>
<table class="table table-striped table-bordered data">
<thead><tr>
<th width="50">No</th><th width="150">Kode jurusan</th><th width="600">Nama jurusan</th><th>Proses</th></tr></thead>

<?php
$no=1;
	foreach($record->result() as $r)
	{
echo "<tr><td>$no</td>
		  <td >$r->id_jurusan</td>
		  <td >$r->jurusan</td><td>";
		  echo anchor('jurusan/hapus/'.$r->id_jurusan,'Hapus',array('class'=>'btn btn-default btn-sm'));
echo anchor('jurusan/edit_data/'.$r->id_jurusan,'Edit',array('class'=>'btn btn-default btn-sm'));
echo "</td></tr>";
$no++;
	}
?>


</table>

</body>
</html>
