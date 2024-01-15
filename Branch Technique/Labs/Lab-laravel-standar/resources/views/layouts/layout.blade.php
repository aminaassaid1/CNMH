<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lab crud laravel basic</title>
    <!-- Google Font: Source Sans Pro -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href={{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css') }}
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  

</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">

        @include('Layouts.nav')

        @include('Layouts.SideBar')
        <div class="content-wrapper" style="min-height: 1302.4px;">
            @yield('content')
        </div>

        @include('Layouts.Footer')

    </div>

  

   

</body>

</html>