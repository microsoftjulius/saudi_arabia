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
                            <!-- [ Invoice ] start -->
                            @foreach ($candidates_all_info as $single_candidate)
                                <div class="container" id="printTable">
                                    <div>
                                        <div class="card">
                                            <div class="row invoice-contact">
                                                <div class="col-md-8">
                                                    <div class="invoice-box row">
                                                        <div class="col-sm-12">
                                                            <table class="table table-responsive invoice-table table-borderless p-l-20">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><a href="#" class="b-brand">
                                                                                <img class="img-fluid" src="{{ asset('/candidates_passport_photos/'.$single_candidate->passport_photo) }}" alt="{{ $single_candidate->passport_photo }}" style="width:200px;height:200px">
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Company name : {{ $single_candidate->company_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Candidates Parent : {{ $single_candidate->pfirst_name }} {{ $single_candidate->plast_name }} {{ $single_candidate->pother_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Parents Contact : {{ $single_candidate->pcontact }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Candidates Names : {{ $single_candidate->first_name }} {{ $single_candidate->last_name }} {{ $single_candidate->other_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-transform: capitalize">Employement Status : 
                                                                            @if($single_candidate->status == "approved")
                                                                                <span class="label label-success">{{ $single_candidate->status }}</span>
                                                                            @else
                                                                                <span class="label label-warning">{{ $single_candidate->status }}</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Candidates Contact : {{ $single_candidate->contact }}</td>
                                                                    </tr>
                                                                </tr>
                                                                <tr>
                                                                    <td>Candidates Conset Letter : <a href="{{ asset('candidates_conset_letter/'.$single_candidate->consent_letter) }}" target="_blank">Click to view conset letter</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Candidates Next of kin : {{ $single_candidate->next_of_kin }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Candidates Occupation : {{ $single_candidate->occupation }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Candidates Level of Education : {{ $single_candidate->education_level }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Candidates Place of Birth : {{ $single_candidate->place_of_birth }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Candidates Date of joining : {{ $single_candidate->created_at->format('Y-m-d') }}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                            @if(request()->route()->getName() == "Workers Employment Status")
                                            <div class="card-body">
                                                <div class="dt-responsive table-responsive">
                                                    Candidates Employment Details
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Employer</th>
                                                                <th>Duration</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td>{{ $single_candidate->efirst_name }} {{ $single_candidate->elast_name }} {{ $single_candidate->eother_name }}</td>
                                                            <td>{{ $single_candidate->duration }}</td>
                                                            {{-- <td>{{ $single_candidate->created_at->format('Y') }}</td> --}}
                                                            <td></td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-sm-12 invoice-btn-group text-center">
                                                <a href="{{ url()->previous() }}"><button type="button" class="btn waves-effect waves-light btn-secondary m-b-10 "><i class="fa fa-arrow-left"></i> Back</button></a>
                                                <button type="button" class="btn waves-effect waves-light btn-primary btn-print-invoice m-b-10">Print</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- [ Invoice ] end -->
                        </div>
						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.javascript')

<!-- datatable Js --><!-- jquery-validation Js -->
<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>

<!-- form-picker-custom Js -->
<script src="{{ asset('assets/js/pages/form-validation.js')}}"></script>



</body>

</html>
