<div class="row">
    <!-- page statustic card start -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-footer bg-c-blue">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0"></p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="feather icon-trending-down text-white f-16"></i>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="text-c-blue">{{ $count_complaints }}</h4>
                        <h6 class="text-muted m-b-0">All Complaints</h6>
                    </div>
                    {{-- <div class="col-4 text-right"> --}}
                        {{-- <i class="fa fa-users"></i> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-footer bg-c-yellow">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0"></p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="feather icon-trending-up text-white f-16"></i>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="text-c-yellow">{{ $count_pending_complaints }}</h4>
                        <h6 class="text-muted m-b-0">Pending Complaints</h6>
                    </div>
                    {{-- <div class="col-4 text-right"> --}}
                        {{-- <i class="fa fa-users"></i> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-footer bg-c-green">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0"></p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="feather icon-trending-up text-white f-16"></i>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="text-c-green">{{ $count_solved_complaints }}</h4>
                        <h6 class="text-muted m-b-0">Solved Complaints</h6>
                    </div>
                    {{-- <div class="col-4 text-right"> --}}
                        {{-- <i class="feather icon-file-text f-28"></i> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-footer bg-c-red">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0"></p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="feather icon-trending-down text-white f-16"></i>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="text-c-red">{{ $count_delayed_complaints }}</h4>
                        <h6 class="text-muted m-b-0">Delayed Complaints</h6>
                    </div>
                    <div class="col-4 text-right">
                        {{-- <i class="fa fa-users"></i> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>