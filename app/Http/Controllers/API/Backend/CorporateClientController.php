<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use DB;
use Illuminate\Http\Request;
use App\Models\Backend\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\CorporateClientResource;
use App\Http\Resources\Backend\CustomerResource;
use App\Models\Backend\Bonus;
use App\Models\Backend\CorporateClient;
use Devfaysal\BangladeshGeocode\Models\Division;

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
        
            $data =$search == 'false'?CorporateClient::orderBy('id', 'desc')->paginate($dataSorting):CorporateClient::where(function($query) use($search){
            $query->orWhere('contact_person_name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        $divisions = Division::all();
      

        return  CorporateClientResource::collection($data)->additional([
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
        $data['created_by_type'] = 1;
        
        $data['image'] = $fileName;
        DB::beginTransaction();
        $customer = Customer::create($data);           
        
        $corporate_clients = CorporateClient::create([
            'customer_id'           => $customer['id'],
            'contact_person_name'   => $data['contact_person_name'],
            'contact_person_number' => $data['contact_person_number'],
            'designation'           => $data['designation'],
            'division_id'           => $data['division_id'],
            'district_id'           => $data['district_id'],
            'zone_id'               => $data['zone_id'],
            'address'               => $data['address'],
            'web_address'           => $data['web_address'],
            'no_of_employee'        => $data['no_of_employee'],
            'support_type'          => $data['support_type'],
            'referral_id'           => $customer['id'],
            'coins'                 => 0,
            'bonus_amounts'         => !empty($get_bonus->amount)? $get_bonus->amount:0,
            'withdraw_amounts'      => 0,
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
        $corporate_clients = CorporateClient::find($id);
        return new CorporateClientResource($corporate_clients);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/customer', 'update', Customer::class); 
        $data = $request->all();
        // $data['updated_by'] = Auth::user()->id;
        $data['updated_by_type'] = '1';
        $data['image'] = $fileName;

        $data = CorporateClient::find($id)->update($data);
        
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
        $corporate_clients  = CorporateClient::find($id);
       $corporate_clients->delete();
        // $delete_corporate = CorporateClient::find($id)->delete();
        $customer = Customer::where('id',$corporate_clients->customer_id)->first();
        $customer->delete();
        if($customer){
            return response()->json([
                'status'  => 'danger',
                'message' => 'CorporateClient has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
