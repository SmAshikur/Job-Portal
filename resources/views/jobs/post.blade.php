@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <form action="{{route('jobs.store')}}" method="post"> @csrf
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                            <div >
                                <label>Title</label>
                                <input name="title" type="text" class="form-control">
                            </div>
                            @if($errors->has('title'))
                                <div style="color: darkred">
                                    {{$errors->first('title')}}
                                </div>
                            @endif
                            <div>
                                <label>Roles</label>
                                <input name="roles" type="text" class="form-control">
                            </div>
                            @if($errors->has('roles'))
                                <div style="color: darkred">
                                    {{$errors->first('roles')}}
                                </div>
                            @endif
                            <div>
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control" > </textarea>
                            </div>
                            @if($errors->has('description'))
                                <div style="color: darkred">
                                    {{$errors->first('description')}}
                                </div>
                            @endif
                            <div>
                                <label>Address</label>
                                <textarea name="address" rows="3" class="form-control" > </textarea>
                            </div>
                            @if($errors->has('address'))
                                <div style="color: darkred">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                            <div>
                                <label>Position</label>
                                <input name="position" type="text" class="form-control">
                            </div>
                            @if($errors->has('position'))
                                <div style="color: darkred">
                                    {{$errors->first('position')}}
                                </div>
                            @endif
                            <div>
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    @foreach(\App\Category::all() as $cat)
                                        <option value="{{$cat->id}}"> {{$cat->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            @if($errors->has('category'))
                                <div style="color: darkred">
                                    {{$errors->first('category')}}
                                </div>
                            @endif
                            <div>
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option value="full time"> Full Time </option>
                                    <option value="part time"> Part Time </option>
                                    <option value="casual"> Casual </option>
                                </select>
                            </div>
                            @if($errors->has('type'))
                                <div style="color: darkred">
                                    {{$errors->first('type')}}
                                </div>
                            @endif
                            <div>
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="live"> Live </option>
                                    <option value="draft"> Draft </option>
                                </select>
                            </div>
                            <div>
                                <label>Apply Deadline</label>
                                <input name="last_date" type="date" class="form-control">
                            </div>
                            @if($errors->has('last_date'))
                                <div style="color: darkred">
                                    {{$errors->first('last_date')}}
                                </div>
                            @endif
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success"> Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

