

<div class="site-section bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-8 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <h2 class="mb-5 h3">Recent Jobs</h2>
                @foreach($jobs as $job)
                <div class="rounded border jobs-wrap">
                    <a href="job-single.html" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                        <div class="company-logo blank-logo text-center text-md-left pl-3">
                            @if(empty(auth()->user()->company->logo))
                                <img  src="{{asset('avatar/apple.png')}} " width="100" height="100">
                            @else
                                <img class="card-img-top" src="{{asset('uploads/avatar')}}/{{auth()->user()->company->logo}} " width="150" height="150">
                            @endif
                        </div>
                        <div class="job-details h-100">
                            <div class="p-3 align-self-center">
                                <h3>{{$job->position}}</h3>
                                <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->company->cname}}</div>
                                    <div class="mr-3"><span class="icon-room mr-1"></span> {{$job->address}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="job-category align-self-center">
                            <div class="p-3">
                                <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col-md-12 text-center mt-5">
                    <a href="{{route('allJobs')}}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
                </div>
            </div>
            <div class="col-md-4 block-16" data-aos="fade-up" data-aos-delay="200">
                <div class="d-flex mb-0">
                    <h2 class="mb-5 h3 mb-0">Featured Jobs</h2>
                    <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
                </div>
                <div class="nonloop-block-16 owl-carousel">
                    @foreach($jobs as $job)
                    <div class="border rounded p-4 bg-white">
                        <h2 class="h5">{{$job->company->cname}}</h2>
                        <p><span class="border border-warning rounded p-1 px-2 text-warning">{{$job->type}}</span></p>
                        <p>
                            <span class="d-block"><span class="icon-suitcase"></span>{{$job->position}}</span>
                            <span class="d-block"><span class="icon-room"></span>{{$job->address}}</span>

                        </p>
                        <p class="mb-0">  {{$job->description}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

