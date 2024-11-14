<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;

use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateAnnuncementsForm extends Component {

    #[ Validate( 'required|min:5' ) ]
    public $title;
    #[ Validate( 'required|min:10' ) ]
    public $description;
    #[ Validate( 'required|numeric' ) ]
    public $price;
    #[ Validate( 'required' ) ]
    public $selectedCategory;

    public $announcement;

    public function save() {
        $this->validate();

        $announcement = Announcement::create( [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->selectedCategory,
            'user_id' => Auth::id()
        ] );
        session()->flash( 'success', 'Annunci Creati Con Successo!' );
        $this->reset();
    }

    public function render() {
        return view( 'livewire.create-annuncements-form' );
    }
}
