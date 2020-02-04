<html>
<head>
	<title>Form Login</title>
</head>
<body>
<?php 
echo form_open('users/update');
?>
<h4> Perbarui data login</h4>
<table class="table table">
<?php echo $alert;?>
<tr><td width="200">Username</td><td><div class="col-sm-4"><input type="text" name="user" value="<?php echo $this->session->userdata['user'];?>" class="form-control"></div></td></tr>
<tr><td>Password Lama</td><td><div class="col-sm-4"><input type="password" name="pass"  class="form-control"><?php echo $cek;?></div></td></tr>
<tr><td>Password Baru</td><td><div class="col-sm-4"><input type="password" name="passnew"  class="form-control"><?php echo $konf;?></div></td></tr>
<tr><td>Konfirmasi Password Baru</td><td><div class="col-sm-4"><input type="password" name="passnew2" value="" class="form-control"></div></td></tr>
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-danger">Simpan</button></td></tr>
	</table>
</body>
</html>
