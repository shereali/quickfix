<?php

namespace App\Http\Controllers\API\Backend\CustomerSupport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\CustomerResource;
use App\Models\Backend\BusinessPartner;
use App\Models\Backend\Customer;
use App\Models\Backend\CustomerOtherImage;
use App\Models\Backend\DeviceFunctionalType;
use App\Models\Backend\DeviceType;
use App\Models\Backend\ExprienceCategory;
use App\Models\Backend\WorkExperience;
use Illuminate\Http\Request;
use Helper;
use DB;
use Devfaysal\BangladeshGeocode\Models\Division;

class BusinessPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search      = $request->search;
        $dataSorting = $request->sorting == 'false'?10:$request->sorting;
        
            $data    = $search == 'false'?Customer::where('customer_type',3)->paginate($dataSorting):Customer::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->where('customer_type',3)->paginate($dataSorting);

        $divisions               = Division::all();
        $device_types            = DeviceType::where('status',1)->get();
        $device_functional_types = DeviceFunctionalType::where('status',1)->get();
        $work_experience         = WorkExperience::where('status',1)->get();
        $experience_category     = ExprienceCategory::where('status',1)->get();
      

        return  CustomerResource::collection($data)->additional([
            'divisions'               => $divisions,
            'device_types'            => $device_types,
            'device_functional_types' => $device_functional_types,
            'work_experience'         => $work_experience,
            'experience_category'     => $experience_category,
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
        // return $request->b_device_type_id;
        $validated = $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|max:255',
            'mobile_number' => 'required',
            
        ]);
        $fileNameNid = Helper::imgProcess($request,'nid_image',$request->name, '', 'images/nid', 'store', BusinessPartner::class);  
        $fileNameTrade = Helper::imgProcess($request,'tradelicense_image',$request->name, '', 'images/tradelicense', 'store', BusinessPartner::class);  
        $fileNameWork = Helper::imgProcess($request,'image',$request->name, '', 'images/work', 'store', CustomerOtherImage::class);  
        $data = $request->all();
        $data['customer_type'] = 3;
        $data['created_by_type'] = 3;
        
        // $data['nid_image'] = $fileNameNid;
        // $data['tradelicense_image'] = $fileNameTrade;
        // $data['image'] = $fileNameWork;
        DB::beginTransaction();
        $customer = Customer::create($data); 
        $customer_others_images = CustomerOtherImage::create([
            'customer_id'               => $customer['id'],
            'image'                     => $fileNameWork,
            'status'                    => 1,
            'created_by_type'           => 1,

        ]);          
        
        $business_partner = BusinessPartner::create([
            'customer_id'               => $customer['id'],
            'contact_person_name'       => $data['b_contact_person_name'],
            'contact_person_number'     => $data['b_contact_person_number'],
            'designation'               => $data['b_designation'],
            'division_id'               => $data['b_division_id'],
            'district_id'               => $data['b_district_id'],
            'zone_id'                   => $data['b_zone_id'],
            'address'                   => $data['b_address'],
            'web_address'               => $data['b_web_address'],
            'no_of_employee'            => $data['b_no_of_employee'],
            // $this->attributes['device_type_id'] = json_encode($value);
            'device_type_id'            => json_encode($data['b_device_type_id']),
            // 'device_type_id'            => $data['b_device_type_id'],
            'device_functional_type_id' => $data['b_device_functional_type_id'],
            'work_experience_id'        => $data['b_work_experience_id'],
            'nid_no'                    => $data['b_nid_no'],
            'nid_image'                 => $fileNameNid,
            'experience_category_id'    => $data['b_experience_category_id'],
            'tradelicense_image'        => $fileNameTrade,
            'created_by_type'           => 3,
            
        ]);
        DB::commit();
        return response()->json([
            'status'  => 'success',
            'message' => 'BusinessPartner has been created!',
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
        // return $request->all();
        $fileNameNid   = Helper::imgProcess($request,'nid_image',$request->name, $id, 'images/nid', 'update', BusinessPartner::class);  
        $fileNameTrade = Helper::imgProcess($request,'tradelicense_image',$request->name, $id, 'images/tradelicense', 'update', BusinessPartner::class);  
        $fileNameWork  = Helper::imgProcess($request,'image',$request->name, $id, 'images/work', 'update', CustomerOtherImage::class);  
        $data = $request->all();

        $data['updated_by_type'] = 3;
        DB::beginTransaction();
        $customer = Customer::find($id)->update($data);
        
        $business_partner = BusinessPartner::where('customer_id',$id)->update([
            // 'customer_id'               => $data['customer_id'],
            'contact_person_name'       => $data['b_contact_person_name'],
            'contact_person_number'     => $data['b_contact_person_number'],
            'designation'               => $data['b_designation'],
            'division_id'               => $data['b_division_id'],
            'district_id'               => $data['b_district_id'],
            'zone_id'                   => $data['b_zone_id'],
            'address'                   => $data['b_address'],
            'web_address'               => $data['b_web_address'],
            'no_of_employee'            => $data['b_no_of_employee'],
            'device_type_id'            => $data['b_device_type_id'],
            'device_functional_type_id' => $data['b_device_functional_type_id'],
            'work_experience_id'        => $data['b_work_experience_id'],
            'nid_no'                    => $data['b_nid_no'],
            'nid_image'                 => $fileNameNid,
            'experience_category_id'    => $data['b_experience_category_id'],
            'tradelicense_image'        => $fileNameTrade,
            'updated_by_type'           => 3,
            
        ]);
        $customer_others_images = CustomerOtherImage::where('customer_id',$id)->update([
            'customer_id'               => $id,
            'image'                     => $fileNameWork,
            'status'                    => 1,
            'updated_by_type'           => 3,

        ]); 
        DB::commit();
        return response()->json([
            'status'  => 'success',
            'message' => 'BusinessPartner has been updated!',
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
        $business_partner = BusinessPartner::where('customer_id',$id)->first();
        $business_partner->delete();
        $customer_others_images = CustomerOtherImage::where('customer_id',$id)->first();
        $customer_others_images->delete();

        $delete = Customer::find($id)->delete();
        DB::commit();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'BusinessPartner has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
