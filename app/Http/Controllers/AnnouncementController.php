<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AnnouncementController extends Controller implements HasMiddleware {

    public static function middleware(): array {
        return [
            'auth',
            new Middleware( 'log', only: [ 'announcements.create' ] ),
            // new Middleware( 'subscribed', except: [ 'store' ] ),
        ];
    }

    public function create() {
        return view( 'announcements.create' );
    }
}
