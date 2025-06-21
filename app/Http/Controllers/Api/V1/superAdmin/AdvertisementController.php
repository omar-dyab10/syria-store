<?php

namespace App\Http\Controllers\Api\V1\superAdmin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AdvertisementResource;
use App\Http\Resources\Api\V1\CategoryResource;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function advertisementsPending()
    {
        $advertisements = Advertisement::where('status', 'pending')->get();
        return response()->json([
            'advertisements' => AdvertisementResource::collection($advertisements),
        ], 200);
    }

    public function approve(Advertisement $advertisement)
    {
        $advertisement->update(['status' => 'confirmed']);
        return response()->json([
            'message' => 'Advertisement approved successfully',
            'advertisement' => new AdvertisementResource($advertisement),
        ], 200);
    }
    public function show(Advertisement $advertisement){
        return response()->json([
            'advertisement' => new AdvertisementResource($advertisement),
        ], 200);
    }
    public function reject(Advertisement $advertisement)
    {
        $advertisement->update([
            'status' => 'rejected',
        ]);
        return response()->json([
            'message' => 'Advertisement rejected successfully',
            'advertisement' => new AdvertisementResource($advertisement),
        ], 200);
    }
    public function advertisementsApprove(){
        return response()->json([
            'advertisements' => AdvertisementResource::collection(Advertisement::where('status', 'confirmed')->get()),
        ], 200);
    }
    public function advertisementsReject(){
        return response()->json([
            'advertisements' => AdvertisementResource::collection(Advertisement::where('status', 'rejected')->get()),
        ], 200);
    }
}
