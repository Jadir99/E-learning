<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\categorie;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Courses.indexcourse',['courses'=>course::all(),'categories'=>categorie::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.add_course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course= course::findOrFail($id);
    if ($course !=false )
    return view('courses.course_detail',['course' => $course]);
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
// {
//     $request->validate([
//             'name' => 'required',
//             'price' => 'required',
//             'origin' => 'required ',' integer',
//     ]);
//     $computer=new Computer();
//     $computer->name=$request->input('name');
//     $computer->prince=$request->input('price');
//     $computer->origin=$request->input('origin');
//     $computer->save();
//     return redirect()->route('computers.index');
// }

// /**
//  * Display the specified resource.
//  */
// public function show($computer)
// {
    
//     $comp= Computer::findOrFail($computer);
//     // $computer= Computer::find($computer);


//     // $index=array_search($computer,array_column($computers,'computer'));
//     //this metod return l index of value in computers 
//     if ($computer !=false )
//     return view('computers.show',['computer' => $comp]);
// }

// /**
//  * Show the form for editing the specified resource.
//  */
// public function edit($computer)
// {
    
//     $comp= Computer::findOrFail($computer);
//     // $computer= Computer::find($id);


//     // $index=array_search($id,array_column($computers,'id'));
//     //this metod return l index of value in computers 
//     if ($computer !=false )
//     return view('computers.edit',['computer' => $comp]);
// }

// /**
//  * Update the specified resource in storage.
//  */
// public function update(Request $request, string $id)
// {
//     $request->validate([
//         'name' => 'required',
//         'price' => 'required',
//         'origin' => 'required ',' integer',
// ]);
// $to_update= Computer::findOrFail($id);


// $to_update->name=$request->input('name');
// $to_update->prince=$request->input('price');
// $to_update->origin=$request->input('origin');
// $to_update->update();
// return redirect()->route('computers.show',['computer'=>$to_update]); 
// }

// /**
//  * Remove the specified resource from storage.
//  */
// public function destroy( $id)
// {
//     $to_delete= Computer::findOrFail($id);
//     $to_delete->delete();
//     return redirect()->route('computers.index'); 
    
// }