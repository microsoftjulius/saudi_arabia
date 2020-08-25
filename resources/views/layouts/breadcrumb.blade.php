<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    @if(request()->route()->getName() == "Assign Employer To")
                    <h5>{{ request()->route()->getName() }} {{ $employee_to_be_given_employer[0]->first_name }} {{ $employee_to_be_given_employer[0]->last_name }} {{ $employee_to_be_given_employer[0]->other_name }}</h5>
                    @else
                    <h5>{{ request()->route()->getName() }}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>