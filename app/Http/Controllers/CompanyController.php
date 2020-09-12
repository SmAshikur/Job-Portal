<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Middleware\Employer;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class CompanyController extends Controller
{
    public function _construct(){
        $this->middleware('employer',['except'=>array('index','allJobs')]);
    }

    public function index($id, Company $company){
        return view('company.index',compact('company'));
    }
    public function create(){
        return view('company.profile');
    }
    public function store(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'phone'=>'required',
            'website'=>'required',
            'slogan'=>'required',
            'description'=>'required'

        ]);
        $user_id=auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address'=>\request('address'),
            'phone'=>\request('phone'),
            'website'=>\request('website'),
            'slogan'=>\request('slogan'),
            'description'=>\request('description'),
        ]);
        return redirect()->back()->with('message','Profile Update Successfully');
    }
    public function coverPhoto(Request $request){
        $this->validate($request,[
            'cover_photo'=>'required'
        ]);
        $user_id=auth()->user()->id;
        if($request->hasFile('cover_photo')){
            $file=$request->file('cover_photo');
            $test=$file->getClientOriginalExtension();
            $fileName=time().'.'.$test;
            $file->move('uploads/cover',$fileName);
            Company::where('user_id',$user_id)->update([
                'cover_photo'=>$fileName
            ]);
            return redirect()->back()->with('message1','Cover Pic Update Successfully');
        }
    }
    public function logo(Request $request){
        $this->validate($request,[
            'logo'=>'required'
        ]);
        $user_id=auth()->user()->id;
        if($request->hasFile('logo')){
            $file=$request->file('logo');
            $test=$file->getClientOriginalExtension();
            $fileName=time().'.'.$test;
            $file->move('uploads/avatar',$fileName);
            Company::where('user_id',$user_id)->update([
                'logo'=>$fileName
            ]);
            return redirect()->back()->with('message1','Logo Update Successfully');
        }
    }
    public  function company(){
        $companies=Company::paginate(20);
        return view('company.company',compact('companies'));
    }
}
