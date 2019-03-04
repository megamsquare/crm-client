<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\AuthConstantService;
use App\Services\ResponseHandlerService;
use App\Services\RoleResourceService;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{

    public  function login(Request $request){
        if(!$request->session()->has('headertoken')){
        return view('auth.login');
    }else{
            return redirect('/');
}
    }
    public  function loginPost(Request $request){

       $this->validate($request,[
           'username'=>'required',
           'password'=>'required|min:6'
       ]);
        /** @var BaseService $baseService */

        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(AuthConstantService::LOGIN_POST , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            $responseData = $response->getData();
            //dd($responseData['userinfo']);
            $request->session()->put('headertoken',$responseData['headertoken']);
            $request->session()->put('userinfo',$responseData['userinfo']);
            $request->session()->put('resources',$responseData['resources']);
            $request->session()->put('permissions',$responseData['permissions']);
            /*$resourcesString=
                "<?php
                 namespace App\\Services;
                 class RouteAppService {\n";
            foreach($responseData['resources'] as $resource){
                $resourcesString = $resourcesString .'const '.strtoupper($resource['key'])."='{$resource['key']}';\n";
            }
            $resourcesString = $resourcesString."\n\n} \n\n?>";
            dd(File::put(app_path().'/Services/RouteAppService.php',$resourcesString));*/

            return redirect('/');
        }else{
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY =>$response->getError(),
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/login')->withInput();
        }
    }

}
