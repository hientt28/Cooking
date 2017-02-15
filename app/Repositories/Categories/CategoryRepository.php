<?php

namespace App\Repositories\Categories;

use App\Repositories\BaseRepository;
use App\Models\Category;
use Auth;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

     public function listCategories()
    {
        $listCategories = Category::pluck('name', 'id')->all();

        return $listCategories;
    }
}
