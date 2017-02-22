app.factory('MethodService', function ($http, $resource, API_URL) {
    return $resource(API_URL + '/methods/:id', null, {
        'update': { 'method':'POST' }
    });
});
