<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model {
    protected $fillable = [
        'title', 'description', 'price', 'category_id', 'user_id'
    ];

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
}

