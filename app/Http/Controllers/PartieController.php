<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partie;
use App\Models\Devoir;
use App\Models\Quiz;
use App\Models\Conetent;
class PartieController extends Controller
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
        // echo $_GET['course'];
        // echo 'lknlkn';
        return view('parties.add_chapter',['couse'=>$_GET['course']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // echo 'lihkuhkho';
        // dd($request);

        $date_published_partie =date('Y-m-d');
        $request->validate([
                        'title' => 'required',
                        'description' => 'required ',
                ]);
        
                $partie=new Partie();
                $partie->title_partie=$request->input('title');
                $partie->description_partie=$request->input('description');
                $partie->course_id=$request->input('course');
                $partie->date_pub_partie=$date_published_partie;
                $partie->save();

                // $devoir=
                // $quiz=
                // ee

                $partie_id= Partie::latest('id')->first()->id;
                $devoir=new Devoir();
                $devoir->devoir_title=$request->input('devoir_title');
                $devoir->id_partie	=$partie_id;
                $devoir->save();

                return redirect()->route('courses.edit',['course'=>$request->input('course')]);
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
