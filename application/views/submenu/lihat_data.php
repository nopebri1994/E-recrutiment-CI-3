<html>
<head>

</head>
<body>
<div class="container">
<h3>List sub menu</h3>

<?php
echo anchor('submenu/input_data','Tambah Data',array('class'=>'btn btn-primary btn-sm'));
?>
<hr>
	
</div>

<div class="container">

<table class="table table-striped table-bordered data">
<thead>	
<tr><th>No</th>
<th>Nama Submenu</th>	
<th>Nama Main Menu</th>
<th>Icon</th>

<th>aktif / tidak aktif</th>
<th>Link</th>
<th>level</th>

<th></th></tr>
</thead>
<tbody>
<?php
$no=1;
foreach($record->result() as $r )
{
?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $r->nama_submenu ?></td>
		<td><?php echo $r->nama_mainmenu ?></td>
		<td><?php echo $r->link ?></td>
		<td><?php echo $r->aktif ?></td>
		<td><?php echo $r->icon ?></td>
		<?php 
				if($r->level ==1){
					$level='admin';
				}
					elseif($r->level==2){
						$level='Staff HRD';
					}else{
						$level='user';
					}

			?>
		<td><?php echo $level; ?></td>
		<td></td>
	</tr>

<?php $no++; } ?>
</tbody>
</table>
</div>
</body>
</html>
