<html>
    <head>
        <title> Real Estate Agency </title>

        <!-- Include style.scss -->
        @vite(['resources/css/public-part/style.scss'])
    </head>

    <body>
        <!-- Include menu -->
        @include('public-part.layout.includes.menu')

        @yield('content')

        <!-- Include footer -->
        @include('public-part.layout.includes.footer')
    </body>
</html>
