@extends('agent.layouts.app')
{{-- @section('bg-img3', asset('images/post/' . $post->image)) --}}
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
        {{-- <div class="col-md-8"> --}}
        <div class="card">


            <div class="card-header">{{ __('Update Profile') }}</div>
            {{-- {{ Session::get('post_id') }} --}}

            <div class="card-body">
                @if(Session::has(''))@endif
                <form action="{{ url('profile/update/'. $agent->id) }}" method="POST">
                    @csrf
                    <div class="row" class="col-md-12">
                        <div class="">
                            @if ($agent->image)
                            <img src="{{ asset('images/profiles') }}/{{ $agent->image }}" width="30px" height="30px" alt=""/>
                            @elseif($agent->image)
                            @else
                            <img src="{{ asset('images/profiles/dummy.jpg') }}" width="30px" height="30px" alt="" />
                            @endif
                            <input type="file" class="form-control" name="image" 
                            {{-- {!! Form::model($newinmage, [$options]) !!} --}}
                            >
                            <div class="col-md-12">
                                <p>Name: <b><input type="text" class="form-control" name="name" value="{{ $agent->name }}"></b></p>
                                <p>Email: <b><input type="text" class="form-control"  name="email"  value="{{ $agent->email }}"></b></p>
                                <p>Phone: <b><input type="text" class="form-control"   name="phone"  value="{{ $agent->phone }}"></b></p>
                                <a href="{{ route('profile.index') }}" class=" submit btn btn-info">update </a>
                                        {{-- <a href="{{ url('agent/editprofile') }}" class="btn btn-info">update </a> --}}
                                        {{-- {{ url('agent/vacantrooms/edit/' . $item->id) }} --}}
                        <button type="submit" class="btn btn-info pull-right">Update</button>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
