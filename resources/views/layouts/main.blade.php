<!doctype html>
<html lang="en">
{{ date_default_timezone_set("Africa/Nairobi") }}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/cropped-logo.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.css') }}"/>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Pace Loader -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/blue/pace-theme-minimal.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js"></script>


    {{--    <style>--}}
    {{--        /* Pace customization */--}}
    {{--        .pace .pace-progress {--}}
    {{--            background: #dc3545; /* Red color */--}}
    {{--            height: 3px;--}}
    {{--        }--}}
    {{--    </style>--}}
    <!-- Center spinner + top progress bar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/red/pace-theme-center-radar.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/duotone.css"/>
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

    <div class="app-topstrip bg-dark py-3 px-4 w-100 d-lg-flex align-items-center justify-content-between">
        <div class="d-none d-sm-flex align-items-center justify-content-center gap-9 mb-3 mb-lg-0">
            <a class="d-flex justify-content-center" href="https://www.wrappixel.com/">
                <img src="{{ asset('images/logos/logo-adminmart.svg') }}" alt="" width="150">
            </a>

            <div class="d-none d-xl-flex align-items-center gap-3 border-start border-white border-opacity-25 ps-9">

            </div>
        </div>

        <div class="d-lg-flex align-items-center gap-3">
            <h3 class="text-linear-gradient mb-3 mb-lg-0 fs-3 text-uppercase text-center fw-semibold">
                {{-- Version --}}
            </h3>
            <div class="d-sm-flex align-items-center justify-content-center gap-8">
                {{-- <div class="d-flex align-items-center justify-content-center gap-8">
                    <div class="dropdown d-flex">
                        <a class="btn live-preview-drop fs-4 lh-sm btn-outline-primary rounded border-white border border-opacity-40 text-white d-flex align-items-center gap-2 px-3 py-2"
                            href="javascript:void(0)" id="drop3" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Live Preview
                            <iconify-icon class="fs-6" icon="solar:alt-arrow-down-linear"></iconify-icon>
                        </a>

                    </div>
                    <a
                        class="get-pro-btn rounded btn btn-primary d-flex align-items-center gap-2 fs-4 border-0 px-3 py-2"
                        href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/?ref=56#product-demo-section">
                        <iconify-icon class="fs-5" icon="solar:crown-linear"></iconify-icon>
                        Get Pro
                    </a>
                </div> --}}
            </div>
        </div>

    </div>

    <!-- Sidebar Start -->
    <x-side-nav></x-side-nav>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <x-header></x-header>
        <!--  Header End -->
        <div class="body-wrapper-inner">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sidebarmenu.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
<!-- solar icons -->
<script src="{{ asset('js/iconify-icon.min.js') }}"></script>
<script src="{{ asset('js/dataTables.js') }}"></script>
<script>
    new DataTable('#postsTable');
</script>

<script src="https://cdn.jsdelivr.net/npm/tinymce@7.2.1/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    tinymce.init({
        selector: '#editor',
        height: 400,
        menubar: false,
        plugins: 'link image lists code',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link image | code',
        branding: false
    });
</script>
</body>

</html>
