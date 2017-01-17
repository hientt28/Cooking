<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Method;
use App\Models\User;
use App\Models\QuestionAnswer;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'target_type',
        'target_id',
        'content',
    ];

    public function target()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questionAnswer()
    {
        return $this->belongsTo(QuestionAnswer::class);
    }
}
