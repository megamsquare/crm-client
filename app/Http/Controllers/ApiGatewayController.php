<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\ConstantService;
use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Services\ResponseHandlerService;
class ApiGatewayController extends Controller
{
    public function indexGet($namespace,$controller,$action,Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(ConstantService::BASE_PATH.$controller.'/'.$action , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return response()->json($response->getData());
        }else{
           return response()->json(['message'=>$response->getError()],404);
        }
    }
    public function indexPost($namespace,$controller,$action,Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(ConstantService::BASE_PATH.$controller.'/'.$action , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return response()->json($response->getData());
        }else{
            return response()->json(['message'=>$response->getError()],404);
        }
    }
}
