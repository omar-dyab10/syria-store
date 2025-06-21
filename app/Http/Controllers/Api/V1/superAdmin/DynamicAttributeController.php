<?php

namespace App\Http\Controllers\Api\V1\superAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\DynamicAttribute\storeDynamicAttributeRequest;
use App\Http\Requests\Api\V1\DynamicAttribute\updateDynamicAttributeRequest;
use App\Http\Resources\Api\V1\DynamicAttributeResource;
use App\Models\DynamicAttribute;
use Illuminate\Http\Request;

class DynamicAttributeController extends Controller
{
    public function index()
    {
        return response()->json(DynamicAttributeResource::collection(DynamicAttribute::with('category')->get()), 200);
    }
    public function show(DynamicAttribute $dynamicAttribute)
    {
        return response()->json(new DynamicAttributeResource($dynamicAttribute->load('category')), 200);
    }
    public function store(storeDynamicAttributeRequest $request)
    {
        return response()->json(new DynamicAttributeResource(DynamicAttribute::create($request->validated())), 201);
    }
    public function update(updateDynamicAttributeRequest $request, DynamicAttribute $dynamicAttribute)
    {
        $dynamicAttribute->update($request->validated());
        return response()->json(["message" => "Dynamic attribute updated successfully", "data" => new DynamicAttributeResource($dynamicAttribute)], 200);
    }
    public function destroy(DynamicAttribute $dynamicAttribute)
    {
        $dynamicAttribute->delete();
        return response()->json(["message" => "Dynamic attribute deleted successfully"], 200);
    }
}
