<?php

namespace App\Http\Controllers\Employer;

use App\Job;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('employer_id',Auth()->user()->id)->latest()->paginate(15);
        return view('employer.jobs.all',compact('jobs'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('employer.jobs.addJob',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:350',
            'description'=>'required',
            'roles'=>'required',
            'category'=>'required',
            'position'=>'required',
            'salary' =>'required',
            'address' => 'required',
            'type' =>'required',
            'cover' => 'image',
            'deadline'=>'required',
        ]);

            $job = new Job();
            $job->employer_id =Auth::user()->id;
            $job->title =$request->title;
            $job->description =$request->description;
            $job->roles = $request->roles;
            $job->category_id =$request->category;
            $job->position = $request->position;
            $job->salary  = $request->salary;
            $job->address  = $request->address;
            $job->type  = $request->type;
            if(isset($request->publish)){
                $job->status = 1;
            } else {
                $job->status = 0;
            }
            $job->last_date = $request->deadline;
            $job->save();
            // if($request->cover){
            //     $name = 'cover'.rand(1,100).$request->image->extension();
            //     $path = 'assets/employer/jobs/';

            // }
     

        return back()->with('success','Job Posted successfully');
    }

    public function edit(Request $request,$id)
    {
        $categories = Category::all();
        $job = Job::findOrFail($id);
        return view('employer.jobs.updateJob',compact('categories','job'));
    }

    public function update(Request $request,$id)
    {
      
        $request->validate([
            'title'=>'required|max:350',
            'description'=>'required',
            'roles'=>'required',
            'category'=>'required',
            'position'=>'required',
            'salary' =>'required',
            'address' => 'required',
            'type' =>'required',
            'cover' => 'image',
            'deadline'=>'required',
        ]);

            $job = Job::findOrFail($id);
            $job->employer_id =Auth::user()->id;
            $job->title =$request->title;
            $job->description =$request->description;
            $job->roles = $request->roles;
            $job->category_id =$request->category;
            $job->position = $request->position;
            $job->salary  = $request->salary;
            $job->address  = $request->address;
            $job->type  = $request->type;
            if(isset($request->publish)){
                $job->status = 1;
            } else {
                $job->status = 0;
            }
            $job->last_date = $request->deadline;
            $job->update();
            // if($request->cover){
            //     $name = 'cover'.rand(1,100).$request->image->extension();
            //     $path = 'assets/employer/jobs/';

            // }
     

        return back()->with('success','Job updated successfully');
    }

    public function details($id)
    {
        $job = Job::findOrFails($id);
        return view('employer.jobs.jobDetails');
    }
}
