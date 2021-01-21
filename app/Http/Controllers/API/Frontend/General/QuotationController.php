<?php

namespace App\Http\Controllers\API\Frontend\General;

use Helper;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\QuotationResource;

class QuotationController extends Controller
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
        $data =$search == 'false'?Quotation::orderBy('id', 'desc')->paginate($dataSorting):Quotation::where(function($query) use($search){
        $query->orWhere('name', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->orWhere('brand_name', 'LIKE', "%{$search}%")
        ->orWhere('model_number', 'LIKE', "%{$search}%")
        ->orWhere('device_name', 'LIKE', "%{$search}%");
        
        })->orderBy('id', 'desc')->paginate($dataSorting);

        return QuotationResource::collection($data);
    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $otp = Helper::autoOtp();
        $message = urlencode("Your Quick Fix OTP is $otp");
        Helper::sendSMS($request->phone_number, $message);

        return response()->json([
            'status' => 'success',
            'otp' => $otp
        ]);
        
    }


    public function otpVerify(Request $request){

        $data =  $request->except(['confirm_quotation_otp', 'quotation_otp']);

         Quotation::insert($data);

         return response()->json([
            'status'  => 'success',
            'message' => 'Quotation has been created!',
            'icon'    => 'check',
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
