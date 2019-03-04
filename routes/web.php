<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [
    'uses' => 'Auth\LoginController@login'
]);
Route::post('/login/auth', [
    'uses' => 'Auth\LoginController@loginPost'
]);
Route::get('/logout', function(){
    session()->flush();
    return  redirect('/login');
});
Route::group(['middleware' => ["web",'islogin']],function() {
    Route::get('/', function () {
        return view('dashboard.index');
    });

    Route::get('/api/{namespace}/{controller}/{action}', [
        'uses' => 'ApiGatewayController@indexGet'
    ]);
    Route::post('/api/{namespace}/{controller}/{action}', [
        'uses' => 'ApiGatewayController@indexPost'
    ]);



});
Route::group(['prefix'=>'crm','middleware' => ["web",'islogin']],function(){
    Route::get('/', ['uses' => 'DashboardController@index']);
     //return json_encode(['name'=>'Fidelis','title'=>'Programmer']);
    Route::get('/calendar', function () {
        return view('crm.calendar.calendarlist');
    });

    //crm/
    Route::get('/documents',[
        'uses' => 'DocumentsController@index'
    ]);
    Route::get('/document/details/{document_id}',[
        'uses' => 'DocumentsController@details'
    ]);
    Route::post('/document/create',[
        'uses' => 'DocumentsController@create'
    ]);
    Route::post('/document/edit',[
        'uses' => 'DocumentsController@edit'
    ]);
    Route::post('/document/download',[
        'uses' => 'DocumentsController@download'
    ]);
    Route::get('/target', function () {
        return view('crm.target.list');
    });



    Route::get('/commercialPrints',[
        'uses' => 'TransactionController@commercialPrints'
    ]);
    Route::post('/commercialPrintsPost',[
        'uses' => 'TransactionController@commercialPrintsPost'
    ]);
    Route::get('/securityPrints',[
        'uses' => 'TransactionController@securityPrints'
    ]);
    Route::post('/securityPrintsPost',[
        'uses' => 'TransactionController@securityPrintsPost'
    ]);

    /************************************************************************************************
     *********************   HAPPY ROUTES     *******************************************************
     ************************************************************************************************/
    Route::get('/account', [
        'uses' => 'AccountController@index'
    ]);
    Route::match(array('GET', 'POST'), '/account/{action?}/{account_id?}', [
        'uses' => 'AccountController@moreActions'
    ]);
    Route::post('/editaccount', [
        'uses' => 'AccountController@editAccount'
    ]);
    Route::post('/deleteaccount', [
        'uses' => 'AccountController@editAccount'
    ]);
    Route::get('/feeds', [
        'uses' => 'FeedController@index'
    ]);
    Route::match(array('GET', 'POST'), '/feeds/{action?}/{feed_id?}', [
        'uses' => 'FeedController@moreActions'
    ]);

    /************************************************************************************************
     *********************   RAPH ROUTES     *******************************************************
     ************************************************************************************************/
    Route::get('/dashboard', [
        'uses' => 'DashboardController@customerCount'
    ]);

    Route::get('/transaction', [
        'uses' => 'TransactionController@index'
    ]);
    Route::post('/deletetransaction', [
        'uses' => 'TransactionController@delete'
    ]);
    Route::post('/edittransaction', [
        'uses' => 'TransactionController@editTransaction'
    ]);
    Route::post('/createtransaction', [
        'uses' => 'TransactionController@createTransaction'
    ]);
    Route::get('/viewmoretransaction', [
        'uses' => 'TransactionController@viewTransaction'
    ]);
    Route::post('/createjobtransaction', [
        'uses' => 'TransactionController@createJob'
    ]);
    Route::post('/editjobtransaction', [
        'uses' => 'TransactionController@editJob'
    ]);
    Route::post('/createancillariestransaction', [
        'uses' => 'TransactionController@createAncillaries'
    ]);
    Route::post('/editancillariestransaction', [
        'uses' => 'TransactionController@editAncillaries'
    ]);
    Route::post('/createchecklisttransaction', [
        'uses' => 'TransactionController@createChecklist'
    ]);
    Route::post('/editchecklisttransaction', [
        'uses' => 'TransactionController@editChecklist'
    ]);
    Route::post('/createdesigngenerationtransaction', [
        'uses' => 'TransactionController@createDesignGeneration'
    ]);
    Route::post('/editdesigngenerationtransaction', [
        'uses' => 'TransactionController@editDesignGeneration'
    ]);
    Route::post('/createlogocolortransaction', [
        'uses' => 'TransactionController@createLogoColor'
    ]);
    Route::post('/editdesigngenerationtransaction', [
        'uses' => 'TransactionController@editLogoColor'
    ]);
    Route::post('/createprooftimetransaction', [
        'uses' => 'TransactionController@createProofTime'
    ]);
    Route::post('/editprooftimetransaction', [
        'uses' => 'TransactionController@editProofTime'
    ]);
    Route::get('/getListOfSuggestedAccount',[
        'uses' => 'TransactionController@getListOfSuggestedAccount'
    ]);
    Route::get('/getListOfSuggestedDocument',[
        'uses' => 'TransactionController@getListOfSuggestedDocument'
    ]);
    Route::post('/createdocumenttransaction', [
        'uses' => 'TransactionController@createDocumentTransaction'
    ]);
    Route::get('/getListOfSuggestedNotes',[
        'uses' => 'TransactionController@getListOfSuggestedNotes'
    ]);
    Route::post('/createnotetransaction', [
        'uses' => 'TransactionController@createNoteTransaction'
    ]);
});

