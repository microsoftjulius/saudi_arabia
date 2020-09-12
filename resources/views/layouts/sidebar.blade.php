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
                <label>UAERA</label>
            </li>
            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                <ul class="pcoded-submenu">
                    <li class=""><a href="/" class="waves-effect">Analytics</a></li>
                    <li class=""><a href="/general-map" class="waves-effect">General Map</a></li>
                </ul>
            </li>
            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-users"></i></span><span class="pcoded-mtext">Users</span></a>
                <ul class="pcoded-submenu">
                    <li class=""><a href="/get-ministry-users" class="waves-effect">Ministry</a></li>
                    <li class=""><a href="/get-embassy-users" class="waves-effect">Embassies</a></li>
                    <li class=""><a href="/get-recruiting-companies" class="waves-effect">Recruiting Companies</a></li>
                    {{-- <li class=""><a href="/get-recruites" class="waves-effect">Recruites</a></li> --}}
                    <li class=""><a href="/get-employers" class="waves-effect">Employers</a></li>
                </ul>
            </li>
            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-list-alt"></i></span><span class="pcoded-mtext">Complaints</span></a>
                <ul class="pcoded-submenu">
                    <li class=""><a href="/get-complaint-form" class="waves-effect">Complaint Form</a></li>
                    <li class=""><a href="/get-all-complaints" class="waves-effect">Complaints</a></li>
                    <li class=""><a href="/get-all-solved-complaints" class="waves-effect">Solved Complaints</a></li>
                </ul>
            </li>
            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-folder"></i></span><span class="pcoded-mtext">Contracts</span></a>
                <ul class="pcoded-submenu">
                    <li class=""><a href="/get-ongoing-contracts" class="waves-effect">On going Contracts</a></li>
                    <li class=""><a href="/get-terminated-contracts" class="waves-effect">Terminated Contracts</a></li>
                    <li class=""><a href="/get-expired-contract" class="waves-effect">Finished Contracts</a></li>
                </ul>
            </li>
            @endif
            @if(auth()->user()->category_id == 1)
            <li class="nav-item pcoded-menu-caption">
                <label>COMPANIES</label>
            </li>

            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                <ul class="pcoded-submenu">
                    <li class=""><a href="/" class="waves-effect">Analytics</a></li>
                    <li class=""><a href="/general-map" class="waves-effect">General Map</a></li>
                </ul>
            </li>
            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-list-alt"></i></span><span class="pcoded-mtext">Complaints</span></a>
                <ul class="pcoded-submenu">
                    <li class=""><a href="/get-all-complaints" class="waves-effect">Complaints</a></li>
                    <li class=""><a href="/get-all-solved-complaints" class="waves-effect">Solved Complaints</a></li>
                </ul>
            </li>
            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-folder"></i></span><span class="pcoded-mtext">Contracts</span></a>
                <ul class="pcoded-submenu">
                    <li class=""><a href="/get-ongoing-contracts" class="waves-effect">On going Contracts</a></li>
                    <li class=""><a href="/get-terminated-contracts" class="waves-effect">Terminated Contracts</a></li>
                    <li class=""><a href="/get-expired-contract" class="waves-effect">Finished Contracts</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#!" class="nav-link waves-effect waves-light"><span class="pcoded-micon"><i class="fa fa-folder"></i></span><span class="pcoded-mtext">Domestic Workers</span></a>
            </li>
            @endif
            </ul>
            
        </div>
        
    </div>
</nav>
<!-- [ navigation menu ] end -->
