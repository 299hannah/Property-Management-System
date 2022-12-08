@extends('user.layouts.app')
@section('bg-img3', asset('images/post/' . $post->image))
{{-- @section('bg-img3', asset('user/images/hero_1.jpg')) --}}
@section('main-content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(@yield('bg-img3')" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                <h1>{{ $post->title }}</h1>
                <p class="mb-5"><strong class="text-white">$2,000,000</strong></p>
            </div>
        </div>
    </div>
    <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
</div>
<div class="site-section" id="property-details">
    <div class="site-section" id="property-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="owl-carousel slide-one-item with-dots">
                        <div><img src="{{ asset('images/post/' . $post->image) }}" alt="Image" class="img-fluid"></div>
                        <div><img src="{{ asset('images/post/' . $post->image) }}" alt="Image" class="img-fluid"></div>
                        <div><img src="{{ asset('images/post/' . $post->image) }}" alt="Image" class="img-fluid"></div>
                        <div><img src="{{ asset('user/images/property_1.jpg') }}" alt="Image" class="img-fluid"></div>
                    </div>
                </div>
             <div class="col-lg-5 pl-lg-5 ml-auto">
                <div class="mb-5">
                    <h3 class="text-black mb-4">Property Details</h3>
                    <p>{!! htmlspecialchars_decode($post->body) !!}</p>
                </div>
                <div class="mb-5">
                    <div class="mt-5">
                        <img src="{{ asset('user/images/person_1.jpg') }}" alt="Image" class="w-25 mb-3 rounded-circle">
                        <h4 class="text-black">Elijah Moses</h4>
                        @foreach ($post->categories as $category)
                        Location:  <small class="pull-right badge" style="margin-right: 5px; border-radius:5px; border: 1px solid gray;">
                          <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                        </small>
                        <p>Suitable to make it a home!!</p>
                        <p><a href="#" class="btn btn-primary btn-sm">Contact Agent</a></p>
                        @endforeach
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
</div>
@endsection
