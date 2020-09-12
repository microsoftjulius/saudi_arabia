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
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> New Domestic Worker</button>
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
                                                    @foreach ($all_candidates as $company_candidates)
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
<form action="/create-candidates" method="post" enctype="multipart/form-data">
    @csrf
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Domestic Worker</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <label for="name">Parent First Name</label>
                <input type="text" value="{{ old('pfirst_name') }}" name="pfirst_name" id="pfirst_name" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="plast_name">Parent Last Name</label>
                <input type="text" value="{{ old('plast_name') }}" name="plast_name" id="plast_name" class="form-control" autocomplete="off">
            </div>
            <div class="col-lg-6">
                <label for="pother_name">Parent Other Name</label>
                <input type="text" name="pother_name" value="{{ old('pother_name') }}" id="pother_name" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="pcontact">Parent Contact</label>
                <input type="text" name="pcontact" id="pcontact" value="{{ old('pcontact') }}" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="paddress">Parent Address</label>
                <input type="text" name="paddress" id="paddress" value="{{ old('paddress') }}" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" value="{{ old('gender') }}">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Rather Not Say">Rather Not Say</option>
                </select>
            </div>
            <div class="col-lg-6">
                <label for="first_name">Candidate's First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="form-control" required>
            </div>
            <div class="col-lg-6">
                <label for="last_name">Candidate's Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control" required>
            </div>
            <div class="col-lg-6">
                <label for="other_name">Candidate's Other Name</label>
                <input type="text" name="other_name" id="other_name" class="form-control" value="{{ old('other_name') }}">
            </div>
            <div class="col-lg-6">
                <label for="duration">Candidate's Duration of work</label>
                <input type="text" name="duration" id="duration" class="form-control" value="2 years" readonly>
            </div>
            <div class="col-lg-6">
                <label for="date_of_birth">Candidate's Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="place_of_birth">Candidate's Place of Birth</label>
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="{{ old('place_of_birth') }}">
            </div>
            <div class="col-lg-6">
                <label for="next_of_kin">Candidate's Next Of Kin</label>
                <input type="text" name="next_of_kin" id="next_of_kin" class="form-control" value="{{ old('next_of_kin') }}">
            </div>
            <div class="col-lg-6">
                <label for="candidates_contact">Candidate's Contact</label>
                <input type="text" name="candidates_contact" id="candidates_contact" class="form-control" value="{{ old('candidates_contact') }}">
            </div>
            <div class="col-lg-6">
                <label for="candidates_education_level">Candidate's Education Level</label>
                <input type="text" name="candidates_education_level" id="candidates_education_level" class="form-control" value="{{ old('candidates_education_level') }}">
            </div>
            <div class="col-lg-6">
                <label for="candidates_occupation">Candidate's Occupation</label>
                <input type="text" name="candidates_occupation" id="candidates_occupation" class="form-control" value="{{ old('candidates_occupation') }}">
            </div>
            <div class="col-lg-6">
                <label for="candidates_conset_letter">Candidate's Consent Letter</label>
                <input type="file" name="candidates_conset_letter" id="candidates_conset_letter" class="form-control" value="{{ old('candidates_conset_letter') }}">
            </div>
            <div class="col-lg-6">
                <label for="contact">Candidate's Email</label>
                <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control" autocomplete="off">
            </div>
            <div class="col-lg-6">
                <label for="contact">Candidate's Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="contact">Repeat Candidate's Password</label>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control">
            </div>
            <div class="col-lg-12">
                <label for="passport_photo">Candidates Passport Photo</label>
                <input type="file" name="passport_photo" id="passport_photo" class="form-control">
            </div>
            <div class="col-lg-12">
                <input type="hidden" name="company_id" value="{{ request()->route()->id }}">
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
