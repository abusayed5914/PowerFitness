<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use App\Video;
use App\VideoCategory;
use App\NutrationCategory;
use App\Nutration;
use App\Program;
use App\ProgramCategory;
use App\User;
use App\Contacts;
use App\SevenDayPlan;
use App\Category;
use Storage;
use DB;
use Khill\Lavacharts\Lavacharts;
use Session;
use Auth;

    


    /*View user admin message statistics*/

class DashboardController extends Controller
{
    public function deshboard()
    {
        if(Auth::check() && (Auth::user()->is_admin == 1)){
            $users = DB::table('users')->where('is_admin','!=',1)->get();
            $admin = DB::table('users')->where('is_admin','=',1)->get();
            $contacts = DB::table('contacts')->get();
            $totalUser = (count($users));
            $totalContacts = (count($contacts));
            $totalAdmin = (count($admin));

        	return view('admin.dashbord')->with('totaluser',$totalUser)->with('totalcontact',$totalContacts)->with('totaladmin',$totalAdmin);
        }
        else{
            return redirect()->back()->with('denger-success','You are not authorized to view this page.');
        }

    }






    /*Add workout function form*/

    public function addWorkout()
    {
        return view('admin.addworkout');
    }


    /*store workout function data form*/

    public function storeWorkout(Request $request)
    {
        $this->validate($request,array(
            'name'   => 'required',
            'details'   => 'required',
            'set1'   => 'required',
            'set3'   => 'required',
            'set2'   => 'required',
            'image'   => 'required|mimes:jpg,jpeg,png'
        ));


/* |/^[a-zA-Z ]+$/  |unique:users' */


        $workout = new Workout;

        $workout->title = $request->name;
        $workout->description = $request->details;
        $workout->category = $request->category;
        $workout->set1 = $request->set1;
        $workout->set2 = $request->set2;
        $workout->set3 = $request->set3;
        //$workout->image = $request->project_title;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file[0]->getClientOriginalName();
            /*$location = public_path('file/'.$filename);
            Storage::put($filename,file_get_contents($file));*/

            $location = public_path('file/'.$filename);
            Storage::disk('file')->put($filename, file_get_contents($file[0]));
            //Storage::disk('public')->put($filename, file_get_contents($file));
            $workout->image = $filename;

        }


//file add

/*        $filer = $request->file('image');
        foreach ($filer as $key => $value) {
            $filename = time().'.'.$filer[$key]->getClientOriginalName();
            $location = public_path('file/'.$filename);
            Storage::disk('file')->put($filename, file_get_contents($file[$key]));
            if($key == 1){
                $workout->image2 = $filename;
            }
            if($key == 2){
                $workout->image3 = $filename;
            }
        }
*/





         $workout->save();

