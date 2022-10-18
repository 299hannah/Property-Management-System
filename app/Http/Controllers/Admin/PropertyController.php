<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\category;
use \Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

class PropertyController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('admin/post/post', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
         $this->validate($request,[
             'title'=>'required',
             'subtitle'=>'required',
             'slug'=>'required',
             'body'=>'required',
             'image'=>'required',

         ]);         
         $post = new post;
         $post->title = $request->title;
        //  $post->image =implode ('|',$image);
        //  $post->image =$$imageName;
         $post->subtitle = $request->subtitle;
         $post->slug = $request->slug;
         $post->body = $request->body;
         $post->status = $request->status;

         if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/post/', $filename);
            $post->image = $filename;
        }
         $post->save(); 
         $post->categories()->sync($request->categories);
         session()->flash('success', 'Added successfully');
         return redirect (route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::with ('categories')->where('id',$id)->first();
        // return $post; for testing array
        $categories = category::all();
        return view('admin.post.edit',compact('categories','post'));
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
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',

        ]);
     
        // if ($request->hasFile('image')) {
        //    $imageName = $request->image->store('public');
        // }

        $post = post::find($id);
        if ($request->hasfile('image')) {
            $destination = 'images/post' . $post->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/post', $filename);
            $post->image = $filename;
            }        
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post ->categories()->sync($request->categories);
        $post->save();

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back();
    }
}