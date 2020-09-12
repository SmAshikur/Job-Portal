<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->


<div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
        <div class="site-navbar bg-light">
            <div class="py-1">
                <div class="row align-items-center">
                    <div class="col-2">
                        <h2 class="mb-0 site-logo"><a href="{{route('welcome')}}">Job<strong class="font-weight-bold">Finder</strong> </a></h2>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">
                            <div class="container">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                                <ul class="site-menu js-clone-nav d-none d-lg-block">

                                    <li><a href="{{route('company')}}">Company</a></li>
                                    <li><a href="{{route('company')}}">Contact</a></li>
                                    <li>
                                    @guest

                                        <li class="has-children"><a >For Employees </a>
                                            <ul class="dropdown arrow-top">
                                                <li><a href="{{route('employee.view')}}">Employee Register</a></li>
                                                <li><a href="{{route('login')}}">Employee Login </a></li>
                                            </ul>
                                        </li>
                                        <li class="has-children"><a >For Candidates</a>
                                            <ul class="dropdown arrow-top">
                                                <li><a href="/register">Candidate Register</a></li>
                                                <li><a href="{{route('login')}}">Candidate Login </a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>

                                    @else
                                        @if(Auth::user()->user_type=='employer')
                                            <li>
                                                <a href="{{route('jobs.post')}}">
                                                    <button class="btn btn-success"> Post Job</button>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="nav-item dropdown" class="has-children">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                @if(Auth::user()->user_type=='employer')
                                                    {{ Auth::user()->company->cname }}
                                                @endif
                                                @if(Auth::user()->user_type=='seeker')
                                                    {{ Auth::user()->name }}
                                                @endif
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                @if(Auth::user()->user_type=='employer')
                                                    <a class="dropdown-item" href="{{ route('company.profile') }}">
                                                        {{ __('Company') }}
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('jobs.myJobs') }}">
                                                        {{ __('My Jobs') }}
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('jobs.applicant') }}">
                                                        {{ __('Applicants') }}
                                                    </a>
                                                @else
                                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                                        {{ __('profile') }}
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('home') }}">
                                                        {{ __('Save job') }}
                                                    </a>
                                                @endif
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                        @endguest
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
