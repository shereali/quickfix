<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\ProblemTypeResource;
use App\Models\Backend\DeviceModel;
use App\Models\Backend\ProblemType;
use Illuminate\Http\Request;

class ProblemTypeController extends Controller
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
        
          $data =$search == 'false'?ProblemType::orderBy('id', 'desc')->paginate($dataSorting):ProblemType::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        $device_models = DeviceModel::where('status',1)->get();

        return  ProblemTypeResource::collection($data)->additional([
            'device_models' => $device_models

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
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/problem-type', 'store', ProblemType::class);  
        $data = $request->all();
        $data['image'] = $fileName;
        if($validated){
            ProblemType::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'ProblemType has been created!',
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
        $problem_type = ProblemType::find($id);
        return new ProblemTypeResource($problem_type);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/problem-type', 'update', ProblemType::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = ProblemType::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'ProblemType has been updated!',
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
        $delete = ProblemType::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'ProblemType has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
