var app = angular.module('Roster', []);

app.controller('RosterCtrl', function ($scope, $http, $filter) {
    var orderBy = $filter('orderBy');

    $scope.attendees = [];
	$scope.attendeeQuery = null;
    $scope.reverse = true;
    $scope.partyId = $('#party-id').val();
    $scope.baseUrl = '/lanparty/' + $scope.partyId + '/roster';
    $scope.attendeeData = {};

    $http.get($scope.baseUrl).success(function (response) {
        $scope.attendees = response;
    });

    $scope.addAttendee = function() {
		$scope.attendeeData._token = csrf_token;
		$scope.attendeeData.lanparty_id = $scope.partyId;
        $http.post($scope.baseUrl + '/add', $scope.attendeeData)
            .success(function() {
                $scope.attendees.push($scope.attendeeData);
                $scope.attendeeData.firstname = '';
                $scope.attendeeData.lastname = '';
                $scope.attendeeData.grad_year = '';
            });
    };

    $scope.order = function(predicate) {
        $scope.reverse = !$scope.reverse;
        $scope.attendees = orderBy($scope.attendees, predicate, $scope.reverse);
    };

	$scope.filterAttendees = function(attendee) {
		if (!$scope.attendeeQuery) return true;
		var matches = true;
		var letters = String($scope.attendeeQuery).split('');
		var stringToMatch = attendee.firstname + attendee.lastname + attendee.grad_year;

		for (var i = 0; i < letters.length; ++i) {
			if (stringToMatch.indexOf(letters[i]) == -1 && letters[i] != ' ') {
				matches = false;
			}
		}
		return matches;
	};
});