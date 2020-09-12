<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function saveJob($id){
        $jobId=Job::find($id);
        $jobId->favorite()->attach(auth()->user()->id);
        return redirect()->back();
}
    public function unsaveJob($id){
        $jobId=Job::find($id);
        $jobId->favorite()->detach(auth()->user()->id);
        return redirect()->back();
    }

}