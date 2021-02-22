<?php

namespace App\Http\Controllers\API\Backend\Auth;

use DB;
use App\Models\User;
use Illuminate\Support\Arr;
use App\Models\Backend\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Backend\Auth\UserResource;

class UserController extends Controller
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

        // return User::paginate(10);
        
            $data =$search == 'false'?User::orderBy('id', 'desc')->paginate($dataSorting):User::where(function($query) use($search){
            $query->orWhere('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        $roles = Role::all();

        return  UserResource::collection($data)->additional(['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);

        return response()->json([
            'status'  => 'success',
            'message' => 'User has been created!',
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
        $user = User::find($id);
        // $roles = Role::pluck('name')->all();
        // $userRole = $user->roles->pluck('name')->all();
        return new UserResource($user);
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        return response()->json([
            'status'  => 'success',
            'message' => 'User has been updated!',
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
        User::find($id)->delete();
    }
}
