<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use App\Contacts;
use App\Program;
use App\ProgramCategory;
use App\NutrationCategory;
use App\SevenDayPlan;
use App\NutrationStart;
use Storage;
use DB;
use Auth;
use Carbon\Carbon;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    /*View home page*/

    public function index()
    {
        $allProgram = DB::table('programs')
            ->groupBy('category')
            ->paginate(6); 
        $allWorkouts = DB::table('workouts')
            ->groupBy('category')
            ->paginate(6);
        $allNutration = DB::table('nutrations')
            ->groupBy('nutration_categorys_id')
            ->paginate(6);
        $allVideos = DB::table('videos')
            ->groupBy('video_category_id')
            ->paginate(6);
        return view('welcome')->with('allprogram',$allProgram)->with('allworkout',$allWorkouts)->with('allvideo',$allVideos)->with('allnutration',$allNutration);
    }





    /*View Workout page*/

    public function viewWorkout($id)
    {
        $getWorkoutById = DB::table('workouts')->where('category','=',$id)->get();
        $getWorkoutName = DB::table('categories')->where('id',$id)->first();
        return view('user.workout')->with('workout',$getWorkoutById)->with('workoutname',$getWorkoutName);
    }




    /*View program page*/

    public function viewProgram($id)
    {
        $getProgramCategory = '';
        $getProgramById = DB::table('programs')->where('category','=',$id)->get();
        $getprogramName = DB::table('program_category')->where('id',$id)->first();
        if(isset($getProgramById)){
            foreach($getProgramById as $singleProgram ){
                $categoryId = $singleProgram->category;
                break;
            }
            if(!empty($categoryId)){
                $getProgramCategory = ProgramCategory::find($categoryId);
            }
            return view('user.program')->with('program',$getProgramById)->with('tips',$getProgramCategory )->with('programname',$getprogramName);
        }
        else{
            echo "No program found by this category";
        }
    }





    /*View Nutrition page*/

    public function viewNutration($id)
    {
        $getNutrationCategory = '';
        $getNutrationById = DB::table('nutrations')->where('nutration_categorys_id','=',$id)
                            ->orderBy('id','DESC')
                            ->get();
        $getNutrationName = DB::table('nutration_categorys')->where('id',$id)->first();
        if(isset($getNutrationById)){
            foreach($getNutrationById as $singleNutration ){
                $categoryId = $singleNutration->nutration_categorys_id  ;
                break;
            }
            if(!empty($categoryId)){
                $getNutrationCategory = NutrationCategory::find($categoryId);
            }
            return view('user.nutration')->with('nutration',$getNutrationById)->with('tips',$getNutrationCategory )->with('nutrationname',$getNutrationName);
        }
        else{
            echo "No nutration found by this category";
        }
    }





    /* View Videos page*/

    public function viewVideo($id)
    {
        $getVideoName = DB::table('video_category')->where('id',$id)->first();
        $getVideoById = DB::table('videos')->where('video_category_id','=',$id)->get();
        return view('user.video')->with('video',$getVideoById)->with('videoName',$getVideoName);
    }





    /*View contact page*/

    public function viewContactPage(){
        return view('user.contact');
    }

    /*Store contact information*/

    public function sendMessage(Request $request){
        $this->validate($request,array(
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'


             /*|regex:/^[a-zA-Z ]+$/',*/
        ));
        $contact = new Contacts;

        $contact->name = $request->name;       
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        if($contact->save()){
                return redirect()->back()->with('success','Your message has been sent. Thank you');
            }
            else{
                return redirect()->back()->with('denger-success','Sorry! Your message is not sent.');
            }
    }





     /*View 7day plan page*/
    
    public function sevenDays($id)
    {
        $date = Carbon::now()->format('d-m-Y');
        $isPlanStarted = $userId = '';
        if(Auth::check()){
        $userId = Auth::user()->id;
        $isPlanStarted = NutrationStart::where([
            ['nutrationid',$id],
            ['userid',$userId]
        ]
        )->first();
    
   /* if(count($isPlanStarted) > 0 ){
        $planDate = $isPlanStarted->updated_at->format('d-m-Y');
        $totalDate = $date - $planDate;

        if($totalDate > 0){
            //dd($userId);
            DB::table('nutrationplanstart')
            ->where([
            ['nutrationid',$id],
            ['userid',$userId]
        ])
            ->update(['completedday' =>  $totalDate]); 
        }

    }*/
    }       
    $getSevenDays = DB::table('sevendaysplan')->where('nutration_id','=',$id)->first();
    return view('user.sevendaysplan')->with('sevendaysplan',$getSevenDays)->with('isStarted',$isPlanStarted);
    }


    /*store 7 day plan*/

    public function storeStartNutration(Request $request)
    {
        $getStatus = 0;
        $startNutrationPlan = new NutrationStart;
        $startNutrationPlan->completedday = $getStatus;
        $startNutrationPlan->nutrationid = $request->nutrationId;
        $startNutrationPlan->userid = $request->userId;

        $startNutrationPlan->save();
        return redirect()->back()->with('success','This plan is started.');
    }





     /*View Profile page*/

    public function profile()
    {
        return view('admin.profile');
    }





    /*View started nutrition plan page*/

    public function myNutrationPlan()
    {
        $id = Auth::user()->id;
        $getStartedPlan = DB::table('nutrationplanstart')
                            ->join('nutrations', 'nutrationplanstart.nutrationid', '=', 'nutrations.id')
                            ->where('nutrationplanstart.userid',$id)
                            ->get();
        return view('admin.mynutrationplan')->with('startedPlan',$getStartedPlan);
    }



    /*Cancel nutrition plan page*/

    public function cancelNutration($id)
    {
        $userId = Auth::user()->id; 
        $getPlan = NutrationStart::where([
            ['nutrationid',$id],
            ['userid',$userId]
        ])->first();
        $getPlan->delete();
        return redirect()->back();
    }
}
