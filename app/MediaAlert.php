<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class MediaAlert extends Model {

    use Searchable;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mediaalerts';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','mediacontent','type','status','created_by',
    ];
}
