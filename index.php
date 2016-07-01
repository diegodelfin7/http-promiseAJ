<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title> 
	<link rel="stylesheet" href="bower_components/angular-spinkit/build/angular-spinkit.min.css" /> 
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="bower_components/angular-spinkit/build/angular-spinkit.min.js"></script>  
</head>
<body ng-app='httpExample'>
	<div ng-controller="PersonsCtrl">

		<!-- click ajax loader spinkit -->

		<button ng-click="sendAjax();">Send Data</button>
		<div  style="background-color: #23b7e5;" ng-show="loader" >
			<rotating-plane-spinner></rotating-plane-spinner>
			<circle-spinner></circle-spinner>
			<cube-grid-spinner></cube-grid-spinner>
		</div>
		
		<div ng-hide="true">
			<div>Mostrar
				<button ng-click="loaderFn();">
					Click loader
				</button>
				<div ng-show="State_loader">
					<circle-spinner></circle-spinner>
				</div>
			</div>
			<div>
				<ul >
					<li ng-repeat="per in persons">
						<div> nombre : {{ per.nombre }} , ciudad {{ per.ciudad }} </div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<script>
		var app = angular.module('httpExample', ['angular-spinkit']);
		app.controller('PersonsCtrl', function($scope, personService){
			
			$scope.loader = false ;
			$scope.sendAjax = function () {
				$scope.loader  = true ;
				personService.getPersons().then(function(response){
					console.log('data', response);
					$scope.persons = response.data;
					$scope.loader = false ;
				}, function (error) {
					console.log('data error', error);
					$scope.loader = false ;
				});
			};




			/*
				$scope.State_loader = false;

				$scope.loaderFn = function () {
					$scope.State_loader = true ;
				};

				personService.getPersons().then(function(response){
					$scope.persons = response.data;
				});
			*/
		});

		app.factory('personService', function($http) {

			var getPersons = function() {
				return $http.get('https://randomuser.me/api/');
			};

			return {
				getPersons : getPersons
			};
		});
	</script>
</body>
</html>