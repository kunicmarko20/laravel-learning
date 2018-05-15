<?php

namespace App;

use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public static function fromCategoryStore(CategoryStoreRequest $request): self
    {
        $category = new self();

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return $category;
    }

    public function updateFromCategoryUpdate(Request $request): self
    {
        if ($request->has('name')) {
            $this->name = $request->name;
        }

        if ($request->has('description')) {
            $this->description = $request->description;
        }

        $this->save();

        return $this;
    }
}
