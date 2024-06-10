<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/publications/{doi}', [PublicationController::class, 'show'])->name('publications.show')->where('doi', '.*');;
