@extends('layouts.main')

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                   <h2> {{$categoryName->name}}</h2>
                </div>
            </div>
        </div>
        <div class="container">

                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12">
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
                    <div class="pagination justify-content-center">{{$jobs->links()}}</div>
                </div>
            </div>
        </div>
    </div>

@endsection



