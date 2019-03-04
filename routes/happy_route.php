<?php
/**
 * Created by PhpStorm.
 * User: Kalu
 * Date: 28/03/2017
 * Time: 09:20
 */

Route::group(['prefix' => 'crm', 'middleware' => ["web",'islogin']], function () {




});
