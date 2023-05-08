<?php

namespace App\Http\Controllers;

use App\Models\Delivery_user_partie_Devoir;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeworkSubmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_published =date('Y-m-d');
        $request->validate([
                        'devoir' => 'required ',
                ]);
                // adding document
                $add_devoir= new Delivery_user_partie_Devoir();

                $slug=Str::slug('devoir','-');
                $new_document=uniqid().'-'.$slug.'.'.$request->devoir->extension() ;
                $request->devoir->move(public_path('documents'), $new_document);
                $add_devoir->path_travail=$new_document;
                $add_devoir->partie_id=$request->partie_id;
                $add_devoir->user_id=$request->user_id;
                $add_devoir->devoir_id=$request->devoir_id;
                $add_devoir->save();
                return redirect()->back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
