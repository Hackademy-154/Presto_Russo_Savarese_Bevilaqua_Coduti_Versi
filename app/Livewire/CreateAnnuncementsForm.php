<?php

namespace App\Livewire;

use App\Jobs\RemoveFaces;
use Livewire\Component;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;

use Livewire\Attributes\Validate;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnuncementsForm extends Component {
    // Questa aggiunta permette l'use delle immagini nel forLiveWire
    use WithFileUploads;


    #[ Validate ]
    public $title;
    #[ Validate ]
    public $description;
    #[ Validate ]
    public $price;
    #[ Validate ]
    public $selectedCategory;

    public $announcement;
    public $images = [];
    public $temporary_images;

    public function rules() {
        return [
            'title'=>'required|min:4',
            'description'=>'required|min:10',
            'price'=>'required|numeric',
            'selectedCategory'=>'required',
            'temporary_images.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'temporary_images' => 'max:6|max:2048'
        ];
    }

    public function messages(): array {
        return [
            '*.required'=>'Non Hai Inserito nulla in :attribute',
            'title.min'=>'Devi inserire in :attribute almeno 4 lettere',
            'description.min'=>'Devi inseire in :attribute almeno un testo di 10 lettere ',
            'price.required'=>'Seleziona almeno una :attribute ',
            'selectedCategory.required' => 'Seleziona almeno una categoria',
            'temporary_images.max' => 'Non puoi caricare più di 6 immagini',
            'temporary_images.*.image' => 'Non puoi caricare file non immagini',
            
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
        
        if(count($this->images)>0){
            foreach($this->images as $image){
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage =$this->announcement->images()->create( ['path' => $image->store($newFileName, 'public' )]);
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 500, 1000),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('app/livewire-tmp'));
            
        }
        session()->flash( 'success', 'Annunci Creati Con Successo!' );
        $this->reset();

        
    }

    public function render() {
        return view( 'livewire.create-annuncements-form' );
    }

    public function updatedTemporaryImages (){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6|max:2048'
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }

    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }
}
