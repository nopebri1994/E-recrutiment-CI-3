<?php   echo form_open('Ujian_online/add_data', "id='myform'"); ?>
<hr> 
<div class="col-md-12" ng-app="soal" ng-controller="soalControlller">
  <div class="panel panel-warning">
    <div class="panel-heading">
<h4 >Waktu : {{ detik | hitungg | date:'mm:ss' }}</h4>
    </div>  
<div class="col-md-12">
<table class="table">
<?php $no=1; 
foreach($soal->result() as $s){ ?>
  <tr ng-show="nomor == '<?php echo $no ?>'">
    <td colspan="2"><?php echo $no ?>.</td><td><?php echo $s->soal; ?>
    <?php if($s->gambar!=''){?>
    <img src="<?php echo base_url()?>upload_soal/<?php echo $s->gambar ?>" width="250" height="180" class="img-rounded">

    <?php } ?>
    </td>
    

    <td width="40%"><div class="radio" >
            <label>
                A. <input type="radio" name="<?php echo $s->id_isi_soal;?>"  ng-click="next()"value="A">
                 <?php echo $s->opsi_a;?>
               </label>
        </div>
        <div class="radio">
               <label>
                B. <input type="radio" name="<?php echo $s->id_isi_soal;?>" ng-click="next()"  value="B">
                <?php echo $s->opsi_b;?>
               </label>
        </div>
        <div class="radio">
               <label>
                C. <input type="radio" name="<?php echo $s->id_isi_soal;?>" ng-click="next()" value="C">
                 <?php echo $s->opsi_c;?>
               </label>
        </div>
        <div class="radio">
               <label>
                D. <input type="radio" name="<?php echo $s->id_isi_soal;?>" ng-click="next()"  value="D">
                <?php echo $s->opsi_d;?>
               </label>
        </div>
        <div class="radio">
               <label>
                E. <input type="radio" name="<?php echo $s->id_isi_soal;?>" ng-click="next()" value="E">
                 <?php echo $s->opsi_e;?>
               </label>
        </div>
  </td>
  </tr>
  <input type="hidden" name="id_soal" value="<?php echo $s->id_soal; ?>">
<?php $no++; } ?>
</table>

<button ng-show="nomor == max" type="submit" name="submit" class="btn btn-danger" id="submit">Simpan</button>
<hr>
<?php echo form_close();?>
</div>
<?php 
  for($i=1;$i<=$time['jumlah_soal'];$i++){
  $array_soal[]=$i;
}    

///  echo "<div align='center'>";
  //foreach($array_soal as $v){
   // echo "<a class='btn btn-info btn-sm' ng-click='gantiSoal($v)'>$v</a> ";
    //}
    //echo "</div>";
?>
<div align="center">
<a class="btn btn-info btn-sm" ng-click="gantiSoal(nomor - 1)">Kembali</a>
<a ng-repeat="a in list" class="btn btn-info btn-sm" ng-class="{true:'hidden', false:'','':''}[a < start || a  > finish]" ng-click="gantiSoal(a)" >{{a}}</a>
<a class="btn btn-info btn-sm" ng-click="gantiSoal(nomor + 1)">Selanjutnya</a>

<script type="text/javascript">
var soal = angular.module('soal',[]);
soal.controller('soalControlller', function($scope, $timeout){
$scope.menit='<?php echo $time['waktu']; ?>';
$scope.detik =$scope.menit * 60;
	$scope.hitungmundur = function(){
	  if($scope.detik > 0){
	  $scope.detik--;
	  waktu = $timeout($scope.hitungmundur, 1000);
	}else{
	  $("#submit").click()
	}
};
var waktu = $timeout($scope.hitungmundur, 1000);  
$scope.nomor = 1;
$scope.max = '<?php echo $time['jumlah_soal']; ?>';
$scope.start = 1;
$scope.finish = 5;
$scope.gantiSoal =  function(x){
  if(x < 1){
    $scope.nomor = 1;
    $scope.start = 1;
    $scope.finis = start + 4;
  }else if(x > $scope.max){
    $scope.nomor = $scope.max;
    $scope.start = $scope.nomor - 3;
    $scope.finish = $scope.max;
  }else{
    $scope.nomor = x;
    if($scope.nomor - 3 < 1){
      $scope.start = 1;
    }else{
      $scope.start = $scope.nomor - 3;
    }
    $scope.finish = $scope.start + 4;

  }

  console.log($scope.nomor);
}
$scope.list = [];
$scope.isiList = function(){
  for(var i = 0 ; i < $scope.max; i++){
    $scope.list.push(i);
  }
}
$scope.isiList();
$scope.next = function(){
  if($scope.nomor < $scope.max){
    $scope.nomor += 1;
  }

}

});
soal.filter('hitungg', function(){
  return function(detik){
    return new Date(1970, 0, 1).setSeconds(detik);
  }
});
soal.filter('pagging', function(){
  return function(input,page,totalpage){
    var x = parseInt(page);
    var y = 5;
    var z = x % y;
    var w = x - z;
    var q = w / y;
    var r = y * q + 1;
    var max = parseInt(totalpage);
    var t = w + 5;
    if(t > max){
      t = max;
    }
    for(var i=r; i<=t; i++){
      input.push(i);

      return input;
     }
    }
});
</script>

