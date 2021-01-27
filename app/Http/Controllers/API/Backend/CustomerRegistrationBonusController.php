<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\CustomerRegistrationBonusResource;
use App\Models\Backend\CustomerRegistrationBonus;
use Illuminate\Http\Request;

class CustomerRegistrationBonusController extends Controller
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
        
            $data =$search == 'false'?CustomerRegistrationBonus::orderBy('id', 'desc')->paginate($dataSorting):CustomerRegistrationBonus::where(function($query) use($search){
            $query->orWhere('title', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

 

        return  CustomerRegistrationBonusResource::collection($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
            'amount' => 'required|max:255',
            
        ]);

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/customer-registration', 'store', CustomerRegistrationBonus::class);  
        $data = $request->all();
        // $data['created_by'] = Auth::user()->id;
        $data['user_type'] = 1;
        $data['image'] = $fileName;
        if($validated){
            CustomerRegistrationBonus::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'CustomerRegistrationBonus has been created!',
                'icon'    => 'check',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer_registration_bonus = CustomerRegistrationBonus::find($id);
        return new CustomerRegistrationBonusResource($customer_registration_bonus);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/customer-registration', 'update', CustomerRegistrationBonus::class); 
        $data = $request->all();
        // $data['updated_by'] = Auth::user()->id;
        $data['updated_by_type'] = '1';
        $data['image'] = $fileName;

        $data = CustomerRegistrationBonus::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'CustomerRegistrationBonus has been updated!',
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
        $delete = CustomerRegistrationBonus::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'CustomerRegistrationBonus has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
