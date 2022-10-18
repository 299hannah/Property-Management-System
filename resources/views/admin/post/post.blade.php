@extends('admin.layouts.app')

@section('main-content')

@section('headsection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
{{--
<link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}

<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(document).ready(function (){
    $('.select2').select2();
    // $('.select2bs4').select2({
    //   theme: 'bootstrap4'
    // });
  })
</script>
@endsection
<div class="content-wrapper">

  <div class="card ">
    <div class="row">

      <!-- /.card-header -->
      <!-- form start -->
      {{-- <div role="form" action="{{ route('post.store') }}" method="post"> --}}


        <form role="form" action="{{ route('post.store') }}" method="post" class="col-lg-12"enctype="multipart/form-data">
          @csrf
          {{-- {{ csrf_field() }} --}}
          <div class="col-md-6">

            <div class="card-header">
              <h3 class="card-title">Titles</h3>
            </div>
            {{-- @include('admin.inc.messages') --}}


            <div class="card-body ">

              <div class="form-group">
                <label for="title">Property title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Write your Title">
              </div>
              <div class="form-group">
                <label for="subtitle">Property Sub-title</label>
                <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Write your subtitle">
              </div>
              <div class="form-group">
                <label for="slug">Property Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" placeholder="Write your slug">
              </div>

            </div>
          </div>
          <div class="col-md-6">

            <div class="form-group">
              <div class="pull-right">

                <label for="exampleInputFile">File input</label>
                {{-- <div class="input-group "> --}}
                  <div class="custom-file">
                    <input type="file"  id="image" name="image">
                    <label  for="image">Choose file</label>
                  </div>
                {{-- </div> --}}
              </div>
              <div class="form-check pull-left">
                <label>
                  <input type="checkbox" name="status" value="3"> Publish
                </label> 
              </div>
            </div>
            <br>
            <div class="form-group" data-select2-id="51">
              <label>Select Location</label>
              <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State"
                style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true"name="categories[]">
                @foreach ($categories as $category )
               <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        <section class="content">
        <div class="row">
          <div class="container">
            <div class="col-md-12">
              <div class="card card-outline card-info">
                <h3>Property details</h3>
                <div class="card-header">
                  <h3 class="card-title">Summernote</h3>
                </div>
                <div class="card-body">
                  <textarea id="summernote" name="body">
                </textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="card-footer col-lg-12">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href='{{ route('post.index') }}' class="btn btn-info">Back</a>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(function () {
      $("#summernote").summernote();
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai",
      });
    });

    
</script>

@endsection