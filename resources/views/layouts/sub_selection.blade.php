{{ $selectionSet = false }}
{{ $role = null }}
{{ $companies = null }}
{{ $auditFirms = null }}

{{ Form::token() }}


<?php
if (Auth::user()->hasRole('auditor_preparer')) {
    $role = 'auditor';
    $auditFirms = \App\Models\Role::getAuditFirms(Auth::user()->id);
    $selectedFirm = $auditFirms->where('auditor_firm_id', \App\Models\Auditor::getSessionFirmId())->first();
}
?>
@role(('auditor_preparer'))
<?php if(sizeof($auditFirms) > 0) { ?>
<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
   role="button">{{ $selectedFirm->name }}
    <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu" style="overflow-y: auto; overflow-x : hidden;">
    @foreach($auditFirms as $auditFirm)
        <li role="presentation" class="list"><a href="javascript:void(0)"
                                                role="menuitem">{{ $auditFirm->name }}</a></li>
    @endforeach
</ul>
<?php } ?>
@endrole
<?php
if (Auth::user()->hasRole('auditee_subadmin')) {
    $role = 'auditee_subadmin';
    $companies = \App\Models\Company::whereAuditeeIs(Auth::user()->id);
    if(sizeof($companies) > 0) {
        $selectedCompany = $companies->where('id', \App\Models\Role::getSessionCompanyId())->first();
        $selectionSet = true;
    } else {
        Session::put('company_id', null);
        $selectedCompany = null;
        $selectionSet = false;
    }
}

?>
@role(('auditee_subadmin'))
<?php if(isset($selectedCompany)){ ?>

<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
   role="button">{{ $selectedCompany->name }}
    <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu" style="overflow-y: auto; overflow-x : hidden;">
    @foreach($companies as $company)
        <li role="presentation" class="list"><a href="javascript:void(0)" id="{{ $company->id }}"
                                                role="menuitem">{{ $company->name }}</a></li>
    @endforeach
</ul>
<?php } ?>
@endrole
<?php

if (!$selectionSet && Auth::user()->hasRole('auditee_preparer')) {

    $role = 'auditee_preparer';
    $companyBranches = \App\Models\Role::getCompanyBranches(Auth::user()->id, \App\Models\Role::getSessionCompanyId());
    $selectedBranch = $companyBranches->where('id', \App\Models\Role::getSessionBranchId())->first();
    $branch_name = $selectedBranch->branch_name ? $selectedBranch->branch_name : $selectedBranch->location;
?>
<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
   role="button">{{ $branch_name }}
    <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
    @foreach($companyBranches as $companyBranch)
        <li role="presentation"><a href="javascript:void(0)"
                                   role="menuitem">{{ $branch_name }}</a>
        </li>
    @endforeach
</ul>
<?php
}
if (Auth::user()->hasRole('firmway_subadmin')) {
    $role = 'firmway_subadmin';
}
?>

<link rel="stylesheet" href="{{ asset("global/vendor/toastr/toastr.css")}}">
<link rel="stylesheet" href="{{ asset("css/toastr.css")}}">

<script src="{{ asset("global/vendor/jquery/jquery.js")}}"></script>
<script src="{{ asset("global/vendor/toastr/toastr.js")}}"></script>

<script>
    var role = '{{ $role }}';

    $(document).ready(function () {

        $(".dropdown-menu .list a").click(function () {

            let company_id = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: base_url + '/company/set-session',
                data: {id: company_id, _token: $('input[name="_token"]').val(), currentPage: window.location.pathname},
                success: function (data) {
                    window.location.href = base_url + data.returnUrl;
                },
                error: function () {
                    toastr.error("Error", "This company is not verified", {"closeButton": true});
                }
            });
        });

    });

</script>
