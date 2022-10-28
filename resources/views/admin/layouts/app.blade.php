<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <title>p M s</title> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('admin.layouts.head')
</head>
{{-- <body class="hold-transition sidebar-mini layout-fixed"> --}}
    <div class="wrapper">
        @include('admin.layouts.header')

        @section('main-content')
             @show      
        @include('admin.layouts.footer')

    </div>
    <script>
        //toastr notifications
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 2000
            };
            @if (!is_null(Session::get('success')))
                toastr.success('{!! Session::get('success') !!}',
                    'Success');
            @endif
            @if (!is_null(Session::get('error')))
                toastr.error('{!! Session::get('error') !!}',
                    'Error !!');
            @endif
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    toastr.error('{!! $error !!}', 'Validation error !!');
                @endforeach
            @endif
            @if (!is_null(Session::get('info')))
                toastr.info('{!! Session::get('info') !!}',
                    'Info');
            @endif
        }, 800);
    </script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

{{-- </body> --}}
</html>

