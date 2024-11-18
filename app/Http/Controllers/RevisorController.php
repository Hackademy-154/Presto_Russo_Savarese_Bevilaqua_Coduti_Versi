<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function accept(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()
        ->back()
        ->with('message', "Hai approvato questo annuncio $announcement->title");
    }

    public function reject(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()
        ->back()
        ->with('message', "Hai rifiutato questo annuncio $announcement->title");
    }
}
