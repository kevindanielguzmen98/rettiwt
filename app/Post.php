<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    protected $fillable = [
        'post_id', 'user_id', 'content', 'active',
    ];
    protected $hidden = [
        'user_id', 'active'
    ];

    public function post()
    {
        return $this->belongsTo('App\User', [ 'user_id' => 'user_id' ]);
    }
}
