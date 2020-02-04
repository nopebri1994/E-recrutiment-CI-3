<html>
<head>
	<title>Form Input Pelamar</title>

</head>
<?php echo form_open('submenu/input_data'); ?>
<body>
<div class="cotainer">
<h3>Tambah Mainmenu</h3> 
<table class="table ">
<tr>
	<td width="200">Nama Menu</td>
	<td><div class="col-sm-5"><select name="mainmenu" class="form-control">
								<?php foreach($mainmenu->result() as $m){?>
									<option value="<?php echo $m->id_mainmenu;?>"><?php echo $m->nama_mainmenu;?></option>
								<?php } ?>
							  </select></div></td>
</tr>
<tr>
	<td width="200">Nama Submenu</td>
	<td><div class="col-sm-4"><input type="text" class="form-control" name="nama"></div></td>
</tr>
<tr>
	<td width="200">Icon</td>
	<td><div class="col-sm-3"><input type="text" class="form-control" name="icon"></div></td>
</tr>
<tr>
	<td width="200">Aktif</td>
	<td><div class="col-sm-2"><select name="aktif" class="form-control">
									<option value="y">Aktif</option>
									<option value="t">Tidak Aktif</option>
							</select></div></td>
</tr>
<tr>
	<td width="200">Link</td>
	<td><div class="col-sm-5"><input type="text" class="form-control" name="link"></div></td>
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