/*
myApp.controller('StudentController',function($scope,$http,API_URL){
    var url="crm/angular";
    console.log('Angular');
    // console.log($http);
    /!*$http({
     method : "GET",
     url : url
     }).then( function(response) {
     console.log(response);
     });*!/
    $http.get(API_URL+url).then(function(successResponse) {
        $scope.students =successResponse.data;
        // console.log($scope.student);
    },function(error){
        console.log(error);
    });
});*/
