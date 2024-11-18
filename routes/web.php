<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get( '/', [ PublicController::class, 'home' ] )->name( 'home.page' );
Route::get( '/announcements/create', [ AnnouncementController::class, 'create' ] )->name( 'announcements.create' );
Route::get( '/announcements/index', [ AnnouncementController::class, 'index' ] )->name( 'announcements.index' );
Route::get( '/announcements/{announcement}', [ AnnouncementController::class, 'show' ] )->name( 'announcements.show' );

// Rotte Categorie
Route::get( '/category/{category}', [ AnnouncementController::class, 'byCategory' ] )->name( 'byCategory' );

// Rotte per i revisori
route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
route::patch('/accept/{announcement}', [RevisorController::class, 'accept'])->name('accept');
route::patch('/reject/{announcement}', [RevisorController::class, 'reject'])->name('reject');