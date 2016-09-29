<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
    	'user_id',
    	'status',
    	'target_id',
    	'type',
    	'message',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function answer()
    {
    	return $this->belongsTo(Answer::class);
    }
}
