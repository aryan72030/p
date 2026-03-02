<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'My website')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    @include('masterpage.link')

</head>

<body class="theme-1">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    @if (session('success') || session('error'))
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100">
            <div id="liveToast"
                class="toast align-items-center text-white 
        {{ session('success') ? 'bg-success' : 'bg-danger' }} 
        border-0 show"
                role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') ?? session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let toastEl = document.getElementById('liveToast');
                if (toastEl) {
                    let toast = new bootstrap.Toast(toastEl, {
                        delay: 3000
                    });
                    toast.show();
                }
            });
        </script>
    @endif

    @include('masterpage.navbar')
    @include('masterpage.header')

    @yield('mainConten')

    @include('masterpage.footer')

    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/dash.js') }}"></script>
    <script src="{{ asset('assets/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    @stack('js_calendar')

    @stack('js_required')

    @include('masterpage.customizer')

    <script src="{{ asset('assets/js/costomizer.js') }}"></script>
    
</body>

</html>
