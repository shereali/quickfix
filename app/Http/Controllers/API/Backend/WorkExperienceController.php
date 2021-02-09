<?php

namespace App\Http\Controllers\API\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\WorkExperienceResource;
use App\Models\Backend\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
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
        
            $data =$search == 'false'?WorkExperience::orderBy('id', 'desc')->paginate($dataSorting):WorkExperience::where(function($query) use($search){
            $query->orWhere('title', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);
        
        return  WorkExperienceResource::collection($data);

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
            'experience' => 'required|max:255',
            
        ]);

        $data = $request->all();
        if($validated){
            WorkExperience::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'WorkExperience has been created!',
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
        $work_experience = WorkExperience::find($id);
        return new WorkExperienceResource($work_experience);
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
        $data = WorkExperience::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'WorkExperience has been updated!',
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
        $delete = WorkExperience::find($id)->delete();
        if($delete){
            return response()->json([
                'status'  => 'danger',
                'message' => 'WorkExperience has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
