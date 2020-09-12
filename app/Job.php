<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function company(){
        return $this->belongsTo('App\Company');
    }
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplicant(){
        return DB::table('job_user')->where('user_id',auth()->user()->id)
            ->where('job_id',$this->id)->exists();
    }
    public function favorite(){
        return $this->belongsToMany(Job::class,'favourite','job_id','user_id')->withTimestamps();
    }
    public function checkSave(){
        return DB::table('favourite')->where('user_id',auth()->user()->id)
            ->where('job_id',$this->id)->exists();
    }

    protected $guarded=[];
}
