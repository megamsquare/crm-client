<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\RoleResourceConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoleResourceController extends Controller
{
    public function roles(Request $request,$role_id = null)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $inputData['role_id'] = $role_id;
        $response = $baseService->request(RoleResourceConstantService::ROLE_INDEX, $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            $viewData = $response->getData();
            if(!empty($resource_id))
            {
                $viewDataReserve = $viewData;
                $viewData = null;
                $viewData[] = $viewDataReserve;
            }
            if(request()->getRoleListAjax){
                return response()->json($viewData);
            }
           // return $request->json(['data']);
            return view('roleresource.roles',['viewData'=>$viewData]);
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
    public function resources(Request $request,$resource_id = null)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $inputData['resource_id'] = $resource_id;
        $response = $baseService->request(RoleResourceConstantService::RESOURCE_INDEX, $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            $viewData = $response->getData();
            if(!empty($resource_id))
            {
                $viewDataReserve = $viewData;
                $viewData = null;
                $viewData[] = $viewDataReserve;
            }
          // dd($viewData);
            return view('roleresource.resources',['viewData'=>$viewData]);
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
    public function createResource(Request $request)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        if($request->request_mode=="create"){
            $response = $baseService->request(RoleResourceConstantService::RESOURCE_CREATE, $inputData, BaseService::HTTP_POST);
        }else if($request->request_mode=="edit"){
            $response = $baseService->request(RoleResourceConstantService::RESOURCE_EDIT, $inputData, BaseService::HTTP_POST);
        }else if($request->request_mode=="delete"){
            $response = $baseService->request(RoleResourceConstantService::RESOURCE_DELETE, $inputData, BaseService::HTTP_POST);
        }else{
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Mode of the request was not included in your form. Modes: create, edit, delete.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/resources');
        }
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => $response->getData(),
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/resources');
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
    public function createrole(Request $request)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
       $response = $baseService->request(RoleResourceConstantService::ROLE_CREATE, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Role Created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/roles');
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
    public function roleResources(Request $request)
    {
        $baseService = resolve('BaseService');
        if(empty($request->role_id) || empty($request->role)){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Role and role id are required.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/admin/roles');
        }
        $inputData=$request->input();
        $response = $baseService->request(RoleResourceConstantService::ROLE_RESOURCES, $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            $viewData = $response->getData();
            if(request()->authenticateAjax){
                return response()->json($viewData);
            }
            return view('roleresource.roleresourcelist',['viewData'=>$viewData,'role'=>$request->role,'role_id'=>$request->role_id]);
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
    public function roleusers(Request $request)
    {
        $baseService = resolve('BaseService');
        if(empty($request->role_id) || empty($request->role)){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Role and role id are required.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/admin/roles');
        }
        $inputData=$request->input();
        $response = $baseService->request(RoleResourceConstantService::ROLE_USERS, $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            $viewData = $response->getData();
            if($request->authenticateAjax){
                return response()->json($viewData);
            }
            return view('roleresource.roleusers',['viewData'=>$viewData,'role'=>$request->role,'role_id'=>$request->role_id]);
        } else {
            if($request->authenticateAjax){
                return response()->json($response->getError(),401);
            }
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
    public function addusertorole(Request $request)
    {
        $baseService = resolve('BaseService');
        if(empty($request->role_id) || empty($request->user_id)){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Role id and user id are required.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/admin/roles');
        }
        $inputData=$request->input();
        $response = $baseService->request(RoleResourceConstantService::ADD_USER_TO_ROLE, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "User added to role successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/roles');
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }

    public function saveresourcestorule(Request $request)
    {
        $baseService = resolve('BaseService');
        if(empty($request->resources) || empty($request->role_id)){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Required fields not sent.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/admin/roles');
        }
        $inputData=$request->input();
        $inputData['resources'] = implode(',',$inputData['resources']);
       // dd($inputData);
        $response = $baseService->request(RoleResourceConstantService::ADD_RESOURCES_TO_ROLE, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Resources added successfully to role.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/roles');
             } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
    public function refreshResources(Request $request)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(RoleResourceConstantService::REFRESH_RESOURCES, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
           $responseData = $response->getData();
            $responseData = json_decode($responseData,true);
            /*GENERATE UPDATED ROUTE SERVICE*/
            /*$resourcesString=
                "<?php \nnamespace App\\Services; \nclass RouteAppService {\n";
            foreach($responseData['data'] as $resource){
                $resourcesString = $resourcesString .'const '.strtoupper($resource['key'])."='{$resource['key']}';\n";
            }
            $resourcesString = $resourcesString."\n\n} \n\n?>";
            File::put(app_path().'/Services/RouteAppService.php',$resourcesString);*/
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => count($responseData)." resources successfully refreshed.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/logout');
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
    public function userResources(Request $request)
    {
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(RoleResourceConstantService::RESOURCE_USERS, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            $viewData = $response->getData();
            return view('roleresource.userResources',['viewData'=>$viewData,'resource'=>$request->resource,'resource_id'=>$request->resource_id]);
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
    public function searchListOfUsers(Request $request)
    {
         $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(RoleResourceConstantService::SEARCH_LIST_OF_USERS, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            $viewData = $response->getData();
            return response()->json($viewData);
        } else {
                return response()->json($response->getError(),401);
        }
    }


}
