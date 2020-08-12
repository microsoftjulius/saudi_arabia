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
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4 text-right">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> New Ministry</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Ministry Name</th>
                                                        <th>Date of account creation</th>
                                                        <th>Messages Sent to ministry</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_ministries as $ministry)
                                                    <tr>
                                                        <td>{{ $ministry->ministry_name }}</td>
                                                        <td>{{ $ministry->created_at }}</td>
                                                        <td>{{ $ministry->number_of_messages }}</td>
                                                        <td>
                                                            <div class="btn btn-sm btn-info">Edit</div>
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
<form action="/create-ministry" method="post" enctype="multipart/form-data">
    @csrf
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Ministry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <label for="name">Ministry Name</label>
                <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="contact">Ministry Email</label>
                <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control" autocomplete="off">
            </div>
            <div class="col-lg-6">
                <label for="contact">Ministry Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="contact">Repeat Password</label>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control">
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
