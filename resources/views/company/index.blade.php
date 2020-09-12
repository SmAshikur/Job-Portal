@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
    <div class="container">
        <div class="row ">
            <div class="company-profile">
                @if(empty(auth()->user()->company->cover_photo))
                    <img src="{{asset('cover/king.png')}} " width=100%>
                @else
                    <img src="{{asset('uploads/avatar')}}/{{auth()->user()->company->cover_photo}} " width=100%>
                @endif
            </div>
            <div class="company-desc"><br>
                @if(empty(auth()->user()->company->logo))
                    <img   src="{{asset('avatar/apple.png')}} " width="200" height="200">
                @else
                    <img   src="{{asset('uploads/avatar')}}/{{auth()->user()->company->logo}} " width="200" height="200">
                @endif
                <h1>  {{$company->cname}}</h1>
                <p>{{$company->description}}</p>
                <p><b>Slogan: {{$company-> slogan}}</b></p>
                <p><b>Address: {{$company-> address}}</b></p>
                <p><b>Phone:{{$company-> phone}}</b></p>
                <p><b>Website: {{$company-> website}}</b></p>
            </div>
            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($company->jobs as $job)
                    <tr>
                        <td>
                            <img src="{{asset('avatar/apple.png')}}" width=80>
                        </td>
                        <td>
                            Position:{{$job->position}}<br>
                            <i class="fa fa-clock"></i>&nbsp;
                            Job Type:{{$job->type}}
                        </td>
                        <td>
                            <i class="fa fa-map-marker" ></i>
                            Address:{{$job->address}}
                        </td>
                        <td>
                            <i class="fa fa-calendar-check"></i>
                            Date:{{$job->created_at->diffForHumans()}}
                        </td>
                        <td>
                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}" >
                                <button class="btn btn-success btn-sm"> Apply </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection

