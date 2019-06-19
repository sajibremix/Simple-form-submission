<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.ico') }}" type="image/x-icon">
    <!-- CSS Files -->
    @include('assets/styles')

</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    @include('sections/header')
    <!-- Header Area End -->

    

    @yield('content')

    <!-- Footer Area Starts -->
    @include('sections/footer')
    <!-- Footer Area End -->

    @include('assets/scripts')
    
</body>
</html>
