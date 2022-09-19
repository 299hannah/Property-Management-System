
@extends('user.layouts.app')
{{-- @section('bg-img3',asset('images/post/' . $post->image)) --}}
@section('bg-img3', asset('user/images/reg.jpg'))

@section('main-content')
{{-- <div class="site-wrap"> --}}
  
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bills') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     {{-- {{ Auth::user()->name }}
                    <br>
                    {{ $msg }} --}}

                    {{-- {{ __('You are logged in!') }} --}}
    <p>Water:</p><br>
    <p> Trash:</p><br>
    <p>House Rent:</p><br>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
