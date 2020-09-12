@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
               <search-component></search-component>

            </div>
            <h1> Recent Job</h1>
            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>

                        <td>
                            <img src="{{asset('avatar/apple.png')}} " width=80>
                        </td>
                        <td>
                            Position:{{$job->position}} <br>
                            <i class="fa fa-clock"></i>&nbsp;
                            Job Type:{{$job->type}}
                        </td>
                        <td>
                            <i class="fa fa-map-marker" ></i>&nbsp;
                            Address:{{$job->address}}
                        </td>
                        <td>
                            <i class="fa fa-calendar-check"></i>
                            {{$job->created_at->diffForHumans()}}
                        </td>
                        <td>
                            <a href=" {{route('jobs.show',[$job->id,$job->slug])}}" >
                                <button class="btn btn-success btn-sm"> Apply </button>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="{{route('allJobs')}}">
                <button class="btn btn-success btn-lg" style="width: 100%">
                    Browse all Job
                </button>
            </a>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            @foreach($companies as $company)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('uploads/avatar')}}/{{$company->logo}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$company->title}}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href=" " class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection

