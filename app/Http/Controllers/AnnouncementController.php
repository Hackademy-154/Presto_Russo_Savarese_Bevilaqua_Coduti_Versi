<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AnnouncementController extends Controller implements HasMiddleware {

    public static function middleware(): array {
        return [
            'auth',
            new Middleware( 'log', only: [ 'announcements.create' ] ),
            // new Middleware( 'subscribed', except: [ 'store' ] ),
        ];
    }

    public function index() {
        $announcements = Announcement::orderBy( 'created_at', 'desc' )->with( 'category' )->get();
        return view( 'announcements.index', compact( 'announcements' ) );
    }

    public function create() {
        return view( 'announcements.create' );
    }
}
