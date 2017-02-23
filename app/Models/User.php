<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Notification;
use App\Models\Methods;
use App\Models\QuestionAnswers;
use App\Models\SocialAccount;
use App\Models\Comment;
use Hash;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'confirmed',
        'confirmation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function followers()
    {
        return $this->belongsToMany(User::class, 'relationships', 'following_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'relationships', 'follower_id', 'following_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function methodRates()
    {
        return $this->belongsToMany(Method::class, 'rates')->withPivot('level');
    }

    public function questionAnswers()
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function methods()
    {
        return $this->hasMany(Method::class);
    }

    public function scopeConfirmationCode($query, $confirmationCode)
    {
        return $query->where('confirmation_code', $confirmationCode);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getAvatarAttribute($avatar = null)
    {
        return isset($avatar) ? $avatar : config('common.user.default_avatar');
    }

    public function isAdmin()
    {
        return $this->role == config('common.roles.admin');
    }
}
