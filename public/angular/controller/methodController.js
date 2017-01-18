app.controller('methodController', function($scope, $http, API_URL) {
  // retrieve Supplier listing from API
    $http.get(API_URL + "methods")
   .success(function(response){
    $scope.methods = response;
  });

  // show modal Form
  $scope.toggle = function(modalstate, id) {
      $scope.modalstate = modalstate;
      switch(modalstate) {
        case 'add':
          $scope.form_title = "Add New Methods";
          break;
        case 'edit':
          $scope.form_title = "Methods Detail";
          $scope.id = id;
          $http.get(API_URL + 'methods/' + id).success(function(response){
            console.log(response);
            $scope.method = response;
          });
          break;
        default:
          break;
      }
      console.log(id);
      $('#myModal').modal('show');
  }

  // save new supplier and update existing method
  $scope.save = function(modalstate, id) {
    var url = API_URL + "methods";
    if (modalstate === 'edit') {
      url += "/" + id;
    }
    $http({
      method: 'POST',
      url: url,
      data: $.param($scope.method),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).success(function(response){
      console.log(response);
      location.reload();
    }).error(function(response){
      console.log(response);
      alert('This is embarassing. An error has occured. Please check the log for details');
    });
  }

 // delete method record
 $scope.confirmDelete = function(id) {
   var isConfirmDelete = confirm('Are you sure you want this record?');
   if (isConfirmDelete) {
     $http({
       method: 'DELETE',
       url: API_URL + 'methods/' + id
     }).success(function(data){
       console.log(data);
       location.reload();
     }).error(function(data){
       console.log(data);
       alert('Unable to delete');
     });
   } else {
     return false;
   }
 }
});
