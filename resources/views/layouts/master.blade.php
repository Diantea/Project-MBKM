
<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}"
    data-template="vertical-menu-template-no-customizer-starter"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    {{-- <title>@yield('title') - {{ config('app.name') }}</title> --}}
    <title>@yield('title') - SIP MBKM</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/komputer.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

    <!-- Page CSS -->
    @yield('css')

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
              <span class="app-brand-logo demo" style="overflow: unset;">
                  <img src="{{ asset('assets/komputer.png') }}" alt="logo" style="height: 32px">
              </span>
                    {{-- <span class="app-brand-text demo menu-text fw-bold">{{ config('app.name') }}</span> --}}
                    <span class="app-brand-text demo menu-text fw-bold">MBKM</span>
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                    <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Page -->
                <li class="menu-header">
                    Menu Utama
                </li>
                <li class="menu-item {{ request()->route()->getName() === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-home"></i>
                        <div data-i18n="Page 1">Dashboard</div>
                    </a>
                </li>

                @if(in_array(auth()->user()->role, ['admin']))
                <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'registration' ? 'active' : '' }}">
                    <a href="{{ route('registration.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-id"></i>
                        <div data-i18n="Page 1">Pendaftaran</div>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role === 'admin' || (auth()->user()->role === 'student' && auth()->user()->category_id === 1))
                <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'company' ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-building-community"></i>
                        <div data-i18n="Page 1">Tempat Magang</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'company' && explode('.', request()->route()->getName())[1] !== 'index_submission' ? 'active' : '' }}">
                            <a href="{{ route('company.index') }}" class="menu-link">
                                <div data-i18n="Roles">Tempat Magang</div>
                            </a>
                        </li>
                        <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'company' && explode('.', request()->route()->getName())[1] === 'index_submission' ? 'active' : '' }}">
                            <a href="{{ route('company.index_submission') }}" class="menu-link">
                                <div data-i18n="Permission">Pengajuan Magang</div>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(in_array(auth()->user()->role, ['admin']))
                <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'lecturer' ? 'active' : '' }}">
                    <a href="{{ route('lecturer.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user-check"></i>
                        <div data-i18n="Page 1">Dosen Pembimbing</div>
                    </a>
                </li>
                @endif

                @if(in_array(auth()->user()->role, ['admin', 'lecturer', 'student']))
                <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'schedule' ? 'active' : '' }}">
                    <a href="{{ route('schedule.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-calendar-event"></i>
                        <div data-i18n="Page 1">Jadwal</div>
                    </a>
                </li>
                @endif

                @if(in_array(auth()->user()->role, ['admin', 'lecturer', 'student']))
                <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'score' ? 'active' : '' }}">
                    <a href="{{ route('score.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-pencil"></i>
                        <div data-i18n="Page 1">Penilaian</div>
                    </a>
                </li>
                @endif

                <li class="menu-header">
                    Administrasi
                </li>
                <li class="menu-item {{ in_array(explode('.', request()->route()->getName())[0], ['report', 'last-report']) ? 'active open' : '' }}">
                    <a href="{{ route('report.index') }}" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-clipboard-text"></i>
                        <div data-i18n="Page 1">Laporan</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'report' ? 'active' : '' }}">
                            <a href="{{ route('report.index') }}" class="menu-link">
                                <div data-i18n="Roles">Laporan Harian</div>
                            </a>
                        </li>
                        <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'last-report' ? 'active' : '' }}">
                            <a href="{{ route('last-report.index') }}" class="menu-link">
                                <div data-i18n="Permission">Laporan Akhir</div>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(in_array(auth()->user()->role, ['admin']))
                <li class="menu-item {{ explode('.', request()->route()->getName())[0] === 'user' ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Page 1">Pengguna</div>
                    </a>
                </li>
                @endif

            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar"
                style="padding: 0 1rem"
            >
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="ti ti-menu-2 ti-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <div class="navbar-nav align-items-center">
                        <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                            <i class="ti ti-sm"></i>
                        </a>
                    </div>

                    @if(auth()->user()->role === 'student')
                    @php 
                    $users = \App\Models\User::where('npm', auth()->user()->npm)->orderBy('semester', 'asc')->get();
                    @endphp
                    <ul class="navbar-nav flex-row align-items-center me-auto">
                        <li>
                            <form action="{{route('change-semester')}}" id="change-semester" method="POST">
                                @csrf
                                <select name="user_id" id="" class="form-control" style="min-width: 200px;" onchange="event.preventDefault(); document.getElementById('change-semester').submit();">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}" @selected($user->id === auth()->user()->id)>Semester {{$user->semester}}</option>    
                                    @endforeach
                                </select>
                            </form>    
                        </li>
                    </ul>
                    @endif

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    @if(auth()->user()->photo_url)
                                        <img src="{{ auth()->user()->photo_url }}" alt class="h-auto rounded-circle" />
                                    @else
                                        <div class="avatar">
                                            <span class="avatar-initial rounded-circle bg-info">{{ auth()->user()->initial }}</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    @if(auth()->user()->photo_url)
                                                        <img src="{{ auth()->user()->photo_url }}" alt class="h-auto rounded-circle" />
                                                    @else
                                                        <div class="avatar">
                                                            <span class="avatar-initial rounded-circle bg-info">{{ auth()->user()->initial }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                <small class="text-muted text-capitalize">{{ auth()->user()->role }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="ti ti-user-check me-2 ti-sm"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ti ti-logout me-2 ti-sm"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                @yield('content')
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl">
                        <div
                            class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column"
                        >
                            <div>
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by Fasilkom
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>

<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
    $('.selectpicker').selectpicker();
    @if(session('msg'))
    Swal.fire({
        text: '{{ session('msg') }}',
        icon: 'success',
        customClass: {
            confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
    });
    @endif

    $('.btn-post').click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah kamu yakin?',
            icon: 'warning',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-label-danger ms-3',
            },
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Ya, saya yakin',
            cancelButtonText: 'Batalkan',
        }).then(result => {
            if(result.isConfirmed) {
                const target = $(this).data('target')
                $(target).submit()
            }
        });
    })
</script>

<!-- Page JS -->
@yield('js')

</body>
</html>
