<?php

namespace App\Http\Controllers\Api\V1\superAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Category\storeCategoryRequest;
use App\Http\Resources\Api\V1\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(
            CategoryResource::collection(Category::whereNull('parent_id')->get()),200);
    }
    public function show(Category $category)
    {
        return response()->json(new CategoryResource($category), 200);
    }
    public function store(storeCategoryRequest $request)
    {
        return response()->json(new CategoryResource(Category::create($request->validated())), 201);
    }
    public function update(storeCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json(["message" => "Category updated successfully", "data" => new CategoryResource($category)], 200);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(["message" => "Category deleted successfully"], 200);
    }
}
