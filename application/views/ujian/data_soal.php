<hr>
<div class="col-md-3">
  <div class="panel panel-info">
    <div class="panel-heading">Data Soal       
   
      <div class="navbar-right">
       <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#input-data" align="right">Tambah Data</a>
      </div>
    </div>
    <div class="panel-body">


      <table class="table table-bordered">
           <tr><td>Nama Soal</td><td> <select name="nama_soal" class="form-control" onchange="filterData()" id="soal">
                  <option>Pilih Soal</option>
                  <?php foreach($soal->result() as $s){ ?>
                  <option value="<?php echo $s->id_soal; ?>"><?php echo $s->nama_soal; ?></option>
                  <?php } ?>
            </select></td></tr>
        </table>
        <div id="tabelsoal"></div>
      </div>
    </div>
  </div>


<div class="  col-md-9  ">
<div class="panel panel-info">
    <div class="panel-heading">Isi Soal     
   
      <div class="navbar-right">
       <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#input-isi-soal" align="right">Tambah Data</a>
      </div>
    </div>
    <div class="panel-body">
<div id="tabelisi"></div>  
      </div>
    </div>
  </div>


</div>

  <!-- Modal input nama soal -->
  <div class="modal fade" id="input-data" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Input Nama Soal</h4>
        </div>
        <div class="modal-body">
<?php echo form_open('Ujian_online/add_soal'); ?>  
        <table class="table">

          <tr>
        <td> Nama Soal</td>
            <td><input type="text" name="nama" class="form-control"></td>
          </tr>
         <tr>
        <td> Waktu</td>
            <td><input type="text" name="waktu" class="form-control" placeholder="Menit"></td>
          </tr>
            <td> Jumlah Soal</td>
            <td><input type="text" name="jml" class="form-control"></td>
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
<!-- Modal input isi soal -->
  <div class="modal fade" id="input-isi-soal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Input Isi Soal</h4>
        </div>
        <div class="modal-body">
<?php echo form_open_multipart('Ujian_online/add_soal_isi'); ?>  
        <table class="table">
          <tr>
            <td>Nama Soal</td><td><select name="id_soal" class="form-control">
                  <?php foreach($soal->result() as $s){ ?>
                  <option value="<?php echo $s->id_soal; ?>"><?php echo $s->nama_soal; ?></option>
                  <?php } ?>
            </select></td>
          </tr>
          <tr>
            <td>Gambar</td><td><input type="file" name="gambar"class="form-control"></td>
          </tr>
        <tr>
            <td>Soal</td><td><textarea class="form-control" name="soal"></textarea></td>
        </tr>
        <tr>
            <td>Opsi A</td><td><input type="text" name="a"class="form-control"></td>
        </tr>
         <tr>
            <td>Opsi B</td><td><input type="text" name="b"class="form-control"></td>
        </tr>
         <tr>
            <td>Opsi C</td><td><input type="text" name="c"class="form-control"></td>
        </tr>
         <tr>
            <td>Opsi D</td><td><input type="text" name="d"class="form-control"></td>
        </tr>
         <tr>
            <td>Opsi E</td><td><input type="text" name="e"class="form-control"></td>
        </tr>
          <tr>
            <td>Jawaban</td><td><input type="text" name="jwb"class="form-control"></td>
        </tr>
        </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" name="submit">Simpan</button>
          <?php echo form_close(); ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    </div>
<!--end-->
     <div class="modal fade" id="edit-data" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Isi Soal</h4>
        </div>
        <div class="modal-body">
<?php echo form_open_multipart('Ujian_online/update_soal_isi'); ?>  
        <table class="table">
              <input type="hidden" name="id" id="id">      
                 <input type="hidden" name="id_soal" id="id_soal">      
          <tr>
            <td>Gambar</td><td><input type="file" name="gambar"class="form-control" id=""></td>
            <input type="hidden" name="gambar_lama" id="gambar">
          </tr>
        <tr>
            <td>Soal</td><td><textarea class="form-control" name="soal" id="soal"></textarea></td>
        </tr>
        <tr>
            <td>Opsi A</td><td><input type="text" name="a"class="form-control" id="opsi_a"></td>
        </tr>
         <tr>
            <td>Opsi B</td><td><input type="text" name="b"class="form-control" id="opsi_b"></td>
        </tr>
         <tr>
            <td>Opsi C</td><td><input type="text" name="c"class="form-control" id="opsi_c"></td>
        </tr>
         <tr>
            <td>Opsi D</td><td><input type="text" name="d"class="form-control" id="opsi_d"></td>
        </tr>
         <tr>
            <td>Opsi E</td><td><input type="text" name="e"class="form-control" id="opsi_e"></td>
        </tr>
          <tr>
            <td>Jawaban</td><td><input type="text" name="jwb"class="form-control" id="jawaban"></td>
        </tr>
        </table>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" name="submit">Simpan</button>
          <?php echo form_close(); ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>


  </div>
  </div>

  <div class="modal fade" id="delete-data" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Isi Soal</h4>
        </div>
        <div class="modal-body">
      <?php echo form_open('Ujian_online/hapus_isi'); ?>  
      <table align="center"><tr><td colspan="2">
        Apakah data akan dihapus ??
      </td></tr>
      <tr><td>
      <input type="hidden" name="id" id="id">
      <button type="submit" class="btn btn-danger" name="submit">Delete</button>
          <?php echo form_close(); ?></td><td>
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button></td></tr></table>
        </div>
      </div>
      
    </div>


  </div>
  </div>

  <script type="text/javascript">
  $(document).ready (function(){
   loadDatasoal();
    loadDataisi();
  });


  function loadDatasoal(){
     var soal=$("#soal").val();
    $.ajax({
      type:'GET',
      url :'<?php echo base_url()?>Ujian_online/detailsoal',
      data :'soal='+soal,
      success:function(html){
        $("#tabelsoal").html(html);
      }

    })
  }

  function loadDataisi(){
     var soal=$("#soal").val();
    $.ajax({
      type:'GET',
      url :'<?php echo base_url()?>Ujian_online/detailisi',
      data :'soal='+soal,
      success:function(html){
        $("#tabelisi").html(html);
      }

    })
  }

  function filterData(){
    loadDataisi();
    loadDatasoal();
  }
  </script>
  <script type="text/javascript">
   $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#soal').html(div.data('soal'));
            modal.find('#jawaban').attr("value",div.data('jawaban'));
            modal.find('#opsi_a').attr("value",div.data('opsi_a'));
            modal.find('#opsi_b').attr("value",div.data('opsi_b'));
            modal.find('#opsi_c').attr("value",div.data('opsi_c'));
            modal.find('#id_soal').attr("value",div.data('id_soal'));
            modal.find('#opsi_d').attr("value",div.data('opsi_d'));
            modal.find('#opsi_e').attr("value",div.data('opsi_e'));
            modal.find('#gambar').attr("value",div.data('gambar'));
          
        });
    });

</script>
  <script type="text/javascript">
   $(document).ready(function() {
        // Untuk sunting
        $('#delete-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
         modal.find('#id').attr("value",div.data('id'));
           
          
        });
    });

</script>