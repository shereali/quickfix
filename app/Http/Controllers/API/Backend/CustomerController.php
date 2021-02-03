<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\CustomerResource;
use App\Models\Backend\Customer;
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

 

        return  CustomerResource::collection($data);

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
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'mobile_number' => 'required|max:255',
            
        ]);

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/customer', 'store', Customer::class);  
        $data = $request->all();
        // $data['created_by'] = Auth::user()->id;
        $data['created_by_type'] = '1';
        $data['image'] = $fileName;
        if($validated){
            Customer::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'Customer has been created!',
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/customer', 'update', Customer::class); 
        $data = $request->all();
        // $data['updated_by'] = Auth::user()->id;
        $data['updated_by_type'] = '1';
        $data['image'] = $fileName;

        $data = Customer::find($id)->update($data);
        
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
