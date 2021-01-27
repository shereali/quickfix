<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\ZoneResource;
use App\Models\Backend\ServiceType;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use App\Models\Backend\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
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
        
            $data =$search == 'false'?Zone::orderBy('id', 'desc')->paginate($dataSorting):Zone::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        $divisions = Division::all();
        $districts = District::all();
        $service_types = ServiceType::where('status',1)->get();

        return  ZoneResource::collection($data)->additional([
            'divisions' => $divisions,
            'districts' => $districts,
            'service_types' => $service_types
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
            
        ]);

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/zone', 'store', Zone::class);  
        $data = $request->all();
        $data['image'] = $fileName;
        if($validated){
            Zone::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'Zone has been created!',
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
        $zone = Zone::find($id);
        return new ZoneResource($zone);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/Zone', 'update', Zone::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = Zone::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Zone has been updated!',
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
        $delete = Zone::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'Zone has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
