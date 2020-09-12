<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\JobPostRequest;
use Auth;

class JobController extends Controller
{
    public function index(){
        $jobs=Job::all()->take(3);
        $companies=Company::all()->take(12);
        $categories=Category::all();
        return view('welcome',compact('jobs','companies','categories'));
    }
    public function show($id, Job $job){
        return view('jobs.show',compact('job'));
    }
    public function post(){
        return view('jobs.post');
    }
    public function store( ){
        $user_id=auth()->user()->id;
        $company= Company::where('user_id',$user_id)->first();
        $company_id=$company->id;
        Job::create([
            'user_id'=>$user_id,
            'company_id'=>$company_id,
            'title'=>\request('title'),
            'slug'=>\request('title'),
            'roles'=>\request('roles'),
            'description'=>\request('description'),
            'category_id'=>request('category'),
            'position'=>\request('position'),
            'address'=>\request('address'),
            'type'=>\request('type'),
            'status'=>\request('status'),
            'last_date'=>\request('last_date'),
        ]);
        return redirect()->back()->with('message','Job Post Successfully ');
    }
    public function myJobs(){
        $jobs=Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myJobs',compact('jobs'));
    }
    public function edit(){
        return view('jobs.edit');
    }
    public function update( ){
        $user_id=auth()->user()->id;
        $company= Company::where('user_id',$user_id)->first();
        $company_id=$company->id;
        Job::where('company_id',$company_id)->update([
            'title'=>\request('title'),
            'slug'=>\request('title'),
            'roles'=>\request('roles'),
            'description'=>\request('description'),
            'category_id'=>request('category'),
            'position'=>\request('position'),
            'address'=>\request('address'),
            'type'=>\request('type'),
            'status'=>\request('status'),
            'last_date'=>\request('last_date'),
        ]);
        return redirect()->back()->with('message','Job update Successfully ');
    }
    public function delete(){
        $user_id=auth()->user()->id;
        $company= Company::where('user_id',$user_id)->first();
        $company_id=$company->id;
        Job::where('company_id',$company_id)->delete();
        return redirect()->back()->with('message','Job delete Successfully ');
    }
    public  function apply(Request $request, $id){
        $jobId=Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','successfully done');
    }
    public  function  applicants(){
      $applicants=Job::has('users')
          ->where('user_id',auth()->user()->id)->get();
            return view('jobs.applicants',compact('applicants'));
    }
    public function allJobs(Request $request){
        $keyword=request('title');
        $type=request('type');
        $category=request('category_id');
        $address=request('address');
        if($keyword || $type || $category || $address){
            $jobs=Job::where('title','LIKE','%'.$keyword.'%')
                ->orWhere('type',$type)
                ->orWhere('category_id',$category)
                ->orWhere('address',$address)
                ->paginate('8');
            return view('jobs.allJobs',compact('jobs'));
        }else {
            $jobs = Job::paginate('8');
            return view('jobs.allJobs', compact('jobs'));
        }
    }
    public function searchJob(Request $request){
        $keyword=$request->get('keyword');
        $users= Job::where('title','LIKE','%'.$keyword.'%')
            ->orWhere('position','LIKE','%'.$keyword.'%')
            ->limit(5)->get();
        return response()->json($users);
    }
}
