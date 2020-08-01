<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<!-- Google Fonts Roboto -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
{{-- <link rel="stylesheet" href="{{ asset('charts/css/bootstrap.min.css')}}"> --}}
<!-- Material Design Bootstrap -->
<link rel="icon" href="{{ asset('/assets/images/favicon.ico" type="image/x-icon')}}">
<!-- fontawesome icon -->
<link rel="stylesheet" href="{{ asset('/assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
<!-- animation css -->
<link rel="stylesheet" href="{{ asset('/assets/plugins/animation/css/animate.min.css')}}">

<!-- vendor css -->
<link rel="stylesheet" href="{{ asset('/assets/css/style.css')}}">

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
    @include('layouts.sidebar')
	

    @include('layouts.navbar')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">
				<div class="main-body">
					<div class="page-wrapper">
						<!-- [ breadcrumb ] start -->
						@include('layouts.breadcrumb')
						<!-- [ breadcrumb ] end -->
						<!-- [ Main Content ] start -->

                        <div class="row">
                            <!-- [ basic-map ] start -->
							<!--Google map-->
							<div class="card">
								<div id="map-container-google-3" class="">
									<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1PssffxfsOwNqJSUbtrvul94mzLATlKZs" width="1080" height="480"></iframe>
								</div>
							</div>
                            <!-- [ basic-map ] end -->
                        </div>
						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- @include('layouts.javascript') --}}
<!-- google-map Js -->
<script src="{{ asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/waves.min.js')}}"></script>
<script src="{{ asset('assets/js/pcoded.min.js')}}"></script>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ asset('assets/plugins/google-maps/js/gmaps.js')}}"></script>
<script src="{{ asset('assets/js/pages/google-maps.js')}}"></script>


</body>

</html>
