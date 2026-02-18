<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;


//for testing purpose
Route::get('/test', function () {
    return response()->json(['message' => 'API route working']);
});
