<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DamagedRoom;
use App\Models\post;



class AdminDamagedRoomController extends Controller
{
              /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $damagedrooms = DamagedRoom::all();
        return view('admin.damagedrooms.index')->with('damagedrooms', $damagedrooms);
    }

    public function create()
    {
        $posts = post::all();
        return view('admin.damagedrooms.create', compact('posts'));
    }
    public function store(Request $request)
    {
        // $input = $request->all();
        // DamagedRoom::create($input);
        // session()->flash('success', 'Added successfully');
        // return redirect('admin/damagedrooms');
        $this->validate($request, [
            'houseno' => ['required', 'string', 'max:50'],
            'floor' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:100']
          
        ]);

        $damagedroom = new DamagedRoom;
        $damagedroom = damagedroom::create($request->all());
        $damagedroom->save();

        // $damagedroom->posts()->sync($request->posts);
        session()->flash('success', 'Added successfully');
        return redirect('admin/damagedrooms');
    }

    public function edit($id)
    {
        $damagedrooms = DamagedRoom::find($id);
        return view('admin.damagedrooms.edit')->with('damagedrooms', $damagedrooms);
    }

    public function update(Request $request, $id)
    {
        $damagedroom = DamagedRoom::find($id);
        $input = $request->all();
        $damagedroom->update($input);
        return redirect('admin/damagedrooms')->with('flash message', 'damaged room Updated!');
    }
    public function destroy($id)
    {
        DamagedRoom::destroy($id);
        return redirect('admin/damagedrooms')->with('flash message', 'damaged Room deleted');
    }
}
