<?php

namespace App\Http\Controllers\API\Backend\CustomerSupport;

use Illuminate\Http\Request;
use Illuminate\Container\Container;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\InstantCallStatus;
use App\Http\Resources\Backend\InstantCallResource;
use App\Models\Backend\InstantCalls as BackendInstantCalls;

class CallRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search      = $request->search;
        $dataSorting = $request->sorting == 'false'?10:$request->sorting;
        
            $data    = $search == 'false'?BackendInstantCalls::orderBy('id','desc')->paginate($dataSorting):BackendInstantCalls::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->orderBy('id','desc')->paginate($dataSorting);

        $instant_call_status = InstantCallStatus::all();

        
    

        return  InstantCallResource::collection($data)->additional([
            'instant_call_status' => $instant_call_status,
        ]);

    }


    // $path = app_path() . "/Models";


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $instant_call = BackendInstantCalls::find($id);
       return new InstantCallResource($instant_call);
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

        $data['updated_by_type'] = 3;
       
        $instant_call = BackendInstantCalls::find($id)->update($data);
       
        return response()->json([
            'status'  => 'success',
            'message' => 'InstantCall has been updated!',
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
