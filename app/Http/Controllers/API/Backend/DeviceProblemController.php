<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\DeviceProblemResource;
use App\Models\Backend\Brand;
use App\Models\Backend\Device;
use App\Models\Backend\DeviceFunctionalType;
use App\Models\Backend\DeviceModel;
use App\Models\Backend\DeviceProblem;
use App\Models\Backend\ProblemType;
use App\Models\Backend\ServiceType;
use Illuminate\Http\Request;

class DeviceProblemController extends Controller
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
        
            $data =$search == 'false'?DeviceProblem::orderBy('id', 'desc')->paginate($dataSorting):DeviceProblem::where(function($query) use($search){
            $query->orWhere('problem', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        $devices                 = Device::where('status',1)->get();
        $device_functional_types = DeviceFunctionalType::where('status',1)->get();
        $service_types           = ServiceType::where('status',1)->get();
        $brands                  = Brand::where('status',1)->get();
        $device_models           = DeviceModel::where('status',1)->get();
        $problem_types           = ProblemType::where('status',1)->get();

        return  DeviceProblemResource::collection($data)->additional([
            'devices'                =>$devices,
            'device_functional_types'=>$device_functional_types,
            'service_types'          =>$service_types,
            'brands'                 =>$brands,
            'device_models'          =>$device_models,
            'problem_types'          =>$problem_types,
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
        $validated = $request->validate([
            'problem' => 'required|max:255',
            
        ]);

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/device-problem', 'store', DeviceProblem::class);  
        $data = $request->all();
        // $data['created_by'] = Auth::user()->id;
        $data['created_by_type'] = '1';
        $data['image'] = $fileName;
        if($validated){
            DeviceProblem::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'DeviceProblem has been created!',
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
        $device_problem = DeviceProblem::find($id);
        return new DeviceProblemResource($device_problem);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/device-problem', 'update', DeviceProblem::class); 
        $data = $request->all();
        // $data['updated_by'] = Auth::user()->id;
        $data['updated_by_type'] = '1';
        $data['image'] = $fileName;

        $data = DeviceProblem::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'DeviceProblem has been updated!',
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
        $delete = DeviceProblem::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'DeviceProblem has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
