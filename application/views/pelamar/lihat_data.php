<html>
<head>

</head>
<body>
<h3>Data Pelamar</h3>

<?php
	echo form_open('pelamar/data_periode')
?><div class="container">
<hr>
	<table class="table table-striped table-bordered">	
		<tr>
			<td width="150">
			<h5>Data periode</h5>
			</td>
			<td width="150"><input type="text" name="tanggal1" placeholder="dari tanggal" class="form-control datepicker"> </td>
				<td width="150"><input type="text" name="tanggal2" placeholder="Sampi Tanggal" class="form-control datepicker"> </td>
				<td>
				<button class="btn btn-primary btn-sm" type="submit" name="submit">Lihat</button>
			</td>	 
			</tr>

	</table>
</div>

<div class="container">
<?php echo $this->session->flashdata('notif');?>
<table class="table table-striped table-bordered data">
<thead>	
<tr><th>No</th>
<th>Nama</th>	
<th>No. HP</th>

<th>Tanggal lahir</th>
<th>Pendidikan</th>
<th>Jurusan</th>
<th>Jabatan</th>

<th>Keterangan</th>
<th>Proses</th></tr>
</thead>
<tbody>
<?php
$no=1;
	foreach($record->result() as $r)
	{
	$date_ubah=$r->tanggal;
echo "<tr><td>$no</td>
		  
		  <td>$r->nama</td>
		  <td>$r->no_hp</td>
		
		  <td>";
		  echo date("d-m-Y",strtotime($date_ubah));
		  echo "</td>
		  <td>$r->nama_pendidikan</td>
		  <td>$r->jurusan</td>
		  <td>$r->jabatan</td>
		

		  <td>$r->keterangan</td>
		  <td>";
echo anchor('pelamar/hapus/'.$r->id_pelamar,' ',array('class'=>'fa fa-trash-o'));
echo " | ";

echo anchor('pelamar/detail/'.$r->id_pelamar,' ',array('class'=>'fa fa-table'));
echo "</td></tr>";
$no++;
	}
?>
</tbody>
</table>
</div>


</body>
</html>
