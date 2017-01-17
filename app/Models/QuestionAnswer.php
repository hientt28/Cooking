<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Notification;
use App\Models\Comment;

class QuestionAnswer extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'user_id',
    	'title',
    	'content',
    	'slug',
    	'status',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function notification()
    {
    	return $this->belongsTo(Notification::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'target');
    }
}
