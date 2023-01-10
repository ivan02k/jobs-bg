<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(){
        $positions = Position::all();
        return view('positions.index')->with(['positions' => $positions]);
    }

    public function create(){
        return view('positions.create');
    }

    public function store(PositionRequest $request){
        $data = $request->except('_method', '_token');
        Position::create($data);
        return redirect(route('positions.index'));
    }

    public function edit($id)
    {
        $position = Position::find($id);
        return view('positions.edit')->with(['positions' => $position]);
    }

    public  function update(PositionRequest $request , $id){
        $data = $request->except('_method', '_token');
        $position = Position::find($id);
        if ($position){
            $position->update($data);
        }
        return redirect()->action([PositionController::class, 'index']);
    }

    public function delete($id){
        $position = Position::find($id);
        if ($position){
            $position->delete();
        }
        return redirect()->back();
    }
}
