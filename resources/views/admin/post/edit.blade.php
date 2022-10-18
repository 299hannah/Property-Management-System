@extends('admin.layouts.app')

@section('main-content')
@section('headsection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">

    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
@endsection

<div class="content-wrapper">
    <div class="card ">
        <div class="row">
            <form role="form" action="{{ route('post.update', $post->id) }}" method="post" class="col-lg-12"
                enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-md-6">
                    <div class="card-header">
                        <h3 class="card-title">Titles</h3>
                    </div>
                    @include('admin.inc.messages')
                    <div class="card-body ">
                        <div class="form-group">
                            <label for="title">Property title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Write your Title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Property Sub-title</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle"
                                placeholder="Write your subtitle" value="{{ $post->subtitle }}">
                        </div>
                        <div class="form-group">
                            <label for="slug">Property Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug"
                                placeholder="Write your slug" value="{{ $post->slug }}">
                        </div>

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <div class="pull-right">

                            <label for="exampleInputFile">File input</label>
                            <div class="input-group ">
                                <div class="custom-file">
                                    <input type="file" id="image" name="image"
                                        value="{{ $post->image }}">
                                    <label for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-check pull-left">
                            <label>
                                <input type="checkbox" name="status" value="3"
                                    @if ($post->status == 1) {{ 'checked' }} @endif> Publish
                            </label>
                        </div>
                    </div>

                    <br>


                    <div class="form-group" data-select2-id="51">
                        <label>Select Category</label>
                        <select class="select2 select2-hidden-accessible" multiple=""
                            data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1"
                            aria-hidden="true" name="categories[]">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @foreach ($post->categories as $postCategory)

                            @if ($postCategory->id == $category->id)
                                selected
                                
                            @endif @endforeach>
                                {{ $category->name }}</option>
                                @endforeach

                        </select>
                    </div>

                </div>
                <br>
                <section class="content">
                    <div class="row">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <h3>property body</h3>

                                    <div class="card-header">
                                        <h3 class="card-title">Summernote</h3>
                                    </div>
                                    <div class="card-body">
                                        <textarea id="summernote" name="body">
                    {{ $post->body }}
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
    $(function() {
        $("#summernote").summernote();
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai",
        });
    });
</script>
@endsection
