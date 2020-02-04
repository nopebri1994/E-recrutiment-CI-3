<hr>
<?php echo $this->session->flashdata('notif');?>
<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">       
   
      <div class="navbar-right">
      
      </div>
    </div>
    <div class="panel-body">
    <p>Silahkan Untuk mengikuti ujian</p> 
    <p>Jika Belum mengikuti ujian silahkan klik tombol soal dibawah </p>
    <?php echo form_open('ujian_online/mulai');
    foreach($soal->result() as $s) {   
  ?>               
         <button class="btn btn-success btn-sm"  name="submit" align="right" type="submit" value="<?php echo $s->id_soal ?>"><?php echo $s->nama_soal ;?>
         </button>
    <?php  } echo form_close();?>

    </div>
    </div>
    </div>

<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">Hasil Soal Ujian        
         <div class="navbar-right">
      </div>
    </div>
    <div class="panel-body">
    <table class="table table-bordered table-striped data">
    	<thead>
         		<tr>
    			<th>No</th>
    			<th>Nama Tes</th>
    			<th>Jumlah Soal</th>
    			<th>Waktu</th>
    			<th>Nilai</th>
        		</tr>
    	</thead>
    	<tbody>
           <?php
             $no=1;
            foreach($hasil->result() as $h) {
                ?>
        		<tr>
    			<td><?php echo $no; ?></td>
    			<td><?php echo $h->nama_soal; ?></td>
    			<td><?php echo $h->jumlah_soal; ?></td>
    			<td><?php echo $h->waktu; ?> Menit</td>
    			<td><?php echo $h->nilai; ?></td>
    			    		</tr>
            <?php $no++; } ?>
    	</tbody>
    </table>
    </div>
    </div>
    </div>
      <script type="text/javascript">

  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
  