

@extends('layouts.app')

@section('content')
    <div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(Session::has('message'))
                        <div class="alert-success" style="color: #2d995b">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="card-header">{{$job->title}}  </div>

                    <div class="card-body">
                        <h3>Description</h3>
                        <p>
                            {{$job->description}}
                        </p>
                        <h3>Responsibilities</h3>
                        <p>
                            {{$job->roles}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"> Short Inf
                    </div>

                    <div class="card-body">
                        <p>Company: <a href="{{route('company.index',[$job->company->id,$job->company->slug])}} ">
                                {{$job->company->cname}}
                            </a></p>
                        <p>Address: {{$job->address}} </p>
                        <p>Position:{{$job->position}}  </p>
                        <p>Type: {{$job->type}} </p>
                        <p>Date;{{$job->last_date}}  </p>
                    </div>
                    @if(Auth::check() && Auth::user()->user_type== 'seeker')
                        @if(!$job->checkApplicant())
                            <apply-component :jobid="{{$job->id}}"></apply-component><br>
                        @endif
                        <favorite-component :jobid="{{$job->id}} "  :Fav={{$job->checkSave() ? 'true':'false'}} >  </favorite-component>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection



