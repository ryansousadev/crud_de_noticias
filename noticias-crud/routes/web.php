<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NoticiaController;

Route::resource('news', NoticiaController::class);

Route::get('/', function () {
    return redirect('/news');
});
