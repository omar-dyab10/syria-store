<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DynamicAttribute;
use App\Models\Advertisement;
use App\Models\DynamicAttributeValue;
use App\Models\Location;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Log;

class AdvertisementController extends Controller
{
    public function create()
    {
        return view('advertisements.create', [
            'categories' => Category::where('parent_id', 2)->get(),
            'dynamicAttributes' => DynamicAttribute::all(),
            'locations' => Location::all(),
        ]);
    }

    /**
     * Get all categories for public use
     */
    public function getCategories()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return response()->json($categories);
    }

    /**
     * Get dynamic attributes by category ID
     */
    public function getDynamicAttributesByCategory($categoryId)
    {
        $attributes = DynamicAttribute::where('category_id', $categoryId)->get();
        return response()->json($attributes);
    }

    /**
     * Store a new advertisement with dynamic attributes
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'location_id' => 'required|exists:locations,id',
            'number' => 'required|numeric|min:1|unique:real_estates,number',
            'area' => 'required|string',
            'description' => 'required|string',
            'dynamic_attributes' => 'array|nullable',
            'dynamic_attributes.*' => 'string|nullable',
            'source' => 'required|in:owner,Real estate office',
        ]);
        $realEstate = RealEstate::create([
            'realEstate_type' => Category::find($request->category_id)->name_en,
            'status' => 'available',
            'price' => $request->price,
            'area' => $request->area,
            'number' => $request->number,
        ]);

        $advertisement = Advertisement::create([
            'user_id' => Auth::id(),
            'location_id' => $request->location_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'adable_id' => $realEstate->id,
            'adable_type' => 'App\\Models\\RealEstate',
            'status' => 'pending',
            'source' => $request->source,
        ]);

        if ($request->has('dynamic_attributes')) {
            foreach ($request->dynamic_attributes as $attributeId => $value) {
                if (!empty($value)) {
                    DynamicAttributeValue::create([
                        'dynamic_attribute_id' => $attributeId,
                        'entity_id' => $advertisement->id,
                        'entity_type' => Advertisement::class,
                        'value_en' => $value,
                        'value_ar' => $value
                    ]);
                }
            }
        }
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $advertisement->addMedia($photo)
                    ->toMediaCollection('images');
            }
        }
        return redirect()->route('advertisements.create')->with('success', 'تم إضافة الإعلان بنجاح');
    }
    public function show(Advertisement $advertisement)
    {
        // dd(DynamicAttributeValue::where('entity_id', $advertisement->id)->get());
        $advertisement->load(['location', 'user', 'category', 'media']);
        return view('advertisements.show', [
            'advertisement' => $advertisement,
            'dynamicAttributesValues' => DynamicAttributeValue::where('entity_id', $advertisement->id)->get(),
            'advertisements' => Advertisement::where('id', '!=', $advertisement->id)
                ->where('title', 'like', '%' . $advertisement->title . '%')
                ->take(3)
                ->get(),
        ]);
    }
}
