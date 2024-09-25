<?php

namespace App\Repositories;

use App\Models\Category; 

class CategoryRepository
{
    public function store($data)
    {
        return Category::create(['name' => $data['name']]);
    }

    public function update($data, $category)
    {
        $category->name = $data['name'];
        $category->save();
        return $category;
    }

    public function delete($category)
    {
        $category->delete();
    }
}
