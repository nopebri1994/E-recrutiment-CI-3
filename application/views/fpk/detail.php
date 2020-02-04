<h3>Detail FPK</h3>
<hr>
<table class="table table-bordered">
	<tbody>
		<tr>
				<td width="200">Nomor FPK</td><td><?php echo $fpk['no_fpk'];?></td>
		</tr>
		<tr>
				<td>Bagian</td><td><?php echo $fpk['Bagian'];?></td>
		</tr>
		<tr>
				<td>Jumlah</td><td><?php echo $fpk['total'];?></td>
		</tr>
	</tbody>
</table>

<table class="table table-striped table-bordered data">
<thead>
<tr align="center"><th>No</th>
<th>Nama</th>
<th>Umur</th>
<th>Tinggi</th>
<th>Pendidikan</th>
<th>Jurusan</th>
<th>Jabatan</th></tr>
</thead>
<tbody>
<?php
$no=1;
	foreach($detail->result() as $r)
	{
		
echo "<tr><td>$no</td>
		  
	
		  <td>$r->nama</td>
			  <td>$r->umur</td>
			  	  <td>$r->tinggi</td>	 
			  	   <td>$r->nama_pendidikan</td>
			  	   	   <td>$r->jurusan</td>	  
			  	   	     <td>$r->jabatan</td>";	 

	

echo "</td></tr>";		  
$no++;
	}
?>
</tbody>
</table>
