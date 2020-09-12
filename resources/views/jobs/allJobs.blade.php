@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <form action="{{route('allJobs')}}" method="get">
            <div class="form-inline">
                <div class="form-group">
                    <level> Keyword &nbsp;&nbsp;</level>
                    <input type="text" name="title" class="form-control">
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <level> Employment Type&nbsp;&nbsp;</level>
                    <select name="type" class="form-control">
                        <option>Select Type </option>
                        <option value="full time"> Full Time </option>
                        <option value="part time"> Part Time </option>
                        <option value="casual"> Casual </option>
                    </select>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <level> Category&nbsp;&nbsp;</level>
                    <select name="category" class="form-control">
                        <option> Select Category</option>
                        @foreach(\App\Category::all() as $cat)
                            <option value="{{$cat->id}}"> {{$cat->name}}</option>
                        @endforeach

                    </select>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <level> Address&nbsp;&nbsp;</level>
                    <input type="text" name="address" class="form-control">
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">

                    <button class="btn btn-success"> Search </button>
                </div>
            </div>
            </form>
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


@endsection


