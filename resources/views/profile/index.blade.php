
@extends('layouts.app')

@section('content')
    <div class="bg-light site-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">{{ __('Account') }}</div>

                            <div class="card-body">
                                @if(empty(auth()->user()->profile->avatar))
                                    <img src="{{asset('avatar/apple.png')}} " width=100%>
                                @else
                                    <img src="{{asset('uploads/avatar')}}/{{auth()->user()->profile->avatar}} " width=100%>
                                @endif
                            </div>
                            @if(Session::has('message2'))
                                <div class="alert alert-success">
                                    {{Session::get('message2')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('profile.avatar')}}" method="post" enctype="multipart/form-data" >@csrf
                            <div class="card">
                                <div class="card-header">{{ __('Change your picture') }}</div>
                                <div class="card-body">
                                    <input type="file" class="form-control" name="avatar">
                                    <br>
                                    <button class="btn btn-outline-primary"> Update Avatar </button>
                                </div>
                                @if($errors->has('avatar'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('avatar') }}
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>

                </div>
                <div>
                    <form action="{{route('profile.store')}}" method="post" > @csrf
                        <div class="card">
                            <div class="card-header">{{ __('Update your information') }}</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label> Address  </label><br>
                                    <textarea class="form-control" name="address" rows="3" >
                                        {{auth()->user()->profile->address}}
                                    </textarea>
                                </div>
                                @if($errors->has('address'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label> Phone Number  </label><br>
                                    <input class="form-control" value=" {{auth()->user()->profile->phone_number}} " type="text" name="phone_number" >

                                </div>
                                @if($errors->has('phone_number'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label> Experience  </label><br>
                                    <textarea class="form-control" name="experience" rows="3" >
                                        {{auth()->user()->profile->experience}}
                                    </textarea>
                                </div>
                                @if($errors->has('experience'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('experience') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label> BIODATA  </label><br>
                                    <textarea class="form-control" name="bio" rows="3" >
                                        {{auth()->user()->profile->bio}}
                                    </textarea>
                                </div>
                                @if($errors->has('bio'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('bio') }}
                                    </div>
                                @endif
                                <div>
                                    <button class="btn btn-success"> Submit </button>
                                </div>

                            </div>
                        </div>
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('User Description') }}</div>
                    <div class="card-body">
                        <p><b>Name:</b>{{auth::user()->name}}</p>
                        <p><b>Email:</b>{{auth::user()->email}}</p>
                        <p><b>Address:</b>{{auth::user()->profile->address}}</p>
                        <p><b>Phone:</b>{{auth()->user()->profile->phone_number}}</p>
                        <p><b>Experience:</b>{{auth::user()->profile->experience}}</p>
                        <p><b>BIODATA:</b>{{auth::user()->profile->bio}}</p>
                        <p><b>Member Since:</b>{{auth::user()->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <form action="{{route('profile.coverLetter')}}" method="post" enctype="multipart/form-data" > @csrf
                    <div class="card">
                        <div class="card-header">{{ __('Update Cover latter') }}</div>
                        <div class="card-body">
                            @if(!empty(auth::user()->profile->cover_letter))
                                <p>
                                    <a href="{{Storage::url(auth::user()->profile->cover_letter)}}">
                                        Cover Letter
                                    </a>
                                </p>
                            @else
                                <p>
                                    Please Update Your Cover Letter
                                </p>
                            @endif
                            <input type="file" class="form-control" name="cover_letter">    <br>
                            <button class="btn btn-primary"> Update </button>
                            <div>
                                @if(Session::has('message1'))
                                    <div class="alert alert-success">
                                        {{Session::get('message1')}}
                                    </div>
                                @endif
                                @if($errors->has('cover_letter'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('cover_letter') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data" >@csrf
                    <div class="card">
                        <div class="card-header">{{ __('Update Resume') }}</div>
                        <div class="card-body">
                            @if(!empty(auth::user()->profile->resume))
                                <p>
                                    <a href="{{Storage::url(auth::user()->profile->resume)}}">
                                        Resume
                                    </a>
                                </p>
                            @else
                                <p>
                                    Please ......................
                                </p>
                            @endif
                            <input type="file" class="form-control" name="resume">
                            <br>
                            <button class="btn btn-success"> Submit </button>
                            @if(Session::has('message3'))
                                <div class="alert alert-success">
                                    {{Session::get('message3')}}
                                </div>
                            @endif
                            @if($errors->has('resume'))
                                <div class="error" style="color: darkred">
                                    {{ $errors->first('resume') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection



