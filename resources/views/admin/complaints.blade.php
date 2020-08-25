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
                                                        <th>Complaint Title</th>
                                                        <th>Employer</th>
                                                        <th>Employee</th>
                                                        <th>Company</th>
                                                        <th>Date of Complaint</th>
                                                        <th>Status</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_complaints as $complaint)
                                                    <tr>
                                                        <td>{{ $complaint->clause_title }}</td>
                                                        <td>{{ $complaint->efirst_name }} {{ $complaint->elast_name }} {{ $complaint->eother_name }}</td>
                                                        <td>{{ $complaint->first_name }} {{ $complaint->last_name }} {{ $complaint->other_name }}</td>
                                                        <td>{{ $complaint->company_name }}</td>
                                                        <td>{{ $complaint->created_at }}</td>
                                                        <td>
                                                            <span class="badge badge-info" style="text-transform: capitalize">{{ $complaint->status }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="/view-complaint/{{ $complaint->id }}"><button class="btn btn-sm btn-primary">View</button></a>
                                                            <a href="/mark-complaint-as-solved/{{ $complaint->id }}"><button class="btn btn-sm btn-warning">Solved</button></a>
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
