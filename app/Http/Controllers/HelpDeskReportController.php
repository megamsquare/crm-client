<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 7/18/2017
 * Time: 9:13 AM
 */

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\HelpDeskConstantService;
use App\Services\constants\UserAccountLeadFeedConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class HelpDeskReportController extends Controller
{
    public function index(Request $request)
    {
        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $inputData['userid'] = session('userinfo')['id'];
        $response = $baseService->request(HelpDeskConstantService::HELPDESK_All, $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);

        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            return view('helpdesk.report.index', [
                'viewData' => $response->getData(),
                'usersData'=>$this->getUsers()
            ]);
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }

    private function getUsers(){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        //$inputData=$request->input();
        $inputData = ['id' => ''];
        $response = $baseService->request(HelpDeskConstantService::HELPDESK_GET_UNITS_USERS , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd($response->getData());
            return $response->getData();
        }else{
            return $response->getError();
        }
    }
}