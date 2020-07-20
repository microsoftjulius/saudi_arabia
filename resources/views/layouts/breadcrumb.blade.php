<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5>{{ request()->route()->getName() }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">{{ request()->route()->getName() }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>