<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partie;
use App\Models\Devoir;
use App\Models\User;
use App\Models\Conetent;
use Illuminate\Support\Str;
use App\Models\Delivery_user_partie_Devoir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PartieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        // this is devoirs of all learner in all courses;
        $user=User::FindOrFail(Auth::user()->id);

      
        return view('parties.devoirs',['devoirs'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        // echo $_GET['course'];
        // echo 'lknlkn';
        return view('parties.add_chapter',['couse'=>$_GET['course']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
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

                // adding document
                $document= new Conetent();

                $slug=Str::slug($request->input('devoir_title'),'-');
                $new_document=uniqid().'-'.$slug.'.'.$request->document->extension() ;
                $request->document->move(public_path('documents'), $new_document);
                $document->path_content=$new_document;
                $document->type_content='document';
                $document->partie_id=$partie_id;
                $document->save();
                // adding video

                $video = new  Conetent();

                $slug=Str::slug($request->input('devoir_title'),'-');
                $new_video=uniqid().'-'.$slug.'.'.$request->video->getClientOriginalExtension() ;
                $request->video->move(public_path('videos'), $new_video);
                // $video->path_content = Storage::disk('public')->putFileAs('videos', $request->video, $new_video);
                $video->path_content=$new_video;
                $video->type_content='video';
                $video->partie_id=$partie_id;
                $video->save();


                


                return redirect()->route('courses.edit',['course'=>$request->input('course')])->with('status','You add new chapter');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id )
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
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
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        $delete_party=Partie::FindOrFail($id);
        $delete_party->delete();
        return redirect()->back()->with('status','the cahpter has been deleted');
    }

    public function remise_devoir(Request $request){
                // dd($request);
                if(!Auth::check()){
                    return redirect()->route('login')->with('error','you have to login first!!!');
                }

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

                return redirect()->back()->with('status','the assignement is remise');
    }

    
}
