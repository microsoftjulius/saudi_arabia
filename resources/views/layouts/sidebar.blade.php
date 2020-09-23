<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menupos-fixed menu-light brand-blue menu-item-icon-style6 title-blue ">
    <div class="navbar-wrapper ">
        <div class="navbar-brand header-logo">
            <a href="index.html" class="b-brand">
                <!-- <div class="b-bg">
                    E
                </div>
                <span class="b-title">Flex Able</span> -->
                {{-- <img src="../assets/images/logo.png" alt="" class="logo images"> --}}
                <h3 style="color:white">JAAJA</h3>
                <img src="../assets/images/logo-icon.png" alt="" class="logo-thumb images">
            </a>
            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!"><span></span></a>
        </div>
        <div class="navbar-content scroll-div" >
            <ul class="nav pcoded-inner-navbar ">
                @if(auth()->user()->category_id == 6)
            <li class="nav-item pcoded-menu-caption">
                <label>UAERA Dashboard</label>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-home"></i></span><span class="pcoded-mtext">Analytics</span></a>
            </li>
            <li class="nav-item">
                <a href="/general-map" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-map-marker"></i></span><span class="pcoded-mtext">General Map</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
                <label>Users</label>
            </li>
            <li class="nav-item">
                <a href="/get-ministry-users" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-university"></i></span><span class="pcoded-mtext">Ministry</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-embassy-users" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-university"></i></span><span class="pcoded-mtext">Embassies</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-recruiting-companies" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-university"></i></span><span class="pcoded-mtext">Recruiting Companies</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-employers" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-users"></i></span><span class="pcoded-mtext">Employers</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
                <label>Complaints</label>
            </li>
            <li class="nav-item">
                <a href="/get-complaint-form" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-edit"></i></span><span class="pcoded-mtext">Complaint Form</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-all-complaints" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Complaints</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-all-solved-complaints" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Solved Complaints</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
                <label>Contracts</label>
            </li>
            <li class="nav-item">
                <a href="/get-ongoing-contracts" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">On going Contracts</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-terminated-contracts" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Terminated Contracts</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-expired-contract" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Finished Contracts</span></a>
            </li>
            @endif
            @if(auth()->user()->category_id == 1)
            <li class="nav-item pcoded-menu-caption">
                <label>COMPANIES Dashboard</label>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-home"></i></span><span class="pcoded-mtext">Analytics</span></a>
            </li>
            <li class="nav-item">
                <a href="/general-map" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-map-marker"></i></span><span class="pcoded-mtext">General Map</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
                <label>Domestic Workers</label>
            </li>
            <li class="nav-item">
                <a href="/get-company-domestic-workers" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Domestic Workers</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-company-deleted-domestic-workers" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-trash"></i></span><span class="pcoded-mtext">Deleted Domestic Workers</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
                <label>Complaints</label>
            </li>
            <li class="nav-item">
                <a href="/get-all-complaints" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Complaints</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-all-solved-complaints" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Solved Complaints</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
                <label>Contracts</label>
            </li>
            <li class="nav-item">
                <a href="/get-ongoing-contracts" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">On going Contracts</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-terminated-contracts" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Terminated Contracts</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-expired-contract" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Finished Contracts</span></a>
            </li>
            @endif
            @if(auth()->user()->category_id == 7)
            <li class="nav-item pcoded-menu-caption">
                <label>Deployment</label>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-all-complaints-for-deployment-team" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">All Complaints</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-all-pending-complaints-for-deployment-team" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Pending Complaints</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-all-solved-complaints-for-deployment-team" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">Solved Complaints</span></a>
            </li>
            <li class="nav-item">
                <a href="/get-all-companies" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-table"></i></span><span class="pcoded-mtext">All Companies</span></a>
            </li>
            @endif
            </ul>
            
        </div>
        
    </div>
</nav>
<!-- [ navigation menu ] end -->
