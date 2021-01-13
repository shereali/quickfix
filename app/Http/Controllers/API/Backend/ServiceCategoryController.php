<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\ServiceCategory;
use App\Http\Requests\Backend\ServiceCategoryRequest;
use App\Http\Resources\Backend\ServiceCategoryResource;

class ServiceCategoryController extends Controller
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
            $data =$search == 'false'?ServiceCategory::orderBy('id', 'desc')->paginate($dataSorting):ServiceCategory::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        // } else {

        //     $data = ServiceCategory::orderBy('id', 'desc')->paginate(10);

        // }
        
        return  ServiceCategoryResource::collection($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCategoryRequest $request)
    {
        $validated = $request->validated();
        
        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/service-category', 'store', ServiceCategory::class);  

        $data = $request->all();

        $data['image'] = $fileName;

        ServiceCategory::insert($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Service category has been created!',
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
        $rsmProfile = ServiceCategory::find($id);
        return new ServiceCategoryResource($rsmProfile);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/brand', 'update', ServiceCategory::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = ServiceCategory::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Service category has been updated!',
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
        
        $delete = ServiceCategory::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'Service category has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
