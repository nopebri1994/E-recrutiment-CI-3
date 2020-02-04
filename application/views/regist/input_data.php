<?php
	echo form_open("regist/input");
?>
<html>
<head><title>Halaman Registrasi</title></head>
<body>
	<div class="container">
	<h3 align="center">Silahkan Registrasi Disini</h3>
	<table class="table">
		<tr>
			<td>Nomor KTP</td>
			<td><input type="text" name="nik" placeholder="(16 digit nomor KTP)" class="form-control" maxlength="16"><?php echo $exist;?></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td><input type="text" name="nama" placeholder="" class="form-control"></td>
		</tr>
			<td>Alamat Email</td>
			<td><input type="text" name="email" placeholder="" class="form-control"></td>
		</tr>
		<tr>
			<td>username</td>
			<td><input type="text" name="user" placeholder="" class="form-control"><?php echo $user;?></td>
		</tr>
			<tr>
			<td>Password</td>
			<td><input type="password" name="password" placeholder="" class="form-control"></td>
		</tr>
			<tr>
				<td colspan="2" align="center"><button name="submit" class="btn btn-danger">Registrasi</button></td>
			</tr>
	</table>
	</div>
</body>