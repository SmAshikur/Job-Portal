@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                    @if(Auth::user()->user_type=='seeker')
                        @foreach($jobs as $job)
                        <div class="card-body">
                            <div class="card-header" > {{$job->title}} </div>
                            <div class="card-body ">
                            {{$job->description}}
                            </div>
                            <div class="card-footer">
                                <span>
                                    <a href="{{route('jobs.show',[$job->id,$job->slug])}}" >
                                        read more
                                    </a>
                                </span>
                                <br>

                                <span>
                                    Last date: {{$job->last_date}}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    @endif

            </div>
        </div>
    </div>
</div>
    </div>
@endsection
