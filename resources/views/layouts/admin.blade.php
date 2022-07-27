<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Meta tags --}}
        @include('admin.components.meta')
        {{-- End Meta tags --}}
        {{-- Styles --}}
       	@include('admin.components.styles')
        {{-- End Styles --}}
        <script>
        	var rootURL = '{{ url('/') }}';
        	var token = '{{ csrf_token() }}';
        	var pageTableURL = window.location.href + "/table";
        </script>
    </head>
    <body id="page-top">
        {{-- Page Wrapper --}}
        <div id="wrapper">
            {{-- Sidebar --}}
            @include('admin.components.sidebar')
            {{-- End of Sidebar --}}
            {{-- Content Wrapper --}}
            <div id="content-wrapper" class="d-flex flex-column">
                {{-- Main Content --}}
                <div id="content">
                    {{-- Topbar --}}
                    @include('admin.components.topbar')
                    {{-- End of Topbar --}}
                    {{-- Begin Page Content --}}
                    @yield('content')
                    @include("admin.components.modals")
                    @stack('modal')
                    {{-- /.container-fluid --}}
                </div>
                {{-- End of Main Content --}}
                {{-- Footer --}}
                @include('admin.components.footer')
                {{-- End of Footer --}}
            </div>
            {{-- End of Content Wrapper --}}
        </div>
        {{-- End of Page Wrapper --}}
         {{-- Scroll to Top Button --}}
        @include('admin.components.scroll-bar')
        {{-- End Scroll to Top Button --}}
        {{-- Scripts --}}
        @include('admin.components.scripts')
        {{-- End Scripts --}}
    </body>
</html>