<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\UserAccountLeadFeedConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request){

        /** @var BaseService $baseService */
        /*$baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(UserAccountLeadFeedConstantService::ACCOUNT_INDEX , $inputData, BaseService::HTTP_GET);

        $response = new ResponseHandlerService($response);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd($response->getData());
            return view('crm.account.accountlist',['viewData'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }*/
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(UserAccountLeadFeedConstantService::GETALL_CUSTOMER_ACCOUNT , $inputData, BaseService::HTTP_GET);

        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('crm.account.accountlist',['viewData'=>$response->getData(),'action'=>'client']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }

    }

    public function moreActions($action = null, $account_id = null, Request $request){
        switch ($action) {
            case "prospect":
                return $this->lead($action,$request);
            case "client":
                return $this->customer($action,$request);
            case "create":
                return $this->createAccount($request);
            case "edit":
                return $this->editAccount($request);
            case "calls":
                return view("errors.503",['message'=>'action is calls']);
            case "visits":
                return view("errors.503",['message'=>'action is visits']);
            case "documents":
                return view("errors.503",['message'=>'action is documents']);
            case "transactions":
                return view("errors.503",['message'=>'action is transactions']);
            case "mails":
                return view("errors.503",['message'=>'action is mails']);
            case "notes":
                return view("errors.503",['message'=>'action is notes']);
            case "personnel":
                return $this->listByAccountPersonnel($account_id);
                //return view('crm.account.account_personnel');
                break;
            case "addpersonnel":
                return $this->createAccountPersonnel($request);
            case "editpersonnel":
                return $this->editAccountPersonnel($request);
            case "delete":
                return $this->deleteAccount($account_id);
                break;
            default:
                return view("errors.503",['message'=>'invalid action']);
        }

    }

    private function createAccount($request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $inputData ['createdby_id'] = session('userinfo')['id'];
        $response = $baseService->request(UserAccountLeadFeedConstantService::ACCOUNT_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Account created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            if($inputData['stage'] == 'customer')
            return redirect('/crm/account/client');
            if($inputData['stage'] == 'lead')
            return redirect('/crm/account/prospect');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function editAccount($request){
    $baseService = resolve('BaseService');
    $inputData=$request->input();
    $response = $baseService->request(UserAccountLeadFeedConstantService::ACCOUNT_EDIT , $inputData, BaseService::HTTP_POST);
    $response = new ResponseHandlerService($response);
    if($response->getStatus() == ResponseHandlerService::STATUS_OK){
        session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
            [AlertService::ALERT_HTML_MESSAGE_KEY => "Account updated successfully.",
                AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
        return redirect('/crm/account');
    }else{
        return view("errors.503",['message'=>$response->getError()]);
    }
}

    private function lead($action,$request){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(UserAccountLeadFeedConstantService::GETALL_LEAD_ACCOUNT , $inputData, BaseService::HTTP_GET);

        $response = new ResponseHandlerService($response);
        //dd($response->getData());
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('crm.account.accountlist',['viewData'=>$response->getData(),'action'=>$action]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function customer($action,$request){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(UserAccountLeadFeedConstantService::GETALL_CUSTOMER_ACCOUNT , $inputData, BaseService::HTTP_GET);

        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('crm.account.accountlist',['viewData'=>$response->getData(),'action'=>$action]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function deleteAccount($id)
    {
        $baseService = resolve('BaseService');
        $inputData = ['id' => $id];
        $response = $baseService->request(UserAccountLeadFeedConstantService::ACCOUNT_DELETE, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Account deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/account');
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }

    private function createAccountPersonnel($request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        //dd($inputData);
        $response = $baseService->request(UserAccountLeadFeedConstantService::ACCOUNT_PERSONNEL_CREATE , $inputData, BaseService::HTTP_POST);
        //dd($response);
        $response = new ResponseHandlerService($response);
        //dd($response->getData());
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Account personnel created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/account');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function editAccountPersonnel($request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(UserAccountLeadFeedConstantService::ACCOUNT_PERSONNEL_EDIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Account personnel Updated successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/account');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function listByAccountPersonnel($account_id){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        //$inputData=$request->input();
        $inputData = ['id' => $account_id];
        $response = $baseService->request(UserAccountLeadFeedConstantService::GET_ACCOUNT_PERSONNELS , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd(head($response->getData()['items']));
            return view('crm.account.account_personnel',['viewData'=>$response->getData(), 'account'=>head($response->getData()['items'])['stage']]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

}
