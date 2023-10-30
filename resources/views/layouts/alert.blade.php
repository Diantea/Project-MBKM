@if($errors->any())
    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
        <div class="alert-body d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info me-50"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
            Terjadi error.
        </div>
    </div>
@elseif(session('msg'))
    <div class="alert alert-success mt-1 alert-validation-msg" role="alert">
        <div class="alert-body d-flex align-items-center">
            <i data-feather="check-circle" class="avatar-icon me-1"></i>
            {{ session('msg') }}
        </div>
    </div>
@endif

