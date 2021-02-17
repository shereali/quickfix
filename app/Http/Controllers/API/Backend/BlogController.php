<?php

namespace App\Http\Controllers\API\Backend;

use Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\BlogResource;
use App\Models\Backend\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BlogController extends Controller
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
        
            $data =$search == 'false'?Blog::orderBy('id', 'desc')->paginate($dataSorting):Blog::where(function($query) use($search){
            $query->orWhere('title', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->paginate($dataSorting);

 

        return  BlogResource::collection($data);

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

        $fileName = Helper::imgProcess($request,'image',$request->name, '', 'images/blog', 'store', Blog::class);  
        $data = $request->all();
        $data['image'] = $fileName;
        if($validated){
            Blog::create($data);
            return response()->json([
                'status'  => 'success',
                'message' => 'Blog has been created!',
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
        $blog = Blog::find($id);
        return new BlogResource($blog);
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
        $fileName = Helper::imgProcess($request,'image',$request->name, $id, 'images/blog', 'update', Blog::class); 
        $data = $request->all();
        $data['image'] = $fileName;

        $data = Blog::find($id)->update($data);
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Blog has been updated!',
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
       
        $blog = Blog::findOrFail($id);
        $image_path = public_path("images/blog/".$blog->image);
    
        if(file_exists($image_path)){
            //File::delete($image_path);
            File::delete( $image_path);
        }
        $blog->delete();
        
        if($blog){
            return response()->json([
                'status'  => 'danger',
                'message' => 'Blog has been deleted!',
                'icon'    => 'times',
            ]);   
        }
    }
}
