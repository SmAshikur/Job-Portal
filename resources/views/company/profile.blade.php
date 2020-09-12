
@extends('layouts.main')

@section('content')
    <div class="site-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">{{ __('Account') }}</div>

                            <div class="card-body">
                                @if(empty(auth()->user()->company->logo))
                                    <img src="{{asset('avatar/apple.png')}} " width=100%>
                                @else
                                    <img src="{{asset('uploads/avatar')}}/{{auth()->user()->company->logo}} " width=100%>
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
                        <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data" >@csrf
                            <div class="card">
                                <div class="card-header">{{ __('Change your picture') }}</div>
                                <div class="card-body">
                                    <input type="file" class="form-control" name="logo">
                                    <br>
                                    <button class="btn btn-outline-primary"> Update Avatar </button>
                                </div>
                                @if($errors->has('logo'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('logo') }}
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>

                </div>
                <div>
                    <form action="{{route('company.store')}} " method="post" > @csrf
                        <div class="card">
                            <div class="card-header">{{ __('Update your information') }}</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label> Address  </label><br>
                                    <textarea class="form-control" name="address" rows="3" >

                                    </textarea>
                                </div>
                                @if($errors->has('address'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label> Phone Number  </label><br>
                                    <input class="form-control" name="phone" type="text" >

                                </div>
                                @if($errors->has('phone'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label> Website </label><br>
                                    <input class="form-control" name="website" type="text" >
                                </div>
                                @if($errors->has('website'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('website') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label> Slogan </label><br>
                                    <input class="form-control" name="slogan" type="text" >
                                </div>
                                @if($errors->has('slogan'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('slogan') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label> Description </label><br>
                                    <textarea class="form-control" name="description" rows="3" >

                                    </textarea>
                                </div>
                                @if($errors->has('description'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('description') }}
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
                    <div class="card-header">{{ __('Company Description') }}</div>
                    <div class="card-body">
                        <p><b>Name:</b> {{Auth()->user()->company->cname}}</p>
                        <p><b>Email:</b> {{Auth()->user()->company->email}}</p>
                        <p><b>Address:</b>{{Auth()->user()->company->address}} </p>
                        <p><b>Phone:</b>{{Auth()->user()->company->email}} </p>
                        <p><b>website:</b> {{Auth()->user()->company->website}}</p>
                        <p><b>Slogan:</b> {{Auth()->user()->company->slogan}}</p>
                        <p><b>Member Since:</b>{{Auth()->user()->company->created_at->diffForHumans()}} </p>
                        <br>
                        <p><b>Company Page:</b> <a href="company/{{Auth::user()->company->slug}}"> View</a> </p>
                    </div>
                </div>
                <form action="{{route('company.coverPhoto')}}" method="post" enctype="multipart/form-data" > @csrf
                    <div class="card">
                        <div class="card-header">{{ __('Update Cover Photo') }}</div>
                        <div class="card-body">
                            @if(!empty(auth::user()->profile->cover_letter))
                                <p>
                                    <a href=" ">
                                        Cover Letter
                                    </a>
                                </p>
                            @else
                                <p>
                                    Please Update Your Cover Letter
                                </p>
                            @endif
                            <input type="file" class="form-control" name="cover_photo">    <br>
                            <button class="btn btn-primary"> Update </button>
                            <div>
                                @if(Session::has('message1'))
                                    <div class="alert alert-success">
                                        {{Session::get('message1')}}
                                    </div>
                                @endif
                                @if($errors->has('cover_photo'))
                                    <div class="error" style="color: darkred">
                                        {{ $errors->first('cover_photo') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection




