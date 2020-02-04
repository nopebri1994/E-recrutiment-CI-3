<html>
<head>
	<title>Form Input Pelamar</title>
</head>
<body>
<h3>Form Update Pelamar</h3>
<?php 
echo form_open('pelamar/edit_data');
?>
<table class="table tableborder">
<input type="hidden" name="id" value="<?php echo $pelamar['id_pelamar'] ?>">
<input type="hidden" name="tgl_input" value="<?php echo $pelamar['tgl_input'] ?>">
<tr>
<td width="200">NIK</td><td><div class="col-sm-5"><input type="text" name="nik" placeholder="NIK" value="<?php echo $pelamar['nik'] ?>" class="form-control" maxlength="12"></div></td></tr>
<tr>
<td>Nama Pelamar</td><td><div class="col-sm-7"><input type="text" name="nama" placeholder="Nama" value="<?php echo $pelamar['nama'] ?>" class="form-control"></div></td></tr>
<tr>
<td width="">Nomor Handphone</td><td><div class="col-sm-3"><input type="text" name="hp" placeholder="Nomor Handphone" value="<?php echo $pelamar['no_hp'] ?>" class="form-control"></div></td></tr>
	<tr>
<td width="">Tempat Lahir</td><td><div class="col-sm-5"><input type="text" name="tl" placeholder="Tempat Lahir" value="<?php echo $pelamar['tempat_lahir'] ?>" class="form-control"></div></td></tr>
	<tr>
<td width="">Tanggal Lahir</td><td><div class="col-sm-5"><input type="date" name="tgl" placeholder="Tanggal Lahir" value="<?php echo $pelamar['tanggal'] ?>" class="form-control"></div></td></tr>

<tr><td width="">Jenis Kelamin</td><td><div class="col-sm-4"><select name="jk" class="form-control">
															
															<option value="L">Laki Laki</option>
															<option value="P">Perempuan</option>
							 							 </select></div></td></tr>

<td width="">Tinggi</td><td><div class="col-sm-5"><input type="text" name="tinggi" value="<?php echo $pelamar['tinggi'] ?>" placeholder="Tinggi Badan" class="form-control"></div></td></tr>
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
															<option value="<?php echo $j->id_jurusan; ?>"><?php echo $j->jurusan; ?></option><?php } ?>
							 							 </select></div></td></tr>
<tr><td width="">Jabatan</td><td><div class="col-sm-4"><select name="jabatan" class="form-control">
															<?php
															foreach($jabatan->result() as $jb)
															{ ?>
															<option value="<?php echo $jb->id_jabatan; ?>"><?php echo $jb->jabatan; ?></option><?php } ?>
							 							 </select></div></td></tr>
	<tr>
<td width="">alamat</td><td><div class="col-sm-5"><textarea type="text" name="alamat" placeholder="alamat" class="form-control"><?php echo $pelamar['alamat'] ?></textarea></div></td></tr>
<input type="hidden" value="<?php echo $pelamar['keterangan']?>" name="keterangan">
<input type="hidden" name="Keterangan" placeholder="Keterangan" class="form-control" value="Belum di Tes">	
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-default">Simpan Data</button></td></tr>
	</table>
</body>
</html>
