<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\DashboardConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use App\Services\TransactionTypeService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request){
        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(DashboardConstantService::DASHBOARD_CUSTOMER_COUNT , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);

        $responseLead = $baseService->request(DashboardConstantService::DASHBOARD_LEAD_COUNT , $inputData, BaseService::HTTP_GET);
        $responseLead = new ResponseHandlerService($responseLead);

        $responseUser = $baseService->request(DashboardConstantService::DASHBOARD_USER_COUNT , $inputData, BaseService::HTTP_GET);
        $responseUser = new ResponseHandlerService($responseUser);

        $responseUserUnit = $baseService->request(DashboardConstantService::DASHBOARD_USER_IN_UNIT , $inputData, BaseService::HTTP_GET);
        $responseUserUnit = new ResponseHandlerService($responseUserUnit);

        $responseUserFeed = $baseService->request(DashboardConstantService::DASHBOARD_USER_FEEDS , $inputData, BaseService::HTTP_GET);
        $responseUserFeed = new ResponseHandlerService($responseUserFeed);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('crm.index',['viewDataCustomer'=>$response->getData(), 'viewDataLead'=>$responseLead->getData(), 'viewDataUser'=>$responseUser->getData(), 'viewDataUserUnit'=>$responseUserUnit->getData(), 'responseUserFeed'=>$responseUserFeed->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
}

