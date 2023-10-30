<div class="card mb-4">
    <div class="user-profile-header-banner">
        <img src="{{ asset('assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top">
    </div>
    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
            @if($user->photo_url)
                <img src="{{ $user->photo_url }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-circle user-profile-img">
            @else
                <div class="avatar avatar-xl ms-0 ms-sm-4" style="width: 120px; height: 120px;">
                    <span class="avatar-initial rounded-circle bg-info">{{ $user->initial }}</span>
                </div>
            @endif
        </div>
        <div class="flex-grow-1 mt-3 mt-sm-5">
            <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                <div class="user-profile-info">
                    <h4>{{ $user->name }}</h4>
                    <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                        <li class="list-inline-item"><i class="ti ti-check"></i> {{ $user->status === 'active' ? 'Aktif' : 'Tidak Aktif'}}</li>
                        @if($user->category)
                            <li class="list-inline-item d-flex align-items-center"><i class="ti ti-{{ $user->category->icon }} me-1"></i> {{ $user->category->name }}</li>
                        @endif
                        <li class="list-inline-item"><i class="ti ti-mail"></i> {{ $user->email }}</li>
                        <li class="list-inline-item"><i class="ti ti-phone"></i> {{ $user->phone }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
