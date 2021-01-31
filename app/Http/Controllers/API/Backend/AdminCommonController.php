<?php

namespace App\Http\Controllers\API\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Zone;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;

class AdminCommonController extends Controller
{
    public function divisionWiseDistrict(Request $request)
    {
        $districts = District::where('division_id', $request->name)->get();
        return response()->json($districts);
    }
    public function districtWiseZone(Request $request)
    {
        $zone = Zone::where('district_id', $request->name)->get();
        return response()->json($zone);
    }
}
