<!-- Master layout with yield placeholders -->
<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
      @stack('styles')
    
   
    {{-- <script src=""></script> --}}
    
   
</head>

<body style="color:red">
    <header>
        @include('header')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>@yield('footer')</footer>


    <x-alert>
        <p>This is an important message!</p>
    </x-alert>

</body>

</html>
