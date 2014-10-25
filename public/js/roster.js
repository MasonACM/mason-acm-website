var app = angular.module('Roster', []);

app.controller('RosterCtrl', function ($scope, $http, $filter) {
	var orderBy = $filter('orderBy');

	$scope.attendees = [];
	$scope.sortBy = 'id';
	$scope.reverse = true;
	$scope.attendeeData = {};
	$scope.attendeeQuery = null;
	$scope.partyId = $('#party-id').val();

	$scope.getAttendees = function() {
		$http.get('/lanparty/' + $scope.partyId + '/roster').success(function (response) {
			$scope.attendees = response;
			$scope.order($scope.sortBy, $scope.reverse);
		});
	};

	$scope.getAttendees();

	$scope.addAttendee = function() {
		$scope.attendeeData._token = csrf_token;
		$scope.attendeeData.lanparty_id = $scope.partyId;
		$scope.attendeeData.has_attended = true;

		$http.post('/lanparty/' + $scope.partyId + '/admin/roster/add', $scope.attendeeData)
			.success(function() {
				$scope.getAttendees();
				$scope.attendeeData.firstname = '';
				$scope.attendeeData.lastname = '';
				$scope.attendeeData.year = '';
			});
	};

	$scope.toggleAttendance = function(attendeeId) {
		$http.get('/lanparty/roster/attendee/' + attendeeId + '/toggle').success(function (response) {
			$scope.getAttendees();
		});
	};

	$scope.order = function(sortBy, reverse) {
		$scope.sortBy = (sortBy === undefined) ? $scope.sortBy : sortBy;
		$scope.reverse = (reverse === undefined) ? !$scope.reverse : reverse;
		$scope.attendees = orderBy($scope.attendees, $scope.sortBy, $scope.reverse);
	};

	$scope.filterAttendees = function(attendee) {
		if (!$scope.attendeeQuery) return true;
		var matches = true;
		var letters = String($scope.attendeeQuery.toLowerCase()).split('');
		var stringToMatch = (attendee.firstname + attendee.lastname + attendee.year).toLowerCase();

		for (var i = 0; i < letters.length; ++i) {
			if (stringToMatch.indexOf(letters[i]) == -1 && letters[i] != ' ') {
				matches = false;
			}
		}
		return matches;
	};
});