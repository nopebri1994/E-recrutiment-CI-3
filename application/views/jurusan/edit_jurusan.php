<html>
<head>
	<title>Form Edit Jurusan</title>
</head>
<body>
<h3>Form Edit jurusan
<?php 
echo form_open('jurusan/edit_data');
?>
<table class="table tableborder"><tr>
<input type="hidden" name="id" value="<?php echo $jurusan['id_jurusan'] ?>">
<td>Jabatan</td><td><div class="col-sm-5"><input type="text" name="nama" placeholder="" class="form-control" value="<?php echo $jurusan['jurusan'] ?>"></div></td></tr>
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-default">Simpan Data</button></td></tr>
	</table>
</body>
</html>
