<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;

use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateAnnuncementsForm extends Component {

    #[ Validate ]
    public $title;
    #[ Validate ]
    public $description;
    #[ Validate ]
    public $price;
    #[ Validate ]
    public $selectedCategory;

    public $announcement;

    public function rules() {
        return [
            'title'=>'required|min:4',
            'description'=>'required|min:10',
            'price'=>'required|numeric',
            'selectedCategory'=>'required'
        ];
    }

    public function messages(): array {
        return [
            '*.required'=>'Non Hai Inserito nulla in :attribute',
            'title.min'=>'Devi inserire in :attribute almeno 4 lettere',
            'description.min'=>'Devi inseire in :attribute almeno un testo di 10 lettere ',
            'price.required'=>'Seleziona almeno una :attribute ',
            'selectedCategory.required' => 'Seleziona almeno una categoria',
            // 'title.required' => 'A title is required',
            // 'body.required' => 'A message is required',
        ];
    }

    public function save() {
        $this->validate();

        $this->announcement = Announcement::create( [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' =>$this->selectedCategory ,
            'user_id' => Auth::id()
        ] );
        session()->flash( 'success', 'Annunci Creati Con Successo!' );
        $this->reset();

    }

    public function render() {
        return view( 'livewire.create-annuncements-form' );
    }
}
