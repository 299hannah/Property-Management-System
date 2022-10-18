<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\VacantRoom;
use Illuminate\Support\Facades\Auth;

class AgentVacantRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent');
    }
    public function index()
    {

    $vacantrooms  = VacantRoom::where('post_id',optional(Auth::guard('agent')->user())->id)->get();
    // $vacantroom = VacantRoom::where('post_id',optional(Auth:giard('agent')->user())->id)get();
        return view('agent.vacantrooms.index')->with('vacantrooms', $vacantrooms);
    }

    public function create()
    {
        return view('agent.vacantrooms.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        VacantRoom::create($input);
        session()->flash('success', 'Added successfully');
        return redirect('agent/vacantrooms');
    }

    public function edit($id)
    {
        $vacantroom = VacantRoom::find($id);
        return view('agent.vacantrooms.edit')->with('vacantrooms', $vacantroom);
    }

    public function update(Request $request, $id)
    {
        $vacantroom = VacantRoom::find($id);
        $input = $request->all();
        $vacantroom->update($input);
        return redirect('agent/vacantrooms')->with('flash message', 'vacant room Updated!');
    }
    public function destroy($id)
    {
        VacantRoom::destroy($id);
        return redirect('agent/vacantrooms')->with('flash message', 'Vacant Room deleted');
    }
}
