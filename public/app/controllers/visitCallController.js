myApp.controller('visitController',function($scope,$http,API_URL){
  //Proof Generation Time Schedule
  $scope.proof_generation_start_date_to_studio = '';

  //Getting List of Account from Database
  $scope.id='';
  $scope.searchField='';
  $scope.searchWrapperVisible=false;
  var queryRunning=false;
  $scope.getListOfSuggestedAccount=function(){

      var url="crm/getListOfSuggestedAccountVisitCalls?searchField="+$scope.searchField;
      $scope.searchWrapperVisible=false;
      if($scope.searchField.length > 2){
          if(queryRunning === false){
              queryRunning=true;
              $http.get(API_URL+url).then(function(successResponse) {
                console.log(successResponse.data);
                  $scope.Accounts =successResponse.data;
                  queryRunning=false;
                  $scope.searchWrapperVisible=true;
              },function(error){
                  queryRunning=false;
                  $scope.searchWrapperVisible=false;
                  alert('Error occurred while fetching departments.');
              });
          }
      }

  };

  $scope.addAccount=function(id, name){
      $scope.id=id;
      $scope.searchField=name;
      $scope.searchWrapperVisible=false;
  };

});
