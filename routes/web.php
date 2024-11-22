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
Route::get( '/revisor/index', [ RevisorController::class, 'index' ] )->middleware( 'isRevisor' )->name( 'revisor.index' );
// INSERISCE NEL PATH TRUE
Route::patch( 'revisor/accept/{announcement}', [ RevisorController::class, 'accept' ] )->name( 'revisor.accept' );
// INSERISCE NEL PATH FALSE
Route::patch( 'revisor/reject/{announcement}', [ RevisorController::class, 'reject' ] )->name( 'revisor.reject' );
Route::patch( 'revisor/reset/{announcement}', [ RevisorController::class, 'reset' ] )->name( 'revisor.reset' );
//LISTE DI ANNUNCI ACCETTATI E RIFIUTATI
Route::get('/revisor/review-accepted', [RevisorController::class, 'reviewAccepted'])->name('revisor.reviewAccepted');
Route::get('/revisor/review-rejected', [RevisorController::class, 'reviewRejected'])->name('revisor.reviewRejected');


// Rotte per la accetazione Revisor
Route::get( '/revisor/request', [ RevisorController::class, 'becomeRevisor' ] )->middleware( 'auth' )->name( 'become.revisor' );
// ROTTA PER IMPLEMENTARE COMANDO APP DI ARTISAN SU TASTO EMAIL
Route::get( '/revisor/make/{user}', [ RevisorController::class, 'makeRevisor' ] )->middleware( 'auth' )->name( 'revisor.make' );

// rotte lavora con noi
Route::middleware(['auth'])->group(function () {
    Route::get('/lavora-con-noi', [WorkWithUsController::class, 'showForm'])->name('work.with.us');
});


//Rotta per la ricerca
Route::get( '/search/announcements', [ PublicController::class, 'searchAnnouncements' ] )->name( 'search.announcements' );


// Rotta per la lingua
Route::post( '/language/{lang}', [ PublicController::class, 'setLanguage' ] )->name( 'set.locale' );