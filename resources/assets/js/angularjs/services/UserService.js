app.factory('UserService', function ($http, $resource, API_URL) {
    return $resource(API_URL + '/users/:id', null, {
        'update': { 'method':'PUT' }
    });
});
