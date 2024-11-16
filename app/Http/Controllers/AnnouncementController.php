<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AnnouncementController extends Controller implements HasMiddleware {

    public static function middleware(): array {
        return [

            new Middleware( 'auth', only: [ 'announcements.create' ] ),

        ];
    }

    public function create() {
        return view( 'announcements.create' );
    }

    public function index() {
        $announcements = Announcement::orderBy( 'created_at', 'desc' )->paginate( 6 );
        return view( 'announcements.index', compact( 'announcements' ) );
    }

    public function show( Announcement $announcement ) {
        return view( 'announcements.show', compact( 'announcement' ) );
    }

    public function byCategory( Category $category ) {
        return view( 'announcements.byCategory', [ 'announcements' => $category->announcements, 'category' => $category ] );
    }
}