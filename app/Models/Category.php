<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Method;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name',
    	'description',
    	'image',
    ];

    public function methods()
    {
    	return $this->hasMany(Method::class);
    }
}
