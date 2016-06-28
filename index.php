<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>    
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
</head>
<body ng-app='httpExample'>
	<div ng-controller="PersonsCtrl">
		<div>
			<ul >
				<li ng-repeat="per in persons">
					<div> nombre : {{ per.nombre }} , ciudad {{ per.ciudad }} </div>
				</li>
			</ul>
		</div>
	</div>
	<script>
		var app = angular.module('httpExample', []);
		app.controller('PersonsCtrl', function($scope, personService){

			personService.getPersons().then(function(response){
				$scope.persons = response.data;
			});
		});

		app.factory('personService', function($http) {

			var getPersons = function() {
				return $http.get('/api/persona.php');
			};

			return {
				getPersons : getPersons
			};
		});
	</script>
</body>
</html>