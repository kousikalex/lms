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
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">Basic Table</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Basic Table</li>
                </ul>
            </div>

            <div class="d-flex flex-wrap align-items-center gap-3">
                <button type="button" id="btnUpcoming"
                    class="btn rounded-pill btn-warning-600 radius-8 px-20 py-11">Upcoming</button>

                <button type="button" id="btnInProgress"
                    class="btn rounded-pill btn-primary-600 radius-8 px-20 py-11">In-progress</button>

                <button type="button" id="btnCompleted"
                    class="btn rounded-pill btn-success-600 radius-8 px-20 py-11">Completed</button>
            </div>

            <br>
            <br>

            {{-- UPCOMING --}}
            <div id="btnUpcomingCard" style="display:none;">
                <div class="container-fluid px-4">
                    <div class="row justify-content-start">

                        @forelse ($upcoming as $item)
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                <div class="card h-100 radius-12 bg-gradient-primary text-center">
                                    <div class="card-body p-24">

                                        <div
                                            class="w-64-px h-64-px d-inline-flex align-items-center
                                justify-content-center bg-primary-600 text-white mb-16 radius-12">
                                            <iconify-icon icon="ri:calendar-event-fill" class="h5 mb-0"></iconify-icon>
                                        </div>

                                        <h6 class="mb-8">{{ $item->college->collegename ?? 'sample' }}</h6>
                                        <h3 class="mb-8">{{ $item->course->name ?? 'Course' }}</h3>

                                        <p class="card-text text-secondary-light">
                                            From <strong>{{ $item->from_date }}</strong><br>
                                            To <strong>{{ $item->to_date }}</strong>
                                        </p>

                                       <p class="card-text text-secondary-light">
                                            Department <strong>{{ $item->department->name }}</strong><br>
                                            Year <strong>{{ $item->Year->name }}</strong>
                                        </p>

                                        <a href="javascript:void(0)"
                                            class="btn text-primary-600 hover-text-primary px-0 py-10 d-inline-flex align-items-center gap-2">
                                            Read More
                                            <iconify-icon icon="iconamoon:arrow-right-2" class="text-xl"></iconify-icon>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted">No upcoming work</p>
                        @endforelse

                    </div>
                </div>
            </div>




            {{-- IN PROGRESS --}}
            <div id="inProgressCard" style="display:none;">
                <div class="container-fluid px-4">
                    <div class="row justify-content-start">

                        @forelse ($inProgress as $item)
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                <div class="card h-100 radius-12 bg-gradient-primary text-center">
                                    <div class="card-body p-24">

                                        <div
                                            class="w-64-px h-64-px d-inline-flex align-items-center
                                justify-content-center bg-warning text-white mb-16 radius-12">
                                            <iconify-icon icon="ri:progress-3-fill" class="h5 mb-0"></iconify-icon>
                                        </div>

                                        <h6 class="mb-8">{{ $item->college->collegename ?? 'sample' }}</h6>
                                        <h3 class="mb-8">{{ $item->course->name ?? 'Course' }}</h3>

                                        <p class="card-text text-secondary-light">
                                            Started <strong>{{ $item->from_date }}</strong><br>
                                            Ends <strong>{{ $item->to_date }}</strong>
                                        </p>
                                        <p class="card-text text-secondary-light">
                                            Department <strong>{{ $item->department->name }}</strong><br>
                                            Year <strong>{{ $item->Year->name }}</strong>
                                        </p>

                                        <a href="#"
                                            class="btn text-primary-600 hover-text-primary px-0 py-10 d-inline-flex align-items-center gap-2">
                                            View
                                            <iconify-icon icon="iconamoon:arrow-right-2" class="text-xl"></iconify-icon>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted">No in-progress work</p>
                        @endforelse

                    </div>
                </div>
            </div>





            {{-- COMPLETED --}}
            <div id="completedCard" style="display:none;">
                <div class="container-fluid px-4">
                    <div class="row justify-content-start">

                        @forelse ($completed as $item)
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                <div class="card h-100 radius-12 bg-gradient-primary text-center">
                                    <div class="card-body p-24">

                                        <div
                                            class="w-64-px h-64-px d-inline-flex align-items-center
                                justify-content-center bg-success text-white mb-16 radius-12">
                                            <iconify-icon icon="ri:checkbox-circle-fill" class="h5 mb-0"></iconify-icon>
                                        </div>

                                        <h6 class="mb-8">{{ $item->college->collegename ?? 'sample' }}</h6>
                                        <h3 class="mb-8">{{ $item->course->name ?? 'Course' }}</h3>

                                        <p class="card-text text-secondary-light">
                                            Completed on <strong>{{ $item->to_date }}</strong>
                                        </p>

                                        <p class="card-text text-secondary-light">
                                            Dept <strong>{{ $item->department->name }}</strong>
                                            | Year <strong>{{ $item->Year->name }}</strong>
                                        </p>

                                        <a href="javascript:void(0)"
                                            class="btn text-primary-600 hover-text-primary px-0 py-10 d-inline-flex align-items-center gap-2">
                                            View Details
                                            <iconify-icon icon="iconamoon:arrow-right-2" class="text-xl"></iconify-icon>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted">No completed work</p>
                        @endforelse

                    </div>
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

    <script>
        function hideAllCards() {
            document.getElementById("btnUpcomingCard").style.display = "none";
            document.getElementById("inProgressCard").style.display = "none";
            document.getElementById("completedCard").style.display = "none";
        }

        document.getElementById("btnUpcoming").addEventListener("click", function() {
            hideAllCards();
            document.getElementById("btnUpcomingCard").style.display = "block";
        });

        document.getElementById("btnInProgress").addEventListener("click", function() {
            hideAllCards();
            document.getElementById("inProgressCard").style.display = "block";
        });

        document.getElementById("btnCompleted").addEventListener("click", function() {
            hideAllCards();
            document.getElementById("completedCard").style.display = "block";
        });
    </script>








@endsection
