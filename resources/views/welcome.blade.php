<!DOCTYPE html>
<html lang="en">
@include('partial.head')
<body>

<div class="site-wrap">

    @include('partial.nav')
    @include('partial.hero')
    @include('partial.category')


    @include('partial.job')


    @include('partial.testimonial')


    <div class="site-blocks-cover overlay inner-page" style="background-image: url('partial/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 text-center" data-aos="fade">
                    <h1 class="h3 mb-0">Your Dream Job</h1>
                    <p class="h3 text-white mb-5">Is Waiting For You</p>
                    <p><a href="#" class="btn btn-outline-warning py-3 px-4">Find Jobs</a> <a href="#" class="btn btn-warning py-3 px-4">Apply For A Job</a></p>

                </div>
            </div>
        </div>
    </div>



    <div class="site-section site-block-feature bg-light">
        <div class="container">

            <div class="text-center mb-5 section-heading">
                <h2>Why Choose Us</h2>
            </div>

            <div class="d-block d-md-flex border-bottom">
                <div class="text-center p-4 item border-right" data-aos="fade">
                    <span class="flaticon-worker display-3 mb-3 d-block text-primary"></span>
                    <h2 class="h4">More Jobs Every Day</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
                    <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
                </div>
                <div class="text-center p-4 item" data-aos="fade">
                    <span class="flaticon-wrench display-3 mb-3 d-block text-primary"></span>
                    <h2 class="h4">Creative Jobs</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
                    <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
                </div>
            </div>
            <div class="d-block d-md-flex">
                <div class="text-center p-4 item border-right" data-aos="fade">
                    <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary"></span>
                    <h2 class="h4">Healthcare</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
                    <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
                </div>
                <div class="text-center p-4 item" data-aos="fade">
                    <span class="flaticon-calculator display-3 mb-3 d-block text-primary"></span>
                    <h2 class="h4">Finance &amp; Accounting</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
                    <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
                </div>
            </div>
        </div>
    </div>




    @include('partial.blog')


</div>

    @include('partial.footer')
</body>
</html>
