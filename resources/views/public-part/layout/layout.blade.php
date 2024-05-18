<html>
    <head>
        <title> Dobrodošli </title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('files/images/default/logo.png') }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Freeman&family=Roboto:wght@700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Domine:wght@400..700&display=swap" rel="stylesheet">


        <!-- Fontawesome -->
        <script src="https://kit.fontawesome.com/c9eb5cb32a.js" crossorigin="anonymous"></script>
        <!-- Include style.scss -->
        @vite(['resources/css/public-part/style.scss'])
    </head>

    <body>

        <!-- Include header -->
        @include('public-part.layout.includes.header')
        <!-- Include menu -->
        @include('public-part.layout.includes.menu')
        <!-- Include filters -->
        @include('public-part.layout.includes.filters')

        @yield('content')

        <!-- Include footer -->
        @include('public-part.layout.includes.footer')
    </body>
</html>
