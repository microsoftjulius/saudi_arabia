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
                                @include('layouts.messages')
                                <div class="card">
                                    <div class="row card-header">
                                        <div class="col-lg-4">
                                            <h5>A table of all {{ request()->route()->getName() }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Names</th>
                                                        <th>Contact</th>
                                                        <th>Occupation</th>
                                                        <th>Contract Duration</th>
                                                        <th>Employment Status</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($companies_deleted_candidates as $company_candidates)
                                                    <tr>
                                                        <td><a href="/candidates-current-location/{{ $company_candidates->id }}">{{ $company_candidates->first_name }} {{ $company_candidates->last_name }} {{ $company_candidates->other_name }}</a></td>
                                                        <td>{{ $company_candidates->contact }}</td>
                                                        <td>{{ $company_candidates->occupation }}</td>
                                                        <td>{{ $company_candidates->duration }}</td>
                                                        <td>
                                                            <span class="badge badge-info">{{ $company_candidates->status }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="/view-candidates-info/{{ $company_candidates->id }}">
                                                                <div class="btn btn-sm btn-success">view</div>
                                                            </a>
                                                            <a href="/remove-candidate/{{ $company_candidates->id }}">
                                                                <div class="btn btn-sm btn-danger">delete</div>
                                                            </a>
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
