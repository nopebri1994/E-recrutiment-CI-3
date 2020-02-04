<html>
	<body>
	<h3>Data Peserta Tidak Lulus  </h3>

	<hr>
	<table class="table table-striped table-bordered data"><thead>
	<tr>
		<th>No</th><th>Nama</th><th>umur</th><th>tinggi</th><th>pendidikan terakhir</th><th>Jurusan</th><th>Keterangan</th>
	</tr></thead><tbody>
	<?php  
		$no=1;
		foreach($record->result() as $r)
		{
	echo "<tr>
		<td>$no</td>
		<td>$r->nama</td>
		<td>$r->umur</td>
		<td>$r->tinggi cm</td>
		<td>$r->nama_pendidikan</td>
			<td>$r->jurusan</td>
		<td>$r->keterangan</td>
	</tr>";
	$no++;
		}
	?>
	</tbody>
	</table>
