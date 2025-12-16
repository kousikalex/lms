<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - LMS</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/prism.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/file-upload.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/audioplayer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <section class="auth bg-base d-flex flex-wrap">

        <!-- Left Image Section -->
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ asset('assets/images/auth/auth-img.png') }}" alt="" />
            </div>
        </div>

        <!-- Right Login Section -->
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="{{ url('/') }}" class="mb-40 max-w-290-px">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" />
                    </a>
                    <h4 class="mb-12">Sign In to your Account</h4>
                    <p class="mb-32 text-secondary-light text-lg">Welcome back! Please enter your details</p>
                </div>

                {{-- Laravel Login Form --}}
                <form action="{{ route('trainer.login') }}" method="POST">
                    @csrf

                    {{-- Email Field --}}
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email"
                            class="form-control h-56-px bg-neutral-50 radius-12 @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required />
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    {{-- Password Field --}}
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="mdi:phone"></iconify-icon>
                            </span>
                            <input type="text" name="phone"
                                class="form-control h-56-px bg-neutral-50 radius-12 @error('phone') is-invalid @enderror"
                                id="phone-number" placeholder="Phone Number" required />
                        </div>
                    </div>
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror


                    {{-- Remember Me --}}
                    <div class="d-flex justify-content-between gap-2 mb-3">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input border border-neutral-300" type="checkbox" name="remember"
                                id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-primary-600 fw-medium">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">
                        Sign In
                    </button>

                    {{-- <div class="mt-32 text-center text-sm">
                        <p class="mb-0">
                            Don’t have an account?
                            <a href="{{ route('register') }}" class="text-primary-600 fw-semibold">Sign Up</a>
                        </p>
                    </div> --}}

                </form>
            </div>
        </div>
    </section>

    <!-- JS Files -->
    <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>

    <script>
        // Password show / hide toggle
        function initializePasswordToggle(selector) {
            $(selector).on("click", function() {
                $(this).toggleClass("ri-eye-off-line");
                var input = $($(this).attr("data-toggle"));
                input.attr("type", input.attr("type") === "password" ? "text" : "password");
            });
        }
        initializePasswordToggle(".toggle-password");
    </script>
</body>

</html>
