<!DOCTYPE html>
<html lang="en">
    <head>
       @include('admintp/header')
    </head>
    <body class="sb-nav-fixed">

        @include('admintp/navbar')

            @include('admintp/sidebar')
       
            @yield('content')
                
            @include('sweetalert::alert')
            </div>
        </div>
       @include('admintp/javascrip')
    </body>
</html>
