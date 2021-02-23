<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use Illuminate\Http\Request;
use App\Models\Backend\Device;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\DeviceResource;
use App\Models\Backend\DeviceType;

class DeviceController extends Controller
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
        
            $data =$search == 'false'?Device::orderBy('id', 'desc')->paginate($dataSorting):Device::where(function($query) use($search){
            $query->orWhere('device_name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        $deviceTypes = DeviceType::where('status',1)->get();
        $path = app_path() . "\Models\Backend";  
        return  DeviceResource::collection($data)->additional([
            'deviceTypes' => $deviceTypes,
            'permissions' => Helper::permission('Device'),
            'models'      => self::getModels($path)

        ]);

    }

    public  function getModels($path){
            
            $out = [];
            $results = scandir($path);
            foreach ($results as $result) {
                if ($result === '.' or $result === '..') continue;
                $filename = $result;
                if (is_dir($filename)) {
                    $out = array_merge($out, getModels($filename));
                }else{
                    $out[] = substr($filename,0,-4);
                }
            }
            return $out;
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
            'device_name' => 'required|max:255',
            'description' => 'required',
        ]);

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/device', 'store', Device::class);  
        $data = $request->all();
        $data['image'] = $fileName;
        if($validated){
            Device::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'Device has been created!',
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
        $device = Device::find($id);
        return new DeviceResource($device);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/device', 'update', Device::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = Device::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Device has been updated!',
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
        $delete = Device::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'Device has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
