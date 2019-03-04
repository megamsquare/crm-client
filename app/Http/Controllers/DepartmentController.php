<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\CompanyDeptUnitDocConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::DEPARTMENT_INDEX , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            if($request->ajax()){
                return $response->getData();
            }
           return view('admin.department.index',['viewData'=>$response->getData()]);
        }else{
            if($request->ajax()){
                return $response->getError();
            }
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function create(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::DEPARTMENT_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Department created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/departments');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function edit(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::DEPARTMENT_EDIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Department edited successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/departments');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function delete(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::DEPARTMENT_DELETE, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Department deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/departments');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function getDepartmentList(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::DEPARTMENT_INDEX , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
                 return $response->getData();
            }else{
                return $response->getError();
              }
    }
}



