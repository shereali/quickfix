<?php

namespace App\Http\Controllers\API\Backend\Auth;

use App\Models\Backend\Role;
use Illuminate\Http\Request;
use App\Models\Backend\Module;
use App\Models\Backend\Permission;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\Auth\PermissionResource;
use Carbon\Carbon;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::paginate(10);
        $role = Role::all();
        $permission = Module::all();
        return PermissionResource::collection($permission)->additional([
            'roles'       => $role,
            'modules'     => $role,
            'permissions' => $permission
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
        
        $input = $request->all();
        $read   = $request->read;
        $write  = $request->write;
        $update = $request->update;
        $delete = $request->delete;

        $readIndex = [];
        $writeIndex = [];
        $updateIndex = [];
        $deleteIndex = [];


         $permission = [];



        if($request->read != null){
            foreach ($read as $key => $value) {

                $readIndex[$value] = $value;
            }
        }

        if($request->write != null)

        foreach ($write as $key => $value) {

            $writeIndex[$value] = $value;
        }

        if($request->update != null)

        foreach ($update as $key => $value) {

            $updateIndex[$value] = $value;
        }

        if($request->delete != null)

        foreach ($delete as $key => $value) {

            $deleteIndex[$value] = $value;
        }


    // return $deleteIndex ;

       
    
    foreach ($input['module_id'] as $key => $value) {
        
        $check = Permission::where('module_id', $value)->where('role_id', $request->role_id)->exists();
         

         if($check == true){

            Permission::where('module_id', $value)->where('role_id', $request->role_id)->update([
                'read'      => @$readIndex[$key],
                'write'     => @$writeIndex[$key],
                'update'    => @$updateIndex[$key],
                'delete'    => @$deleteIndex[$key],
                'created_at'=> Carbon::now()
            ]);

          } else {

            Permission::insert([
                'module_id' => $value,
                'role_id'   => $request->role_id,
                'read'      => @$readIndex[$key],
                'write'     => @$writeIndex[$key],
                'update'    => @$updateIndex[$key],
                'delete'    => @$deleteIndex[$key],
                'updated_at'=> Carbon::now()
            ]);   

          }

       }     
        

        return response()->json([
            'status'  => 'success',
            'message' => 'Permission has been created!',
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
        
        $data = Permission::where('role_id', $id)->get();
        return  response()->json($data);
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
        $input = $request->all();
        Permission::find($id)->create([
            'name' => $input['name'],
            'guard_name' => 'sanctum',
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Permission has been updated!',
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
        Permission::find($id)->id;
        return response()->json([
            'status'  => 'danger',
            'message' => 'Permission has been deleted!',
            'icon'    => 'check',
        ]);
    }
}
