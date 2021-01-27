<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\ExprienceCategoryResource;
use App\Models\Backend\ExprienceCategory;
use Illuminate\Http\Request;

class ExprienceCategoryController extends Controller
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
        
            $data =$search == 'false'?ExprienceCategory::orderBy('id', 'desc')->paginate($dataSorting):ExprienceCategory::where(function($query) use($search){
            $query->orWhere('title', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

 

        return  ExprienceCategoryResource::collection($data);

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
            'title' => 'required|max:255',
            
        ]);

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/exprience-category', 'store', ExprienceCategory::class);  
        $data = $request->all();
        $data['image'] = $fileName;
        if($validated){
            ExprienceCategory::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'ExprienceCategory has been created!',
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
        
        $experience_category = ExprienceCategory::find($id);
        return new ExprienceCategoryResource($experience_category);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/exprience-category', 'update', ExprienceCategory::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = ExprienceCategory::find($id)->update($data);
        
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
        $delete = ExprienceCategory::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'ExprienceCategory has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
