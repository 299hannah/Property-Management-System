@extends('agent.layouts.app')
{{-- @section('bg-img3', asset('images/post/' . $post->image)) --}}
@section('bg-img3', asset('user/images/reg.jpg'))

@section('main-content')
    <div class="content-wrapper">
    <section class="content-header"> </section>
    <section class="content">
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(@yield('bg-img3')" data-aos="fade">
    <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                    <div class="card-body">
                       @if(Session::has(''))@endif
                        @if ($agent->image)
                        <img src="{{ asset('images/profiles') }}/{{ $agent->image }}" width="130px" height="130px" alt="" />
                        @else
                        <img src="{{ asset('images/profiles/dummy.jpg') }}" width="30px" height="30px" alt="" />
                        @endif
                        <div class="col-md-12">
                            <p>Name: <b>{{ $agent->name }}</b></p>
                            <p>Email: <b>{{ $agent->email }}</b></p>
                            <p>Phone: <b>{{ $agent->phone }}</b></p>
                        </div>
                        <a href="{{ url('agent/profile/editprofile/' . $agent->id) }}" class="btn btn-info">Edit </a>
                    </div>
            </div>
        </div>
    </div>
</div>
</section>
    </div>
@endsection
