<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Models\Backend\DeviceModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DeviceModelRequest;
use App\Http\Resources\Backend\DeviceModelResource;

class DeviceModelController extends Controller
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
        // if($request->search != 'undefined'){
            $data =$search == 'false'?DeviceModel::orderBy('id', 'desc')->paginate($dataSorting):DeviceModel::where(function($query) use($search){
            $query->orWhere('model_name', 'LIKE', "%{$search}%")
            ->orWhere('model_number', 'LIKE', "%{$search}%");
            
        })->orderBy('id', 'desc')->paginate($dataSorting);

        // } else {

        //     $data = DeviceModel::orderBy('id', 'desc')->paginate(10);

        // }
        

        return  DeviceModelResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceModelRequest $request)
    {
        $validated = $request->validated();
        
        $fileName = Helper::imgProcess($request,'image',$request->model_name, '', 'images/device-model', 'store', DeviceModel::class);  

        $data = $request->all();

        $data['image'] = $fileName;

        Brand::insert($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Model has been created!',
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
        $rsmProfile = DeviceModel::find($id);
        return new DeviceModelResource($rsmProfile);
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
        $fileName = Helper::imgProcess($request,'image',$request->model_name, $id, 'images/brand', 'update', DeviceModel::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = DeviceModel::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Model has been updated!',
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
        $delete = DeviceModel::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'Model has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
