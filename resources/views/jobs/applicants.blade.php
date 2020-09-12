@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($applicants as $applicant)
                <div class="card">

                    <div class="card-header">{{$applicant->title}}</div>

                    <div class="card-body">
                        <table  class="table">
                            <thead>
                                <th>avatar</th>
                                <th>name </th>
                                <th>email </th>
                                <th>address</th>
                                <th> cover letter</th>
                            <th> resume</th>
                            </thead>
                            @foreach($applicant->users as $user)
                            <tbody>
                            <tr>
                                <td style="width: 100px"> <img src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}} " width=100%></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->profile->address}}</td>
                                <td>
                                    <a href="{{Storage::url($user->profile->cover_letter)}}">
                                        Cover Letter
                                    </a>
                                </td>
                                <td>
                                    <a href="{{Storage::url($user->profile->resume)}}">
                                        Resume
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
