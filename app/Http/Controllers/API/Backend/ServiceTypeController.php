<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\ServiceTypeResource;
use App\Models\Backend\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
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
        
            $data =$search == 'false'?ServiceType::orderBy('id', 'desc')->paginate($dataSorting):ServiceType::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        return  ServiceTypeResource::collection($data);

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

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/service-type', 'store', ServiceType::class);  
        $data = $request->all();
        $data['image'] = $fileName;
        if($validated){
            ServiceType::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'ServiceType has been created!',
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
        $service_type = ServiceType::find($id);
        return new ServiceTypeResource($service_type);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/service-type', 'update', ServiceType::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = ServiceType::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'ServiceType has been updated!',
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
        $delete = ServiceType::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'ServiceType has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
