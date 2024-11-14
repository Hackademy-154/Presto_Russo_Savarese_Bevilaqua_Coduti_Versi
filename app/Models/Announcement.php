<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model {
    protected $fillable = [
        'title', 'description', 'price', 'category_id', 'user_id'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo( User::class );
    }

    public function categories() {
        return $this->belongsTo( Category::class );
    }
}

