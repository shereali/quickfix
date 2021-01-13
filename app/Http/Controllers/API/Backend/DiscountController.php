<?php

namespace App\Http\Controllers\API\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Discount;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DiscountRequest;
use App\Http\Resources\Backend\DiscountResource;

class DiscountController extends Controller
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
        // if($request->search != 'undefined'){
            $data =$search == 'false'?Discount::orderBy('id', 'desc')->paginate($dataSorting):Discount::where(function($query) use($search){
            $query->orWhere('title', 'LIKE', "%{$search}%")
            ->orWhere('code', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

        // } else {

        //     $data = Discount::orderBy('id', 'desc')->paginate(10);

        // }
        

        return DiscountResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request)
    {
        $validated = $request->validated();
        
        $data = $request->all();
        Discount::insert($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Discount has been created!',
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
        $rsmProfile = Discount::find($id);
        return new DiscountResource($rsmProfile);
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
        $data = Discount::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Discount has been updated!',
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
        $delete = Discount::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'Discount has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
