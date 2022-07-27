<div id="contact">
	<div class="overlay-3">
		<header class="block-heading block-heading-1 cleafix text-center">
			<h1>Contact Us</h1>
		</header>
		<div class="block-content text-center">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 wow animated fadeInLeft">
						<div class="alert alert-danger text-left" role="alert" id="validationErrors" style="display: none;">
					      <ul>
					      </ul>
					    </div>
					    <div class="alert alert-success text-left" role="alert" id="success-msg" style="display: none;">
					    </div>

						<form id="contact-form" class="contact-form" action="{{ route('contact-us') }}" method="POST">
							@csrf
							<input type="text" id="name" name="name" placeholder="Name">
							<input type="email" id="email" name="email" placeholder="Email">
							<textarea rows="5" id="message" name="message" placeholder="Say Something..."></textarea>
							<input type="submit" id="btn-submit" class="btn btn-primary btn-submit" value="Submit" />
							<input type="reset" id="btn-reset" class="btn btn-primary btn-reset" style="display: none;" value="Reset" />
						</form>
					</div>
					<div class="col-lg-6 wow animated fadeInRight">
						<div class="row">
							<div class="col-md-12">
								<div class="contact-info">
									<div class="clearfix">
										<div class="rotated-icon">
											<div class="sqaure-nebir"></div>
											<i class="fa fa-map-marker"></i>
										</div>
										<p><strong> Address:</strong> Chak 74 JB Thekriwala, Faisalabad. Punjab, Pakistan. 38000
										</p>
									</div>
									<div class="clearfix">
										<div class="rotated-icon">
											<div class="sqaure-nebir"></div>
											<i class="fa fa-mobile"></i>
										</div>
										<p><strong> Mobile:</strong> 0301-3204451
										<br />
										{{-- @if ($profile->mobile_whatsapp) --}}
											<strong> Whatsapp:</strong> 03013204451<br />
											<strong> Fiverr: </strong> <a style="text-decoration: none; color: white" href="{{url('https://www.fiverr.com/qaisaraslam786')}}" title="Click to Hire me">www.fiverr.com/qaisaraslam786</a>
										{{-- @endif --}}
										</p>
									</div>
									<div class="clearfix">
										<div class="rotated-icon">
											<div class="sqaure-nebir"></div>
											<i class="fa fa-envelope-o"></i>
										</div>
										<p>
											<strong> Email:</strong> qaisaraslam74@gmail.com
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<ul class="social-box">
								{{-- @if ($profile->facebook)
									<li><a target="_blank" class="facebook-icon" href="{{ $profile->facebook }}"><i class="fa fa-facebook"></i></a></li>
								@endif
								@if ($profile->twitter)
									<li><a target="_blank" class="twitter-icon" href="{{ $profile->twitter }}"><i class="fa fa-twitter"></i></a></li>
								@endif
								@if ($profile->linkedin)
									<li><a target="_blank" class="linkedin-icon" href="{{ $profile->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
								@endif --}}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@section('scripts')
	<script type="text/javascript">
		$(document).ready(function () {
			$('#contact-form').on('submit', function (e) {
				e.preventDefault();
				$('#success-msg').css('display', 'none');
				$('#validationErrors').css('display', 'none');
				let thisForm = $(this);
				let formData = thisForm.serialize();
				let targetURL = thisForm.attr('action');

				$.ajax({
					type: 'post',
					url: targetURL,
					data: formData,
					success: function (data) {
						$('#success-msg').css('display', 'block');
						$('#success-msg').html('');
						$('#success-msg').html('<i class="fa fa-check-circle"></i> ' + data);
						$('#btn-reset').click();
					},
					error: function (xhr) {
						$('#validationErrors').css('display', 'block');
			          	$('#validationErrors ul').html('');
			          	$.each(xhr.responseJSON.errors, function (index, value) {
			             	$('#validationErrors ul').append("<li>"+value+"</li>");
			          	});
					}
				});
			});
		});
	</script>
@endsection
