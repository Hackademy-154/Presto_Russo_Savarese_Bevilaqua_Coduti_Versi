<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    public $timestamps = false;
    protected $fillable = [ 'name' ];

    public function announcements() : HasMany {
        return $this->hasMany( Announcement::class );
    }

}

