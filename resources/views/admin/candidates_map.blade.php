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
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Basic</h5>
                                        <span class="d-block m-t-5">Map shows places around the world</span>
                                    </div>
                                    <div class="card-body">
                                        <div id="basic-map" class="set-map" style="height:400px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ basic-map ] end -->
                            <!-- [ Markers-map ] start -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Markers</h5>
                                        <span class="d-block m-t-5">Maps shows <code>location</code> of the place</span>
                                    </div>
                                    <div class="card-body">
                                        <div id="markers-map" class="set-map" style="height:400px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Markers-map ] end -->
                            <!-- [ Geo-Coding-map ] start -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Geo-Coding</h5>
                                        <span class="d-block m-t-5">Search your location</span>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" id="geocoding_form1">
                                            <div class="input-group input-group-button mb-3">
                                                <input type="text" id="address" class="form-control" placeholder="Write your place">
                                                <span class="input-group-addon" id="basic-addon1">
                                                    <button class="btn waves-effect waves-light btn-primary m-0">Search Location</button>
                                                </span>
                                            </div>
                                        </form>
                                        <div id="mapGeo" class="set-map" style="height:400px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Geo-Coding-map ] end -->
                            <!-- [ Overlay-map ] start -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Overlay</h5>
                                        <span class="d-block m-t-5">Map shows places around the world</span>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" id="geocoding_form2">
                                            <div id="mapOverlay" class="set-map" style="height:400px;"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Overlay-map ] end -->
                            <!-- [ Street-View-map ] start -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Street View</h5>
                                        <span class="d-block m-t-5">Map shows view of street</span>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" id="geocoding_form3">
                                            <div id="mapStreet" class="set-map" style="height:400px;"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Street-View-map ] end -->
                            <!-- [ Map-Types-map ] start -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Map Types</h5>
                                        <span class="d-block m-t-5">Select your <code>map-types</code> to see differant views</span>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" id="geocoding_form4">
                                            <div id="mapTypes" class="set-map" style="height:400px;"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Map-Types-map ] end -->
                            <!-- [ GeoRSS-Layers ] start -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>GeoRSS Layers</h5>
                                        <span class="d-block m-t-5">Shows <code>RSS</code> location</span>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" id="geocoding_form5">
                                            <div id="georssmap" class="set-map" style="height:400px;"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- [ GeoRSS-Layers ] end -->
                            <!-- [ Marker-Clustering ] start -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Marker Clustering</h5>
                                        <span class="d-block m-t-5">Multiple markers show differant location</span>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" id="geocoding_form6">
                                            <div id="map" class="set-map" style="height:400px;"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Marker-Clustering ] end -->
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



<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ asset('assets/plugins/google-maps/js/gmaps.js')}}"></script>
<script src="{{ asset('assets/js/pages/google-maps.js')}}"></script>


</body>

</html>
