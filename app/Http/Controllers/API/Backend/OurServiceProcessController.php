<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\OurServiceProcessResource;
use App\Models\Backend\OurServiceProcess;
use Illuminate\Http\Request;

class OurServiceProcessController extends Controller
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
        
            $data =$search == 'false'?OurServiceProcess::orderBy('id', 'desc')->paginate($dataSorting):OurServiceProcess::where(function($query) use($search){
            $query->orWhere('title', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

 

        return  OurServiceProcessResource::collection($data);

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

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/service-process', 'store', OurServiceProcess::class);  
        $data = $request->all();
        $data['image'] = $fileName;
        if($validated){
            OurServiceProcess::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'OurServiceProcess has been created!',
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
        $service_process = OurServiceProcess::find($id);
        return new OurServiceProcessResource($service_process);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/service-process', 'update', OurServiceProcess::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = OurServiceProcess::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'OurServiceProcess has been updated!',
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
        $delete = OurServiceProcess::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'OurServiceProcess has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
