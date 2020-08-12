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
                                    <div class="card-body">
                                        <form id="validation-form123" action="/create-complaints" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Complaint Type</label>
                                                        <input type="text" name="complaint_type" id="" list="complaints" class="form-control" autocomplete="off">
                                                        <datalist id="complaints">
                                                            <option value=""></option>
                                                            @foreach ($complaint_titles as $complaint)
                                                                <option value="{{ $complaint->clause_title }}"></option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Description</label>
                                                        <textarea class="form-control" name="complaint_description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Proof (optional)</label>
                                                        <div>
                                                            <input type="file" class="validation-file" name="complaint_proof">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn waves-effect waves-light btn-primary">Submit</button>
                                        </form>
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

<!-- datatable Js --><!-- jquery-validation Js -->
<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>

<!-- form-picker-custom Js -->
<script src="{{ asset('assets/js/pages/form-validation.js')}}"></script>



</body>

</html>
