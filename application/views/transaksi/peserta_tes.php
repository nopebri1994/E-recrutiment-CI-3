<html>
	<body>
	<h3>Data Peserta Tes </h3>
<?php
	echo form_open('transaksi/tgl_tes')
?>
	<table class="table table-striped table-bordered">	
		<tr>
			<td width="150">
			<h5>Tanggal Tes</h5>
			</td>
			<td width="150">
		
				<div><select name="jadwal" class="form-control" size="1">
															
															<?php
															foreach($jadwal->result() as $j)
															{ ?>
															<option value="<?php echo $j->tanggal; ?>"><?php echo $j->tanggal; ?></option><?php } ?>
							 							 </select></div></td>
	
			<td>
				<button class="btn btn-primary btn-sm" type="submit" name="submit">Lihat</button>
			
			
				<button class="btn btn-primary btn-sm" type="submit" name="print">Print Absensi</button>

			</td>
			</tr>
		
	</table>
	<hr>
	<table class="table table-striped table-bordered data"><thead>
	<tr>
		<th>No</th><th>Nama</th><th>umur</th><th>pendidikan terakhir</th><th>tanggal tes</th>
	</tr></thead><tbody>
	<?php  
		$no=1;
		foreach($record->result() as $r)
		{
	echo "<tr>
		<td>$no</td>
		<td>$r->nama</td>
		<td>$r->umur</td>
		<td>$r->nama_pendidikan</td>
		<td>$r->tanggal</td>
	</tr>";
	$no++;
		}
	?>
	</tbody>
	</table>
	