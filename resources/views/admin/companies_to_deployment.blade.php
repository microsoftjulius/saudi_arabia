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
                                    <div class="card-header">
                                        <h5>A table of all {{ request()->route()->getName() }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Company Name</th>
                                                        <th>Location</th>
                                                        <th>Job Type</th>
                                                        <th>Signature</th>
                                                        <th>Status</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($companies as $company)
                                                    <tr>
                                                        <td>{{ $company->company_name }} </td>
                                                        <td>{{ $company->location }}</td>
                                                        <td>{{ $company->job_type }}</td>
                                                        <td>{{ $company->signature }}</td>
                                                        <td class="text-center">
                                                            <span class="badge badge-secondary">{{ $company->status }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-info">view</div>
                                                            @if($company->status == "active")
                                                                <a href="/remove-abroadCompany/{{ $company->id }}"><button class="btn btn-sm btn-warning">Terminate Contract</button></a>
                                                            @else
                                                                <a href="/activate-company/{{ $company->id }}"><button class="btn btn-sm btn-success">Activate Contract</button></a>
                                                            @endif
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
