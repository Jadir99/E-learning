<?php

namespace App\Http\Controllers;

use App\Models\Delivery_user_partie_Devoir;
use App\Models\User;
use App\Models\course;
use App\Models\Prendre_course_user;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;



use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Contracts\Service\Attribute\Required;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        // show reviews of each course 
        $reviews=course::whereHas('learner',function(Builder $query){
            $query->where('access', 'like', 'confirm')
            ->where('comment','like','_%')
            ->select('course_id',DB::raw('AVG(review) as avg_reviews'),DB::raw('count(review) as sum_reviews'))
            ->groupBy('course_id');
        })
        ->get();


        $user_courses=User::FindOrFail(3)->get();

        echo count($user_courses);


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
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        return view('users.settings');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {if(!Auth::check()){
        return redirect()->route('login')->with('error','you have to login first!!!');
    }
        // $request->validate([
        //     'name'=>'Required',
        //     'email'=>'Required',
        //     'tele'=>'Required',
        //     'description'=>'Required',
        // ]);

        


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
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        $delet_user=User::FindOrFail($id);
        $delet_user->forceDelete();
        return redirect()->back()->with('status','the user have been deleted');
    }

    public function profile($id){
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
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
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        return view('users.All_Users',['users'=>User::all()]);
    }

    public function add_admin($id){
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        $add_admin=user::FindOrFail($id);
        $add_admin->role='admin';
        $add_admin->save();
        return redirect()->back()->with('status', 'you add new admin');
    }

    private function search_data($items){
        

        // echo $items;
        // for retrieve the count of item$items for each month
        $count=[];
        foreach ($items as $item){
            $count[$item->month]=$item->count;
        }
        // remplire les autres tables 
        $i=1;
        for ($i=1;$i<=12;$i++){
            if (!isset($count[$i]))
            $count[$i]=0;
        }
        return $count;
    }

    // object to array for this and last months     
    private function to_array($count){
        $nbr=[];
        for ($i=0;$i<2;$i++){
            if (!isset($count[$i]))
            $nbr[$i]=0;
            else
            $nbr[$i]=$count[$i]->count;
        }
        return $nbr;
    }

    public function dashboard(){
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        // search about the courses of this year
        $courses = course::selectRaw('COUNT(*) as count, MONTH(date_pub) as month')
        ->whereYear('date_pub', date('Y'))
        ->groupBy('month')
        ->get();

        $cours_count=$this->search_data($courses);

        // search about the users of this year
        $users = User::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->get();
        $users_count=$this->search_data($users);

        // search about the courses of this year
        $reviews = Prendre_course_user::selectRaw('COUNT(*) as count, MONTH(date_review) as month')
        ->whereYear('date_review', date('Y'))
        ->groupBy('month')
        ->get();

        $reviews_count=$this->search_data($reviews);


        // numbers of courses in this month and the last month are
        $nbr_courses = course::selectRaw('COUNT(*) as count, MONTH(date_pub) as month')
        ->whereYear('date_pub', [date("Y-m",strtotime("-1 month")),date('Y-m')])
        ->groupBy('month')
        ->get();
// CALL THE method to array   
        $nbr_courses=$this->to_array($nbr_courses);

        // echo $nbr_courses[1];



        // search about the users of this month and last month
        $nbr_users = User::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
        ->whereYear('created_at', [date("Y-m",strtotime("-1 month")),date('Y-m')])
        ->groupBy('month')
        ->get();
        $nbr_users=$this->to_array($nbr_users);
        // echo $nbr_users[1];

        








        return view('users.dashboeard_admin',['courses'=>$cours_count,'users_count'=>$users_count,'reviews_count'=>$reviews_count,'nbr_courses'=>$nbr_courses,'nbr_users'=>$nbr_users]);

    }
    public function update_note_devoir(Request $request){
        if(!Auth::check()){
            return redirect()->route('login')->with('error','you have to login first!!!');
        }
        
        // $updatenote=Delivery_user_partie_Devoir::FindOrFail($id);
        var_dump(($request->id));
        foreach ($request->id as $id){
            $updatenote=Delivery_user_partie_Devoir::FindOrFail($id);
            $updatenote->note_devoir=$request->notes[$id];
            $updatenote->update();
        }
        return redirect()->back()->with('status','you have been updated your data');
        
    }





    
}
