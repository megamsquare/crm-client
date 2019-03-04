<?php
/**
 * Created by PhpStorm.
 * User: Kalu
 * Date: 28/03/2017
 * Time: 09:20
 */
 Route::group(['prefix'=>'crm','middleware' => ["web"]],function(){
 Route::get('/visits',[
     'uses' => 'VisitCallsController@index'
 ]);
 Route::post('/createvisit',[
     'uses' => 'VisitCallsController@create'
 ]);
 Route::post('/editvisit',[
     'uses' => 'VisitCallsController@edit'
 ]);
 Route::post('/deletevisit',[
     'uses' => 'VisitCallsController@delete'
 ]);
 Route::post('/createaccountvisit',[
     'uses' => 'VisitCallsController@createAccountVisit'
 ]);
 Route::get('/calls',[
     'uses' => 'VisitCallsController@indexCalls'
 ]);
 Route::post('/createcalls',[
     'uses' => 'VisitCallsController@createCalls'
 ]);
 Route::post('/editcalls',[
     'uses' => 'VisitCallsController@editCalls'
 ]);
 Route::post('/deletecalls',[
     'uses' => 'VisitCallsController@deleteCalls'
 ]);
 Route::get('/getListOfSuggestedAccountVisitCalls',[
     'uses' => 'VisitCallsController@getListOfSuggestedAccount'
 ]);
 Route::get('/notes',[
     'uses' => 'NoteController@index'
 ]);
 Route::post('/createnote',[
     'uses' => 'NoteController@create'
 ]);
 Route::post('/editnote',[
     'uses' => 'NoteController@edit'
 ]);
 Route::post('/deletenote',[
     'uses' => 'NoteController@delete'
 ]);
 Route::get('/message',[
     'uses' => 'MessageController@index'
 ]);
 });

Route::group(['prefix'=>'helpdesk','middleware' => ["web",'islogin']],function(){
    Route::get('/', ['uses' => 'TicketController@home']);
  Route::get('/ticket',[
      'uses' => 'TicketController@index'
  ]);
  Route::match(array('GET', 'POST'), '/ticket/{action?}/{helpdesk_id?}', [
      'uses' => 'TicketController@moreActions'
  ]);
  Route::get('/ticketreport', [
      'uses' => 'TicketReportController@index'
  ]);
  Route::match(array('GET', 'POST'), '/ticketreport/{action?}/{helpdesk_id?}', [
      'uses' => 'TicketReportController@moreActions'
  ]);
  Route::get('/report', [
        'uses' => 'HelpDeskReportController@index'
    ]);
  });
