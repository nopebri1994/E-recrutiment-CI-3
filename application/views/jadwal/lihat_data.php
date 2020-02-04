<h3>Data Jadwal</h3>
<?php 
echo form_open('jadwal/input_data');
?>
<table class="table table-bordered table-striped"><tr>

<td width="100">Tanggal Tes</td><td width="900"><div class="col-sm-5"><input type="text" name="tgl" placeholder="yyyy-mm-dd" 
class="form-control datepicker" id="datepicker"></div></td>
	<td colspan="2"><button type="submit" name="submit" class="btn btn-danger btn-sm">Tambah Data</button></td></tr>
	</table>
<hr>
<table class="table table-bordered table-striped data"><thead>
<tr><th width="50">No</th><th width="150">Kode jadwal</th><th width="600">Tanggal tes</th><th>Proses</th></tr></thead>
<tbody>
<?php
$no=1;
	foreach($record->result() as $r)
	{
echo "<tr><td>$no</td>
		  <td>$r->id_jadwal</td>
		  <td>$r->tanggal</td><td>";
echo anchor('jadwal/hapus/'.$r->id_jadwal,'Hapus',array('class'=>'btn btn-default btn-sm'));
echo anchor('jadwal/edit_data/'.$r->id_jadwal,'Edit',array('class'=>'btn btn-default btn-sm'));
echo "</td></tr>";
$no++;
	}
?>
</tbody>
</table>
