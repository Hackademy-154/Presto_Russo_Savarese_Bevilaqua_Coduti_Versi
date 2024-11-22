<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller {

    public function home() {
        // $latestAnnouncements = Announcement::orderBy( 'created_at', 'desc' )->take( 6 )->get();
        // return view( 'welcome', compact( 'latestAnnouncements' ) );

        $announcements = Announcement::where( 'is_accepted', true )->orderBy( 'created_at', 'desc' )->take( 6 )->get();
        return view( 'welcome', compact( 'announcements' ) );

    }

    public function searchAnnouncements( Request $request ) {
        $query = $request->input( 'query' );
        $announcements = Announcement::search( $query )->where( 'is_accepted', true )->paginate( 10 );
        return view( 'announcements.searched', compact( 'announcements', 'query' ) );
    }

    public function setLanguage( $lang ) {
        session()->put( 'locale', $lang );
        return redirect()->back();
    }

}
