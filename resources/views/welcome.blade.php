<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    {{-- 
    <link rel="stylesheet" href="{{ asset('charts/css/bootstrap.min.css')}}">
    --}}
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
                                @if(request()->route()->getName() == "Dashboard")
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="color: black; text-transform:capitalize" class="text-center">A Pie Chart Showing the number of different genders taken</p>
                                        <canvas id="pieChart" class="card"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <p style="color: black; text-transform:capitalize" class="text-center">A Pie Chart Showing the most and least complaining people</p>
                                        <canvas id="pieChart2" class="card"></canvas>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="color: black; text-transform:capitalize" class="text-center">A Pie Chart Showing the number of different genders taken</p>
                                        <canvas id="pieChart" class="card"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <p style="color: black; text-transform:capitalize" class="text-center">A graph showing the contracts broken (most broken contracts)</p>
                                        <canvas id="barChart" class="card"></canvas>
                                    </div>
                                    <div class="col-md-6">
                                        <p style="color: black; text-transform:capitalize" class="text-center">A Pie Chart Showing the most and least complaining people</p>
                                        <canvas id="pieChart2" class="card"></canvas>
                                    </div>
                                </div>
								@endif
                                    <!-- Customer overview start -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card table-card widget-primary-card">
                                                    <div class="row-table">
                                                        <div class="col-sm-12"><br>
															<h4 style="text-transform: capitalize"><strong>Company with most complaints</strong></h4>
                                                            <h4 class="text-center">{{ $company_with_most_complaints }}</h4>
                                                            <h5 class="text-center" style="color: white">{{ $number_of_complaints_for_company_with_most_complaints }} Complaints</h5>
                                                        </div>
                                                    </div>
                                                </div>
											</div>
											<div class="col-md-6">
                                                <div class="card table-card widget-purple-card">
                                                    <div class="row-table">
                                                        <div class="col-sm-12"><br>
															<h4 style="text-transform: capitalize"><strong>Company with least complaints</strong></h4>
                                                            <h4 class="text-center">{{ $company_with_least_complaines }}</h4>
                                                            <h5 class="text-center" style="color: white">{{ $number_of_complaints_for_company_with_least_complaints }} Complaints</h5>
                                                        </div>
                                                    </div>
                                                </div>
											</div>
                                    </div>
                                </div>
                                <!-- Customer overview end -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="color: black; text-transform:capitalize" class="text-center">A Graph Showing Number of Complaints per Gender</p>
                                        <canvas id="labelChart" class="card"></canvas>
									</div>
                                    <div class="col-md-6">
                                        <p style="color: black; text-transform:capitalize" class="text-center">A Graph Showing Number of Complaints per month for every Gender</p>
                                        <canvas id="lineChart" class="card"></canvas>
                                    </div>

                                    <div class="col-md-12">
                                        <p style="color: black; text-transform:capitalize" class="text-center">A graph showing the contracts broken (most broken contracts)</p>
                                        <canvas id="barChart" class="card"></canvas>
                                    </div>
                                </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.javascript')
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ asset('charts/js/mdb.min.js')}}"></script>
        <!-- Your custom scripts (optional) -->
        <script type="text/javascript">
            //line
            var ctxL = document.getElementById("lineChart").getContext('2d');
            var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
            label: "Male",
            data: [{!! $male_complaints_in_january !!}, {!! $male_complaints_in_february !!}, {!! $male_complaints_in_march !!}, {!! $male_complaints_in_april !!}, {!! $male_complaints_in_may !!}, {!! $male_complaints_in_june !!}, {!! $male_complaints_in_july !!}, {!! $male_complaints_in_august !!}, {!! $male_complaints_in_september !!}, {!! $male_complaints_in_october !!}, {!! $male_complaints_in_november !!}, {!! $male_complaints_in_december !!}],
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
            data: [{!! $female_complaints_in_january !!}, {!! $female_complaints_in_february !!}, {!! $female_complaints_in_march !!}, {!! $female_complaints_in_april !!}, {!! $female_complaints_in_may !!}, {!! $female_complaints_in_june !!}, {!! $female_complaints_in_july !!}, {!! $female_complaints_in_august !!}, {!! $female_complaints_in_september !!}, {!! $female_complaints_in_october !!}, {!! $female_complaints_in_november !!}, {!! $female_complaints_in_december !!}],
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
            labels: ["Girls", "Boys", "Rather Not Say"],
            datasets: [{
            data: [{!! $number_of_females_registered !!}, {!! $number_of_males_registered !!}, {!! $number_of_rather_not_say_registered !!}],
            backgroundColor: ["#F7464A", "#46BFBD", "blue"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "blue"]
            }]
            },
            options: {
            responsive: true
            }
            });
            
            //pie2
            var ctxP = document.getElementById("pieChart2").getContext('2d');
            var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
            labels: ["{!! $most_complaining_person !!}", "{!! $least_complaining_person !!}"],
            datasets: [{
            data: [{!! $comments_by_most_complainer !!}, {!! $comments_by_least_complainer !!}],
            backgroundColor: ["#F7464A", "#46BFBD"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
            }]
            },
            options: {
            responsive: true
            }
            });

            var ctxP = document.getElementById("labelChart").getContext('2d');
            var myPieChart = new Chart(ctxP, {
            plugins: [ChartDataLabels],
            type: 'pie',
            data: {
            	labels: ["Male", "Female", "Rather Not Say"],
            	datasets: [{
            	data: [{!! $number_of_complaints_made_by_males !!}, {!! $number_of_complaints_made_by_females !!}, {!! $number_of_complaints_made_by_rather_not_say !!}],
            	backgroundColor: ["#F7464A", "#46BFBD", "blue"],
            	hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "blue"]
            	}]
            },
            options: {
            	responsive: true,
            	legend: {
            	position: 'right',
            	labels: {
            		padding: 20,
            		boxWidth: 10
            	}
            	},
            	plugins: {
            	datalabels: {
            		formatter: (value, ctx) => {
            		let sum = 0;
            		let dataArr = ctx.chart.data.datasets[0].data;
            		dataArr.map(data => {
            			sum += data;
            		});
            		let percentage = (value * 100 / sum).toFixed(2) + "%";
            		return percentage;
            		},
            		color: 'white',
            		labels: {
            		title: {
            			font: {
            			size: '16'
            			}
            		}
            		}
            	}
            	}
            }
            });
            
            //bar
            var ctxB = document.getElementById("barChart").getContext('2d');
            var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
            labels: ["Clause 2.", "Clause 3.", "Clause 4.", "Clause 5.", "Clause 6.", "Clause 7.", "Clause 8.", "Clause 9.",
                    "Clause 10.","Clause 11.","Clause 12.","Clause 13.","Clause 14.","Clause 15.","Clause 16(i).","Clause 16(ii).",
                    "Clause 16(iii)","Clause 16(iv).","Clause 17(a).","Clause 17(b).","Clause 17(c).","Clause 17(d).","Clause 17(e).",
                    "Clause 17(f).","Clause 17(g).","Clause 17(h).","Clause 18.","Clause 19.","Clause 20.","Clause 21.","Clause 22.",
                    "Clause 23."],
            datasets: [{
            label: 'Number Of Times A Clause Is Broken',
            data: [{!! $count_of_clause_two_broken !!}, {!! $count_of_clause_three_broken !!}, {!! $count_of_clause_four_broken !!}, {!! $count_of_clause_five_broken !!}, {!! $count_of_clause_six_broken !!}, {!! $count_of_clause_seven_broken !!}, {!! $count_of_clause_eight_broken !!}, {!! $count_of_clause_nine_broken !!}, {!! $count_of_clause_ten_broken !!}, {!! $count_of_clause_eleven_broken !!}, {!! $count_of_clause_twelve_broken !!}, {!! $count_of_clause_thirteen_broken !!}, {!! $count_of_clause_fourteen_broken !!}, {!! $count_of_clause_fifteen_broken !!}, {!! $count_of_clause_sixteen_one_broken !!}, {!! $count_of_clause_sixteen_two_broken !!},
            {!! $count_of_clause_sixteen_three_broken !!}, {!! $count_of_clause_sixteen_four_broken !!}, {!! $count_of_clause_seventeen_a_broken !!}, {!! $count_of_clause_seventeen_b_broken !!}, {!! $count_of_clause_seventeen_c_broken !!}, {!! $count_of_clause_seventeen_d_broken !!}, {!! $count_of_clause_seventeen_e_broken !!}, {!! $count_of_clause_seventeen_f_broken !!}, 
            {!! $count_of_clause_seventeen_g_broken !!}, {!! $count_of_clause_seventeen_h_broken !!}, {!! $count_of_clause_eighteen_broken !!}, {!! $count_of_clause_nineteen_broken !!}, {!! $count_of_clause_twenty_broken !!}, {!! $count_of_clause_twenty_one_broken !!}, {!! $count_of_clause_twenty_two_broken !!}, {!! $count_of_clause_twenty_three_broken !!}],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
            }]
            },
            options: {
            scales: {
            yAxes: [{
            ticks: {
            beginAtZero: true
            }
            }]
            }
            }
            });
        </script>
    </body>
</html>