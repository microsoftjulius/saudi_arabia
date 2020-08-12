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
                                    <div class="card-header">
                                        <h5>A table of all {{ request()->route()->getName() }}</h5>
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
                                                    @foreach ($expired_contracts as $expired_contract)
                                                    <tr>
                                                        <td>{{ $expired_contract->first_name }} {{ $expired_contract->last_name }} {{ $expired_contract->other_name }}</td>
                                                        <td>{{ $expired_contract->efirst_name }} {{ $expired_contract->elast_name }} {{ $expired_contract->eother_name }}</td>
                                                        <td>{{ $expired_contract->created_at->format('Y-m-d') }}</td>
                                                        <td>{{ $expired_contract->created_at->format('Y-m-d') }}</td>
                                                        <td class="text-center">
                                                            <span class="badge badge-primary">{{ $expired_contract->contract_status }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-info">view</div>
                                                            <div class="btn btn-sm btn-warning">Activate</div>
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
