<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request){
      $viewData=[];
      $viewData['items']=[['id'=>1,'title'=>'FCMB','notes'=>'FCMB check logo is on the right track','created_date'=>'2017-03-28 10:04:35'],
          ['id'=>1,'title'=>'FCMB','notes'=>'FCMB check logo is on the right track','created_date'=>'2017-03-28 10:04:35'],
          ['id'=>1,'title'=>'FCMB','notes'=>'FCMB check logo is on the right track','created_date'=>'2017-03-28 10:04:35'],
          ['id'=>1,'title'=>'FCMB','notes'=>'FCMB check logo is on the right track','created_date'=>'2017-03-28 10:04:35'],
          ['id'=>1,'title'=>'FCMB','notes'=>'FCMB check logo is on the right track','created_date'=>'2017-03-28 10:04:35'],
          ['id'=>1,'title'=>'FCMB','notes'=>'FCMB check logo is on the right track','created_date'=>'2017-03-28 10:04:35'],];
      return view('crm.message.index',['viewData'=>$viewData]);
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(ConstantService::BASE_PATH.'visitCalls/index' , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        dd($response->getData());
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
           return view('crm.notes.index',['viewData'=>$response->getData()]);
        }else{
           return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function create(Request $request){
        session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
            [AlertService::ALERT_HTML_MESSAGE_KEY => "Note created successfully.",
                AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
        return redirect('/crm/notes');
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(ConstantService::BASE_PATH.'notes/create' , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Visit Created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/visits');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function edit(Request $request){
        session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
            [AlertService::ALERT_HTML_MESSAGE_KEY => "Note edited successfully.",
                AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
        return redirect('/crm/notes');
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(ConstantService::BASE_PATH.'notes/edit' , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Visit edited successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/visits');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function delete(Request $request){
        session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
            [AlertService::ALERT_HTML_MESSAGE_KEY => "Note deleted successfully.",
                AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
        return redirect('/crm/note');
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(ConstantService::BASE_PATH.'department/delete' , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Calls deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/calls');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
}
