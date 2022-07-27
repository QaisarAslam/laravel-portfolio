<!-- google font -->
{{-- <link href='http://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300' rel='stylesheet' type='text/css'>
<link href="http://fonts.googleapis.com/css?family=Rouge+Script" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Milonga' rel='stylesheet' type='text/css'> --}}
<link href="{{ asset('frontend-assets/fonts/oswald/oswald.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('frontend-assets/fonts/open-sans/open-sans.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('frontend-assets/fonts/pt-sans/pt-sans.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('frontend-assets/fonts/roboto-condensed/roboto-condensed.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('frontend-assets/fonts/oxygen/oxygen.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('frontend-assets/fonts/rouge-script/rouge-script.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('frontend-assets/fonts/milonga/milonga.css') }}" rel='stylesheet' type='text/css'>

<!-- stylesheet -->
<link rel='stylesheet' href='{{ asset("frontend-assets/libs/bootstrap/css/bootstrap.min.css") }}'>
<link rel='stylesheet' href='{{ asset("frontend-assets/css/font-awesome.min.css") }}'>
<link rel='stylesheet' href='{{ asset("frontend-assets/libs/owlcarousel/dist/assets/owl.carousel.min.css") }}'>
<link rel='stylesheet' href='{{ asset("frontend-assets/libs/owlcarousel/dist/assets/owl.theme.default.min.css") }}'>
<link rel='stylesheet' href='{{ asset("frontend-assets/css/animate.css") }}'>
<link rel='stylesheet' href='{{ asset("frontend-assets/css/main.css") }}'>
@yield('style')
@stack('style')
