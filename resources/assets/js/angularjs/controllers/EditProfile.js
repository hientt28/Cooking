app.controller('EditProfile', function($scope, UserService, $routeParams, $location) {
    $scope.title = "Edit Profile";

    $scope.userCurr = UserService.get({id: $routeParams.id});
    $scope.errors = null;

    $scope.disable_submit = false;
});
