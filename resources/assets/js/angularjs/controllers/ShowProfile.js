app.controller('ShowProfile', function($scope, UserService, $routeParams) {
    $scope.title = "My Profile";
    $scope.user = UserService.get({id:$routeParams.id});
});
