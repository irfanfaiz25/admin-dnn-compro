<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HeadlineController;
use App\Http\Controllers\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/headline/{sectionName}', [HeadlineController::class, 'getHeadline']);

Route::get('/sections/{sectionName}', [SectionController::class, 'getSection']);

Route::get('/achievements', [AchievementController::class, 'getAchievements']);

Route::get('/branches', [BranchController::class, 'getBranches']);

Route::get('/contact', [ContactController::class, 'getContact']);