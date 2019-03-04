<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\NoteConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  public function index(Request $request){
      $baseService = resolve('BaseService');
      $inputData=$request->input();
      $response = $baseService->request(NoteConstantService::NOTE_INDEX , $inputData, BaseService::HTTP_GET);
      $response = new ResponseHandlerService($response);
      if($response->getStatus() == ResponseHandlerService::STATUS_OK){
         return view('crm.notes.index',['viewData'=>$response->getData()]);
      }else{
         return view("errors.503",['message'=>$response->getError()]);
      }
    }
    public function create(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $inputData['created_by_id'] = session('userinfo')['id'];
        $response = $baseService->request(NoteConstantService::NOTE_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Note Created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/notes');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function edit(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $inputData['created_by_id'] = session('userinfo')['id'];
        $response = $baseService->request(NoteConstantService::NOTE_EDIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Note edited successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/notes');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function delete(Request $request)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(NoteConstantService::NOTE_DELETE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Note deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/notes');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
}
