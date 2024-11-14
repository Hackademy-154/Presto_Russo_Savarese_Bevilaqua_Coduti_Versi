<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get( '/', [ PublicController::class, 'home' ] )->name( 'home.page' );
Route::get( '/announcements/create', [ AnnouncementController::class, 'create' ] )->name( 'announcements.create' );
