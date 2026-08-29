<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::view('/', 'home.index');

Route::post('/', [ContactController::class, 'input'])->name('contact.input');
