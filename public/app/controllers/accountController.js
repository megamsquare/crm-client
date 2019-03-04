/**
 * Created by Benedict on 22/03/2017.
 */
/*myApp.controller('GetAllAccountsController',function($scope,$http,API_URL){
    var url="accounts/index";
    $http.get(API_URL+url).then(function(successResponse) {
        $scope.accounts =successResponse.data.data.items;

    },function(error){
        alert('Error occurred while fetching accounts.');
    });
    $scope.createdby_id='';
    $scope.name='';
    $scope.stage='';
    $scope.created_date='';
    $scope.createAccount=function(){
        jQuery('#createCompanyModal').modal('show');
    };
    $scope.submitCreateCompany=function(){
        if($scope.company_name=="" || $scope.company_description==""){
            alert("Company name and description are required.");
            return;
        }


        $http({
            url: API_URL+'company/create',
            method: "POST",
            data: { 'company_name' : $scope.company_name,'description':$scope.company_description },
            headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function(successResponse) {
            console.log(successResponse);
        },function(error){
            console.log('error');
            alert('Error occurred while creating company.');
        });

    };
    $scope.editCompany=function(companyId){
        alert(companyId)
    }

});
myApp.controller('CreateCompanyController',function($scope,$http,API_URL){
    var url="company/create";
    $http.get(API_URL+url).then(function(successResponse) {
        $scope.students =successResponse.data;
    },function(error){
        console.log(error);
    });
});*/


