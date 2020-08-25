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
                                    <div class="row card-header">
                                        <div class="col-lg-4">
                                            <h5>A Table Of All Employers</h5>
                                        </div>
                                        <div class="col-lg-4"></div>
                                        @if(request()->route()->getName() != "Assign Employer To")
                                        <div class="col-lg-4 text-right">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> New Employer</button>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Address</th>
                                                        <th>Employer Photo</th>
                                                        <th>Options</th>
                                                        <th hidden>Employee</th>
                                                        <th hidden>Employer Id</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all_employers as $employer)
                                                    <tr>
                                                        <td>{{ $employer->efirst_name }} {{ $employer->elast_name }} {{ $employer->eother_name }}</td>
                                                        <td>{{ $employer->econtact }}</td>
                                                        <td>{{ $employer->address }}</td>
                                                        <td>
                                                            <a href="{{ asset('employer_photos/'. $employer->photo) }}" data-toggle="lightbox" data-title="{{ $employer->efirst_name }} {{ $employer->elast_name }} {{ $employer->eother_name }}" data-footer="Contact : {{ $employer->econtact }}"><img src="{{ asset('employer_photos/'. $employer->photo) }}" style="width:100px; heigth:100px"  class="img-fluid m-b-10"
                                                                    alt=""></a>
                                                        </td>
                                                        @if(request()->route()->getName() == "Assign Employer To")
                                                        <td>
                                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createContract"><i class="fa fa-plus-circle"></i>Create Contract</button>
                                                        </td>
                                                        <td hidden> {{ $employee_to_be_given_employer[0]->first_name }} {{ $employee_to_be_given_employer[0]->last_name }} {{ $employee_to_be_given_employer[0]->other_name }}</td>
                                                        @else
                                                        <td class="text-center" style="width:20px">
                                                            <a href="/view-info-about-employer/{{ $employer->id }}"><button class="btn btn-sm btn-success">View</button></a>
                                                            <div class="btn btn-sm btn-info">Edit</div>
                                                            <a href="/remove-employers/{{ $employer->id }}"><button class="btn btn-sm btn-danger">Delete</button></a>
                                                        </td>
                                                        @endif
                                                        <td hidden>{{ $employer->id }}</td>
                                                        <td hidden></td>
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

<form action="/create-employers" method="post" enctype="multipart/form-data">
    @csrf
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <label for="name">First Name</label>
                <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="last_name">Last Name</label>
                <input type="text" value="{{ old('last_name') }}" name="last_name" id="last_name" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="other_name">Other Name <span style="color: blue">(optional)</span></label>
                <input type="text" value="{{ old('other_name') }}" name="other_name" id="other_name" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="contact">Contact Number</label>
                <input type="text" value="{{ old('contact') }}" name="contact" id="contact" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="contact">Employer Address</label>
                <input type="address" value="{{ old('address') }}" name="address" id="address" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="contact">Employer Email</label>
                <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="contact">Employer Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="col-lg-6">
                <label for="contact">Repeat Password</label>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control">
            </div>
            <div class="col-lg-12">
                <label for="contact">Photo</label>
                <input type="file" value="{{ old('photo') }}" name="photo" id="photo" class="form-control">
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


<!--Create a contract modal-->
<form action="/create-contract-between-employer-and-employee" method="post" enctype="multipart/form-data">
    @csrf
<!-- Modal -->
<div class="modal fade" id="createContract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Contract</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <label for="name">Employer Name (s)</label>
                <input type="text" value="{{ old('name') }}"  id="employer_name" name="employer_name" class="form-control" readonly>
            </div>
            <div class="col-lg-12">
                <label for="name">Employee Name (s)</label>
                <input type="text" value="{{ old('name') }}" id="employee_name" name="employee_name" class="form-control" readonly>
            </div>
            <div class="col-lg-12">
                <label for="name">Contract (A pdf having the signatures and the contract of both the employer and employee)</label>
                <input type="file" name="contract_file" id="contract_file" class="form-control" accept=".pdf">
            </div>
            <input type="hidden" name="employer_id" id="employer_id">
            <input type="hidden" name="employee_id" value="{{ request()->route()->id }}">
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

<script>
    $('button[data-toggle = "modal"]').click(function(){
        var employer_name = $(this).parents('tr').children('td').eq(0).text();
        document.getElementById('employer_name').setAttribute("Value", employer_name);
        var employee_name = $(this).parents('tr').children('td').eq(5).text();
        document.getElementById('employee_name').setAttribute("Value", employee_name);
        var employer_id = $(this).parents('tr').children('td').eq(6).text();
        document.getElementById('employer_id').setAttribute("Value", employer_id);
    });
</script>
<!--End of create a contract model-->
<!-- datatable Js -->
<script src="{{ asset('/assets/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/data-basic-custom.js')}}"></script>
<script src="{{ asset('/assets/plugins/ekko-lightbox/js/ekko-lightbox.min.js')}}"></script>
<script src="{{ asset('/assets/plugins/lightbox2-master/js/lightbox.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/ac-lightbox.js')}}"></script>
</body>

</html>
