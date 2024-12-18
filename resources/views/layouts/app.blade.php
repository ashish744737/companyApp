@include('layouts.header')

@auth
    @include('layouts.navigation')
@endauth

@yield('content')
       
@include('layouts.footer')