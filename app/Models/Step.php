<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Method;

class Step extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'method_id',
        'name',
        'description',
        'image',
    ];

    public function method()
    {
        return $this->belongsTo(Method::class);
    }
}
