var app = angular.module('UserList', ['ui.bootstrap']).config(function($sceProvider) {
	$sceProvider.enabled(false);
});

app.controller('ListCtrl', function($scope, $http) {
	$scope.users = [];
	$scope.sortBy = 'id';
	$scope.sortOrder = 'asc';

  $scope.page = 0;
	$scope.maxSize = 6;
  $scope.items = null;
	$scope.perPage = null;

	$scope.getUsers = function() {
		var params = {
			'page': $scope.page,
			'count': $scope.perPage,
			'sortBy': $scope.sortBy,
			'sortOrder': $scope.sortOrder
		};

		$http.get('/users', { params: params }).success(function(response) {
			$scope.users = response.data;
			$scope.items = response.total;
			$scope.perPage = response.per_page;
		});
	};

	$scope.pageChanged = function() {
		$scope.getUsers();
	};

	$scope.order = function(attribute) {
		$scope.sortOrder = $scope.sortOrder == 'asc' ? 'desc' : 'asc';
		$scope.sortBy = attribute;
		$scope.getUsers();
	};

	$scope.getUsers();

});