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
<link rel="stylesheet" href="{{ asset('charts/css/mdb.min.css')}}">
<!-- Your custom styles (optional) -->
<link rel="stylesheet" href="{{ asset('charts/css/style.css')}}">

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
						@include('layouts.cards')

						<div class="row">
							<div class="col-md-6">
								<canvas id="lineChart" class="card"></canvas>
							</div>
							<div class="col-md-6">
								<canvas id="pieChart" class="card"></canvas>
							</div>
						</div>
						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.javascript')
<!-- jQuery -->
<script type="text/javascript" src="{{ asset('charts/js/jquery.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('charts/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('charts/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('charts/js/mdb.min.js')}}"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript">
	//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: ["January", "February", "March", "April", "May", "June", "July"],
datasets: [{
label: "Male",
data: [65, 59, 80, 81, 56, 55, 40],
backgroundColor: [
'rgba(105, 0, 132, .2)',
],
borderColor: [
'rgba(200, 99, 132, .7)',
],
borderWidth: 2
},
{
label: "Females",
data: [28, 48, 40, 19, 86, 27, 90],
backgroundColor: [
'rgba(0, 137, 132, .2)',
],
borderColor: [
'rgba(0, 10, 130, .7)',
],
borderWidth: 2
}
]
},
options: {
responsive: true
}
});


//pie
var ctxP = document.getElementById("pieChart").getContext('2d');
var myPieChart = new Chart(ctxP, {
type: 'pie',
data: {
labels: ["Girls", "Boys"],
datasets: [{
data: [300, 50],
backgroundColor: ["#F7464A", "#46BFBD"],
hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
}]
},
options: {
responsive: true
}
});
</script>

</body>

</html>
