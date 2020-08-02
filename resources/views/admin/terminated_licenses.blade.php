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
                                                        <th>Company</th>
                                                        <th>Location</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Status</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Quinn Flynn</td>
                                                        <td>System Architect</td>
                                                        <td>Edinburgh</td>
                                                        <td>61</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td>Accountant</td>
                                                        <td>Tokyo</td>
                                                        <td>63</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ashton Cox</td>
                                                        <td>Junior Technical Author</td>
                                                        <td>San Francisco</td>
                                                        <td>66</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cedric Kelly</td>
                                                        <td>Senior Javascript Developer</td>
                                                        <td>Edinburgh</td>
                                                        <td>22</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Airi Satou</td>
                                                        <td>Accountant</td>
                                                        <td>Tokyo</td>
                                                        <td>33</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brielle Williamson</td>
                                                        <td>Integration Specialist</td>
                                                        <td>New York</td>
                                                        <td>61</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Herrod Chandler</td>
                                                        <td>Sales Assistant</td>
                                                        <td>San Francisco</td>
                                                        <td>59</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Rhona Davidson</td>
                                                        <td>Integration Specialist</td>
                                                        <td>Tokyo</td>
                                                        <td>55</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Colleen Hurst</td>
                                                        <td>Javascript Developer</td>
                                                        <td>San Francisco</td>
                                                        <td>39</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sonya Frost</td>
                                                        <td>Software Engineer</td>
                                                        <td>Edinburgh</td>
                                                        <td>23</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jena Gaines</td>
                                                        <td>Office Manager</td>
                                                        <td>London</td>
                                                        <td>30</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Quinn Flynn</td>
                                                        <td>Support Lead</td>
                                                        <td>Edinburgh</td>
                                                        <td>22</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Charde Marshall</td>
                                                        <td>Regional Director</td>
                                                        <td>San Francisco</td>
                                                        <td>36</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Haley Kennedy</td>
                                                        <td>Senior Marketing Designer</td>
                                                        <td>London</td>
                                                        <td>43</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tatyana Fitzpatrick</td>
                                                        <td>Regional Director</td>
                                                        <td>London</td>
                                                        <td>19</td>
                                                        <td>
                                                            <span class="badge badge-info">Terminated</span>
                                                        </td>
                                                        <td>
                                                            <div class="btn btn-sm btn-primary">view</div>
                                                            <div class="btn btn-sm btn-danger">delete</div>
                                                        </td>
                                                    </tr>
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
