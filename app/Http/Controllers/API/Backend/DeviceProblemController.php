<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\DeviceProblemResource;
use App\Models\Backend\DeviceProblem;
use Illuminate\Http\Request;

class DeviceProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
