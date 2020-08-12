<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
<link rel="stylesheet" href="{{ asset('/assets/plugins/data-tables/css/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/ekko-lightbox/css/ekko-lightbox.min.css')}}">
<link rel="stylesheet" href="{{ asset('/assets/plugins/lightbox2-master/css/lightbox.min.css')}}">

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
                                            <div class="col-lg-9">
                                                <h5 class="text-left">A table of all {{ request()->route()->getName() }}</h5>
                                            </div>
                                            <div class="col-lg-3 text-right">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>New Company</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Location</th>
                                                        <th>Visa Number</th>
                                                        <th>Visa Date</th>
                                                        <th>Contract</th>
                                                        <th>Signature</th>
                                                        <th>Status</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_abroad_companies as $company)
                                                        <tr>
                                                            <td>{{ $company->company_name }}</td>
                                                            <td>{{ $company->location }}</td>
                                                            <td>{{ $company->visa_number }}</td>
                                                            <td>{{ $company->visa_date }}</td>
                                                            <td><a href="{{ asset('contract/'. $company->contract) }}" target="_blank">{{ $company->contract }}</a></td>
                                                            <td>
                                                                <a href="{{ asset('company_signatures/'. $company->signature) }}" data-toggle="lightbox" data-title="{{ $company->company_name }}" data-footer="Contact : {{ $company->location }}"><img src="{{ asset('company_signatures/'. $company->signature) }}" class="img-fluid m-b-10"
                                                                        alt=""></a>
                                                            </td>
                                                            <td>
                                                                @if($company->status == "active")
                                                                    <span class="badge badge-success">{{ $company->status }}</span>
                                                                @elseif($company->status == "pending")
                                                                    <span class="badge badge-info">{{ $company->status }}</span>
                                                                @else
                                                                    <span class="badge badge-warning">suspended</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="/get-recruites/{{ $company->id }}"><div class="btn btn-sm btn-primary">view</div></a>
                                                                @if($company->status == "active")
                                                                    <a href="/remove-abroadCompany/{{ $company->id }}"><div class="btn btn-sm btn-warning">Suspend</div></a>
                                                                @else
                                                                    <a href="/activate-company/{{ $company->id }}"><div class="btn btn-sm btn-success">Activate</div></a>
                                                                @endif
                                                                    <a href="#"><div class="btn btn-sm btn-info">Edit</div></a>
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

<form action="/create-abroadCompany" method="post" enctype="multipart/form-data">
    @csrf
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <label for="name">Company Name</label>
                <input type="text" value="{{ old('name') }}" name="name" id="name" placeholder="Enter recruiting company name. e.g. ST. Augustine" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="location">Company Location</label>
                <input type="text" value="{{ old('location') }}" name="location" id="location" placeholder="eg. saudi arabia" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="visa_number">Company Visa Number</label>
                <input type="text" value="{{ old('visa_number') }}" name="visa_number" id="visa_number" placeholder="eg. 4361-6334-2364-6111" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="visa_date">Company Visa Date</label>
                <input type="text" value="{{ old('visa_date') }}" name="visa_date" id="visa_date" placeholder="eg. 02/22" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="visa_date">Job Type</label>
                <select name="job_types" id="" class="form-control">
                    <option value="Askari">Askari</option>
                    <option value="Maid">House Maid</option>
                </select>
            </div>
            <div class="col-lg-6">
                <label for="company_email">Company Email</label>
                <input type="email" name="email" value="{{ old('company_email') }}" id="company_email" class="form-control" autocomplete="off" placeholder="company email">
            </div>
            <div class="col-lg-6">
                <label for="company_password">Company Password</label>
                <input type="password" name="password" id="company_password" class="form-control" placeholder="company password">
            </div>
            <div class="col-lg-6">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="password_one" id="confirm_password" class="form-control" placeholder="confirm password">
            </div>
            <div class="col-lg-6">
                <label for="signature">Company Signature</label>
                <input type="file" name="signature" id="signature" placeholder="attach company signature" class="form-control">
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
</body>

<script src="{{ asset('/assets/plugins/ekko-lightbox/js/ekko-lightbox.min.js')}}"></script>
<script src="{{ asset('/assets/plugins/lightbox2-master/js/lightbox.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/ac-lightbox.js')}}"></script>
</html>
