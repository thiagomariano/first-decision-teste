<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/lista', function () {
    return \App\Models\User::all();
});
require __DIR__.'/auth.php';
