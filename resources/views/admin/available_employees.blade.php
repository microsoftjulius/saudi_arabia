<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
<link rel="stylesheet" href="{{ asset('/assets/plugins/data-tables/css/datatables.min.css')}}">

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
                            <!-- Zero config table start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Job Type</th>
                                                        <th>Date Of Application</th>
                                                        <th>Photo</th>
                                                        <th>Status</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($available_employees as $active_contract)
                                                    <tr>
                                                        <td>{{ $active_contract->first_name }} {{ $active_contract->last_name }} {{ $active_contract->other_name }}</td>
                                                        <td>{{ $active_contract->occupation }}</td>
                                                        <td>{{ $active_contract->created_at->format('Y-m-d')}}</td>
                                                        <td><img src="candidates_passport_photos/{{ $active_contract->passport_photo }}" style="width:100px; height:100px"></td>
                                                        <td class="text-center">
                                                            <span class="badge badge-success">Available</span>
                                                        </td>
                                                        <td>
                                                            <a href="/assign-employer-to-employee/{{ $active_contract->id }}"><button class="btn btn-sm btn-primary">Make Contract</button></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Zero config table end -->
                        </div>
						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.javascript')

<!-- datatable Js -->
<script src="{{ asset('/assets/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/data-basic-custom.js')}}"></script>



</body>

</html>
