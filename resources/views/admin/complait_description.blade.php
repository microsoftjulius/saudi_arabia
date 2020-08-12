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
                            <!-- [ complaint-description] start -->
                            @foreach($candidates_complaint_complaint as $complaints)
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Compaint About {{ $complaints->clause_title }}</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="text-align: justify">
                                        <p>Clause <u>"{{ $complaints->clause }}"</u> headed <u>{{ $complaints->clause_title }}</u> from the <a href="{{ asset('contract/contract.pdf') }}" target="_blank">Contract</a> which states that: 
                                            
                                            <h6>"{{ $complaints->english_version }}",</h6>
                                            was violated by Mr. / Mrs. / Ms. <u>{{ $complaints->efirst_name }} {{ $complaints->elast_name }} {{ $complaints->eother_name }}</u> whose contact is <u>{{ $complaints->econtact }}</u> and 
                                            address <u>{{ $complaints->address }}</u>. The Domestic Worker whose name is 
                                            <u>{{ $complaints->first_name }} {{ $complaints->last_name }} {{ $complaints->other_name }}</u> has reported a violation of this Clause in the contract through
                                            the complaint stated that 
                                            <h6>"{{ $complaints->complaint }}"</h6>
                                            <p>This Complaint was reported {{ $complaints->created_at->diffForHumans() }} and its status is 
                                                @if($complaints->status == "solved")<span class="badge badge-success">{{ $complaints->status }}</span>@else
                                                <span class="badge badge-warning" style="text-transform:capitalize">{{ $complaints->status }}</span> @endif
                                            </p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- [ complaint-description ] end -->
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
