<script src='{{ asset("frontend-assets/libs/jquery/jquery-3.6.0.min.js") }}'></script>
<script src='{{ asset("frontend-assets/libs/bootstrap/js/bootstrap.min.js") }}'></script>
<script src='{{ asset("frontend-assets/libs/owlcarousel/dist/owl.carousel.min.js") }}'></script>
<script src='{{ asset("frontend-assets/js/jquery.isonscreen.js") }}'></script>
<script src='{{ asset("frontend-assets/js/main.js") }}'></script>
<script>
    new WOW().init();
</script>
<script>
	$(document).ready(function(){
		var owl = $('.owl-carousel');
		owl.owlCarousel({
		    loop:true,
		    margin:10,
		    autoplay:true,
		    autoplayTimeout:3000,
		    autoplayHoverPause:true,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:2,
		            nav:true
		        },
		        1000:{
		            items:3,
		            nav:true,
		            loop:true
		        }
		    }
		});
		$('.play').on('click',function(){
		    owl.trigger('play.owl.autoplay',[1000])
		});
		$('.stop').on('click',function(){
		    owl.trigger('stop.owl.autoplay')
		});
	});
</script>
@yield('script')
@stack('script')