@if (session()-> has ('user'))
    {{View::make('title')}}
    {{View::make('menu')}}
    {{View::make('footer')}}
@else
    @yield('login')

@endif 

