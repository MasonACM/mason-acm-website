var app = angular.module('UserList', []).config(function($sceProvider) {
	$sceProvider.enabled(false);
})

app.controller('ListCtrl', function($scope, $http) {
	$scope.page = '1';
	$scope.users = [];
	$scope.count = 8;
	$scope.pages = null;
	$scope.sortBy = 'id';
	$scope.lastPage = null;
	$scope.paginator = null;
	$scope.sortOrder = 'asc';

	$scope.getUsers = function() {
		var params = {
			'page': $scope.page,
			'count': $scope.count,
			'sortBy': $scope.sortBy,
			'sortOrder': $scope.sortOrder
		};

		$http.get('/users', { params: params }).success(function(response) {
			$scope.paginator = response.paginator;
			$scope.lastPage = response.last_page;
			$scope.users = response.data;
		});
	};

	$scope.setPage = function(page) {
		$scope.page = page;
		$scope.getUsers();
	}

	$scope.nextPage = function() {
		if ($scope.page != $scope.lastPage) {
			$scope.setPage(++$scope.page);
		}
	};

	$scope.prevPage = function() {
		if ($scope.page != 1) {
			$scope.setPage(--$scope.page);
		}
	};

	$scope.order = function(attribute) {
		$scope.sortOrder = $scope.sortOrder == 'asc' ? 'desc' : 'asc';
		$scope.sortBy = attribute;
		$scope.getUsers();
	};

	for (var pageCount = 1; pageCount <= $scope.numPages; ++pageCount) {
		$scope.pages.push[i];
	}

	$scope.getUsers();

});