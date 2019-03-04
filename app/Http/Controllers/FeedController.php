<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\UserAccountLeadFeedConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(Request $request){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $inputData['user_id'] = session('userinfo')['id'];
        $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_INDEX , $inputData, BaseService::HTTP_POST);

        $response = new ResponseHandlerService($response);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd($response);
            return view('crm.feeds.index',['viewData'=>$response->getData(),'usersData'=>$this->getUsers()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function moreActions($action = null, $feed_id = null, Request $request){
        switch ($action) {
            case "chat":
                //dd(session('userinfo'));
                return $feed_id == null ? view("errors.503",['message'=>'invalid feed selection']) : $this->getFeed($feed_id);
            case "comment":
                $inputData=$request->input();
                $inputData['userid'] = session('userinfo')['id'];
                return $this->addComment($inputData);
            case "getusers":
                return $this->getUsers();
            case "create":
                return $this->createFeed($request);
            case "addusers":
                $inputData=$request->input();
                $inputData['feed_id'] = $feed_id;
                return $this->addUsersFeed($inputData);
            case "removeusers":
                $inputData=$request->input();
                $inputData['feed_id'] = $feed_id;
                return $this->removeUsersFromFeed($inputData);
            case "unfollow":
                echo "action is unfollow feed id:".$feed_id;
                break;
            case "delete":
                echo "action is unfollow feed id:".$feed_id;
                break;
            default:
                return view("errors.503",['message'=>'invalid action']);
        }

    }

    private function getUsers(){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        //$inputData=$request->input();
        $inputData = ['id' => ''];
        $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_GET_UNITS_USERS , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd($response->getData());
            return $response->getData();
        }else{
            return $response->getError();
        }
    }
    private function getFeedUsers($feed_id = null){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        //$inputData=$request->input();
        $inputData = ['feed_id' => $feed_id];
        $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_GET_USERS , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd($response->getData());
            return $response->getData();
        }else{
            return $response->getError();
        }
    }

    private function getFeed($feed_id = null){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        //$inputData=$request->input();
       $inputData = ['id' => ''];
        $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_GET_UNITS_USERS , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        //dd($response);

        $baseService = resolve('BaseService');
        $inputData2 = ['feed_id' => $feed_id];

        $responseComment = $baseService->request(UserAccountLeadFeedConstantService::FEED_GET_COMMENTS , $inputData2, BaseService::HTTP_POST);
        //dd($responseComment);
        $responseComment = new ResponseHandlerService($responseComment);
        //dd($responseComment);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd($response2->getData());
            return view('crm.feeds.feed',[
                'viewData'=>$response->getData(),
                'usersData'=>$this->getUsers(),
                'feedUsersData'=>$this->getFeedUsers($feed_id),
                'commentData'=>$responseComment->getData(),
                'feedData'=>$responseComment->getData()['feed_property'],
                'feed_id'=>$feed_id
            ]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function createFeed($request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $inputData['created_by_id'] = session('userinfo')['id'];
        //dd($inputData);

        $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Feed created and users added successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/feeds');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function addUsersFeed($inputData){
        $baseService = resolve('BaseService');
        $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_ADD_USERS , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Users added to feed successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/feeds/chat/'.$inputData['feed_id']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function addComment($inputData){
        $baseService = resolve('BaseService');
        $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_ADD_COMMENT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            //dd($response->getData());
            return $response->getData();
        }else{
            return $response->getError();
        }
    }

    private function removeUsersFromFeed($inputData){
        $baseService = resolve('BaseService');
        $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_REMOVE_USERS , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Users removed from feed successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/feeds/chat/'.$inputData['feed_id']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

}
