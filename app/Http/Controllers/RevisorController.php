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

        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
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
  
    public function reset(Announcement $announcement)
    {
        $announcement->is_accepted = null;
        $announcement->save();
        return redirect()
            ->back()
            ->with('message', "Hai resettato lo stato di questo annuncio $announcement->title");
    }

    public function reviewAccepted()
    {
        $acceptedAnnouncements = Announcement::accepted()->orderBy('updated_at', 'desc')->paginate(10);
        return view('revisor.reviewAccepted', compact('acceptedAnnouncements'));
    }

    public function reviewRejected()
    {
        $rejectedAnnouncements = Announcement::rejected()->orderBy('updated_at', 'desc')->paginate(10);
        return view('revisor.reviewRejected', compact('rejectedAnnouncements'));
    }

    public function becomeRevisor()
    {
        // Invia l'email all'admin
if(Auth::check()){

        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));

        return redirect()->route('home.page')
            ->with('message', 'La tua richiesta per diventare revisore è stata inviata correttamente.');
    } else {
    return redirect()->route('home.page')
        ->with('errorMessage', 'Devi essere loggato per richiedere la possibilita di diventare revisore.');
}
    }
    
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', [
            'email' => $user->email
        ]);
        return redirect()->back();
    }
}
