<?php

namespace App\Repositories\Method;

use App\Repositories\BaseRepository;
use App\Models\Method;
use DB;

class MethodRepository extends BaseRepository
{  
    public function __construct(Method $method) 
    {
        $this->model = $method;  
    }
}
