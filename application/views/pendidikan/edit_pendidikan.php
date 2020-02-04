<html>
<head>
	<title>Form Edit Pendidikan</title>
</head>
<body>
<h3>Form Edit Pendidikan</h3>
<?php 
echo form_open('pendidikan/edit_data');
?>
<table class="table tableborder"><tr>
<input type="hidden" name="id" value="<?php echo $pendidikan['id_pendidikan'] ?>">
<td>Jabatan</td><td><div class="col-sm-5"><input type="text" name="nama" placeholder="Jabatan" class="form-control" 
value="<?php echo $pendidikan['nama_pendidikan'] ?>"></div></td></tr>
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-default">Simpan Data</button></td></tr>
	</table>
</body>
</html>
