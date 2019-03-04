<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\CompanyDeptUnitDocConstantService;
use App\Services\constants\UserAccountLeadFeedConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $response = $baseService->request(UserAccountLeadFeedConstantService::USER_INDEX, $inputData, BaseService::HTTP_GET);

        $response = new ResponseHandlerService($response);

        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            return view('admin.user.userlist', ['viewData' => $response->getData()]);
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }

    public function moreActions($action = null, $user_id = null, Request $request){
        switch ($action) {
            case "create":
                return $this->createUser($user_id);
            case "update_profile":
                return $this->editUser($user_id,$request);
            case "reset_password":
                return $this->resetUserPassword($user_id,$request);
            case "change_password":
                return $this->updateUserPassword($user_id,$request);
            case "profile":
                return $this->getUser(session('userinfo')['id']);
            case "import":
                return $this->importUserCsv($request);
            case "delete":
                return $this->deleteUser($request);
            default:
                return view("errors.503",['message'=>'invalid action']);
        }
    }

    public function createUser(Request $request)
    {
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $response = $baseService->request(UserAccountLeadFeedConstantService::USER_CREATE, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "User created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/user');
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }

    private function editUser($user_id, $request)
    {
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $inputData['id'] = $user_id;
        $response = $baseService->request(UserAccountLeadFeedConstantService::USER_EDIT, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "User Profile updated successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/admin/user/profile#personal_info');
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }


    }

    /*private function updateUser($user_id,$request){
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $inputData['user_id'] = $user_id;
        $response = $baseService->request(UserAccountLeadFeedConstantService::USER_VIEW , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return redirect('/admin/user/profile#personal_info');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }*/

    private function resetUserPassword($user_id,$request){
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $inputData['id'] = $user_id;
        $response = $baseService->request(UserAccountLeadFeedConstantService::USER_RESET_PASSWORD , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return redirect('/admin/user');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function updateUserPassword($user_id,$request){
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $inputData['id'] = $user_id;
        $response = $baseService->request(UserAccountLeadFeedConstantService::USER_CHANGE_PASSWORD , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return redirect('/logout');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function getUser($user_id = null){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        //$inputData=$request->input();
        $inputData = ['user_id' => $user_id];
        $response = $baseService->request(UserAccountLeadFeedConstantService::USER_VIEW , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);

        //dd($response->getData()['unit_members']);
        if($response->getData()['user_unit'] != false){
            //$baseService = resolve('BaseService');
            $inputData2 = ['unitId' => $response->getData()['user_unit']['unit_id']];
            //dd($inputData2);
            $response2 = $baseService->request(CompanyDeptUnitDocConstantService::UNIT_GET_USERS_IN_UNIT , $inputData2, BaseService::HTTP_GET);
            //dd($response2);
            //dd($response->getData()['user_unit']);
            $response2 = new ResponseHandlerService($response2);
            //dd($response2->getData());
        }

        //dd($response->getData()['unit_members']);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd($response2);
            //if(!empty(head($response->getData())))
            return view('admin.user.user_profile',[
                'viewData'=>$response->getData()['user'],
                'viewData2'=> !$response->getData()['user_unit']? null : $response->getData()['user_unit'],
                'viewData3'=> !$response->getData()['unit_members']? null : $response->getData()['unit_members'],
                'unitMembers'=> empty($response2->getData())? null : $response2->getData()
            ]);
           // else return view("errors.503",['message'=>'You have not been added to a Unit.']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function importUserCsv($request){
        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        if($request->hasFile('usercsv')){
            $file=$request->file('usercsv');
            //dd($file->get);
            if($file->getClientSize() > 819200){
                session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                    [AlertService::ALERT_HTML_MESSAGE_KEY => "File Exceeded Limit Size of 800KB..",
                        AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            }
            if($file->getClientOriginalExtension() == 'csv'){

                $bigStr = [];
                $handle = fopen($file->path(), "r");
                $header = true;

                while ($csvLine = fgetcsv($handle, 1000, ",")) {

                    if ($header) {
                        $header = false;
                    } else {
                        $names = empty($csvLine[0])? null : $csvLine[0];
                        $sex = empty($csvLine[1])? null : $csvLine[1];
                        $staff_no = empty($csvLine[3])? null : $csvLine[3];
                        $phone = empty($csvLine[5])? null : $csvLine[5];
                        $email = empty($csvLine[6])? null : $csvLine[6];
                        if(!(count(array_filter($csvLine)) <= 3)){
                            $bigStr[]= [
                                'names'=>$names,
                                'sex'=>$sex[0],
                                'staff_no'=>$staff_no,
                                'phone_no'=>$phone,
                                'emails'=>$email
                            ];
                        }
                    }
                }
                $inputData['user_csv']=$bigStr;
                $response = $baseService->request(UserAccountLeadFeedConstantService::USER_IMPORT_CSV , $inputData, BaseService::HTTP_POST);
                $response = new ResponseHandlerService($response);
                //dd(json_encode($response->getData()));
                //dd($response->getData());
                if($response->getStatus() == ResponseHandlerService::STATUS_OK){
                    session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                        [AlertService::ALERT_HTML_MESSAGE_KEY => "Users imported successfully.",
                            AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
                    return redirect('/crm/admin/user');
                }else{
                    return view("errors.503",['message'=>$response->getError()]);
                }

            }else{
                session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                    [AlertService::ALERT_HTML_MESSAGE_KEY => "Please convert your excel file to csv before upload..",
                        AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
                return redirect('/crm/admin/user');
            }
        }else{
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Please select the CSV document to upload..",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/admin/user');
        }
        return view("errors.503");

    }

    private function deleteUser($request)
    {
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $response = $baseService->request(UserAccountLeadFeedConstantService::USER_DELETE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "User deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/admin/user');
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }
}
