@extends('layout.trainer')

@section('title', 'Dashboard')

@section('content')

    <main class="dashboard-main">

        {{-- TOP NAV BAR --}}
        <div class="navbar-header">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <button type="button" class="sidebar-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                            <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                        </button>
                        <button type="button" class="sidebar-mobile-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                        </button>

                        <form class="navbar-search">
                            <input type="text" name="search" placeholder="Search" />
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form>
                    </div>
                </div>

                <div class="col-auto">
                    {{-- Right Icons (Language, Message, Notification, Profile) --}}
                    {{-- @include('trainer.top-icons') --}}
                </div>
            </div>
        </div>

        {{-- MAIN BODY --}}
        <div class="dashboard-main-body">

            <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="card shadow-lg p-4" style="width: 600px; height: 400px; border-radius: 36px;">

                    {{-- Card Title --}}
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">Current Time (India)</h4>
                    </div>
                    <br>
                    <br>

                    {{-- LIVE CLOCK --}}
                    <div class="text-center mb-5">
                        <h1 id="indiaClock" class="fw-bold" style="font-size: 48px;"></h1>
                    </div>
                    <br>

                    {{-- BUTTONS --}}
                    <div class="d-flex justify-content-center gap-4">

                        {{-- Punch In Button --}}
                        <button class="btn btn-success px-5 py-2 btn-punch-in"
                            @if ($attendance && $attendance->punch_in != null) disabled @endif>
                            Punch In
                        </button>


                        <button class="btn btn-danger px-5 py-2 btn-punch-out"
                            @if (!$attendance || !$attendance->punch_in || $attendance->punch_out != null) disabled @endif>
                            Punch Out
                        </button>

                    </div>
                    <br>
                    {{-- <div class="text-start mb-4">
                        <h6 class="fw-bold">Punch-in {{$attendance->punch_in}}</h6>
                        <h6 class="fw-bold">Punch-out {{$attendance->punch_in}}</h6>
                    </div> --}}



                </div>
            </div>

        </div>

        {{-- FOOTER --}}
        <footer class="d-footer">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <p class="mb-0">© 2024 WowDash. All Rights Reserved.</p>
                </div>
                <div class="col-auto">
                    <p class="mb-0">
                        Made by <span class="text-primary-600">wowtheme7</span>
                    </p>
                </div>
            </div>
        </footer>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- ===================== CLOCK SCRIPT ===================== --}}
    <script>
        function updateIndianClock() {
            let options = {
                timeZone: "Asia/Kolkata",
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit",
                hour12: true
            };

            let time = new Intl.DateTimeFormat("en-US", options).format(new Date());
            document.getElementById("indiaClock").innerText = time;
        }

        setInterval(updateIndianClock, 1000);
        updateIndianClock();
    </script>


    {{-- ===================== PUNCH IN / OUT SCRIPT ===================== --}}
    <script>
        function getIndianTime() {
            let options = {
                timeZone: "Asia/Kolkata",
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit",
                hour12: false
            };
            return new Intl.DateTimeFormat("en-US", options).format(new Date());
        }

        // Punch In
        $('.btn-punch-in').click(function() {
            let time = getIndianTime();

            $.post("{{ route('trainer.punchIn') }}", {
                _token: "{{ csrf_token() }}",
                time: time
            }, function(response) {
                if (response.status === "success") {
                    alert("Punch In Successful: " + time);
                    $('.btn-punch-in').prop('disabled', true);
                    $('.btn-punch-out').prop('disabled', false);
                } else {
                    alert(response.message);
                }
            });
        });

        // Punch Out
        $('.btn-punch-out').click(function() {
            let time = getIndianTime();

            $.post("{{ route('trainer.punchOut') }}", {
                _token: "{{ csrf_token() }}",
                time: time
            }, function(response) {
                if (response.status === "success") {
                    alert("Punch Out Successful: " + time);
                    $('.btn-punch-out').prop('disabled', true);
                } else {
                    alert(response.message);
                }
            });
        });
    </script>

@endsection
