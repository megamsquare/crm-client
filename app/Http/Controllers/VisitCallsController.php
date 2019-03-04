<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\VisitCallsConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class VisitCallsController extends Controller
{
    public function index(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $inputData['user_id'] = session('userinfo')['id'];
        $response = $baseService->request(VisitCallsConstantService::VISIT_INDEX , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
           return view('crm.visit.index',['viewData'=>$response->getData()]);
        }else{
           return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function create(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $inputData['created_by_id'] = session('userinfo')['id'];
        $response = $baseService->request(VisitCallsConstantService::VISIT_CREATE , $inputData, BaseService::HTTP_POST);
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
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(VisitCallsConstantService::VISIT_EDIT , $inputData, BaseService::HTTP_POST);
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
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(VisitCallsConstantService::VISIT_DELETE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Visit deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/visits');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function details(Request $request){
         $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(VisitCallsConstantService::VISIT_DETAILS , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
      //  dd($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('crm.unit.details',['viewData'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function indexCalls(Request $request){
      $baseService = resolve('BaseService');
      $inputData=$request->input();
      $inputData['user_id'] = session('userinfo')['id'];
      $response = $baseService->request(VisitCallsConstantService::CALL_INDEX , $inputData, BaseService::HTTP_GET);
      $response = new ResponseHandlerService($response);
      if($response->getStatus() == ResponseHandlerService::STATUS_OK){
         return view('crm.call.index',['viewData'=>$response->getData()]);
      }else{
         return view("errors.503",['message'=>$response->getError()]);
      }
    }

    public function createCalls(Request $request){
      $baseService = resolve('BaseService');
      $inputData=$request->input();
      $inputData['created_by_id'] = session('userinfo')['id'];
      $response = $baseService->request(VisitCallsConstantService::CALL_CREATE , $inputData, BaseService::HTTP_POST);
      $response = new ResponseHandlerService($response);
      if($response->getStatus() == ResponseHandlerService::STATUS_OK){
          session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
              [AlertService::ALERT_HTML_MESSAGE_KEY => "Call Created successfully.",
                  AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
          return redirect('/crm/calls');
      }else{
          return view("errors.503",['message'=>$response->getError()]);
      }
    }
    public function editCalls(Request $request){
      $baseService = resolve('BaseService');
      $inputData=$request->input();
      $response = $baseService->request(VisitCallsConstantService::CALL_EDIT , $inputData, BaseService::HTTP_POST);
      $response = new ResponseHandlerService($response);
      if($response->getStatus() == ResponseHandlerService::STATUS_OK){
          session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
              [AlertService::ALERT_HTML_MESSAGE_KEY => "Call edited successfully.",
                  AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
          return redirect('/crm/calls');
      }else{
          return view("errors.503",['message'=>$response->getError()]);
      }
    }

    public function deleteCalls(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(VisitCallsConstantService::CALL_DELETE , $inputData, BaseService::HTTP_POST);
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
    public function getListOfSuggestedAccount(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(VisitCallsConstantService::VISIT_SEARCH_ACCOUNT_IN_VISIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return $response->getData();
        }else{
            return $response->getError();
        }
    }

}
