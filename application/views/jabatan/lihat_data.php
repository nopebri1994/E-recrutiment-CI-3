<body>
<h3 align="center">Data Jabatan Yang Dilamar</h3>
<?php 
echo form_open('jabatan/input_data');


?>
<div class="container">
<table class="table table-striped table-bordered"><tr>

<td width="100">Jabatan</td><td width="900"><div class="col-sm-5"><input type="text" name="jabatan" placeholder="Jabatan" class="form-control"></div></td>
<td colspan="2"><button type="submit" name="submit" class="btn btn-danger btn-sm">Tambah Data</button></td></tr>
	</table>
	</div>

<div class="container">
<hr>
<?php echo $this->session->flashdata('notif');?>
<table class="table table-striped table-bordered data">
<thead>
<tr><th width="50">No</th><th width="150">Kode Jabatan</th><th width="900">Nama Jabatan</th><th colspan="2">Proses</th></tr>
</thead>
<tbody>
<?php
$no=1;
	foreach($record->result() as $r)
	{
?>
		  <tr><td><?php echo $no ?></td>
		  <td><?php echo $r->id_jabatan ?></td>
		  <td><?php echo $r->jabatan ?></td><td alibn="center">
<?php echo anchor('jabatan/hapus/'.$r->id_jabatan,' ',array('class'=>'fa fa-trash-o')); ?></td><td>

<?php echo anchor('jabatan/edit_data/'.$r->id_jabatan,' ',array('class'=>'fa fa-pencil-square-o'));?>
</td></tr>
<?php		  
$no++;
	}
?>
</tbody>
</table>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});

	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
