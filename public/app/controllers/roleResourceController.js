/**
 * Created by Kalu on 15/05/2017.
 */
jQuery(function($){
    $('.showCreateRoleModal').on("click",function(){
        $('#createRoleModal').modal('show');
    });
    $('.showCreateModal1').on("click",function(){
        var editForm=$('form[name=createResourceForm]');
        $(editForm).find('input[name=request_mode]').val('create');
        $('#createModal1').modal('show');
    });
    $('.edit-resource').on("click",function(){
        var editForm=$('form[name=createResourceForm]');
        var name=$(editForm).find('input[name=name]').val($(this).data('resourcename'));
        var id=$(editForm).find('input[name=id]').val($(this).data('id'));
        $('.createModal1-header').html('Edit Resource');
        $('#createModal1').modal('show');
    });
});
function editResource(elem){
    var editForm=$('form[name=createResourceForm]');
    $(editForm).find('input[name=name]').val($(elem).data('resourcename'));
    $(editForm).find('input[name=id]').val($(elem).data('id'));
    $(editForm).find('input[name=request_mode]').val('edit');
    $('.createModal1-header').html('Edit Resource');
    $('#createModal1').modal('show');
}
myApp.controller('roleResourceController',function($scope,$http,API_URL){
    $scope.role_name='';
    $scope.getRoles=function(){
        getRoleList($scope,$http,API_URL);
    };
    $scope.getRoleResources=function(role_id,role_name){
        getRoleResources($scope,$http,API_URL,role_id,role_name);
    };
    //Getting List of Account from Database
    $scope.id='';
    $scope.searchUserField='';
    $scope.searchWrapperVisible=false;
    $scope.noResultFound=false;
    var queryRunning=false;
    $scope.users=[{}];
    $scope.searchListOfUsers=function(){
        var url="admin/roleresource/searchListOfUsers?searchField="+$scope.searchUserField;
        $scope.searchWrapperVisible=false;
        if($scope.searchUserField.length > 2){
            if(queryRunning === false){
                queryRunning=true;
                $http.get(API_URL+url).then(function(successResponse) {
                    $scope.users = JSON.parse(successResponse.data);
                    queryRunning=false;
                    if($scope.users.length <=0){
                        $scope.searchWrapperVisible=false;
                        $scope.noResultFound=true;
                    }else{
                        $scope.searchWrapperVisible=true;
                        $scope.noResultFound=false;
                    }

                },function(error){
                    queryRunning=false;
                    $scope.searchWrapperVisible=false;
                    alert(error.data);
                });
            }
        }

    };

    $scope.addUser=function(id, name){
        $scope.id=id;
        $scope.searchUserField=name;
        $scope.searchWrapperVisible=false;
    };
});

function getRoleList($scope,$http,API_URL){
    var url="crm/roles?getRoleListAjax=true";
    $http.get(API_URL+url).then(function(successResponse) {
       $scope.roles =successResponse.data;
    },function(error){
        alert('Error occurred while fetching departments.');
    });
}
function getRoleResources($scope,$http,API_URL,role_id,role_name){
    var url="crm/roleResources?role_id="+role_id+"&authenticateAjax=true";
    $http.get(API_URL+url).then(function(successResponse) {
        $scope.roleResources =successResponse.data;
        $scope.role_name=role_name;
        $('#createRoleResourceModal').modal('show');
    },function(error){
        alert('Error occurred while fetching departments.');
    });
}