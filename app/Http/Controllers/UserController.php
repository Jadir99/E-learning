<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // the reviews
        $reviews=DB::table('courses')
        ->join('prendre_course_users as p','p.course_id','=','courses.id')
        ->where('p.access','like','confirm')
        ->where('p.comment','like','_%')
        ->select('p.course_id',DB::raw('AVG(p.review) as avg_reviews'),DB::raw('count(p.review) as sum_reviews'))
        ->groupBy('p.course_id')
        ->get();

        $user_courses=DB::table('users as u1')->where('u1.id','=',Auth::user()->id)
        ->join('courses', 'u1.id', '=', 'courses.user_id')
        ->select('*','courses.id as course_id')
        ->get();
        return view('users.home',['user_courses'=>$user_courses,'reviews'=>$reviews]);
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
        //
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
    public function edit( $id)
    {
        return view('users.settings');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'Required',
            'email'=>'Required',
            'tele'=>'Required',
            'description'=>'Required',
        ]);

        


        $update_user=User::FindOrFail($id);
        $update_user->tele =$request->input('tele');
        $update_user->email =$request->input('email');
        $update_user->name =$request->input('name');
        $update_user->job =$request->input('job');
        $update_user->city =$request->input('city');
        $update_user->contry =$request->input('contry');
        $update_user->Description_about_u =$request->input('description');
        
        $profile_image=$request->file('profile_image');
        if ($profile_image){
            $slug=Str::slug($request->name,'-');
            $newImageProfile=uniqid().'-'.$slug.'.'.$profile_image->extension() ;
            $profile_image->move(public_path('images/users'), $newImageProfile);
            $update_user->profile_image_path=$newImageProfile;

        }
        $cover_image=$request->file('cover_image');
        if ( $cover_image){
            $slug=Str::slug($request->name,'-');
            $newImageCover=uniqid().'-'.$slug.'.'.$cover_image->extension() ;
            $cover_image->move(public_path('images/users'), $newImageCover);
            $update_user->cover_image_path=$newImageCover;

        }
        // echo $request->file('cover_image')->getClientOriginalName();
        // $update_user->cover_image_path=$request->cover_image;
        // $update_user->profile_image_path=$request->profile_image;

        $update_user->update();
        return redirect()->back()->with('status','youre informations are update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
