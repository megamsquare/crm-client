<?php

namespace App\Http\Controllers;

use App\Services\AlertService;
use App\Services\BaseService;
use App\Services\constants\DocumentConstantService;
use App\Services\ConstantService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index(Request $request){
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $response = $baseService->request(DocumentConstantService::DOCUMENT_INDEX , $inputData, BaseService::HTTP_GET);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            return view('crm.documents.index',['viewData'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function details(Request $request){
        $baseService = resolve('BaseService');
        $inputData['id']=$request->document_id;
        $response = $baseService->request(DocumentConstantService::DOCUMENT_DETAILS , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
           // dd($response->getData()[0]['crmDocuments']['title']);
            return view('crm.documents.details',['viewData'=>$response->getData()]);
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function create(Request $request){

        $baseService = resolve('BaseService');
        $inputData=$request->input();
      /*  var_dump($inputData);
         echo sha1(uniqid());
        dd($file);*/
        if($request->hasFile('file_name')){
            $file=$request->file('file_name');
            $file_name=explode('.',$file->getClientOriginalName())[0];
            $file_name=str_replace(' ','-',$file_name).'-'.date('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension();
            if($file->move('documents',$file_name)){
                $inputData['file_name']=$file_name;
                $response = $baseService->request(DocumentConstantService::DOCUMENT_CREATE , $inputData, BaseService::HTTP_POST);
                $response = new ResponseHandlerService($response);
                if($response->getStatus() == ResponseHandlerService::STATUS_OK){
                    session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                        [AlertService::ALERT_HTML_MESSAGE_KEY => "Document created successfully.",
                            AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
                    return redirect('/crm/documents');
                }else{

                    return view("errors.503",['message'=>$response->getError()]);
                }
            }else{
                session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                    [AlertService::ALERT_HTML_MESSAGE_KEY => "Error occurred while trying to upload your document.",
                        AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            }
        }else{
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "Please select the document to upload..",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
        }
        return view("errors.503");
    }
    public function edit(Request $request){
        $this->validate($request, [
            "title" => "required",
            "details" => "required",
            "file_name" => "required"
        ]);
        $baseService = resolve('BaseService');
        $inputData=$request->input();
        $isNewFileSaved=false;
       if($request->hasFile('file_upload')){
            $file=$request->file('file_upload');
            $file_name=explode('.',$file->getClientOriginalName())[0];
            $file_name=str_replace(' ','-',$file_name).'-'.date('Y-m-d-H-i-s').'.'.$file->getClientOriginalExtension();
            if($file->move('documents',$file_name)){
                $isNewFileSaved=true;
                $inputData['file_name']=$file_name;
            }
        }
        $response = $baseService->request(DocumentConstantService::DOCUMENT_EDIT , $inputData, BaseService::HTTP_POST);
        $response = new ResponseHandlerService($response);
        if($response->getStatus() == ResponseHandlerService::STATUS_OK){
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "document edited successfully.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_SUCCESS]);
            if($isNewFileSaved){
                $oldFile= public_path(). "/documents/".$request->file_name;
                if(file_exists($oldFile)){
                    unlink($oldFile);
                }
            }
            return redirect('/crm/documents');
        }else{
            return view("errors.503",['message'=>$response->getError()]);
        }
    }
    public function download(Request $request)
    {
        $this->validate($request, [
            "file_name" => "required"
        ]);
        $file= public_path(). "/documents/".$request->file_name;
        if(file_exists($file))
        return response()->download($file);
        else{
            session()->flash(AlertService::ALERT_HTML_MESSAGE_KEY,
                [AlertService::ALERT_HTML_MESSAGE_KEY => "The file you want to download was not found.",
                    AlertService::ALERT_HTML_CLASS_Key => AlertService::ALERT_DANGER]);
            return redirect('/crm/documents');
        }
    }
}

