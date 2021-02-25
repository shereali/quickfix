<?php

namespace App\Http\Controllers\API\Backend\Auth;

use DB;
use App\Models\Backend\Role;
use Illuminate\Http\Request;
use App\Models\Backend\Permission;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\Auth\RoleResource;

class RoleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);

        return RoleResource::collection($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    //    return $request->all();
        $this->validate($request, [
            'name'       => 'required|unique:roles,name',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Role has been created!',
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
        $role = Role::find($id);
        return new RoleResource($role);

    
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
        $this->validate($request, [
            'name'       => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Role has been created!',
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
        DB::table("roles")->where('id',$id)->delete();

        DB::table('role_has_permissions')->where('role_id', $id)->delete();
        return response()->json([
            'status'  => 'success',
            'message' => 'Role has been deleted!',
            'icon'    => 'check',
        ]);
    }
}
