<html>
<head>
	<title>Form Edit Jadwal</title>
</head>
<body>
<h3>Form Edit Jadwal
<?php 
echo form_open('jadwal/edit_data');
?>
<table class="table tableborder"><tr>
<input type="hidden" name="id" value="<?php echo $jadwal['id_jadwal'] ?>">
<td>Jabatan</td><td><div class="col-sm-5"><input type="text" name="tgl" placeholder="" class="form-control" value="<?php echo $jadwal['tanggal'] ?>"></div></td></tr>
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-default">Simpan Data</button></td></tr>
	</table>
</body>
</html>
