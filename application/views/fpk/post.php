<html>
<head>
	<title>Form FPK</title>
</head>
<body>
<h3>Form FPK</h3>
<?php 
echo form_open('fpk/input_data');
?>
<table class="table tableborder" ><tr>

<td width="150">No FPK</td><td><div class="col-sm-4"><input type="text" name="no" class="form-control" placeholder="Masukn No FPK"></div></td></tr>
<td width="300">Bagian</td><td><div class="col-sm-3"><input type="text" name="bg" class="form-control" placeholder="Bagian"></div></td></tr>
<td width="50">Total</td><td><div class="col-sm-3"><input type="text" name="tot" class="form-control" placeholder="Total Permintaan"></div></td></tr>
<td width="200">Jabatan</td><td><div class="col-sm-3"><select name="jabatan" class="form-control">
															<?php
															foreach($jabatan->result() as $jb)
															{ ?>
															<option value="<?php echo $jb->id_jabatan; ?>"><?php echo $jb->jabatan; ?></option><?php } ?>
							 							 </select></div></td></tr>
<td width="200">Jenis Kelamin</td><td><div class="col-sm-3"><input type="radio" name="gender" value="L"> Laki - Laki 
															<input type="radio" name="gender" value="P"> Perempuan</div></td></tr>
<td width="200">Usia Maximal</td><td><div class="col-sm-2"><input type="text" name="usia" class="form-control" placeholder="usia"></div></td></tr>
<td>Pendidikan Terakhir</td><td><div class="col-sm-4">
													<select name="pendidikan" class="form-control">
														<option value="SMA Sederajat">SMA Sederajat</option>	
														
														<option value="Strata 1">Starata 1</option>	
													</select>			
													</div></td></tr>
<td>Jurusan</td><td><div class="col-sm-6"><textarea class="form-control" name="jurusan"></textarea></div></td></tr>
<td>Keterampilan</td><td><div class="col-sm-9">  
		<table cellpadding="5px">
			<tr>
				<td><input type="checkbox" name="ketmp1" value="Bahasa Inggris " > Bahasa Inggris</td>
		 		<td><input type="checkbox" name="ketmp2" value="Bahasa Mandarin " > Bahasa Mandarin</td>
		 	</tr>
		 	<tr>
		 		<td><input type="checkbox" name="ketmp3" value="Komputer "> Komputer</td>
				<td><input type="text" name="ketmp4" placeholder="lainnya"></td>
			</tr>
		</table></div></td></tr>
<td>Kemampuan Yang Diharapkan</td><td><div class="col-sm-10">  
			<table>
				<tr>
						<td><input type="checkbox" name="kemp1" value="Kecerdasa ">Kecerdasan</td>
						<td><input type="checkbox" name="kemp2" value="Daya Tangkap "> Daya Tangkap</td>
						<td><input type="checkbox" name="kemp3" value="Kemampuan Berhitung ">kemampuan Berhitung</td>
				</tr>
				<tr>
						<td><input type="checkbox" name="kemp4" value="Motivasi Kerja ">Motivasi Kerja</td>
						<td><input type="checkbox" name="kemp5" value="Ketelitian Kerja ">Ketelitian Kerja</td>
						<td><input type="checkbox" name="kemp6" value="Inisiatif ">Inisiatif</td>
				</tr>
				<tr>
						<td><input type="checkbox" name="kemp7" value="Relasi Sosial ">Relasi Sosial</td>
						<td><input type="checkbox" name="kemp7" value="Komunikasi ">Komunikasi</td>
				  	 	<td><input type="text" name="kemp8" placeholder="lainnya "></td>
				</tr>
			</table></div></td></tr>
<td>Keterangan</td><td><div class="col-sm-6"><textarea class="form-control" name="keterangan"></textarea></div></td></tr>


	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Simpan Data</button></td></tr>
	</table>
</body>
</html>
