<html>
<head>
	<title>Form Login</title>
	<style type="text/css">
	.msg{
		color: #f00;
	}
	</style>
	<script type="text/javascript">
	$('document').ready(function(){	
			$('.msg').hide();
			
			$('input').each(function(){
				var aktif = $(this);
				var min = parseInt(aktif.attr('min'));
				var max = parseInt(aktif.attr('max'));
				var kirim = true;
				
				aktif.keyup(function(){
					$(this).removeClass('error').next().fadeOut();
					kirim = true;
				});
				
				
				function cekValid1(isi){
				//Cek kekosongan
					if(aktif.hasClass('required') && isi == ""){
						aktif.addClass('error').next().text("Field ini harus diisi").fadeIn();
						kirim = false;
					
					}
				}
				
				
				aktif.focusout(function(){
					cekValid1($(this).val());
					$('.error:first').focus();									
				});
				
			
				
				$('#form').submit(function(){
					cekValid1(aktif.val());
					
					$('.error:first').focus();
					if(kirim){
						return true;
					}else{
						return false;
					}
				});
			});	
	});
</script>
</head>
<body>

<?php 
echo form_open('auth/login',"id='form'");
?>
<?php echo $this->session->flashdata('notif');?>

<table class="table table-bordered" width="20px">
<tr><td width="160">Username</td><td><div class="col-sm-4"><input type="text" name="user" placeholder="Username" class="form-control required"><span class="msg"></span></div></td></tr>
<tr><td>Password</td><td><div class="col-sm-4"><input type="password" name="pass" placeholder="Password" class="form-control required"><span class="msg"></span></div></td></tr>
	<tr><td colspan="2"><button type="submit" name="submit" class="btn btn-danger" value="kirim">Login</button>
	<button type="reset" name="submit" class="btn btn-primary">Reset</button>
	Anda Belum Registrasi ? registrasi <a href='<?php echo base_url()?>regist'>disini</a></td></tr>
	</table>
	<table class="table table-bordered">
	<tr>
		<td>
			<ul>
				<li>Pastikan Umur anda Dibawah 23 Tahun</li>
				<li>Tinggi Badan diatas 163 cm </li>
				
			</ul>
			<hr>
			<ul>
					<div>>>>><b>Tahapan sistem informasi E-Recruitment</b><<<<<</div>
				
				<li>Pelamar terlebih dahulu registrasi agar dapat login ke dalam sistem</li>
				<li>Pelamar mengisi biodata secara lengkap pada submenu lihat biodata pelamar</li>
				<li>Pelamar melampirkan data pelamar seperti foto, dan file berupa pdf tentang  CV pelamar</li>
				<li>Pelamar mengikuti Test online yang telah disediakan oleh sistem</li>
				<li>Jika pelamr lolos, maka akan dihubungi melalui email atau Telpon</li>
				<li>Pengumuman akan dilakukan setiap awal bulan</li>	
			</ul>
			Info : HRD@lionmetal.co.id
		</td>
	</tr>
	<tr>
		<td>
			<marquee behavior="alternate">Sistem Informasi E-Recruitment PT Lion Metal Works Tbk Purwakarta</marquee>
			 
		</td>
	</tr>	
	</table>
</body>
<script type="text/javascript">

	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
</html>
