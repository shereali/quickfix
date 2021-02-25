<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use Illuminate\Http\Request;
use App\Models\Backend\DeviceType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DeviceTypeRequest;
use App\Http\Resources\Backend\DeviceTypeResource;

class DeviceTypecontroller extends Controller
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
            $data =$search == 'false'?DeviceType::orderBy('id', 'desc')->paginate($dataSorting):DeviceType::where(function($query) use($search){
            $query->orWhere('type_name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        return  DeviceTypeResource::collection($data)->additional([
            'permissions' => Helper::permission('DeviceType')
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
            'type_name' => 'required|max:255',
        ]);
        $data = $request->all();
        if($validated){
            DeviceType::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'DeviceType has been created!',
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
        $deviceType = DeviceType::find($id);
        return new DeviceTypeResource($deviceType);
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
        $data = $request->all();
        $data = DeviceType::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'DeviceType has been updated!',
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
        $delete = DeviceType::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'DeviceType has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
