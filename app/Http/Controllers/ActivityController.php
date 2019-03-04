<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(ConstantService::getBasePath().'company/index' , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        //dd($response->getData());
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('crm.company.index',['viewData'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
}
