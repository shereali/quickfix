<?php

namespace App\Http\Controllers\API\Frontend\General;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;

class ServicePartnerController extends Controller
{
    //

    public function division()
    {
        $divisions = Division::where('name', 'Dhaka')->get();
        return response()->json($divisions);
    }
}
