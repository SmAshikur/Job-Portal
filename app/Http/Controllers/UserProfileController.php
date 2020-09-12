<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;


class UserProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }
    public function store(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'experience'=>'required',
            'phone_number'=>'required|numeric',
            'bio'=>'required'
        ]);
        $user_id=auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'experience'=>request('experience'),
            'phone_number'=>request('phone_number'),
            'bio'=>request('bio'),

        ]);
        return redirect()->back()->with('message','Profile Update Successfully');
    }
    public function coverLetter(Request $request){
        $this->validate($request,[
            'cover_letter'=>'required',
        ]);
        $user_id=auth()->user()->id;
        $cover=$request->file('cover_letter')->store('public/files');
        Profile::where('user_id',$user_id)->update([
           'cover_letter'=>$cover
        ]);
        return redirect()->back()->with('message1','Cover Letter Update Successfully');
    }
    public function resume(Request $request){
        $this->validate($request,[
            'resume'=>'required',
        ]);
        $user_id=auth()->user()->id;
        $cover=$request->file('resume')->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'resume'=>$cover
        ]);
        return redirect()->back()->with('message3','Cover Letter Update Successfully');
    }
    public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=>'required',
        ]);
        $user_id=auth()->user()->id;
        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $text=$file->getClientOriginalExtension();
            $fileName=time().'.'.$text;
            $file->move('uploads\avatar',$fileName);
        Profile::where('user_id',$user_id)->update([
            'avatar'=>$fileName
        ]);
        }
        return redirect()->back()->with('message2','Cover Letter Update Successfully');
    }

}
