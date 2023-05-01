<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\categorie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

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
        
        return view('courses.add_course',['categories'=>categorie::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_published =date('Y-m-d');
        $request->validate([
                        'title' => 'required',
                        'category' => 'required',
                        'image' => 'required ',
                        'description' => 'required ',
                ]);
                $course=new course();
                $course->title=$request->input('title');
                $course->category_id=$request->input('category');
                $slug=Str::slug($request->title,'-');
                $newImageName=uniqid().'-'.$slug.'.'.$request->image->extension() ;
                $request->image->move(public_path('iamges'), $newImageName);
                $course->image=$newImageName;
                $course->description=$request->input('description');
                $course->user_id=Auth::user()->id;
                $course->date_pub=$date_published;

                $course->save();
                return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $course= course::findOrFail($id);
    if ($course !=false )
    return view('courses.course_detail',['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $edit_cours= course::findOrFail($id);

        if ($edit_cours !=false )
        return view('courses.update_course',['course' => $edit_cours,'categories'=>categorie::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
                'title' => 'required',
                'category' => 'required',
                'image' => 'required ',
                'description' => 'required ',
        ]);

        $course_update= course::findOrFail($id);
        $course_update->title=$request->input('title');
        $course_update->category_id=$request->input('category');
        $slug=Str::slug($request->title,'-');
        $newImageName=uniqid().'-'.$slug.'.'.$request->image->extension() ;
        $request->image->move(public_path('iamges'), $newImageName);
        $course_update->image=$newImageName;
        $course_update->description=$request->input('description');
        $course_update->update();
        // dd($course_update);
        return redirect()->route('courses.show',['course' => $course_update->id]); 
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