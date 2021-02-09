<?php

namespace App\Http\Controllers\API\Backend\CustomerSupport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\CustomerResource;
use App\Models\Backend\Bonus;
use App\Models\Backend\CorporateClient;
use App\Models\Backend\Customer;
use Devfaysal\BangladeshGeocode\Models\Division;
use Helper;
use DB;
use Illuminate\Http\Request;

class CorporateClientController extends Controller
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
        
            $data =$search == 'false'?Customer::where('customer_type',2)->paginate($dataSorting):Customer::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->where('customer_type',2)->paginate($dataSorting);

        $divisions = Division::all();
      

        return  CustomerResource::collection($data)->additional([
            'divisions' => $divisions,
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
        $data['customer_type'] = 2;
        $data['created_by_type'] = 3;
        
        $data['image'] = $fileName;
        DB::beginTransaction();
        $customer = Customer::create($data);           
        
        $corporate_clients = CorporateClient::create([
            'customer_id'           => $customer['id'],
            'contact_person_name'   => $data['c_contact_person_name'],
            'contact_person_number' => $data['c_contact_person_number'],
            'designation'           => $data['c_designation'],
            'division_id'           => $data['c_division_id'],
            'district_id'           => $data['c_district_id'],
            'zone_id'               => $data['c_zone_id'],
            'address'               => $data['c_address'],
            'web_address'           => $data['c_web_address'],
            'no_of_employee'        => $data['c_no_of_employee'],
            'support_type'          => $data['c_support_type'],
            'referral_id'           => $customer['id'],
            'coins'                 => 0,
            'bonus_amounts'         => !empty($get_bonus->amount)? $get_bonus->amount:0,
            'withdraw_amounts'      => 0,
            'created_by_type'      => 3,
        ]);
        DB::commit();
        return response()->json([
            'status'  => 'success',
            'message' => 'CorporateClient has been created!',
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
        $fileName   = Helper::imgProcess($request,'image',$request->name, $id, 'images/customer', 'update', Customer::class);          
        $data = $request->all();

        $data['updated_by_type'] = 3;
        $data['image'] = $fileName;
        DB::beginTransaction();
        $customer = Customer::find($id)->update($data);
        
        $corporate_clients = CorporateClient::where('customer_id',$id)->update([
            // 'customer_id'               => $data['customer_id'],
            'contact_person_name'   => $data['c_contact_person_name'],
            'contact_person_number' => $data['c_contact_person_number'],
            'designation'           => $data['c_designation'],
            'division_id'           => $data['c_division_id'],
            'district_id'           => $data['c_district_id'],
            'zone_id'               => $data['c_zone_id'],
            'address'               => $data['c_address'],
            'web_address'           => $data['c_web_address'],
            'no_of_employee'        => $data['c_no_of_employee'],
            'support_type'          => $data['c_support_type'],
            'updated_by_type'       => 3,
            
        ]);
       
        DB::commit();
        return response()->json([
            'status'  => 'success',
            'message' => 'CorporateClient has been updated!',
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
        DB::beginTransaction();
        $corporate_clients = CorporateClient::where('customer_id',$id)->first();
        $corporate_clients->delete();
        

        $delete = Customer::find($id)->delete();
        DB::commit();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'CorporateClient has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
