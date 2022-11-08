@extends('user.layouts.app')
@section('bg-img3', asset('user/images/reg.jpg'))
@section('main-content')
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(@yield('bg-img3')" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5 mx-auto mt-lg-5 text-center">
                    <p class="mb-5"><strong class="text-white">Welcome</strong></p>
                </div>
            </div>
        </div>
        <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                {{-- {{ Session::get('post_id') }} --}}

                    <div class="card-body">
        <div class="col-md-4">
     @if ($tenant->profile->image)
     <img src="{{ asset('images/profiles') }}/{{ $tenant->profile->image }}"  width="100%" alt=""/>
     @else
     <img src="{{ asset('images/profiles/dummy.jpg') }}"  width="100%" alt=""/>

         
     @endif
                    
        </div>
        <div class="col-md-8">
            <p>Name:   <b>{{ $tenant->name }}</b></p>
            <p>House Number: <b>{{ $tenant->houseno}}</b></p>
            <p>Email:  <b>{{ $tenant->email }}</b></p>
            <p>Phone:  <b>{{ $tenant->phoneno }}</b></p>
            <p>Post Id: <b>{{ $tenant->post_id }}</b></p>
            {{-- <p>Post Id: <b>{{ $tenant->post_id }}</b></p> --}}
        </div>

                </div>
            </div>
        </div>
    @endsection
