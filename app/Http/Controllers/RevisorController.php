<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $lastAccepted = Announcement::accepted()->orderBy('updated_at', 'desc')->take(2)->get();
        $lastRejected = Announcement::rejected()->orderBy('updated_at', 'desc')->take(2)->get();

        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check', 'lastAccepted', 'lastRejected'));
    }

    public function accept(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()
            ->back()
            ->with('message', "Hai approvato questo annuncio $announcement->title");
    }

    public function reject(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()
            ->back()
            ->with('message', "Hai rifiutato questo annuncio $announcement->title");
    }

    public function requestForRevisor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255']);
            // 'motivation' => 'required|string|max:500' ]);
        

        Mail::to('admin@presto.it')->send (new BecomeRevisor(Auth::user(), $request->name, $request->email,));
        return redirect()->route('home.page')->with('message', 'La Tua Richiesta Per Diventare Revisor del Sito inviata correttamente');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', [
            'email' => $user->email
        ]);
        return redirect()->back();
    }
}
