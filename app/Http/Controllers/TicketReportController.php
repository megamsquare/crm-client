<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\HelpDeskConstantService;
use App\Services\constants\UserAccountLeadFeedConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class TicketReportController extends Controller
{
    public function index(Request $request)
    {
        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData = $request->input();
        $inputData['userid'] = session('userinfo')['id'];
        $response = $baseService->request(HelpDeskConstantService::HELPDESK_TICKET_REPORT, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);

        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            return view('helpdesk.ticketreport.reportTicket', ['viewData' => $response->getData()]);
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }

  public function moreActions($action = null, $helpdesk_id = null, Request $request){
    //dd($helpdesk_id);die();
      switch ($action) {
          case "chat":
              return $helpdesk_id == null ? view("errors.503",['message'=>'invalid ticket selection']) : $this->getTicket($helpdesk_id);
              return view("helpdesk.ticketreport.viewticket");
              break;
          case "getusers":
              return $this->getUsers();
              break;
          case "create":
              return $this->createTicket($request);
              break;
          case "add":
              return $this->addUsersTicket($request);
              break;
          case "removeusers":
              $inputData=$request->input();
              $inputData['helpdesk_id'] = $helpdesk_id;
              return $this->removeUsersFromTicket($inputData);
          case "comment":
              $inputData=$request->input();
              $inputData['helpdeskid'] = $helpdesk_id;
              return $this->createComment($inputData);
              break;
          case "getcomment":
              return $this->getComment();
              break;
          case "changestatus":
              return $this->closeReopenTicket($request);
              break;
          case "unfollow":
              echo "action is unfollow feed id:".$helpdesk_id;
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
      $response = $baseService->request(HelpDeskConstantService::HELPDESK_GET_UNITS_USERS , $inputData, BaseService::HTTP_GET);
      $response = new ResponseHandlerService($response);

      if($response->getStatus() == ResponseHandlerService::STATUS_OK){
          //dd($response->getData());
          return $response->getData();
      }else{
          return $response->getError();
      }
  }

  private function createTicket($request){
      $baseService = resolve('BaseService');
      $inputData=$request->input();
      $inputData['created_by_id'] = session('userinfo')['id'];

      $response = $baseService->request(HelpDeskConstantService::HELPDESK_CREATE , $inputData, BaseService::HTTP_POST);
      $response = new ResponseHandlerService($response);
      if($response->getStatus() == ResponseHandlerService::STATUS_OK){
          session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
              [AlertService::ALERT_HTML_MESSAGE_KEY => "Ticket created and users added successfully.",
                  AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
          return redirect('/helpdesk/ticketreport');
      }else{
          return view("errors.503",['message'=>$response->getError()]);
      }
  }

  private function getTicketUsers($helpdesk_id = null){

      /** @var BaseService $baseService */
      $baseService = resolve('BaseService');
      //$inputData=$request->input();
      $inputData = ['feed_id' => $helpdesk_id];
      $response = $baseService->request(HelpDeskConstantService::HELPDESK_GET_USERS , $inputData, BaseService::HTTP_GET);
      $response = new ResponseHandlerService($response);

      if($response->getStatus() == ResponseHandlerService::STATUS_OK){
          //dd($response->getData());
          return $response->getData();
      }else{
          return $response->getError();
      }
  }

  private function getTicket($helpdesk_id = null){

      /** @var BaseService $baseService */
      $baseService = resolve('BaseService');
      //$inputData=$request->input();
      $inputData = ['id' => ''];
      $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_GET_UNITS_USERS , $inputData, BaseService::HTTP_GET);
      $response = new ResponseHandlerService($response);

      if($response->getStatus() == ResponseHandlerService::STATUS_OK){
          //dd($response->getData());
          //dd($this->getTicketUsers($helpdesk_id));die();
          return view('helpdesk.ticketreport.viewticket',[
              'viewData'=>$response->getData(),
              'usersData'=>$this->getUsers(),
              'helpdeskUsersData'=>$this->getTicketUsers($helpdesk_id),
              'helpdeskCommentData'=>$this->getComment($helpdesk_id),
              'helpdesk_id'=>$helpdesk_id
          ]);
      }else{
          return view("errors.503",['message'=>$response->getError()]);
      }
  }

    public function viewTicket(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        if(empty($inputData['id'])){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Select a ticket to view details.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('helpdesk/ticketreport');
        }
        $response = $baseService->request(UserAccountLeadFeedConstantService::USER_INDEX , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('helpdesk.ticketreport.viewticket',['0'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function addUsersTicket($request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        //dd($inputData);
        $response = $baseService->request(UserAccountLeadFeedConstantService::FEED_ADD_USERS , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Ticket created and users added successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/helpdesk/ticketreport');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    private function removeUsersFromTicket($inputData){
        $baseService = resolve('BaseService');
        $response = $baseService->request(HelpDeskConstantService::HELPDESK_REMOVE_USERS , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Users removed from Ticket successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/helpdesk/ticketreport/chat/'.$inputData['helpdesk_id']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function createComment($inputData)
    {
        $baseService = resolve('BaseService');
        $inputData['userid'] = session('userinfo')['id'];
        $response = $baseService->request(HelpDeskConstantService::HELPDESK_CREATE_COMMENT, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if ($response->getStatus() == ResponseHandlerService::STATUS_OK) {
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "successfully Comment.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/helpdesk/ticketreport/chat/'.$inputData['helpdeskid']);
        } else {
            return view("errors.503", ['message' => $response->getError()]);
        }
    }

    private function getComment($helpdesk_id = null){

        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData = ['helpdesk_id' => $helpdesk_id];
        $response = $baseService->request(HelpDeskConstantService::HELPDESK_VIEW_COMMENT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return $response->getData();
        }else{
            return $response->getError();
        }
    }

    private function closeReopenTicket($request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(HelpDeskConstantService::HELPDESK_CHANGE_STATUS , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Ticket Close successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/helpdesk/ticketreport');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
}
