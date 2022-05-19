<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Equipment;
use App\Models\Manufacture;
use App\Models\User;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::with('manufacture', 'users', 'category', 'notes')->get();
        $response['data'] = $equipments;
        return json_encode($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufactures = Manufacture::all();
        $categories = Category::all();
        $users = User::all();
        return view('equipment.create', compact('manufactures', 'categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipment = Equipment::create($request->all());
        if ($request['user_id'] != "") {
            $equipment->users()->attach($request['user_id']);
        }

        return redirect()->route('equipment.show', compact('equipment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('equipment.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $manufactures = Manufacture::all();
        $categories = Category::all();
        $users = User::all();
        return view('equipment.edit', compact('equipment', 'manufactures', 'categories', 'users'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $equipment->fill($request->all())->save();
        if ($request['user_id'] != "" && $request['user_id'] != $equipment->users->first()->id) {
            $equipment->users()->attach($request['user_id']);
        }

        return redirect()->route('equipment.show', compact('equipment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->back();
    }
}