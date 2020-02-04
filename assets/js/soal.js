var soal = angular.module('soal',[]);

soal.controller('soalControlller', function($scope, $timeout){
$scope.detik ="<?php echo '2';?>";
console.log($scope.detik)
$scope.hitungmundur = function(){

	if($scope.detik > 0){
	$scope.detik--;
	waktu = $timeout($scope.hitungmundur, 1000);

}
};
var waktu = $timeout($scope.hitungmundur, 1000);	
});
soal.filter('hitung', function(){
	return function(detik){
		return new Date(1970, 0, 1).setSeconds(detik);
	}
});