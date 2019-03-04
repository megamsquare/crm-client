/**
 * Created by Kalu on 05/06/2017.
 */
myApp.controller('MenuController',function($scope,$http,API_URL){
    $scope.resource_id ='';
    $scope.parent_id ='';
    $scope.getResources=function(event){
        $scope.resource_id = event.attributes['data-resourceId'].value;
        $scope.parent_id = event.attributes['data-parentId'].value;
        getResourcesList($scope,$http,API_URL);
    };
    $scope.getPermissions=function(){
        getPermissionsList($scope,$http,API_URL);
    };
});
function getResourcesList($scope,$http,API_URL){
    var url="admin/menu/resources?request_type=ajax";
    $http.get(API_URL+url).then(function(successResponse) {
        $scope.resources =successResponse.data;
    },function(error){
        alert('Error occurred while fetching resources.');
    });
}
function getPermissionsList($scope,$http,API_URL){
    var url="admin/menu/userPermissions?request_type=ajax";
    $http.get(API_URL+url).then(function(successResponse) {
        $scope.permissions =successResponse.data;
    },function(error){
        alert('Error occurred while fetching permissions.');
    });
}