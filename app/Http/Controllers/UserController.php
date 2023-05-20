<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\course;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;



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
        // show reviews of each course 
        $reviews=course::whereHas('learner',function(Builder $query){
            $query->where('access', 'like', 'confirm')
            ->where('comment','like','_%')
            ->select('course_id',DB::raw('AVG(review) as avg_reviews'),DB::raw('count(review) as sum_reviews'))
            ->groupBy('course_id');
        })
        ->get();

        // $user_courses=DB::table('users as u1')->where('u1.id','=',Auth::user()->id)
        // ->join('courses', 'u1.id', '=', 'courses.user_id')
        // ->select('*','courses.id as course_id')
        // ->get();

        $user_courses=User::FindOrFail(Auth::user()->id)->get();

        // var_dump($user_courses->course);

        // foreach ($user_courses as $user_course){
        //     foreach ($user_course->former as $item){
        //         echo $item->title;
        //     }
        // }


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
        return redirect()->route('users.profile',['profile_id'=>$id])->with('status','youre informations are update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile($id){
        $profile_courses=User::FindOrFail($id);

        // show reviews of each course 
        $reviews=course::whereHas('learner',function(Builder $query){
            $query->where('access', 'like', 'confirm')
            ->where('comment','like','_%')
            ->select('course_id',DB::raw('AVG(review) as avg_reviews'),DB::raw('count(review) as sum_reviews'))
            ->groupBy('course_id');
        })
        ->get();

        $existe=course::whereHas('learner',function(Builder $query){
            $query->where('users.id',Auth::user()->id)
            ->where('access','like','confirm');
        })->get();

        return view('users.profile',['profile'=>$profile_courses,'reviews'=>$reviews,'existes'=>$existe]);
        
    }
    public function all_users(){
        return view('users.All_Users',['users'=>User::all()]);
    }

    public function add_admin($id){
        $add_admin=user::FindOrFail($id);
        $add_admin->role='admin';
        $add_admin->save();
        return redirect()->back()->with('status', 'u add the new admin');
    }
}
