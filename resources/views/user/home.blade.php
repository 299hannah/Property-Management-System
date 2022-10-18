@extends('user.app')
@section('bg-img', asset('user/images/hero_1.jpg'))


@section('heading','Buy & Sell Property Here')
@section('sub-heading','Real Estates or Rentals')

@section('bg-img2', asset('user/images/hero_2.jpg'))

@section('heading2','Get the keys to your dream house')
@section('sub-heading2','Its one click Away')
@section('main-content')

<div class="site-section" id="properties-section">
    <div class="container">
        <div class="row large-gutters">
            @foreach ($posts as $post)
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-5 ">
                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="{{ route('post', $post->slug) }}" class="d-inline-block mb-4">
                            <img src="{{ asset('images/post/' . $post->image) }}" alt="img;" class="img-fluid">

                            {{-- <img src="{{ asset('user/images/property_1.jpg') }}" alt="img;" class="img-fluid"> --}}
                        </a>


                        <div class="ftco-media-details">

                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->subtitle }}</p>

                            <strong>
                                $202000
                            </strong>
                        </div>

                    </div>

                </div>
            </div>


            @endforeach

            <!-- Divider-->
            {{-- <hr class="my-4" /> --}}
            <!-- Pager-->

        </div>
        {{ $posts->links() }}

    </div>
</div>

<section class="site-section " id="agents-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 text-left">
                <h2 class="section-title mb-3">Real Estate Agents</h2>
                <p class="lead">Below are our real Estate agents</p>
            </div>
        </div>
        <div class="row">


            <div class="col-md-6 col-lg-4 mb-4">
                <div class="team-member">
                    <figure>
                        <ul class="social">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                        <img src="{{ asset('user/images/person_1.jpg') }}" alt="img;" class="img-fluid">
                    </figure>
                    <div class="p-3 bg-primary">
                        <h3 class="mb-2">Allison Holmes</h3>
                        <span class="position">Real Estate Agent</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="team-member">
                    <figure>
                        <ul class="social">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                        <img src="{{ asset('user/images/person_2.jpg') }}" alt="img;" class="img-fluid">
                    </figure>
                    <div class="p-3 bg-primary">
                        <h3 class="mb-2">Dave Simpson</h3>
                        <span class="position">Real Estate Agent</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="team-member">
                    <figure>
                        <ul class="social">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                        <img src="{{ asset('user/images/person_3.jpg') }}" alt="img;" class="img-fluid">
                    </figure>
                    <div class="p-3 bg-primary">
                        <h3 class="mb-2">Ben Thompson</h3>
                        <span class="position">Real Estate Agent</span>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>




<section class="site-section bg-light" id="services-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3">Services</h2>
            </div>
        </div>
        <div class="row align-items-stretch">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-house"></span></div>
                    <div>
                        <h3>Find Property</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                        <p><a href="#">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-coin"></span></div>
                    <div>
                        <h3>Buy Property</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                        <p><a href="#">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-home"></span></div>
                    <div>
                        <h3>Beautiful Home</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                        <p><a href="#">Learn More</a></p>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-flat"></span></div>
                    <div>
                        <h3>Buildings &amp; Lands</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                        <p><a href="#">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-location"></span></div>
                    <div>
                        <h3>Property Locator</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                        <p><a href="#">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class="text-primary flaticon-mobile-phone"></span></div>
                    <div>
                        <h3>Mobile Apps</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                        <p><a href="#">Learn More</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




<section class="site-section bg-light bg-image" id="contact-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-3">Contact Us</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mb-5">



                <form action="#" class="p-5 bg-white">

                    <h2 class="h4 text-black mb-5">Get In Touch</h2>

                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">First Name</label>
                            <input type="text" id="fname" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Last Name</label>
                            <input type="text" id="lname" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Subject</label>
                            <input type="subject" id="subject" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                        </div>
                    </div>


                </form>
            </div>
            <div class="col-md-5">

                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Address</p>
                    <p class="mb-4">203 Nairobi, Kenya</p>

                    <p class="mb-0 font-weight-bold">Phone</p>
                    <p class="mb-4"><a href="#">+254 73235 3024</a></p>

                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <p class="mb-0"><a href="#">pesafy@gmail.com</a></p>

                </div>

            </div>
        </div>
    </div>
</section>




<!-- .site-wrap -->

@endsection
