<?php

namespace App\Http\Controllers\API\Frontend\General;

use Helper;
use App\Models\InstantCall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\InstantCallResource;

class InstantCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $search = $request->search;
        $dataSorting = $request->sorting == 'false'?10:$request->sorting;
        $data =$search == 'false'?InstantCall::orderBy('id', 'desc')->paginate($dataSorting):InstantCall::where(function($query) use($search){
        $query->orWhere('name', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->orWhere('mobile_number', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        return InstantCallResource::collection($data);
    }



    public function otpVerify(Request $request)
    {
        $data = $request->except(['otp', 'confirm_otp']);
        $insert = InstantCall::insert($data);

         return response()->json([
            'status'  => 'success',
            'message' => 'Instat Call has been created!',
            'icon'    => 'check',
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $otp = Helper::autoOtp();
        $message = urlencode("Your Quick Fix OTP is $otp");
        Helper::sendSMS($request->mobile_number, $message);

        return response()->json([
            'status' => 'success',
            'otp' => $otp
        ]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
