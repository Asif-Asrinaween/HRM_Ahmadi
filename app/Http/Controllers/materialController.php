<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class materialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.material.index')
            ->with('materials', Material::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.material.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Material::create(['name' => $request->name, 'type' => $request->type, 'model' => $request->model, 'company' => $request->company, 'price' => $request->price, 'amount' => $request->amount]);
        return redirect()->route('Material.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $Material)
    {

        return view('frontend.material.show')
            ->with('material', $Material);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $Material)
    {
        return view('frontend.material.edit')
            ->with('material', $Material);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $Material)
    {
        $Material->update(['name'=>$request->name,'type'=>$request->type,'model'=>$request->model,'company'=>$request->company,'price'=>$request->price,'amount'=>$request->amount]);
        return redirect()->route('Material.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(Material $id)
    {
        // return $id;

        $id->forceDelete();
        return redirect()->route('Material.index');
    }
}
