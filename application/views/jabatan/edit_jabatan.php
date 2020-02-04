<html>
<head>
	<title>Form Edit Jabatan</title>
</head>
<body>
<h3>Form Edit Jabatan</h3>
<?php 
echo form_open('jabatan/edit_data');
?>
<table class="table tableborder"><tr>
<input type="hidden" name="id" value="<?php echo $jabatan['id_jabatan'] ?>">
<td>Jabatan</td><td><div class="col-sm-5"><input type="text" name="jabatan" placeholder="Jabatan" class="form-control" value="<?php echo $jabatan['jabatan'] ?>"></div></td></tr>
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-default">Simpan Data</button></td></tr>
	</table>
</body>
</html>
