<?php

namespace App\Http\Controllers;

use App\Models\CustType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.CustType.index')
            ->with('items', CustType::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CustType' => 'required|min:2|max:100',
        ]);

        CustType::create(['CustType' => $request->CustType]);
        Session::flash('success', 'Saved Successfully!');

        return redirect()->route('CustType.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustType $CustType)
    {
        return view('frontend.CustType.edit')
            ->with('item', $CustType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustType $CustType)
    {

        $request->validate([
            'CustType' => 'required|min:2|max:100',
        ]);


        $CustType->CustType = $request->CustType;
        $CustType->save();
        Session::flash('success', 'Updated Successfully!');

        return redirect()->route('CustType.index')
            ->with('items', CustType::all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustType $CustType)
    {
        $CustType->delete();
    }

    public function trash()
    {
        return view('frontend.CustType.trash')
            ->with('items', CustType::onlyTrashed()->get());
    }

    public function delete($id)
    {
        $custType = CustType::withTrashed()->where('id', $id)->first();
        $custType->forceDelete();
        Session::flash('success', 'Deleted Successfully!');
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = CustType::onlyTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->route('CustType.index');
    }
}
