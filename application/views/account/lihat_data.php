<html>
	<head>
		<title>Lihat data Pengguna</title>
	</head>
<body>
	<h3>Data Pengguna Sistem</h3>
	<?php
echo anchor('account/input_data','Tambah Data',array('class'=>'btn btn-primary btn-sm'));
?>
<hr>
<table class="table table-stripped table-bordered data">
	<thead>
			<tr>
				<th>No</th>
				<th>Nama User</th>
				<th>username</th>
				<th>Password</th>
				<th>Level</th>
			
				<th>Last Login</th>
			</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			foreach($account->result() as $ac){
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $ac->nama;?></td>
			<td><?php echo $ac->user;?></td>
			<td><?php echo $ac->password;?></td>
				<?php
					if($ac->level=='1'){
						$level='admin';
					}elseif($ac->level=='2'){
						$level='Staff';
					}else{
						$level="user";
					}
				?>
			<td><?php echo $level; ?></td>
			
			<td><?php echo $ac->last_login;?></td>
		</tr>
		<?php $no++; } ?>	
	</tbody>
</table>


