<?php echo form_open_multipart('lampiran/add'); ?>
<body>
<div class="cotainer">
<h3>Tambahkan Lampiran</h3> 
<?php echo $this->session->flashdata('notif');?>
<table class="table ">
<tr>
	<td>Upload Foto</td><td><input type="file" name="foto"></td>
</tr>
<tr>
	<td>Upload Lampiran</td><td><input type="file" name="pdf"></td>
</tr>
<tr>
	<td colspan="2" align="center"><button name="submit" class="btn btn-danger">Simpan</button></td>
</tr>
</table>
<ul>
	<li>Upload foto calon pelamar disini.</li>
	<li>Pastikan lampiran data anda dalam 1 file PDF</li>
</ul>
</div>
</body>
	<script type="text/javascript">

	$("#success-alert").fadeTo(2000, 1000).slideUp(1000, function(){
    $("#success-alert").slideUp(1000);
});
</script>