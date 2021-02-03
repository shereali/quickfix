<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use DB;
use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use App\Http\Resources\Backend\CustomerResource;
use App\Models\Backend\Bonus;
use App\Models\Backend\Customer;
use App\Models\Backend\CustomerDetail;
use App\Models\Backend\Zone;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        
            $data =$search == 'false'?Customer::orderBy('id', 'desc')->paginate($dataSorting):Customer::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        $divisions = Division::all();
        $districts = District::all();
        $zones     = Zone::where('status',1)->get();

 

        return  CustomerResource::collection($data)->additional([
            'divisions' => $divisions,
            'districts' => $districts,
            'zones'     => $zones
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
    //    return $request->all();
        $validated = $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|max:255',
            'mobile_number' => 'required',
            
        ]);
        $currentDate = date('Y-m-d');
         $get_bonus = Bonus::where('user_type',1)->where('bonus_type',1)->where('status',1)->where('start_date','<=',$currentDate)->where('end_date','>=',$currentDate)->first();

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/customer', 'store', Customer::class);  
        $data = $request->all();
        $data['customer_type'] = 1;
        $data['created_by_type'] = 1;
        
        $data['image'] = $fileName;
        $customer = Customer::create($data);
        
      
       
    
        $Customer_detail = CustomerDetail::create([
            'customer_id' => $customer['id'],
            'division_id' => $data['division_id'],
            'district_id' => $data['district_id'],
            'zone_id' => $data['zone_id'],
            'address' => $data['address'],
            'referral_id' => $customer['id'],
            'coins' => 0,
            'bonus_amounts' =>!empty($get_bonus->amount)? $get_bonus->amount:0,
            'withdraw_amounts' => 0,
        ]);
        return response()->json([
            'status'  => 'success',
            'message' => 'Customer has been created!',
            'icon'    => 'check',
        ]);
        // if($validated){
        //     Customer::create($data);
        //     return response()->json([
        //         'status'  => 'success',
        //         'message' => 'Customer has been created!',
        //         'icon'    => 'check',
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return new CustomerResource($customer);
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
        $currentDate = date('Y-m-d');
        $get_bonus = Bonus::where('user_type',1)->where('bonus_type',1)->where('status',1)->where('start_date','<=',$currentDate)->where('end_date','>=',$currentDate)->first();

        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/customer', 'update', Customer::class); 
        $data = $request->all();
        // $data['updated_by'] = Auth::user()->id;
        $data['updated_by_type'] = '1';
        $data['image'] = $fileName;
        DB::beginTransaction();
        $customer = Customer::find($id)->update($data);
        $Customer_detail = CustomerDetail::where('customer_id',$id)->update([
            'customer_id' => $id,
            'division_id' => $data['division_id'],
            'district_id' => $data['district_id'],
            'zone_id' => $data['zone_id'],
            'address' => $data['address'],
            'referral_id' => $id,
            'coins' => 0,
            'bonus_amounts' =>!empty($get_bonus->amount)? $get_bonus->amount:0,
            'withdraw_amounts' => 0,
        ]);
        DB::commit();
        return response()->json([
            'status'  => 'success',
            'message' => 'Customer has been updated!',
            'icon'    => 'check',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Customer::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'Customer has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
