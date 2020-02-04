<html>
<head>
	<title>Form Input Pelamar</title>

</head>

<body>
<h3>Form Input Pelamar</h3> 
<?php 
$nik=$this->session->userdata['nik'];
?>	
<?php echo form_open('pelamar/input_data'); ?>
<table class="table tableborder">

<input type="hidden" name="nik" placeholder="NIK" class="form-control" maxlength="12" value="<?php echo $nik ?>"></div><?php echo $exist ?><?php echo form_error('nik');?>
<tr>
<td width="200">Nama Pelamar</td><td><div class="col-sm-7">
<input type="text" name="nama" placeholder="Nama" class="form-control" value="<?php echo $this->session->userdata['nama'];?>"></div><?php echo form_error('nama');?></td></tr>
<tr>
<td width="">Nomor Handphone</td><td><div class="col-sm-3">
<input type="text" name="hp" placeholder="Nomor Handphone" class="form-control"></div><?php echo form_error('hp');?></td></tr>
	<tr>
<td width="">Tempat Lahir</td><td><div class="col-sm-5">
<input type="text" name="tl" placeholder="Tempat Lahir" class="form-control"></div><?php echo form_error('tl');?></td></tr>
	<tr>
<div class="date" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">	
<td width="">Tanggal Lahir</td><td><div class="col-sm-7">
<input type="date" name="tgl" placeholder="Tanggal Lahir" class="form-control" style="width:250px" ></div><?php echo form_error('tgl');?></td></tr>
</div>
<tr><td width="">Jenis Kelamin</td><td><div class="col-sm-4"><select name="jk" class="form-control">
															
															<option value="L">Laki Laki</option>
															<option value="P">Perempuan</option>
							 							 </select></div></td></tr>

<td width="">Tinggi</td><td><div class="col-sm-5">
<input type="text" name="tinggi" placeholder="Tinggi Badan" class="form-control"></div><?php echo form_error('tinggi');?></td></tr>
<tr><td width="">Pendidikan</td><td><div class="col-sm-4"><select name="pendidikan" class="form-control">
															<?php
															foreach($pendidikan->result() as $r)
															{ ?>
															<option value="<?php echo $r->id_pendidikan; ?>"><?php echo $r->nama_pendidikan; ?></option><?php } ?>
							 							 </select></div></td></tr>
<tr><td width="">Jurusan</td><td><div class="col-sm-4"><select name="jurusan" class="form-control">
															<?php
															foreach($jurusan->result() as $j)
															{ ?>
															<option value="<?php echo $j->id_jurusan; ?>"><?php echo $j->jurusan; ?>
															</option>
															<?php } ?>
							 							 	
							 							 </select></div></td></tr>
<tr><td width="">Jabatan</td><td><div class="col-sm-4"><select name="jabatan" class="form-control">
															<?php
															foreach($jabatan->result() as $jb)
															{ ?>
															<option value="<?php echo $jb->id_jabatan; ?>"><?php echo $jb->jabatan; ?></option><?php } ?>
							 							 </select></div></td></tr>
	<tr>
<td width="">alamat</td><td><div class="col-sm-5">
<textarea name="alamat" placeholder="alamat" class="form-control"></textarea></div><?php echo form_error('alamat');?></td></tr>

<input type="hidden" name="Keterangan" placeholder="Keterangan" class="form-control" value="Belum di Tes">	
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-default">Simpan Data</button></td></tr>
	</table>
</body>
</html>
