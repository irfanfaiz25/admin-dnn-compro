<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

Route::get('/headline/{sectionName}', [APIController::class, 'getHeadline']);

Route::get('/sections/{sectionName}', [APIController::class, 'getSection']);

Route::get('/achievements', [APIController::class, 'getAchievements']);

Route::get('/branches', [APIController::class, 'getBranches']);

Route::get('/contact', [APIController::class, 'getContact']);

Route::get('/information/{name}', [APIController::class, 'getInformation']);

Route::get('/visi-misi/{name}', [APIController::class, 'getVisiMisi']);

Route::get('/products', [APIController::class, 'getProducts']);

Route::get('/testimonials/{type}', [APIController::class, 'getTestimonials']);

Route::post('/testimonials', [APIController::class, 'createTestimonial']);

Route::get('/posts', [APIController::class, 'getPosts']);

Route::get('/posts/{slug}', [APIController::class, 'getPost']);

Route::get('/beranda-posts', [APIController::class, 'getBerandaPosts']);