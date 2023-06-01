<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie; 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('categories.index',['categories'=>categorie::all()]);
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
        $new_category=new categorie;
        $new_category->Nom_categorie=$request->category;
        $new_category->save();

        return redirect()->back()->with('status', 'You have been add new category');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $courses_by_category=categorie::findOrfail($id);
        return view('Courses.indexcourse',['courses'=>$courses_by_category->courses,'categories'=>categorie::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $category_update=categorie::FindOrFail($id);
        $category_update->Nom_categorie=$request->category;
        $category_update->save();

        return redirect()->back()->with('status', 'You have been updated the category');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category_delete=categorie::FindOrFail($id);
        $category_delete->delete();
        return redirect()->back()->with('status', 'You have been deleted the category');

    }
}