         if($workout->save()){
                return redirect()->back()->with('success','Workout saved successfully.');
            }
            else{
                return redirect()->back()->with('denger-success','Workout is not saved.');
            }
        
    }














    /*Add Videos function form*/

    public function addVideo()
    {
        $getAllVideoCategory =  VideoCategory::all();
        return view('admin.addvideo')->with('videoCategory',$getAllVideoCategory);
    }





 /*Store videos data function form*/

    public function storeVideo(Request $request)
    {
        $this->validate($request,array(
            'title'   => 'required',
            'video_category_id'   => 'required',
            'video'   => 'required|mimes:mp4'
        ));

        $video = new Video;

        $video->title = $request->title;
        $video->video_category_id = $request->video_category_id;

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time().'.'.$file->getClientOriginalName();
            /*$location = public_path('file/'.$filename);
            Storage::put($filename,file_get_contents($file));*/

            $location = public_path('file/'.$filename);
            Storage::disk('file')->put($filename, file_get_contents($file));
            //Storage::disk('public')->put($filename, file_get_contents($file));
            $video->video = $filename;

        }

         $video->save();

         if($video->save()){
                return redirect()->back()->with('success','Video saved successfully.');
            }
            else{
                return redirect()->back()->with('denger-success','Video is not saved.');
            }
        
    }
















    /*Add nutrition form*/

    public function addNutration()
    {
        $getAllNutrationCategory =  NutrationCategory::all();
    	return view('admin.addnutration')->with('NutrationCategory',$getAllNutrationCategory);
    }


    /*Store nutrition form*/

    public function storenutration(Request $request)
    {
        if($request->foodplanDays == '7'){
            $this->validate($request,array(
                'title'   => 'required',
                'nutration_description1'   => 'required',
                'nutration_description2'   => 'required',
                'nutration_description3'   => 'required',
                'nutration_description4'   => 'required',
                'nutration_description5'   => 'required',
                'nutration_description6'   => 'required',
                'nutration_description7'   => 'required',
                'proteinimage'   => 'required|mimes:jpg,jpeg,png'
            ));

            $nutration = new Nutration;
            $nutration->title = $request->title;
            $nutration->nutration_description = $request->nutration_description1;
            $nutration->is_seven = 1;
            $nutration->nutration_categorys_id = 2;

            if ($request->hasFile('proteinimage')) {
                $file = $request->file('proteinimage');
                $filename = time().'.'.$file->getClientOriginalName();
                /*$location = public_path('file/'.$filename);
                Storage::put($filename,file_get_contents($file));*/

                $location = public_path('file/'.$filename);
                Storage::disk('file')->put($filename, file_get_contents($file));
                //Storage::disk('public')->put($filename, file_get_contents($file));
                $nutration->nutration_image = $filename;

            }

            $nutration->save();
            $nutrationId = $nutration->id;
            $nutrationSeven = new SevenDayPlan;
            $nutrationSeven->nutration_id = $nutrationId;
            $nutrationSeven->title = $request->title;
            $nutrationSeven->first = $request->nutration_description1;
            $nutrationSeven->second = $request->nutration_description2;
            $nutrationSeven->third = $request->nutration_description3;
            $nutrationSeven->fourth = $request->nutration_description4;
            $nutrationSeven->fifth = $request->nutration_description5;
            $nutrationSeven->sixth = $request->nutration_description6;
            $nutrationSeven->seventh = $request->nutration_description7;

            if ($request->hasFile('proteinimage')) {
                $file = $request->file('proteinimage');
                $filename = time().'.'.$file->getClientOriginalName();
                /*$location = public_path('file/'.$filename);
                Storage::put($filename,file_get_contents($file));*/

                $location = public_path('file/'.$filename);
                Storage::disk('file')->put($filename, file_get_contents($file));
                //Storage::disk('public')->put($filename, file_get_contents($file));
                $nutrationSeven->image = $filename;

            }

             $nutrationSaved = $nutrationSeven->save();
             if($nutrationSaved){
                    return redirect()->back()->with('success','Nutration saved successfully.');
                }
                else{
                    return redirect()->back()->with('danger','Nutration is not saved.');
                } 
        }

        else{
            
           $this->validate($request,array(
            'title'   => 'required',
            'nutration_categorys_id'   => 'required',
            'nutration_description'   => 'required',
            'proteinimage'   => 'required'
        ));
           //dd($request);
        
        $nutration = new Nutration;

        $nutration->title = $request->title;
        $nutration->nutration_description = $request->nutration_description;
        $nutration->nutration_categorys_id = $request->nutration_categorys_id;

        if ($request->hasFile('proteinimage')) {
            $file = $request->file('proteinimage');
            $filename = time().'.'.$file->getClientOriginalName();
            /*$location = public_path('file/'.$filename);
            Storage::put($filename,file_get_contents($file));*/

            $location = public_path('file/'.$filename);
            Storage::disk('file')->put($filename, file_get_contents($file));
            //Storage::disk('public')->put($filename, file_get_contents($file));
            $nutration->nutration_image = $filename;

        }

         $nutration->save();
         if($nutration->save()){
                return redirect()->back()->with('success','Nutration saved successfully.');
            }
            else{
                return redirect()->back()->with('denger-success','Nutration is not saved.');
            } 
        }
    	        
    }






   /*Add program form*/

    public function addProgram()
    {
        return view('admin.addprogram');
    }


    /*Store program data form*/

    public function storeProgram(Request $request)
    {
        $this->validate($request,array(
            'name'   => 'required',
            'details'   => 'required',
            'set1'   => 'required',
            'set3'   => 'required',
            'set2'   => 'required',
            'image'   => 'required|mimes:jpg,jpeg,png'
        ));
        $program = new Program;

        $program->title = $request->name;
        $program->description = $request->details;
        $program->category = $request->category;
        $program->set1 = $request->set1;
        $program->set2 = $request->set2;
        $program->set3 = $request->set3;
        //$program->image = $request->project_title;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalName();
            /*$location = public_path('file/'.$filename);
            Storage::put($filename,file_get_contents($file));*/

            $location = public_path('file/'.$filename);
            Storage::disk('file')->put($filename, file_get_contents($file));
            //Storage::disk('public')->put($filename, file_get_contents($file));
            $program->image = $filename;

        }

         $program->save();

         if($program->save()){
                return redirect()->back()->with('success','Program saved successfully.');
            }
            else{
                return redirect()->back()->with('denger-success','Program is not saved.');
            }
        
    }





    /*Add nutrition Category form*/

    public function addNutrationCategory()
    {
        return view('admin.addnutratoncategory');
    }


    /*Store nutrition category data form*/

    public function storeNutrationCategory(Request $request)
    {
        $this->validate($request,array(
            'nutrationCategoryName' => 'required',
            //'tips'   => 'required',
        ));

        $nutrationCategory = new NutrationCategory;

        $nutrationCategory->nutration_category_name = $request->nutrationCategoryName;
        //$nutrationCategory->tips = $request->tips;

        $nutrationCategory->save();

        if($nutrationCategory->save()){
                return redirect()->back()->with('success','Nutration category Saved successfully.');
            }
            else{
                return redirect()->back()->with('denger-success','Nutration category is not saved.');
            }
        
    }  






    /*Add program Category form*/

    public function addProgramCategory()
    {
        return view('admin.addprogramcategory');
    }


    /*Store program category data form*/

    public function storeProgramCategory(Request $request)
    {
        $this->validate($request,array(
            'categoryName' => 'required',
            'tips'   => 'required',
        ));

        $programCategory = new ProgramCategory;

        $programCategory->program_category_name = $request->categoryName;
        $programCategory->tips = $request->tips;

        $programCategory->save();

        if($programCategory->save()){
                return redirect()->back()->with('success','Program category Saved successfully.');
            }
            else{
                return redirect()->back()->with('denger-success','Program category is not saved.');
            }
        
    }






   /*Add Workout category form*/

    public function addWorkoutCategory()
    {
        return view('admin.addworkoutcategory');
    }


     /*Store Workout category data form*/

    public function storeWorkoutCategory(Request $request)
    {
        $this->validate($request,array(
            'categoryName' => 'required',
        ));

        $workoutCategory = new Category;

        $workoutCategory->category = $request->categoryName;

        $workoutCategory->save();

        if($workoutCategory->save()){
                return redirect()->back()->with('success','Workout category Saved successfully.');
            }
            else{
                return redirect()->back()->with('denger-success','Workout category is not saved.');
            }
        
    } 






    /*Add video category form*/

    public function addVideocategory()
    {
        return view('admin.addvideocategory');
    }


     /*Store video category data form*/

    public function storeVideocategory(Request $request)
    {
        $this->validate($request,array(
            'categoryName' => 'required',
        ));

        $videoCategory = new VideoCategory;

        $videoCategory->video_category_name = $request->categoryName;

        $videoCategory->save();

        if($videoCategory->save()){
                return redirect()->back()->with('success','Video category Saved successfully.');
            }
            else{
                return redirect()->back()->with('denger-success','Video category is not saved.');
            }
        
    }






    /*View message Function */

    public function messages()
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $allMessages = DB::table('contacts')->orderBy('id','DESC')->get();
            return view('admin.message')->with('messages',$allMessages);
        }
        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


    /*edit message Function for delete*/

    public function deleteMessage(Request $request)
    {
        $messageId = $request->messageId;
        $getMessgeById = Contacts::find($messageId);
        if($getMessgeById->delete()){
            Session::flash('danger','Message deleted successfully');
            return redirect()->back();
        }
        else{
            Session::flash('danger','sorry ! message could not be deleted.');
            return redirect()->back();
        }
    }







    /*View video Function */

    public function allWorkout()
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $allWorkout = DB::table('workouts')
                                ->orderBy('id','DESC')
                              ->paginate(10);
            //$allWorkout = DB::table('workouts')->orderBy('id','DESC')->get();
            return view('admin.allworkouts')->with('allworkout',$allWorkout);
        }
        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


    /*edit workout Function for view form*/

    public function editworkout($id)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $workout = Workout::find($id);
            return view('admin.editworkout')->with('workout',$workout);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


    /*edit workout Function for update data form*/

    public function updateworkout(Request $request)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){

            $this->validate($request,array(
            'name'   => 'required',
            'details'   => 'required',
            'set1'   => 'required',
            'set3'   => 'required',
            'set2'   => 'required'
        ));
            $id = $request->id;
            $workout = Workout::find($id);
            $workout->title = $request->name;
            $workout->description = $request->details;
            $workout->category = $request->category;
            $workout->set1 = $request->set1;
            $workout->set2 = $request->set2;
            $workout->set3 = $request->set3;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalName();
                /*$location = public_path('file/'.$filename);
                Storage::put($filename,file_get_contents($file));*/

                $location = public_path('file/'.$filename);
                Storage::disk('file')->put($filename, file_get_contents($file));
                //Storage::disk('public')->put($filename, file_get_contents($file));
                $workout->image = $filename;
            }
            $workout->save();
            Session::flash('success','Workout Updated succcessfully.');
            return redirect()->back()->with('workout',$workout);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


     /*edit workout Function for delete*/

    public function deleteWorkout(Request $request)
    {
        $id = $request->workoutid;
        $getWorkout = Workout::find($id);
        if($getWorkout->delete()){
            return redirect()->back()->with('danger','Workout Deleted successfully');
        }
        else{
            return redirect()->back()->with('danger','Sorry! Workout is not deleted');
        }
    } 







  /*View program Function*/

    public function allProgram()
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $allWorkout = DB::table('programs')
                                ->orderBy('id','DESC')
                                ->paginate(10);
            //$allWorkout = DB::table('workouts')->orderBy('id','DESC')->get();
            return view('admin.allprogram')->with('allworkout',$allWorkout);
        }
        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


     /*edit program Function for view form*/

    public function editProgram($id)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $workout = Program::find($id);
            $categories = ProgramCategory::all();
            //dd($workout);
            return view('admin.editprogram')->with('workout',$workout)->with('programCategories',$categories);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*edit program Function for update data form*/

    public function updateProgram(Request $request)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){

            $this->validate($request,array(
            'name'   => 'required',
            'details'   => 'required',
            'set1'   => 'required',
            'set3'   => 'required',
            'set2'   => 'required',
        ));
            $id = $request->id;
            $program = Program::find($id);
            $program->title = $request->name;
            $program->description = $request->details;
            $program->category = $request->category;
            $program->set1 = $request->set1;
            $program->set2 = $request->set2;
            $program->set3 = $request->set3;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalName();
                /*$location = public_path('file/'.$filename);
                Storage::put($filename,file_get_contents($file));*/

                $location = public_path('file/'.$filename);
                Storage::disk('file')->put($filename, file_get_contents($file));
                //Storage::disk('public')->put($filename, file_get_contents($file));
                $program->image = $filename;
            }
            $program->save();
            Session::flash('success','Program Updated succcessfully.');
            return redirect()->back()->with('workout',$program);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


     /*edit program Function for delete form*/

    public function deleteProgram(Request $request)
    {
        $id = $request->workoutid;
        $getWorkout = Program::find($id);
        if($getWorkout->delete()){
            return redirect()->back()->with('danger','Program Deleted successfully');
        }
        else{
            return redirect()->back()->with('danger','Sorry! Program is not deleted');
        }
    }






    
    /*view video Function*/

    public function allVideo()
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $allWorkout = DB::table('videos')
                                ->orderBy('id','DESC')
                                ->paginate(10);
            //$allWorkout = DB::table('workouts')->orderBy('id','DESC')->get();
            return view('admin.allvideo')->with('allworkout',$allWorkout);
        }
        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


     /*edit video Function for view form*/

    public function editVideo($id)
    {

        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $workout = Video::find($id);
            $categories = VideoCategory::all();
            //dd($categories);
            return view('admin.editvideo')->with('workout',$workout)->with('videoCategories',$categories);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


    /*edit video Function for Update data*/

    public function updateVideo(Request $request)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){

            $this->validate($request,array(
            'title'   => 'required',
            'category'   => 'required',
            'video'   => 'mimes:mp4'
        ));

            $id = $request->id;
            $video = Video::find($id);
            $video->title = $request->title;
            $video->video_category_id = $request->category;

            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $filename = time().'.'.$file->getClientOriginalName();
                /*$location = public_path('file/'.$filename);
                Storage::put($filename,file_get_contents($file));*/

                $location = public_path('file/'.$filename);
                Storage::disk('file')->put($filename, file_get_contents($file));
                //Storage::disk('public')->put($filename, file_get_contents($file));
                $video->video = $filename;

            }
            $video->save();
            Session::flash('success','Video Updated succcessfully.');
            return redirect()->back()->with('workout',$video);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }

        
    /*edit video Function for delete*/

    public function deleteVideo(Request $request)
    {
        $id = $request->workoutid;
        $getWorkout = Video::find($id);
        if($getWorkout->delete()){
            return redirect()->back()->with('danger','Video Deleted successfully');
        }
        else{
            return redirect()->back()->with('danger','Sorry! Video is not deleted');
        }
    } 








    /*View nutrition Function*/

    public function allnutration()
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $allWorkout = DB::table('nutrations')
                                ->orderBy('id','DESC')
                                ->paginate(10);
            //$allWorkout = DB::table('workouts')->orderBy('id','DESC')->get();
            return view('admin.allnutration')->with('allworkout',$allWorkout);
        }
        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*edit nutrition Function for view form*/

    public function editnutration($id)
    {
        $dietPlan = false;
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $nutration = Nutration::find($id);
            $categories = NutrationCategory::all();
            if(($nutration->nutration_categorys_id) && ($nutration->is_seven == 1)){
               $nutration = SevenDayPlan::where('nutration_id',$id)->first(); 
               $dietPlan = true;
            return view('admin.editsevenddays')->with('nutration',$nutration)->with('NutrationCategory',$categories)->with('dietplan',$dietPlan)->with('id',$id);
            }
            /*$isFoodplan = $workout->nutration_categorys_id;
            if($isFoodplan){
                $workout = SevenDayPlan::where('nutration_id',$id)->first();
            }*/
            return view('admin.editnutration')->with('nutration',$nutration)->with('NutrationCategory',$categories)->with('dietplan',$dietPlan)->with('id',$id);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*edit nutrition Function for update data*/

    public function updatenutration(Request $request)
    {
        //dd($request);
        $id = $request->id;

        //if diet plan for seven days
        if($request->foodplanDays == '7'){
            $this->validate($request,array(
                'title'   => 'required',
                'nutration_description1'   => 'required',
                'nutration_description2'   => 'required',
                'nutration_description3'   => 'required',
                'nutration_description4'   => 'required',
                'nutration_description5'   => 'required',
                'nutration_description6'   => 'required',
                'nutration_description7'   => 'required'
            ));

            $nutration = Nutration::find($id);
            $nutration->title = $request->title;
            $nutration->nutration_description = $request->nutration_description1;
            $nutration->is_seven = 1;
            $nutration->nutration_categorys_id = 2;

            if ($request->hasFile('proteinimage')) {
                $file = $request->file('proteinimage');
                $filename = time().'.'.$file->getClientOriginalName();
                /*$location = public_path('file/'.$filename);
                Storage::put($filename,file_get_contents($file));*/

                $location = public_path('file/'.$filename);
                Storage::disk('file')->put($filename, file_get_contents($file));
                //Storage::disk('public')->put($filename, file_get_contents($file));
                $nutration->nutration_image = $filename;

            }

            $nutration->save();
            $nutrationId = $nutration->id;

            $sevenDaysData = SevenDayPlan::where('nutration_id',$id)->first();
            if(!empty($sevenDaysData)){
                $sevenDaysData->nutration_id = $nutrationId;
                $sevenDaysData->title = $request->title;
                $sevenDaysData->first = $request->nutration_description1;
                $sevenDaysData->second = $request->nutration_description2;
                $sevenDaysData->third = $request->nutration_description3;
                $sevenDaysData->fourth = $request->nutration_description4;
                $sevenDaysData->fifth = $request->nutration_description5;
                $sevenDaysData->sixth = $request->nutration_description6;
                $sevenDaysData->seventh = $request->nutration_description7;
            }
            else{
                $sevenDaysData = new SevenDayPlan;
                $sevenDaysData->nutration_id = $nutrationId;
                $sevenDaysData->title = $request->title;
                $sevenDaysData->first = $request->nutration_description1;
                $sevenDaysData->second = $request->nutration_description2;
                $sevenDaysData->third = $request->nutration_description3;
                $sevenDaysData->fourth = $request->nutration_description4;
                $sevenDaysData->fifth = $request->nutration_description5;
                $sevenDaysData->sixth = $request->nutration_description6;
                $sevenDaysData->seventh = $request->nutration_description7;
            }

            if ($request->hasFile('proteinimage')) {
                $file = $request->file('proteinimage');
                $filename = time().'.'.$file->getClientOriginalName();
                /*$location = public_path('file/'.$filename);
                Storage::put($filename,file_get_contents($file));*/

                $location = public_path('file/'.$filename);
                Storage::disk('file')->put($filename, file_get_contents($file));
                //Storage::disk('public')->put($filename, file_get_contents($file));
                $sevenDaysData->image = $filename;

            }
             if($sevenDaysData->save()){
                    return redirect()->back()->with('success','Nutration updated successfully.');
                }
                else{
                    return redirect()->back()->with('danger','Nutration is not updated.');
                } 
        }
        else{
            
           $this->validate($request,array(
            'title'   => 'required',
            'nuCategory'   => 'required',
            'nutration_description'   => 'required',
        ));
        
        $nutration = Nutration::find($id);

        $nutration->title = $request->title;
        $nutration->nutration_description = $request->nutration_description;
        $nutration->nutration_categorys_id = $request->nuCategory;
        $nutration->is_seven = 0;

        if ($request->hasFile('proteinimage')) {
            $file = $request->file('proteinimage');
            $filename = time().'.'.$file->getClientOriginalName();
            /*$location = public_path('file/'.$filename);
            Storage::put($filename,file_get_contents($file));*/

            $location = public_path('file/'.$filename);
            Storage::disk('file')->put($filename, file_get_contents($file));
            //Storage::disk('public')->put($filename, file_get_contents($file));
            $nutration->nutration_image = $filename;

        }
         if($nutration->save()){
                return redirect()->back()->with('success','Nutration updated successfully.');
            }
            else{
                return redirect()->back()->with('denger-success','Nutration is not updated.');
            } 
        }
    }



    /*Edit nutririon Function for delete*/

    public function deletenutration(Request $request)
    {
        $id = $request->workoutid;
        $getWorkout = Nutration::find($id);
        if($getWorkout->delete()){
            return redirect()->back()->with('danger','Nutration Deleted successfully');
        }
        else{
            return redirect()->back()->with('danger','Sorry! Nutration is not deleted');
        }
    }








    /*View workout category Function*/

    public function allworkoutcategory()
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $allWorkout = DB::table('categories')
                                ->orderBy('id','DESC')
                                ->paginate(10);
            //$allWorkout = DB::table('workouts')->orderBy('id','DESC')->get();
            return view('admin.allworkoutcategory')->with('allworkout',$allWorkout);
        }
        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*edit workout category Function for view form*/

    public function editworkoutcategory($id)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $workout = Category::find($id);
            return view('admin.editworkoutcategory')->with('workout',$workout);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*edit workout category Function for update form*/

    public function updateworkoutcategory(Request $request)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){

            $this->validate($request,array(
            'name'   => 'required',
        ));
            $id = $request->id;
            $workoutCategory = Category::find($id);
            $workoutCategory->Category = $request->name;
            $workoutCategory->save();
            Session::flash('success','Workout Category Updated succcessfully.');
            return redirect()->back()->with('workout',$workoutCategory);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*Edit workout category Function for delete*/

    public function deleteworkoutcategory(Request $request)
    {
        $id = $request->workoutid;
        $getWorkout = Category::find($id);
        if($getWorkout->delete()){
            return redirect()->back()->with('danger','Workout Category Deleted successfully');
        }
        else{
            return redirect()->back()->with('danger','Sorry! Workout Category is not deleted');
        }
    }








    /*View program category Function*/

    public function allProgramCategory()
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $allWorkout = DB::table('program_category')
                                ->orderBy('id','DESC')
                                ->paginate(10);
            //$allWorkout = DB::table('workouts')->orderBy('id','DESC')->get();
            return view('admin.allprogramcategory')->with('allworkout',$allWorkout);
        }
        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


    /*Edit program category Function for view Form*/

    public function editProgramCategory($id)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $workout = ProgramCategory::find($id);
            return view('admin.editprogramcategory')->with('workout',$workout);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


    
     /*Edit program category Function for update Form*/

    public function updateProgramCategory(Request $request)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){

            $this->validate($request,array(
            'name'   => 'required',
        ));
            $id = $request->id;
            $programCategory = ProgramCategory::find($id);
            $programCategory->program_category_name = $request->name;
            $programCategory->tips = $request->tips;
            $programCategory->save();
            Session::flash('success','Program Category Updated succcessfully.');
            return redirect()->back()->with('workout',$programCategory);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*Edit program category Function for delete video*/

    public function deleteProgramCategory(Request $request)
    {
        $id = $request->workoutid;
        $getWorkout = ProgramCategory::find($id);
        if($getWorkout->delete()){
            return redirect()->back()->with('danger','Program Category Deleted successfully');
        }
        else{
            return redirect()->back()->with('danger','Sorry! Program Category is not deleted');
        }
    } 

    

     




    /*view video category Function*/

    public function allVideoCategory()
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $allWorkout = DB::table('video_category')
                                ->orderBy('id','DESC')
                                ->paginate(10);
            //$allWorkout = DB::table('workouts')->orderBy('id','DESC')->get();
            return view('admin.allvideocategory')->with('allworkout',$allWorkout);
        }
        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*Edit video category Function for view Form*/

    public function editVideoCategory($id)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $workout = VideoCategory::find($id);
            return view('admin.editvideocategory')->with('workout',$workout);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*Edit video category Function for update*/

    public function updateVideoCategory(Request $request)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){

            $this->validate($request,array(
            'name'   => 'required',
        ));
            $id = $request->id;
            $videoCategory = VideoCategory::find($id);
            $videoCategory->video_category_name = $request->name;
            $videoCategory->save();
            Session::flash('success','Video Category Updated succcessfully.');
            return redirect()->back()->with('workout',$videoCategory);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



     /*Edit video category Function for delete video category*/

    public function deleteVideoCategory(Request $request)
    {
        $id = $request->workoutid;
        $getWorkout = VideoCategory::find($id);
        if($getWorkout->delete()){
            return redirect()->back()->with('danger','Video Category Deleted successfully');
        }
        else{
            return redirect()->back()->with('danger','Sorry! Video Category is not deleted');
        }
    }   
     
 







    /*View nutrition category*/

    public function allNutrationCategory()
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $allWorkout = DB::table('nutration_categorys')
                                ->orderBy('id','DESC')
                                ->paginate(10);
            //$allWorkout = DB::table('workouts')->orderBy('id','DESC')->get();
            return view('admin.allnutrationcategory')->with('allworkout',$allWorkout);
        }
        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }


    /*Edit Nutration Category for view form*/

    public function editNutrationCategory($id)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){
            $workout = NutrationCategory::find($id);
            return view('admin.editnutrationcategory')->with('workout',$workout);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*Edit Nutration Category Function for update*/

    public function updateNutrationCategory(Request $request)
    {
        if((Auth::check()) && (Auth::user()->is_admin == 1)){

            $this->validate($request,array(
            'name'   => 'required',
            'tips'   => 'required',
        ));
            $id = $request->id;
            $nutrationCategory = NutrationCategory::find($id);
            $nutrationCategory->nutration_category_name = $request->name;
            $nutrationCategory->tips = $request->tips;
            $nutrationCategory->save();
            Session::flash('success','Nutration Category Updated succcessfully.');
            return redirect()->back()->with('workout',$nutrationCategory);
        }

        else{
            Session::flash('danger','You are not authorize to view this page');
            return redirect()->back();
        }
    }



    /*Delete Nutrition Category Function*/

    public function deleteNutrationCategory(Request $request)
    {
        $id = $request->workoutid;
        $getWorkout = NutrationCategory::find($id);
        if($getWorkout->delete()){
            return redirect()->back()->with('danger','Nutration Category Deleted successfully');
        }
        else{
            return redirect()->back()->with('danger','Sorry! Nutration Category is not deleted');
        }
    }








    /*View user Function*/    

    public function users()
    {
        $users = User::all();
        return view('admin.user',compact('users'));
    }

   

    /*Delete user Function*/

    public function deleteuser(Request $request)
    {
        $id = $request->userId;
        $getUser = User::find($id);
        if($getUser->delete()){
            return redirect()->back()->with('danger','User Deleted successfully');
        }
        else{
            return redirect()->back()->with('danger','Sorry! User is not deleted');
        }
    }






     public function addDay(Request $request)
    {
        $id = $request->nutrationId;
        $userId = $request->userId;
        $day = $request->day;

            //dd($userId);
            DB::table('nutrationplanstart')
            ->where([
            ['nutrationid',$id],
            ['userid',$userId]
        ])
            ->update(['completedday' =>  $day]); 
        

            return redirect()->back()->with('danger','done');
    }
}
