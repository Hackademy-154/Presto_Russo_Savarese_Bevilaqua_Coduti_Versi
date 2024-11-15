<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
    public $timestamps = false;
    protected $fillable = [ 'name' ];

    public function announcements() : HasMany {
        return $this->hasMany( Announcement::class );
    }

}

