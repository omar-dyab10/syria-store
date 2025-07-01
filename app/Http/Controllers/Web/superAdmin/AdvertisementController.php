<?php

namespace App\Http\Controllers\Web\superAdmin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    // public function index(){
    //     dd('daf');
    // }
    public function advertisementsPending()
    {
        return view('superAdmin.advertisements.pending', ['advertisements' => Advertisement::where('status', 'pending')->paginate(10)]);
    }

    public function approve(Advertisement $advertisement)
    {
        $advertisement->update(['status' => 'confirmed']);
        return redirect()->route('super-admin.advertisementsPending')->with('success', 'Advertisement approved successfully');
    }
    public function reject(Advertisement $advertisement)
    {
        $advertisement->update([
            'status' => 'rejected',
        ]);
        return redirect()->route('super-admin.advertisementsPending')->with('success', 'Advertisement rejected successfully');
    }
    public function advertisementsApprove(){
        return view('superAdmin.advertisements.approved', ['advertisements' => Advertisement::where('status', 'confirmed')->paginate(10)]);
    }
    public function advertisementsReject(){
        return view('superAdmin.advertisements.rejected', ['advertisements' => Advertisement::where('status', 'rejected')->paginate(10)]);

    }
}
