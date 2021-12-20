</main>
<footer>
	<div class="container margin_60_35">
		<div class="row">
			<div class="col-lg-3 col-md-12">
				<p>
					<a href="index.html" title="Findoctor">
						<img src="{{ asset('web/img/logo.png') }}" alt="" width="163" height="36" class="img-fluid">
					</a>
				</p>
			</div>
			<div class="col-lg-3 col-md-4">
				<h5>About</h5>
				<ul class="links">
					<li><a href="#0">About us</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="#0">FAQ</a></li>
					<li><a href="login.html">Login</a></li>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-4">
				<h5>Useful links</h5>
				<ul class="links">
					<li><a href="#0">Doctors</a></li>
					<li><a href="#0">Clinics</a></li>
					<li><a href="#0">Specialization</a></li>
					<li><a href="#0">Join as a Doctor</a></li>
					<li><a href="#0">Download App</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-4">
				<h5>Contact with Us</h5>
				<ul class="contacts">
					<li><a href="tel://61280932400"><i class="icon_mobile"></i> + 61 23 8093 3400</a></li>
					<li><a href="mailto:info@findoctor.com"><i class="icon_mail_alt"></i> help@findoctor.com</a></li>
				</ul>
				<div class="follow_us">
					<h5>Follow us</h5>
					<ul>
						<li><a href="#0"><i class="social_facebook"></i></a></li>
						<li><a href="#0"><i class="social_twitter"></i></a></li>
						<li><a href="#0"><i class="social_linkedin"></i></a></li>
						<li><a href="#0"><i class="social_instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-8">
				<ul id="additional_links">
					<li><a href="#0">Terms and conditions</a></li>
					<li><a href="#0">Privacy</a></li>
				</ul>
			</div>
			<div class="col-md-4">
				<div id="copy">© 2021 Findoctor</div>
			</div>
		</div>
	</div>
</footer>
<div id="toTop"></div>
<script src="{{ asset('web/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('web/js/common_scripts.js') }}"></script>
<script src="{{ asset('web/js/functions.js') }}"></script>
<script src="{{ asset('web/js/jquery.cookiebar.js') }}"></script>
<script src="{{ asset('web/js/iziToast.min.js') }}"></script>
<script>
	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		'use strict';
		$.cookieBar({
			fixed: true
		});
	});
</script>
@yield('script')

</body>
</html>