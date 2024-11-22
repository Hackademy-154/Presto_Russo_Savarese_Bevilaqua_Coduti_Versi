<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model {

    use Searchable;

    protected $fillable = [
        'title', 'description', 'price', 'category_id', 'user_id', 'status','reviewed_at'
    ];

    public function toSearchableArray() {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,

        ];
    }

    public function user() : BelongsTo {
        return $this->belongsTo( User::class );
    }

    public function category() : BelongsTo {
        return $this->belongsTo( Category::class );
    }

    // funzione di logica di revisione articoli

    public function setAccepted( $value ) {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function countAttendToRevise() {
        return Announcement::where( 'is_accepted', null )->count();
    }

    public function scopeAccepted($query)
    {
        return $query->where('is_accepted', true);
    }

    public function scopeRejected($query)
    {
        return $query->where('is_accepted', false);
    }

// Funzione di relazione per Limmagine

    public function images() : HasMany {
        return $this->hasMany( Image::class );
    }

}



