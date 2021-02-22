<?php

namespace App\Http\Controllers\API\Administrator;

use Illuminate\Http\Request;
use App\Models\Backend\Module;
use App\Http\Controllers\Controller;
use App\Http\Resources\Administrator\ModuleResource;

class ModuleRegister extends Controller
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
        
            $data =$search == 'false'?Module::orderBy('id', 'desc')->paginate($dataSorting):Module::where(function($query) use($search){
            $query->orWhere('resource_name', 'LIKE', "%{$search}%")
                    ->orWhere('describe_name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

 

        return  ModuleResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Module::create($request->all());
        return response()->json([
            'status'  => 'success',
            'message' => 'Module has been registered!',
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
        $data = Module::find($id);

        return new ModuleResource($data);
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
        Module::find($id)->update($request->all());
        return response()->json([
            'status'  => 'success',
            'message' => 'Module has been updated!',
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
        //
    }
}
