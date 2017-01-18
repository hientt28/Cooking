<?php

namespace App\Repositories\Methods;

use App\Repositories\BaseRepository;
use App\Models\Comment;
use App\Models\Rate;
use App\Models\User;
use App\Models\Step;
use App\Models\Category;
use App\Models\Method;
use DB;

class MethodRepository extends BaseRepository
{
    public $comment;
    public $rate;
    public $user;
    public $category;
    public $step;

    public function __construct
    (
        Method $method,
        Comment $comment,
        Rate $rate,
        User $user,
        Step $step,
        Category $category
    ) 
    {
        $this->model = $method;
        $this->user = $user;
        $this->rate = $rate;
        $this->comment = $comment;
        $this->category = $category;
        $this->step = $step;    
    }
}
