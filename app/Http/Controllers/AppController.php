<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\AdministratorConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(Request $request)
    {
        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $header = ["Authorization" => "Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJVc2VySW5mbyI6eyJVc2VySWQiOjEsIlBlcm1pc3Npb25zIjpbMSwyXX0sImV4cCI6MTQ5MTkzNDk3MSwiaWF0IjoxNDkxOTE2OTcxLCJpc3MiOiJhZG1pbiJ9.lSMF4J9zOowA6Rai_cpz0nVmBJgayqS8xK3C7XmBNZFkTSzTAqPGCAQ6iQo6OJTyE4X6GuXYj_mfc6vItRCBUqpdrcHxGtsW8L0CSRD0Qd2UNy1U-vrplfxvobXhzZmbMcvULHgMEVQXYxW1AkRCMTCN0sED86bG7Oj7bdAkV-U8D4eVtxYLcAiot_-RnvHfaQTC1Vr88Phyxyq57SFy5by8YnHwJeLpjATyUoLgv6y8276qZw4ycoMU58XwbDXmPYY8K_VIZHvXY79qbpfoR68PUDXszOdEX-n42lprLfIv5KPhJMbT6J_Vij5hbIqFC0fINSCJrT0ao_7Ct9V5Vw"];
        $response = $baseService->request(AdministratorConstantService::APP_INDEX, $inputData, BaseService::HTTP_GET, $header);
        $response = new ResponseHandlerService($response);

        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            return view('admin.app.index', ['viewData' => $response->getData()]);
        } elseif ($response->getStatus() == ResponseHandlerService::STATUS_ERROR) {
          session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
              [AlertService::ALERT_HTML_MESSAGE_KEY => $response->getError(),
                  AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
          return view('admin.app.index', ['viewData' => null]);
        }
         else {
           session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
               [AlertService::ALERT_HTML_MESSAGE_KEY => $response->getError(),
                   AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
           return view('admin.app.index', ['viewData' => null]);
        }
    }
}
