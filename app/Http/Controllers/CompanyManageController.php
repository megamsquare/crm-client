<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\CompanyDeptUnitDocConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class CompanyManageController extends Controller
{
    public function index(Request $request){
        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::COMPANY_INDEX , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            if($request->ajax){
                return $response->getData();
            }
            return view('admin.company.index',['viewData'=>$response->getData()]);
        }else{
            if($request->ajax()){
                return $response->getData();
            }
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function createCompany(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::COMPANY_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Company created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/company');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function editCompany(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::COMPANY_EDIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Company edited successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/company');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function deleteCompany(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::COMPANY_DELETE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Company deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/company');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function getCompanyList(Request $request){
        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(CompanyDeptUnitDocConstantService::COMPANY_INDEX , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return $response->getData();
        }else{
            return $response->getError();
        }
    }


}
