@extends('agent.layouts.app')
{{-- @section('bg-img3', asset('images/post/' . $post->image)) --}}
@section('bg-img3', asset('user/images/reg.jpg'))

@section('main-content')
{{-- <div class="site-wrap"> --}}
    <div class="content-wrapper">

    <section class="content-header"> </section>
    <section class="content">
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(@yield('bg-img3')" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 mx-auto mt-lg-5 text-center">
                {{-- <h1>{{ $post->title }}</h1> --}}
                <p class="mb-5"><strong class="text-white">Welcome</strong></p>

            </div>
        </div>
    </div>

    <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                {{-- {{ Session::get('post_id') }} --}}

                    <div class="card-body">
                        {{-- <div class="row" class="col-lg-12"> --}}
                        {{-- <div class=""> --}}

                        @if ($agent->image)
                        <img src="{{ asset('images/profiles') }}/{{ $agent->image }}" width="130px" height="130px" alt="" />
                        @else
                        <img src="{{ asset('images/profiles/dummy.jpg') }}" width="30px" height="30px" alt="" />
                        @endif
                        <div class="col-md-12">

                            <p>Name: <b>{{ $agent->name }}</b></p>
                            <p>Email: <b>{{ $agent->email }}</b></p>
                            {{-- <p>Phone: <b>{{ $agent->phoneno }}</b></p> --}}

                        </div>
                        {{-- <a href="{{ route('profile.update',  ['id' => $agent->id]) }}" class="btn btn-info">update </a> --}}
                        {{-- <a href="{{ route('profile.update', $agent->id) }}" class="btn btn-info">update </a> --}}
                        {{-- <button type="submit" class="btn btn-primary">update</button> --}}


                        {{-- </div> --}}
                    </div>
            </div>
        </div>
    </div>
</section>
    </div>
@endsection
