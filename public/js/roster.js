function RosterCtrl($scope, $http, $filter) {
    var orderBy = $filter('orderBy');

    $scope.attendees = [];
    $scope.reverse = true;
    $scope.partyId = $('#party-id').val();
    $scope.baseUrl = '/lanparty/' + $scope.partyId + '/roster';
    $scope.attendeeData = {};

    $http.get($scope.baseUrl).success(function (response) {
        $scope.attendees = response;
    });

    $scope.addAttendee = function() {
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
}