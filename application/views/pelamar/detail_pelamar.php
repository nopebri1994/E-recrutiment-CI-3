<hr>
<?php echo $this->session->flashdata('notif');?>
<div class="col-md-7">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
         Detail Data Lamaran ||
          <?php
            if($this->session->userdata['nik']==$record['nik']){
            echo anchor('pelamar/edit_data/'.$record['id_pelamar'],'Update Data',array('class'=>'btn btn-primary btn-sm'));
          ?>
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
	<td>Tanggal lahir</td><td>:</td><td><?php echo date("d-m-Y",strtotime($date_ubah)); ?></td>
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
	<td>Tinggi</td><td>:</td><td><?php echo $record['tinggi']; ?></td>
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
  <?php
    $cek=0;
      foreach($jadwal->result() as $j){
        $cek=1;
        $jadwal=$j->tanggal;
      }
      
      $date_change=$jadwal;

      if($cek==1){
        echo "<tr><td colspan=3><font color='red'>
              Dengan Hormat, Berdasarkan hasil seleksi berkas dan ujian online. Saudara diharapkan kedatangannya untuk pelaksanaan tes tahap ke-2 dan wawancara pada tanggal <b>";
        echo date("d-m-Y",strtotime($date_change));   
        echo "</b> di PT. Lion Metal Works Tbk. Purwakarta Pukul 09.00 WIB. HR Training dan Personalia.</font></td></tr>";
      }
  ?>

</table>
</div>
</div>
</div>
<div class="col-md-5">
    <!-- start: DYNAMIC TABLE PANEL -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class=""></i> Data Lampiran | | Pastikan data lampiran anda benar 
            <div class="panel-tools">
                
          
            </div>
        </div>
        <div class="panel-body">
            <div id="tabel">
          <table class="table table-bordered">
          <?php $d=$lampiran['foto']; ?></td>
           <tr>
            <td align="center"><img src="<?php echo base_url()?>upload_lampiran/<?php echo $d;?>" width="100" height="150"></td>
            <td><a href="<?php echo base_url()?>upload_lampiran/<?php echo $lampiran['lampiran']; ?>"><?php echo $lampiran['lampiran']; ?></a></td>
          </tr>
          </table>
          <?php if($lampiran['lampiran']==''){

            ?>
             <a href="http://localhost/hc/lampiran"Class="btn btn-danger btn-sm">Upload Data</a> | |
             <?php }?>
          <a Class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-data">Update Foto</a> | |
           <a Class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-lampiran">Update lampiran</a>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
<?php } else{

echo anchor('pelamar/input_data/','Input Data',array('class'=>'btn btn-primary btn-sm'));
}?>

<!-- Modal edit lampiran -->
  <div class="modal fade" id="edit-data" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update foto</h4>
        </div>
        <div class="modal-body">
<?php echo form_open_multipart('lampiran/update_data'); ?>  
        <table class="table">
          <tr>
            <td>Upload Foto</td><td><input type="file" name="foto"></td>
          </tr>
       
        </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
          <?php echo form_close(); ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!-- end -->
<!-- Modal edit lampiran -->
  <div class="modal fade" id="edit-lampiran" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update lampiran</h4>
        </div>
        <div class="modal-body">
<?php echo form_open_multipart('lampiran/update_data_lamp'); ?>  
        <table class="table">
          <tr>
            <td>Upload lampiran</td><td><input type="file" name="pdf"></td>
          </tr>
       
        </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
          <?php echo form_close(); ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!-- end -->
  <script type="text/javascript">

  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>