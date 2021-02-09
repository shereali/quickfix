<?php

namespace App\Http\Controllers\API\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\Backend\Auth\PermissionResource;

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
        return PermissionResource::collection($permission);
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
        Permission::create([
            'name' => $input['name'],
            'guard_name' => 'sanctum',
        ]);

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
        $data = Permission::find($id);
        return new PermissionResource($data);
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
