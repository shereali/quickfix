<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\DeviceFuntionalTypeResource;
use App\Models\Backend\DeviceFunctionalType;
use Illuminate\Http\Request;

class DeviceFunctionalTypeController extends Controller
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
        
            $data =$search == 'false'?DeviceFunctionalType::orderBy('id', 'desc')->paginate($dataSorting):DeviceFunctionalType::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        return  DeviceFuntionalTypeResource::collection($data);

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
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/device-functional', 'store', DeviceFunctionalType::class);  
        $data = $request->all();
        $data['image'] = $fileName;
        if($validated){
            DeviceFunctionalType::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'DeviceFunctionalType has been created!',
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
        $device_functional = DeviceFunctionalType::find($id);
        return new DeviceFuntionalTypeResource($device_functional);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/device-functional', 'update', DeviceFunctionalType::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = DeviceFunctionalType::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'DeviceFunctionalType has been updated!',
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
        $delete = DeviceFunctionalType::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'DeviceFunctionalType has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
