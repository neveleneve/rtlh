<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76"
        href="https://upload.wikimedia.org/wikipedia/commons/c/cf/Logo_of_the_Ministry_of_Public_Works_and_Housing_of_the_Republic_of_Indonesia.svg">
    <link rel="icon" type="image/png"
        href="https://upload.wikimedia.org/wikipedia/commons/c/cf/Logo_of_the_Ministry_of_Public_Works_and_Housing_of_the_Republic_of_Indonesia.svg">
    @yield('title')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ route('css', ['filename' => 'nucleo-icons.css']) }}" rel="stylesheet">
    <link href="{{ route('css', ['filename' => 'nucleo-svg.css']) }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="{{ route('css', ['filename' => 'argon-dashboard.css?v=2.0.0']) }}" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">
    <main class="main-content position-relative border-radius-lg ">
        @include('layouts.navbar')
        @yield('content')
    </main>
    <script src="{{ route('script', ['filename' => 'core|popper.min.js']) }}"></script>
    <script src="{{ route('script', ['filename' => 'core|bootstrap.min.js']) }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.7.8/dist/index.bundle.min.js"></script>
    <script src="{{ route('script', ['filename' => 'plugins|perfect-scrollbar.min.js']) }}"></script>
    <script src="{{ route('script', ['filename' => 'plugins|smooth-scrollbar.min.js']) }}"></script>
    <script src="{{ route('script', ['filename' => 'plugins|chartjs.min.js']) }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @yield('customjs')
</body>

</html>
