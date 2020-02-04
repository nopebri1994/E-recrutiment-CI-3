<h4 align="center" class="jumbotron"><p>Selamat Datang DI Halaman Utama </p>
		PT. Lion Metal Works Tbk Purwakarta</h4>
<?php echo $this->session->flashdata('notif');?>
<table class="table table-bordered">
	<tr>
		<td align="center" width="50%">
		Daftar Lowongan Pekerjaan
		</td>
		<td align="center">
		Papan Informasi
		</td>
	</tr>
	<tr>
		<td>
			<?php 
				foreach ($record->result() as $r) {
			?>
			<table width="100%">
				<tr>
					<td align="center">
						-->>Dibutuhkan <b><?php echo $r->jabatan;?></b> <?php echo $r->Bagian;?><<--
					</td>
				</tr>
				<tr>
					<td>
					<?php
						 $jml=$r->total-$r->terpenuhi;
					?>
					<ul>
						<li> Jumlah <?php echo $jml;?> Orang</li>
			
						<li> Usia Maximal <?php echo $r->usia;?> Tahun</li>
				
					<?php if($r->jenis_kelamin=='L'){
						$j='Laki-Laki';
					}else{
						$j='Perempuan';
					}
						?>
						<li> Jenis Kelamin <?php echo $j ;?></li>
				
						<li> Pendidikan terakhir <?php echo $r->pendidikan;?></li>
				
						<li> Jurusan <?php echo $r->jurusan;?></li>
				
						<li> Keterampilan (<?php echo $r->ket_bahasa;?>.)</li>
				
						<li> Kemampuan yang diharapkan (<?php echo $r->kemampuan;?>.)</li>
					</td>
				</tr>
			</ul>
			</table>	
			<hr>	
			<?php } ?>
		</td>
		<td>
				<?php 
					foreach($info->result() as $in){
				?>
				<table>
					<tr>
						<td>
						<ul>
							<li><?php echo $in->info?></li>
						</ul>	
						</td>
					</tr>
				</table>
				<hr>
				<?php
					}
				?>
		</td>
	</tr>
	
	</table>
	<script type="text/javascript">

	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>