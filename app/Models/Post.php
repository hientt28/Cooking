<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'user_id',
    	'category_id',
    	'title',
    	'content',
    	'image',
    	'status',
    	'slug',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function notifications()
    {
    	return $this->hasMany(Notification::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
