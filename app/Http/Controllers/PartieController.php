<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partie;
use App\Models\Devoir;
use App\Models\User;
use App\Models\Conetent;
use Illuminate\Support\Str;
use App\Models\Delivery_user_partie_Devoir;
class PartieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // this is devoirs of all learner in all courses;
        $user=User::FindOrFail(1);

        // foreach ($user->former as $course){
        //     // echo 'title: ';echo $course->title;echo '<br>';
        //     foreach($course->partie as $parties){
        //         // echo 'partie:' ;echo $parties->title_partie;echo '<br>';
        //         foreach($parties->devoirs as $devoir){
        //             // echo 'devoir:' ;echo $devoir->devoir_title;echo '<br>';
        //             // var_dump($devoir->users_devoir);
        //             foreach($devoir->users_devoir as $user_devoir){
        //                 echo 'date ::::'.$user_devoir->pivot->date_remise.'<br>';
        //                 echo 'date ::::'.$user_devoir->name.'<br>';
        //             }
        //         }
        //     }
        // }
        return view('parties.devoirs',['devoirs'=>$user]);
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

                
                // adding chapter
                $partie_id= Partie::latest('id')->first()->id;
                $devoir=new Devoir();
                $devoir->devoir_title=$request->input('devoir_title');
                $devoir->enonce=$request->input('enonce');
                $devoir->partie_id	=$partie_id;
                $devoir->save();


                // adding video

                $video= new  Conetent();

                $slug=Str::slug($request->input('title'),'-');
                $new_video=uniqid().'-'.$slug.'.'.$request->video->extension() ;
                $request->video->move(public_path('videos'), $new_video);
                $video->path_content=$new_video;
                $video->type_content='video';
                $video->partie_id=$partie_id;
                $video->save();


                // adding document
                $document= new Conetent();

                $slug=Str::slug($request->input('title'),'-');
                $new_document=uniqid().'-'.$slug.'.'.$request->document->extension() ;
                $request->document->move(public_path('documents'), $new_document);
                $document->path_content=$new_document;
                $document->type_content='document';
                $document->partie_id=$partie_id;
                $document->save();


                return redirect()->route('courses.edit',['course'=>$request->input('course')])->with('status','u had been your chapter');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id )
    {
        $party= Partie::findOrFail($id);
        if ($party !=false )
        return view('parties.party_detail',['party'=>$party]);
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
        $delete_party=Partie::FindOrFail($id);
        $delete_party->delete();
        return redirect()->back()->with('status','the cahpter has been deleted');
    }

    public function remise_devoir(Request $request){
                // dd($request);

                $date_delevry =date('Y-m-d');
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
                $add_devoir->date_remise=$date_delevry;
                $add_devoir->note_devoir='0.0';
                $add_devoir->save();

                return redirect()->back()->with('status','the devoir is remise');
    }

    
}
