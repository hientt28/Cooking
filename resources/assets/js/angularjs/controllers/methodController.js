app.controller('methodController', function($scope, $http, $location, API_URL ) {
    $http({
        method: 'GET',
        url: API_URL +'methods'
    }).then(function success(response) {
          $scope.methods = response;
    });
    
    $scope.save = function () {
    	var url = API_URL + 'methods';
		var data = $.param($scope.methods);

		$http({
			method : 'POST',
			url : url,
			data : JSON.stringify($scope.methods),
			headers : {'Content-Type':'application/x-www-form-urlencoded'}
		})
		.success(function (response) {
			console.log(response);
			location.reload();
		})
		.error(function (response) {
			console.log(response);
			alert('Xảy ra lỗi vui lòng kiểm tra log');
		});	
	}
    
});
