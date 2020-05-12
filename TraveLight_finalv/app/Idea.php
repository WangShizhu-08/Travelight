<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

class Idea extends Model
{
    use Taggable;

    protected $guarded = [];

    protected $fillable = ['title', 'publisher', 'destination', 'startdate', 'enddate', 'comments_number', 'comments_content', 'description'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
