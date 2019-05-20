<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at'
    ];

    protected $fillable = ['author', 'title', 'content', 'thumbnail_path'];
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    } 

}
