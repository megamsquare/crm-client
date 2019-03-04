<?php
/**
 * Created by PhpStorm.
 * User: Kalu
 * Date: 10/05/2017
 * Time: 11:08
 */

namespace App\Http\Controllers;


use App\Services\BaseService;
use App\Services\ResponseHandlerService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){

              return view('admin.index');
    }
}