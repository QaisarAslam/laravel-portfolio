<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	{{-- Meta --}}
	@include('frontend.components.meta')
	{{-- Title --}}
	<title>@yield('title') | {{ config('app.name') }}</title>
	{{-- Styles --}}
	@include('frontend.components.styles')
</head>
<body>
	{{-- Topbar --}}
	@include('frontend.components.topbar')
	{{-- content --}}
	@yield('content')
	{{-- Contact --}}
	@include('frontend.components.contact')
	{{-- Footer --}}
	@include('frontend.components.footer')
	{{-- Scripts --}}
	@include('frontend.components.scripts')
	<!-- GetButton.io widget -->
	<script type="text/javascript">
	    (function () {
	        var options = {
	            whatsapp: "+923013204451", // WhatsApp number
	            call_to_action: "", // Call to action
	            position: "right", // Position may be 'right' or 'left'
	        };
	        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
	        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
	        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
	        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
	    })();
	</script>
	<!-- /GetButton.io widget -->
	@yield('scripts')
</body>
</html>
