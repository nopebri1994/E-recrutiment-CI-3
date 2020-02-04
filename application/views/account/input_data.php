<html>
<head>
	<title>Form Input Data Pengguna</title>

</head>
<?php echo form_open('account/input_data'); ?>
<body>
<div class="cotainer">
<h3>Tambah Account</h3> 
<table class="table ">
<tr>
	<td width="200">Nama User</td>
	<td><div class="col-sm-4"><input type="text" class="form-control" name="nama"></div></td>
</tr>
<tr>
	<td width="200">username</td>
	<td><div class="col-sm-3"><input type="text" class="form-control" name="user"></div></td>
</tr>
<tr>
	<td width="200">Password</td>
	<td><div class="col-sm-5"><input type="text" class="form-control" name="password"></div></td>
</tr>


<tr>	
	<td width="200">Level</td>
	<td><div class="col-sm-3"><select name="level" class="form-control">
									<option value="1">Admin</option>
									<option value="2">Staff</option>
									<option value="3">User</option>
										</select></div></td>
</tr>

<tr>

	<td colspan="2" align="center"><button name="submit" class="btn btn-danger">Simpan</button></td>
</tr>
</table>




</div>
</body>