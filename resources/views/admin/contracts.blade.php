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
                                    <div class="row card-header">
                                        <div class="col-lg-4">
                                            <h5>A table of all {{ request()->route()->getName() }}</h5>
                                        </div>
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4 text-right">
                                            <a href="/create-new-contract"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Create New Contract</button></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Domestic Worker</th>
                                                        <th>Employer</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Contract Status</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ongoing_contracts as $active_contract)
                                                    <tr>
                                                        <td>{{ $active_contract->first_name }} {{ $active_contract->last_name }} {{ $active_contract->other_name }}</td>
                                                        <td>{{ $active_contract->efirst_name }} {{ $active_contract->elast_name }} {{ $active_contract->eother_name }}</td>
                                                        <td>{{ $active_contract->created_at->format('Y-m-d') }}</td>
                                                        <td>{{ $active_contract->created_at->format('Y-m-d')}}</td>
                                                        <td class="text-center">
                                                            <span class="badge badge-success">{{ $active_contract->contract_status }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-info">view</div>
                                                            <div class="btn btn-sm btn-warning">terminate</div>
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
