<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\MenuConstantService;
use App\Services\ResponseHandlerService;
use App\Services\RoleResourceService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Index action
     **/
    public function index(Request $request)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(MenuConstantService::INDEX , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('admin.menu.index',['viewData'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function create(Request $request)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        if($request->mode=="create"){
            $response = $baseService->request(MenuConstantService::CREATE , $inputData, BaseService::HTTP_POST);
            $response = new ResponseHandlerService($response);
            if($response->getStatus() == ResponseHandlerService::STATUS_OK){
                session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                    [AlertService::ALERT_HTML_MESSAGE_KEY => "Menu created successfully.",
                        AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            }else{
                return view("errors.503",['message'=>$response->getError()]);
            }
        }else if($request->mode=="edit") {
            $response = $baseService->request(MenuConstantService::EDIT, $inputData, BaseService::HTTP_POST);
            $response = new ResponseHandlerService($response);
            if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
                session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                    [AlertService::ALERT_HTML_MESSAGE_KEY => "Menu edited successfully.",
                        AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            } else {
                return view("errors.503", ['message' => $response->getError()]);
            }
        }
            return redirect('/admin/menu/index');
        }


    /**
     * Deletes a menu
     *
     * @param string $id
     */
    public function delete(Request $request)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
            $response = $baseService->request(MenuConstantService::DELETE , $inputData, BaseService::HTTP_POST);
            $response = new ResponseHandlerService($response);
            if($response->getStatus() == ResponseHandlerService::STATUS_OK){
                session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                    [AlertService::ALERT_HTML_MESSAGE_KEY => "Menu deleted successfully.",
                        AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
                return redirect('/admin/menu/index');
            }else{
                return view("errors.503",['message'=>$response->getError()]);
            }
    }
    public function resources(Request $request)
    {
        if($request->request_type=='ajax'){
            return json_encode(session('resources'));
        }
        return view('admin.menu.resources',['viewData'=>session('resources')]);
    }
    public function userPermissions(Request $request)
    {
        if($request->request_type=='ajax'){
            return json_encode(session('permissions'));
        }
        return view('admin.menu.permissions',['viewData'=>session('permissions')]);
    }
}
