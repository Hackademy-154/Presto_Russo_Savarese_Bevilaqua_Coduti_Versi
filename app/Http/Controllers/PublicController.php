<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller {

    public function home() {
        $latestAnnouncements = Announcement::orderBy( 'created_at', 'desc' )->take( 6 )->get();
        return view( 'welcome', compact( 'latestAnnouncements' ) );

    }
}
