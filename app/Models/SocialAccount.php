<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SocialAccount extends Model
{
    use SoftDeletes;

    protected $fillable =[
    	'user_id',
    	'provider',
    	'provider_user_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
