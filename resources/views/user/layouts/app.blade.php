<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.layouts.head')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
    @include('user.layouts.header')
        @section('main-content')
             @show 
            </div>          
   
        <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a> 
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
</body> 
@include('user.layouts.footer')
</html>
