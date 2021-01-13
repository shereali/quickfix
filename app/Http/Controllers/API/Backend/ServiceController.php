<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use Illuminate\Http\Request;
use App\Models\Backend\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceRequest;
use App\Http\Resources\Backend\ServiceResource;

class ServiceController extends Controller
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
            $data =$search == 'false'?Service::orderBy('id', 'desc')->paginate($dataSorting):Service::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        // } else {

        //     $data = Service::orderBy('id', 'desc')->paginate(10);

        // }
        

        return  ServiceResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $validated = $request->validated();
        
        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/service', 'store', Service::class);  

        $data = $request->all();

        $data['image'] = $fileName;

        Service::insert($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Service has been created!',
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
        $rsmProfile = Service::find($id);
        return new ServiceResource($rsmProfile);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/service', 'update', Service::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = Service::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Service has been updated!',
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
        $delete = Service::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'Service has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