Route::group(['prefix'=>'finance','middleware' => ["web"]],function(){
    Route::get('/', function () {
        return view('finance.index');
    });
});
Route::group(['prefix'=>'admin','middleware' => ["web",'islogin']],function(){
    Route::get('/', [
        'uses' => 'AdminController@index'
    ]);
    Route::get('/company', [
        'uses' => 'CompanyManageController@index'
    ]);
    Route::post('/createcompany', [
        'uses' => 'CompanyManageController@createCompany'
    ]);
    Route::post('/editcompany', [
        'uses' => 'CompanyManageController@editCompany'
    ]);
    Route::post('/deletecompany', [
        'uses' => 'CompanyManageController@deleteCompany'
    ]);
    Route::post('/deletecompany', [
        'uses' => 'CompanyManageController@deleteCompany'
    ]);
    Route::get('/getCompanyList', [
        'uses' => 'CompanyManageController@getCompanyList'
    ]);

    Route::get('/departments',[
        'uses' => 'DepartmentController@index'
    ]);
    Route::post('/createdepartment',[
        'uses' => 'DepartmentController@create'
    ]);
    Route::post('/editdepartment',[
        'uses' => 'DepartmentController@edit'
    ]);
    Route::post('/deletedepartment',[
        'uses' => 'DepartmentController@delete'
    ]);
    Route::get('/getDepartmentList',[
        'uses' => 'DepartmentController@getDepartmentList'
    ]);

    //units
    Route::get('/units',[
        'uses' => 'UnitController@index'
    ]);
    Route::get('/unitdetails',[
        'uses' => 'UnitController@details'
    ]);
    Route::post('/createunit',[
        'uses' => 'UnitController@create'
    ]);
    Route::post('/editunit',[
        'uses' => 'UnitController@edit'
    ]);
    Route::post('/deleteunit',[
        'uses' => 'UnitController@delete'
    ]);
    Route::post('/addusertounit',[
        'uses' => 'UnitController@addusertounit'
    ]);
    Route::get('/usersinunit',[
        'uses' => 'UnitController@usersinunit'
    ]);
    Route::post('/removeuserinunit',[
        'uses' => 'UnitController@removeUser'
    ]);
    Route::get('/getListOfSuggestedUsersInUnit',[
        'uses' => 'UnitController@getListOfSuggestedUsersInUnit'
    ]);
    Route::post('/makeunithead',[
        'uses' => 'UnitController@makeunithead'
    ]);


    Route::get('/roles/{role_id?}', [
        'uses' => 'RoleResourceController@roles'
    ]);
    Route::get('/resources/{resource_id?}', [
        'uses' => 'RoleResourceController@resources'
    ]);
    Route::post('/createrole', [
        'uses' => 'RoleResourceController@createrole'
    ]);
    Route::get('/roleResources', [
        'uses' => 'RoleResourceController@roleResources'
    ]);
    Route::post('/saveresourcestorule', [
        'uses' => 'RoleResourceController@saveresourcestorule'
    ]);
    Route::get('/roleusers', [
        'uses' => 'RoleResourceController@roleusers'
    ]);
    Route::post('/addusertorole', [
        'uses' => 'RoleResourceController@addusertorole'
    ]);
    Route::post('/createresource', [
        'uses' => 'RoleResourceController@createResource'
    ]);
    Route::get('/refreshResources','RoleResourceController@refreshResources');

    /*
     * happy routes
     */
    Route::get('/user', [
        'uses' => 'UserController@index'
    ]);
    Route::post('/createuser', [
        'uses' => 'UserController@createUser'
    ]);
    Route::post('/edituser', [
        'uses' => 'UserController@editUser'
    ]);

    Route::match(array('GET', 'POST'), '/user/{action?}/{user_id?}', [
        'uses' => 'UserController@moreActions'
    ]);

    /*
     *
     */
    /*Route::get('/profile', function () {
        return view('admin.user.user_profile');
    });*/
    
    Route::post('/userResources', [
        'uses' => 'RoleResourceController@userResources'
    ]);
    Route::get('/roleresource/searchListOfUsers', [
        'uses' => 'RoleResourceController@searchListOfUsers'
    ]);

    Route::get('/menu', [
        'uses' => 'MenuController@index'
    ]);
    Route::get('/menu/index', [
        'uses' => 'MenuController@index'
    ]);
    Route::post('/menu/create', [
        'uses' => 'MenuController@create'
    ]);
    Route::get('/menu/resources', [
        'uses' => 'MenuController@resources'
    ]);
    Route::get('/menu/userPermissions', [
        'uses' => 'MenuController@userPermissions'
    ]);
    Route::post('/menu/delete', [
        'uses' => 'MenuController@delete'
    ]);
});