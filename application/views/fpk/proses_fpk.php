<html>
<head>
	<title>Form Peemenuhan FPK</title>
</head>
<body>
<h3>Form Pemenuhan FPK</h3>
<?php 
echo form_open('fpk/proses');
?>
<table class="table tableborder" >
<tr><td width="100">Nomor FPK</td><td><div class="col-sm-4"><select name="fpk" class="form-control">
															<?php
															foreach($record->result() as $r)
															{ ?>
															<option value="<?php echo $r->Id_fpk; ?>"><?php echo $r->no_fpk; ?></option><?php  } ?>
							 							 </select></div></td></tr>
<tr><td width="150">Nama Pelamar</td><td><div class="col-sm-4"><select name="id_pel" class="form-control">
															<?php
															foreach($pelamar->result() as $p)
															{ ?>
															<option value="<?php echo $p->id_pelamar; ?>"><?php echo $p->nama; ?></option><?php  } ?>
							 							 </select></div></td></tr>
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-default">Simpan Data</button></td></tr>
	</table>
</body>
</html>
