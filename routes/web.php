<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\WorkWithUsController;
use App\Http\Controllers\AnnouncementController;

Route::get( '/', [ PublicController::class, 'home' ] )->name( 'home.page' );
Route::get( '/announcements/create', [ AnnouncementController::class, 'create' ] )->middleware( 'auth' )->name( 'announcements.create' );
Route::get( '/announcements/index', [ AnnouncementController::class, 'index' ] )->name( 'announcements.index' );
Route::get( '/announcements/{announcement}', [ AnnouncementController::class, 'show' ] )->name( 'announcements.show' );

// Rotte Categorie
Route::get( '/category/{category}', [ AnnouncementController::class, 'byCategory' ] )->name( 'byCategory' );

// Rotte per i revisori
route::get( '/revisor/index', [ RevisorController::class, 'index' ] )->middleware( 'isRevisor' )->name( 'revisor.index' );
// INSERISCE NEL PATH TRUE
route::patch( '/accept/{announcement}', [ RevisorController::class, 'accept' ] )->name( 'accept' );
// INSERISCE NEL PATH FALSE
route::patch( '/reject/{announcement}', [ RevisorController::class, 'reject' ] )->name( 'reject' );

// Rotte per la accetazione Revisor
Route::get( '/revisor/request', [ RevisorController::class, 'requestForRevisor' ] )->middleware( 'auth' )->name( 'revisor.request' );
// ROTTA PER IMPLEMENTARE COMANDO APP DI ARTISAN SU TASTO EMAIL
Route::post( '/revisor/make/{user}', [ RevisorController::class, 'makeRevisor' ] )->middleware( 'auth' )->name( 'revisor.make' );

// rotte lavora con noi
Route::middleware(['auth'])->group(function () {
    Route::get('/lavora-con-noi', [WorkWithUsController::class, 'showForm'])->name('work.with.us');
});


//Rotta per la ricerca
Route::get( '/search/announcements', [ PublicController::class, 'searchAnnouncements' ] )->name( 'search.announcements' );