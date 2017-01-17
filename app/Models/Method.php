<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Notification;
use App\Models\Category;
use App\Models\Step;
use App\Models\Comment;

class Method extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'user_id',
    	'category_id',
    	'title',
    	'content',
    	'image',
    	'status',
    	'slug',
        'material',
    ];

    public function userRates()
    {
    	return $this->belongsToMany(User::class, 'rates')->withPivot('level');
    }

    public function notification()
    {
    	return $this->belongsTo(Notification::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
