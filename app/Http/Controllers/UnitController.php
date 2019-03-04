<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\CompanyDeptUnitDocConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::UNIT_INDEX , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('admin.unit.index',['viewData'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function details(Request $request){
         $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::UNIT_DETAILS , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
      //  dd($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('admin.unit.details',['viewData'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function create(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::UNIT_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Unit created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/units');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function edit(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::UNIT_EDIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Unit edited successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/units');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function delete(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::UNIT_DELETE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Unit deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/units');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function addusertounit(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::COMPANY_ADD_USER_TO_UNIT, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "User successfully added to unit.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/unitdetails?id='.$inputData['unit_id']);
        }else{
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => $response->getError(),
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/admin/unitdetails?id='.$inputData['unit_id']);
        }
    }
    public function usersinunit(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        if(empty($inputData['unit_id'])){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Please select a hall to view users.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/admin/units');
        }
        $response = $baseService->request(CompanyDeptUnitDocConstantService::UNIT_GET_USERS_IN_UNIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        //dd($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd($response->getData());
            return view('admin.unit.usersInUnit',['viewData'=>$response->getData(),'unitId'=>$inputData['unit_id']]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function removeUser(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::UNIT_DELETE_USER_FROM_UNIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "User removed successfully from the unit.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/usersinunit?unit_id='.$inputData['unit_id']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function getListOfSuggestedUsersInUnit(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::UNIT_SEARCH_USERS_IN_UNIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return $response->getData();
        }else{
            return $response->getError();
        }
    }
    public function makeunithead(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::MAKE_UNIT_HEAD , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => $response->getData(),
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/usersinunit?unit_id='.$inputData['unit_id']);
             }else{
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => $response->getError(),
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/admin/usersinunit?unit_id='.$inputData['unit_id']);
        }
    }

}



