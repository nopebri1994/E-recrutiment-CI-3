<h3>Data Form Permintaan Karyawan</h3>
<?php
echo anchor('fpk/input_data','Tambah Data',array('class'=>'btn btn-primary btn-sm'));
?>
<hr>
<table class="table table-striped table-bordered data">
<thead>
<tr align="center"><th>No</th>
<th>No. FPK</th>
<th>Bagian</th>
<th>Total Permintaan</th>
<th>Tepenuhi</th>
<th>Outstanding</th>
<th>Proses</th></tr>
</thead>
<tbody>
<?php
$no=1;
	foreach($record->result() as $r)
	{
		$otd=$r->total-$r->terpenuhi;
echo "<tr><td>$no</td>
		  
	
		  <td>$r->no_fpk</td>
			  <td>$r->Bagian</td>
			  	  <td>$r->total</td>	 
			  	   <td>$r->terpenuhi</td>
			  	   	   <td>$otd</td>	  

		  <td>"	;
echo anchor('fpk/detail/'.$r->Id_fpk,' ',array('class'=>'fa fa-table'));
echo "</td></tr>";		  
$no++;
	}
?>
</tbody>
</table>
