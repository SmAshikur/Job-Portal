@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
    <div class="container">
        <div class="row ">
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
                            <a href=" {{route('jobs.edit')}}" >
                                <button class="btn btn-success btn-sm"> Update </button>
                            </a>
                            <a>
                            <a action=" {{route('jobs.delete')}}" method="post"> @csrf

                                    <button class="btn btn-danger btn-sm"> Delete </button>

                            </a>
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


