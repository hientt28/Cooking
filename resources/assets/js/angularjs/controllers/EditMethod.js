app.controller('EditMethod', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + "methods")
            .then(function success(response) {
                $scope.methods = response;
            });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Method";
                break;
            case 'edit':
                $scope.form_title = "Method Detail";
                $scope.id = id;
                $http.get(API_URL + 'methods/' + id)
                        .then(function success(response) {
                            console.log(response);
                            $scope.method = response;
                        });
                break;
            default:
                break;
        }
        console.log(modalstate, id);
        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id, file) {
        var url = API_URL + "/methods";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        // file.upload = Upload.upload({
        //     url: url,
        //     data: {username: $scope.username, file: file},
        // });

        // file.upload.then(function (response) {
        //     file.result = response.data;
        // });
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.method),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response) {
            console.log(response);
            location.reload();
        }).then(function error(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'methods/' + id
            }).then(function success(data) {
                  console.log(data);
                  location.reload();
            }).then(function error(data) {
                  console.log(data);
                  alert('Unable to delete');
            });
        } else {
            return false;
        }
    }
});