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
                        @include('layouts.messages')
                        <div class="row">
                            <!-- Zero config table start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h5>A table of all {{ request()->route()->getName() }}</h5>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4 text-right">
                                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> New Embassy</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Embasy Name</th>
                                                        <th>Location</th>
                                                        <th>Created by</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_emabssies as $embassy)
                                                    <tr>
                                                        <td>{{ $embassy->embassy_name }}</td>
                                                        <td>{{ $embassy->embassy_location }}</td>
                                                        <td>{{ $embassy->created_by }}</td>
                                                        <td>
                                                            <div class="btn btn-sm btn-success">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
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
<form action="/create-embassy" method="get">
    @csrf
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Embassy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <label for="embassy_name">Embassy Name</label>
                <input type="text" value="{{ old('embassy_name') }}" name="embassy_name" id="embassy_name" placeholder="eg. Saudi Arabia Embassy" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="embassy_location">Embassy Location</label>
                <input type="text" value="{{ old('embassy_location') }}" name="embassy_location" id="embassy_location" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="embassy_email">Embassy Email</label>
                <input type="text" value="{{ old('embassy_email') }}" name="embassy_email" id="embassy_email" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="embassy_password">Embassy Password</label>
                <input type="password" value="{{ old('embassy_password') }}" name="embassy_password" id="embassy_password" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="embassy_cpassword">Confirm Password</label>
                <input type="password" value="{{ old('embassy_cpassword') }}" name="embassy_cpassword" id="embassy_cpassword" class="form-control">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</div>
</div>
</form>
<!-- datatable Js -->
<script src="{{ asset('/assets/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/data-basic-custom.js')}}"></script>



</body>

</html>
