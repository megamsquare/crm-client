<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\TransactionOperationConstantService;
use App\Services\constants\HelpDeskConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use App\Services\TransactionTypeService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index(Request $request){
        /** @var BaseService $baseService */
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_INDEX , $inputData, BaseService::HTTP_GET);
        //DD($response);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('crm.transactions.index',['viewData'=>$response->getData(),'usersData'=>$this->getUsers()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
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

    public function viewTransaction(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        if(empty($inputData['transaction_id'])){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Select a transaction to view details.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('crm/transaction');
        }
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_DETAILS , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('crm.transactions.view',['viewData'=>$response->getData(),'transaction_id'=>$inputData['transaction_id']]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function createTransaction(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Transaction created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/transaction');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function editTransaction(Request $request){
        session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
            [AlertService::ALERT_HTML_MESSAGE_KEY => "Transactions Edit successfully.",
                AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
        return redirect('/crm/transaction');
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(ConstantService::BASE_PATH.'department/edit' , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => " edited successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/department');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function deletetransaction(Request $request){
        session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
            [AlertService::ALERT_HTML_MESSAGE_KEY => "Transactions Deleted successfully.",
                AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
        return redirect('/crm/transaction');
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(ConstantService::BASE_PATH.'transaction/delete' , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Transaction deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/transction');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    //--------------------------------- Job -------------------------------------
    public function createJob(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Transaction created successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/transaction');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function commercialPrints(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();

        if(empty($inputData['crm_transaction_id'])){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Invalid transaction",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('crm/transaction');
        }
        $inputData['transaction_id'] = $inputData['crm_transaction_id'];
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_DETAILS , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        //DD($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view("crm.transactions.commercialPrints",['crm_transaction_id'=>$inputData['crm_transaction_id'], 'viewData'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function commercialPrintsPost(Request $request){

        $baseService = resolve('BaseService');
        $inputData=$request->input();
        if(in_array('',$inputData)){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "All the fields with asterisk  are required.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/crm/commercialPrints?crm_transaction_id='.$inputData['crm_transaction_id'])->withInput();
        }
        $response = $baseService->request(TransactionOperationConstantService::COMMERCIAL_PRINTS_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);

        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Commercial prints successfully created.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/viewmoretransaction?transaction_id='.$inputData['crm_transaction_id']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }

    }
    public function securityPrints(Request $request){

        return view("crm.transactions.securityPrints",['crm_transaction_id'=>$request->crm_transaction_id]);

    }
    public function securityPrintsPost(Request $request){

        $baseService = resolve('BaseService');
        $inputData=$request->input();
        if(in_array('',$inputData)){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "All the fields with asterisk  are required.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/crm/securityPrints?crm_transaction_id='.$inputData['crm_transaction_id'])->withInput();
        }
        $inputData['ancillaries']=implode(',',$inputData['ancillaries']);
        $inputData['sheet']=implode(',',$inputData['sheet']);
        $response = $baseService->request(TransactionOperationConstantService::SECURITY_PRINTS_CREATE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
       if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Commercial prints successfully created.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/viewmoretransaction?transaction_id='.$inputData['crm_transaction_id']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }

    }

    public function getListOfSuggestedAccount(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::ACCOUNT_TRANSACTION_DETAILS, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return $response->getData();
        }else{
            return $response->getError();
        }
    }
    public function getListOfTransactionDetails(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_DETAILS, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return $response->getData();
        }else{
            return $response->getError();
        }
    }

    public function getListOfSuggestedDocument(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::DOCUMENT_TRANSACTION_DETAILS, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return $response->getData();
        }else{
            return $response->getError();
        }
    }
    public function createDocumentTransaction(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_CREATE_DOCUMENT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Document add successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/viewmoretransaction?transaction_id='.$inputData['crm_transaction_id']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function getListOfSuggestedNotes(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_NOTE_DETAILS, $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return $response->getData();
        }else{
            return $response->getError();
        }
    }

    public function createNoteTransaction(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_CREATE_NOTE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Note add successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/viewmoretransaction?transaction_id='.$inputData['crm_transaction_id']);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }

    public function delete(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(TransactionOperationConstantService::TRANSACTION_DELETE , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Transaction deleted successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            return redirect('/crm/transaction');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
}

