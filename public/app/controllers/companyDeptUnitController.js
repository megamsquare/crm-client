/**
 * Created by Kalu on 22/03/2017.
 */
myApp.controller('CompanyController',function($scope,$http,API_URL){
    var url="admin/company?ajax=true";
    $http.get(API_URL+url).then(function(successResponse) {
       $scope.companies =successResponse.data.items;
    },function(error){
        console.log('Error occurred while fetching companies.');
    });

    $scope.company_name='';
    $scope.company_description='';
    $scope.fetchCompanies = function(){
        $http.get(API_URL+url).then(function(successResponse) {
            jQuery('#createCompanyModal').modal('hide');
            $scope.companies =successResponse.data.items;
        },function(error){
            console.log('Error occurred while fetching companies.');
        });
    };
    $scope.showCreateCompanyModal=function(){
        jQuery('#createCompanyModal').modal('show');
    };
    $scope.saveCompany=function(){
        if($scope.company_name=="" || $scope.company_description==""){
            console.log("Company name and description are required.");
            return;
        }
        $http({
            url: API_URL+'admin/company/create',
            method: "POST",
            data: {'created_by_id':1, 'company_name' : $scope.company_name,'description':$scope.company_description }
        }).then(function(successResponse) {
           var newCompany ={ company_name: $scope.company_name,
               created_date:successResponse.data.created_date,
               description:$scope.company_description,
               id:successResponse.data.id
           };
            jQuery('#createCompanyModal').modal('hide');
           document.location.reload();
          // $scope.companies.concat(newCompany);
            //
        },function(error){
            console.log('Error occurred while creating company.');
        });

    };
    $scope.editCompany=function(companyId){
        alert(companyId)
    }

});

myApp.controller('DepartmentController',function($scope,$http,API_URL){
    $scope.getDepartments=function(){
        getDepartmentList($scope,$http,API_URL);
    };
});
myApp.controller('UnitController',function($scope,$http,API_URL){
    $scope.departmentName = '';
    $scope.getDepartments=function(departmentName){
        getDepartmentList($scope,$http,API_URL,departmentName);
    };
    $scope.user_id='';
    $scope.searchField='';
    $scope.searchWrapperVisible=false;
    var queryRunning=false;
    $scope.getListOfSuggestedUsers=function(){
        var url="admin/getListOfSuggestedUsersInUnit?searchField="+$scope.searchField;
        $scope.searchWrapperVisible=false;
        if($scope.searchField.length > 2){
            if(queryRunning === false){
                queryRunning=true;
                $http.get(API_URL+url).then(function(successResponse) {
                 $scope.suggestedUsers =successResponse.data;
                    queryRunning=false;
                    $scope.searchWrapperVisible=true;
                },function(error){
                    queryRunning=false;
                    $scope.searchWrapperVisible=false;
                    console.log('Error occurred while fetching departments.');
                });
            }
        }

    };
    $scope.addUser=function(id, fullname){
        var url="admin/getListOfSuggestedUsers";
        $scope.user_id=id;
        $scope.searchField=fullname;
        $scope.searchWrapperVisible=false;
    };

});
function getDepartmentList($scope,$http,API_URL,departmentName){
    var url="admin/getDepartmentList";
    $scope.departmentName = departmentName;
    $http.get(API_URL+url).then(function(successResponse) {
        $scope.departments =successResponse.data;
    },function(error){
        console.log('Error occurred while fetching departments.');
    });
}

