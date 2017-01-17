<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Method;
use App\Models\QuestionAnswer;

class Notification extends Model
{
    use SoftDeletes;

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

    public function method()
    {
    	return $this->belongsTo(Method::class);
    }

    public function questionAnswer()
    {
    	return $this->belongsTo(QuestionAnswer::class);
    }
}
