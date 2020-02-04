<hr>
<div class="col-md-7">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
         Detail Data Lamaran ||
         
        </div>
        <div class="panel-body">
 

<table class="table">
<tr>
	<td>NIK</td><td>:</td><td><?php echo $record['nik']; ?></td>
</tr>
<tr>
	<td> Nama Lengkap</td><td>:</td><td> <?php echo $record['nama'];?></td>
</tr>
<tr>
	<td>Nomor Handphone</td><td>:</td><td><?php echo $record['no_hp']; ?></td>
</tr>
<tr>
	<td>Tempat Lahir</td><td>:</td><td><?php echo $record['tempat_lahir']; ?></td>
</tr>
<tr>
<?php
$date_ubah=$record['tanggal'];
?>
  <td>Tanggal lahir</td><td>:</td><td><?php   echo date("d-m-Y",strtotime($date_ubah)); ?></td>
</tr>
<tr>
  <?php 
  if($record['jk']=='L'){
    $jk='Laki-Laki';
  }else{
    $jk='perempuan';
  }
  ?>
	<td>Jenis Kelamin</td><td>:</td><td><?php echo $jk ?></td>
</tr>
<tr>
	<td>Tinggi</td><td>:</td><td><?php echo $record['tinggi']; ?> cm</td>
</tr>
<tr>
	<td>Pendidikan</td><td>:</td><td><?php echo $record['nama_pendidikan']; ?></td>
</tr>
<tr>
	<td>Jurusan</td><td>:</td><td><?php echo $record['jurusan']; ?></td>
</tr>
<tr>
	<td>Jabatan Yang Dilamar</td><td>:</td><td><?php echo $record['jabatan']; ?></td>
</tr>
<tr>
	<td>Alamat</td><td>:</td><td><textarea disabled class="form-control"><?php echo $record['alamat']; ?></textarea></td>
</tr>
<tr>
  <td>Status</td><td>:</td><td><?php echo $record['keterangan']; ?></td>
</tr>
</table>
</div>
</div>
</div>
<div class="col-md-5">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class=""></i> Data Lampiran
            <div class="panel-tools">
                
          
            </div>
        </div>
        <div class="panel-body">
            <div id="tabel">
          <table class="table table-bordered">
          <?php $d=$lampiran['foto']; ?></td>
          <tr>
          	<td align="center  "><img src="<?php echo base_url()?>upload_lampiran/<?php echo $d;?>" width="100" height="150"></td>
          	<td><a href="<?php echo base_url()?>upload_lampiran/<?php echo $lampiran['lampiran']; ?>"><?php echo $lampiran['lampiran']; ?></a></td>
          </tr>
          </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>

  <div class="panel panel-default">
        <div class="panel-heading">
            <i class=""></i> Hasil Ujian
            <div class="panel-tools">
                
          
            </div>
        </div>
        <div class="panel-body">
            <div id="tabel">
       <table class="table table-bordered table-striped">
            <tr>
              <th>No</th><th>Soal</th><th>Nilai</th>
            </tr>
            <?php
              $no=1;
              foreach($hasil->result() as $h){
           ?>
            <tr>
              <td><?php echo $no?></td>
              <td><?php echo $h->nama_soal;?></td>
              <td><?php echo $h->nilai;?></td>
            </tr>
            <?php 
            $no++;
          }
            ?>
        </table>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
