<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = [
    	'following',
    	'follower',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
