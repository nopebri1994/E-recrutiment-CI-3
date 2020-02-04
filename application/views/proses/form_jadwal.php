<html>
<head>
	<title>Form Penjadwalan Test</title>
</head>
<body>
<h3>Form Penjadwalan Tes</h3>
<?php 
echo form_open('proses/input_data');
?>
<table class="table tableborder" ><tr>
<input type="hidden" name="id" value="<?php echo $pelamar['id_pelamar']?>">	
<td width="150">Nama Karyawan</td><td><div class="col-sm-4"><input type="text" name="nama" class="form-control" value="<?php echo $pelamar['nama'];?>"></div></td></tr>
<tr>
<tr><td width="">jadwal</td><td><div class="col-sm-4"><select name="jadwal" class="form-control">
															<?php
															foreach($jadwal->result() as $r)
															{ ?>
															<option value="<?php echo $r->id_jadwal; ?>"><?php echo $r->tanggal; ?></option><?php } ?>
							 							 </select></div></td></tr>
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-default">Simpan Data</button></td></tr>
	</table>
</body>
</html>
