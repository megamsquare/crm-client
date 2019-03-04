/**
 * Created by Kalu on 22/03/2017.
 */

myApp.controller('TransactionController',function($scope,$http,API_URL){
    //JOB
    $scope.job_title = '';
    $scope.job_description = '';
    $scope.job_instruction = '';
    $scope.job_jobsize = '';
    $scope.job_spot_colour = '';
    $scope.job_cymk = '';

    //Design Generation
    $scope.design_generation_designtype = '';
    $scope.design_generation_copy = '';
    $scope.design_generation_client_as = '';
    $scope.design_generation_design_others = '';

//Logo / Colour
    $scope.logo_colour_pantone = '';
    $scope.logo_colour_existing_colour = '';
    $scope.logo_colour_supplied_as = '';
    $scope.logo_colour_supplied_digit_as = '';

    //Proof Generation Time Schedule
    $scope.proof_generation_start_date_to_studio = '';
    $scope.proof_generation_receive_by = '';
    $scope.proof_generation_receive_by_date = '';
    $scope.proof_generation_agreed_date_time = '';
    $scope.proof_generation_ended = '';

    //Ancillaries
    $scope.ancillaries_front_cover = '';
    $scope.ancillaries_back_cover = '';
    $scope.ancillaries_re_order_slip = '';
    $scope.ancillaries_cash_analysis = '';
    $scope.ancillaries_sheet_continuous_sheet = '';
    $scope.ancillaries_sheet_loose_leaf = '';
    $scope.ancillaries_sheet_Booklet = '';
    $scope.ancillaries_hologram = '';

    //Getting List of Account from Database
    $scope.id='';
    $scope.searchField='';
    $scope.searchWrapperVisible=false;
    var queryRunning=false;
    $scope.getListOfSuggestedAccount=function(){
        var url="crm/getListOfSuggestedAccount?searchField="+$scope.searchField;
        $scope.searchWrapperVisible=false;
        if($scope.searchField.length > 2){
            if(queryRunning === false){
                queryRunning=true;
                $http.get(API_URL+url).then(function(successResponse) {
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

    //Getting List of Account from Database
    $scope.id='';
    $scope.searchField='';
    $scope.searchWrapperVisible=false;
    var queryRunning=false;
    //alert("Yea");
    $scope.getListOfSuggestedDocument=function(){

        var url="crm/getListOfSuggestedDocument?searchField="+$scope.searchField;
        $scope.searchWrapperVisible=false;
        if($scope.searchField.length > 2){
            if(queryRunning === false){
                queryRunning=true;
                $http.get(API_URL+url).then(function(successResponse) {
                    $scope.Documents =successResponse.data;
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

    $scope.addDocument=function(id, name){
        $scope.id=id;
        $scope.searchField=name;
        $scope.searchWrapperVisible=false;
    };

    //Getting List of Note from Database
    $scope.idNote='';
    $scope.searchFieldNote='';
    $scope.searchWrapperVisibleNote=false;
    var queryRunning=false;

    $scope.getListOfSuggestedNotes=function(){
        //alert("Yea");
        var url="crm/getListOfSuggestedNotes?searchFieldNote="+$scope.searchFieldNote;
        $scope.searchWrapperVisibleNote=false;
        if($scope.searchFieldNote.length > 2){
            if(queryRunning === false){
                queryRunning=true;
                $http.get(API_URL+url).then(function(successResponse) {
                    $scope.Notes =successResponse.data;
                    queryRunning=false;
                    $scope.searchWrapperVisibleNote=true;
                },function(error){
                    queryRunning=false;
                    $scope.searchWrapperVisibleNote=false;
                    alert('Error occurred while fetching Note.');
                });
            }
        }

    };

    $scope.addNote=function(id, name){
        $scope.idNote=id;
        $scope.searchFieldNote=name;
        $scope.searchWrapperVisibleNote=false;
    };

});

