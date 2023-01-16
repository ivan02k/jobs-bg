<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;

class CitiesController extends Controller
{
    public function index(){
        $cities = City::all();
        return view('cities.index')->with(['cities' => $cities]);
    }

    public function create(){
        return view('cities.create');
    }

    public function store(CityRequest $request){
        $data = $request->except('_method', '_token');
        City::create($data);
        return redirect(route('cities.index'));
    }

    public function edit($id)
    {
      $city = City::find($id);
        return view('cities.edit')->with(['city' => $city]);
    }

    public  function update(CityRequest $request , $id){
        $data = $request->except('_method', '_token');
        $city = City::find($id);
        if ($city){
            $city->update($data);
        }
        return redirect()->action([CitiesController::class, 'index']);
    }

    public function delete($id){
        $city = City::find($id);
        if ($city){
          $city->delete();
        }
        return redirect()->back();
    }
}
