<h3>Data Pelamar Lulus Berkas</h3>
<hr>

<table class="table table-striped table-bordered data">
<thead>
<tr align="center"><th>No</th>

<th>Nama</th>
<th>No. HP</th>
<th>Lahir</th>
<th>Umur</th>
<th>TiInggi</th>
<th>Pendidikan</th>
<th>Jurusan</th>
<th>Jabatan</th>
<th>Nilai</th>
<th>Proses</th></tr>
</thead>
<tbody>
<?php
$no=1;
	foreach($record->result() as $r)
	{
echo "<tr><td>$no</td>
		  
	
		  <td>$r->nama</td>
		  <td>$r->no_hp</td>
		  <td>$r->tempat_lahir</td>
		  <td>$r->umur</td>
		  <td>$r->tinggi</td>
		  <td>$r->nama_pendidikan</td>
		  <td>$r->jurusan</td>
		  <td>$r->jabatan</td>
		  <td>$r->nilai</td>
		  <td>";
echo anchor('proses/input_data/'.$r->id_pelamar,'Jadwal',array('class'=>'btn btn-primary btn-sm'));	
echo "||";
echo anchor('pelamar/detail/'.$r->id_pelamar,'detail',array('class'=>'btn btn-primary btn-sm'));	
echo "</td></tr>";		  
$no++;
	}
?>
</tbody>
</table>
