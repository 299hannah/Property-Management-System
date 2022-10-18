<div class="site-block-wrap">
    <div class="owl-carousel with-dots">
        <div class="site-blocks-cover overlay overlay-2"
         style="background-image: url(@yield('bg-img'))"
         data-aos="fade" id="home-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 mt-lg-5 text-center">
                        <h1 class="text-shadow">
                            @yield('heading')
                        </h1>
                        <p class="mb-5 text-shadow">
                            @yield('sub-heading')
                        </p>
                        <p><a href=""  class="btn btn-primary px-5 py-3">Get Started</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-blocks-cover overlay overlay-2" 
        style="background-image: url(@yield('bg-img2'))"
        data-aos="fade" id="home-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 mt-lg-5 text-center">
                        <h1 class="text-shadow">
                            @yield('heading2')
                        </h1>
                        <p class="mb-5 text-shadow">
                            @yield('sub-heading2')
                             </p>
                        <p><a href="" class="btn btn-primary px-5 py-3">Get Started</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
