<?php

use App\Helpers\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Check Host and Csp
Route::group(['middleware' => ['check.host']], function () {

    // Health Check
    Route::get('health-check', function (Request $request) {
        return Json::success(data: 'Application Is Running');
    });
});
