<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.layouts.head')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    @include('user.layouts.header')
<div class="site-wrap">

    @include('user.layouts.landing')
        @section('main-content')
             @show 
            </div>          
        @include('user.layouts.footer')
        <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a> 
        <script>
            //toastr notifications
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 5000
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
</body> 
</html>

