<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\categorie;
use App\Models\User;
use App\Models\Prendre_course_user;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // this for testing if the learner has been already enrolled or not   
        
        $existe=course::whereHas('learner',function(Builder $query){
            $query->where('users.id',Auth::user()->id)
            ->where('access','like','confirm');
        })->get();




// show reviews of each course 
        $reviews=course::whereHas('learner',function(Builder $query){
            $query->where('access', 'like', 'confirm')
            ->where('comment','like','_%')
            ->select('course_id',DB::raw('AVG(review) as avg_reviews'),DB::raw('count(review) as sum_reviews'))
            ->groupBy('course_id');
        })
        ->get();
        
    return view('Courses.indexcourse',['courses'=>course::all(),'categories'=>categorie::all(),'existes'=>$existe,'reviews'=>$reviews]);
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
                return redirect()->route('courses.index')->with('status', 'u added the course');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        
// show reviews of each course 
        $reviews=course::whereHas('learner',function(Builder $query){
            $query->where('access', 'like', 'confirm')
            ->where('comment','like','_%')
            ->select('course_id',DB::raw('AVG(review) as avg_reviews'),DB::raw('count(review) as sum_reviews'))
            ->groupBy('course_id');
        })
        ->where('courses.id',$id)
        ->get();
        
        // foreach ($reviews as $course) {
        //     // echo $reviews->title;
        //     // echo $course->learner->first()->avg_reviews;
        //     echo $course->learner->avg('pivot.review');
        //     echo $course->avg_reviews;
        //     foreach ($course->learner as $review) {
        //         // echo $review->pivot->access;
        //         // echo $review->name;
        //         echo $review->course_id;
        //         echo $review->pivot->avg_reviews;
        //     }
        // }
        

        // courses 
        $course= course::findOrFail($id);
    if ($course !=false )
    return view('courses.course_detail',['course' => $course,'parties'=>$course->partie,'reviews'=>$reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $edit_cours= course::findOrFail($id);

        // // dd($edit_cours->partie());
        // foreach ($edit_cours->partie as $partie) {
        //     echo $partie->title_partie.'v';
        // }


        if ($edit_cours !=false )
        return view('courses.update_course',['course' => $edit_cours,'categories'=>categorie::all(),'parties'=>$edit_cours->partie]);
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
        return redirect()->route('courses.show',['course' => $course_update->id])->with('status','u had been edit this course succesfly');; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $to_delete= course::findOrFail($id);
        $to_delete->delete();
        return redirect()->route('courses.index'); 
    }
    public function courses_by_category($category_id){

      
        // this for testing if the learner has been already enrolled or not   
        
        $existe=course::whereHas('learner',function(Builder $query){
            $query->where('users.id',Auth::user()->id)
            ->where('access','like','confirm');
        })->get();




// show reviews of each course 
        $reviews=course::whereHas('learner',function(Builder $query){
            $query->where('access', 'like', 'confirm')
            ->where('comment','like','_%')
            ->select('course_id',DB::raw('AVG(review) as avg_reviews'),DB::raw('count(review) as sum_reviews'))
            ->groupBy('course_id');
        })
        ->get();
        $courses_by_category=categorie::findOrfail($category_id);
        
        // dd($courses_by_category->courses);
        return view('Courses.indexcourse',['courses'=>$courses_by_category->courses,'categories'=>categorie::all(),'existes'=>$existe,'reviews'=>$reviews]);

    }
    
    //ask for course (ajouter review )
    public function ask_for_course ($course_id) {
        $demand_access=new Prendre_course_user();
        $demand_access->course_id=$course_id;
        $demand_access->user_id=Auth::user()->id;
        $demand_access->access='in progress';
        $demand_access->review='0.0';
        $demand_access->comment='this is amazing';
        $demand_access->date_review='2023-05-03';
        $demand_access->date_comment='2023-05-03';
        $demand_access->save();

        return redirect()->route('courses.index')->with('status', 'Demand sent succesfly');

    }

    // update the acces from in progress to refuse or confirm
    public function update_acces_of_course($coure_user_id,$access){

        $update_demand=Prendre_course_user::FindOrFail($coure_user_id);
        $update_demand->access=$access;
        $update_demand->update();
        return redirect()->back();
    }
    
    // showing the invitaion for the users whos askin for the course
    public static function show_all_demands(){

        // $course_user = DB::table('users as u1')->where('u1.id','=',Auth::user()->id)
        // ->join('courses', 'u1.id', '=', 'courses.user_id')
        // ->join('prendre_course_users', 'courses.id', '=', 'prendre_course_users.course_id')
        // ->where('prendre_course_users.access','like','in progress')
        // ->join('users as u2','prendre_course_users.user_id','u2.id')
        // ->select('*','prendre_course_users.id as coure_user_id')
        // ->get();
        // // dd($course_user);echo '<br>';
        // $course_user=User::where('users.id',Auth::user()->id)->whereHas('learning',function (Builder $query) {
        //     $query
        //     ->where('prendre_course_users.access','in progress');
        //     // ->where('courses.user_id',Auth::user()->id);
        // })
        // ->get();

        $test_course_user_owner=User::FindOrFail(Auth::user()->id)
        ->whereHas('former',function (Builder $query) {
            $query->whereHas('learner',function(Builder $query) {
                $query
                ->where('access','like','in progress');
            });
        })
        ->get();

        
// foreach ($test_course_user_owner as $formers){
//     foreach ($formers->former as $former){
// if ($former->user_id==Auth::user()->id){
//     // echo $former->id; echo '<br>';
        
//             echo 'title of course : ';echo $former->title;echo '<br>';
//             foreach ($former->learner as $learner){
//                 if ($learner->pivot->access=='in progress'){
//                     echo $learner->pivot->id;echo '<br>';
    
//                 }
    
        
// }
            
//         }
//         // var_dump ($former);
//         // echo $former->title;echo '<br>';

//     }
// }

        // foreach ($course_user as $item){
        //     echo $item->id; echo '<br>';
        //     // echo $item->learning->count('*'); echo '<br>';

        //     // echo $item->id; echo '<br>';
        //     if ( $item->id==Auth::user()->id){
        //     foreach ($item->learning as $user){
        //         echo 'title : ';   echo $user->title;echo '<br>';
        //     echo 'acces : ';echo  $user->pivot->access; echo '<br>';
        //     echo 'user_id : ';echo  $user->pivot->user_id; echo '<br>';
        //     // echo 'user_id_enrolled : ';$user->pivot->review; echo '<br>';
        //     // echo $user->id; echo '<br>';

        //     }   

        //     }
        // }




        return $test_course_user_owner;
    // dd($users);
    // return view('courses.layoutt',$users);
    }
    // show the coursses of on user 
    public static function show_courses_allowed(){
        

        $course_user = DB::table('prendre_course_users as p')
        ->where('p.user_id','=',Auth::user()->id)
        ->where('p.access','like','confirm')
        ->join('courses', 'p.course_id', '=', 'courses.id')
        ->join('users as u','courses.user_id','=','u.id')
        ->select('*','u.id as id_former','u.name as name_former','p.user_id as learner_id')
        ->get();
        // dd($course_user)
        return $course_user;
    }
    public function insert_review(request $request){


        $review = Prendre_course_user::
        where('user_id', Auth::user()->id)
        ->where('course_id', $request->course_id)
        ->first();



        $review=Prendre_course_user::FindOrFail($review->id);          
        $review->date_comment = date('Y-m-d H:i');
        $review->date_review = date('Y-m-d H:i');
        $review->comment = $request->comment;
        $review->review = $request->review;
        $review->update();
        return redirect()->back();

        

    }

    
}
