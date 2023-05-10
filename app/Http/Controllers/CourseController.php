<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\categorie;
use App\Models\Partie;
use App\Models\Prendre_course_user;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
        $existe= DB::table('prendre_course_users as p')
        ->where('p.user_id','=',Auth::user()->id)
        ->where('p.access','like','confirm')
        ->get();


        // show the reviews 
        // reviews
        $reviews=DB::table('courses')
        ->join('prendre_course_users as p','p.course_id','=','courses.id')
        ->where('p.access','like','confirm')
        ->where('p.comment','like','_%')
        ->select('p.course_id',DB::raw('AVG(p.review) as avg_reviews'),DB::raw('count(p.review) as sum_reviews'))
        ->groupBy('p.course_id')
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
        // reviews
        $reviews=DB::table('courses')->where('courses.id','=',$id)
        ->join('prendre_course_users as p','p.course_id','=','courses.id')
        ->where('p.access','like','confirm')
        ->where('p.comment','like','_%')
        ->join('users as u','u.id','=','p.user_id')->get();
        
        // calcul moyenne ds rating stars
        $sum=0;
        foreach ($reviews as $review){
                $sum+=$review->review;
                
        }
        
        
        if (count($reviews)!=0)
            $avg= $sum/count($reviews);
        else
            $avg=0;

        $sum_learners=DB::table('courses')->where('courses.id','=',$id)
        ->join('prendre_course_users as p','p.course_id','=','courses.id')
        ->where('p.access','like','confirm')->get();


        $sum=0;
        foreach ($sum_learners as $learner){
             $learner;
                $sum+=1;
        }
        // echo $sum;


        // courses 
        $course= course::findOrFail($id);
        $learner=$course->learner->where('id', '=', $course->user->id);
    if ($course !=false )
    return view('courses.course_detail',['course' => $course,'course_users'=>$learner,'parties'=>$course->partie,'reviews'=>$reviews,'avg'=>$avg,'sum_learners'=>$sum]);
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
        $existe= DB::table('prendre_course_users as p')
        ->where('p.user_id','=',Auth::user()->id)
        ->where('p.access','like','confirm')
        ->get();
        $courses_by_category=categorie::findOrfail($category_id);
        // dd($courses_by_category->courses);
        return view('Courses.indexcourse',['courses'=>$courses_by_category->courses,'categories'=>categorie::all(),'existes'=>$existe]);

    }
    
    //ask for course (ajouter review )
    public function ask_for_course ($course_id,) {
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

        $course_user = DB::table('users as u1')->where('u1.id','=',Auth::user()->id)
        ->join('courses', 'u1.id', '=', 'courses.user_id')
        ->join('prendre_course_users', 'courses.id', '=', 'prendre_course_users.course_id')
        ->where('prendre_course_users.access','like','in progress')
        ->join('users as u2','prendre_course_users.user_id','u2.id')
        ->select('*','prendre_course_users.id as coure_user_id')
        ->get();
        return $course_user;
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