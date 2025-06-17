<?php

namespace App\Http\Controllers\Api\V1\superAdmin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // ->with('children.children')
        return response()->json(
            CategoryResource::collection(Category::whereNull('parent_id')
                ->get()),
            200
        );
    }
    public function show(Category $category)
    {
        // dd('show');
        return response()->json(new CategoryResource($category->load(['children', 'advertisements' => function ($query) {
            $query->where('status', 'active')->latest()->take(10);
        }])), 200);
    }
}
