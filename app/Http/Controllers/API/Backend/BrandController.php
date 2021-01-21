<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Http\Controllers\Controller;
use App\Models\Backend\ServiceCategory;
use App\Http\Requests\Backend\BrandRequest;
use App\Http\Resources\Backend\BrandResource;

class BrandController extends Controller
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
            $data =$search == 'false'?Brand::orderBy('id', 'desc')->paginate($dataSorting):Brand::where(function($query) use($search){
            $query->orWhere('brand_name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        // } else {

        //     $data = Brand::orderBy('id', 'desc')->paginate(10);

        // }
        $service_category = ServiceCategory::all();

        return  BrandResource::collection($data)->additional([
                'service_categories' => $service_category
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $validated = $request->validated();
        
        $fileName = Helper::imgProcess($request,'image',$request->brand_name, '', 'images/brand', 'store', Brand::class);  

        $data = $request->all();

        $data['image'] = $fileName;

        Brand::insert($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Brand has been created!',
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
        $rsmProfile = Brand::find($id);
        return new BrandResource($rsmProfile);
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
        $fileName = Helper::imgProcess($request,'image',$request->brand_name, $id, 'images/brand', 'update', Brand::class);  
        $data = $request->all();
        $data['image'] = $fileName;
        $service_category = ServiceCategory::all();
        $data = Brand::find($id)->update($data)->additional([
            'service_categories' => $service_category
        ]);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Brand has been updated!',
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
        $delete = Brand::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'Brand has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
