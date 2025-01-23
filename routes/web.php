<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;

Route::get('/', [CommandeController::class,'index'])->name('welcome');