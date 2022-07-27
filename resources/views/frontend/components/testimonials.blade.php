<div class="content-block" id="testimonials">
	<header class="block-heading cleafix text-center">
		<h1>Testimonials</h1>
	</header>
	<div class="block-content text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel">
						@foreach ($testimonials as $testimonial)
							<div class="owl-carousel-item">
						  		<div class="testimonial">
						  			<img src="{{ asset($testimonial->image) }}" class="img-responsive" style="height: 200px" />
						  			<p style="text-align: justify;">{!! $testimonial->detail !!}</p>
						  			<strong class="d-block">{{ $testimonial->name }}</strong>
						  			<span>{{ $testimonial->location }}</span>
						  		</div>
						  	</div>
					  	@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
