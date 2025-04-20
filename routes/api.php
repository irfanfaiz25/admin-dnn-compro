<?php

use App\Http\Controllers\HeadlineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/headline/{sectionName}', [HeadlineController::class, 'getHeadline']);
