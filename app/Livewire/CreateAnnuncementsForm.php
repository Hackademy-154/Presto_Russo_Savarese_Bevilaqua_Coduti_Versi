<?php

namespace App\Livewire;

use Livewire\Component;

class CreateAnnuncementsForm extends Component {
    public $title;
    public $description;
    public $price;

    public function save() {
        dd( 'ciao' );
    }

    public function render() {
        return view( 'livewire.create-annuncements-form' );
    }
}
