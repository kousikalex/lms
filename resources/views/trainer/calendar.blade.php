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

            <div class="d-flex justify-content-center align-items-start" style="min-height: 150vh;">
                <div class="calendar-container shadow-lg p-4" style="width: 900px;  border-radius: 20px;">

                    {{-- MONTH HEADER --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button class="btn btn-primary btn-sm" id="prevMonth">Previous</button>

                        <h4 id="calendarMonth" class="fw-bold mb-0"></h4>

                        <button class="btn btn-primary btn-sm" id="nextMonth">Next</button>
                    </div>

                    {{-- CALENDAR GRID --}}
                    <table class="table table-bordered text-center" id="calendarTable" style="min-height: 550px;">

                        <thead class="table-light">
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                        </thead>
                        <tbody id="calendarBody"></tbody>
                    </table>

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
    <script>
        // Converts Laravel $attendance into JS array
        var attendanceData = @json($attendance);
    </script>

  <script>
$(document).ready(function() {

    let currentDate = new Date();

    // Convert attendance array into key-value object for fast lookup
    let attendanceMap = {};
    attendanceData.forEach(a => {
        attendanceMap[a.date] = a;
    });

    function renderCalendar(date) {

        const year = date.getFullYear();
        const month = date.getMonth();

        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        const monthNames = [
            "January", "February", "March", "April",
            "May", "June", "July", "August",
            "September", "October", "November", "December"
        ];

        $("#calendarMonth").text(monthNames[month] + " " + year);

        let calendarHTML = "";
        let dayCount = 1;

        for (let i = 0; i < 6; i++) {
            calendarHTML += "<tr>";

            for (let j = 0; j < 7; j++) {

                if (i === 0 && j < firstDay) {
                    calendarHTML += "<td></td>";
                }
                else if (dayCount > lastDate) {
                    calendarHTML += "<td></td>";
                }
                else {

                    // ---- Build full date string ----
                    let fullDate =
                        `${year}-${String(month + 1).padStart(2,'0')}-${String(dayCount).padStart(2,'0')}`;

                    let data = attendanceMap[fullDate];

                    // ---- Format effective hours ----
                    let effective = "";
                    if (data && data.effective_hours) {
                        let hrs = Math.floor(data.effective_hours / 60);
                        let mins = data.effective_hours % 60;
                        effective = `Eff: ${hrs}h ${mins}m`;
                    }

                    // ---- Detect Weekend (0 = Sun, 6 = Sat) ----
                    let weekday = new Date(year, month, dayCount).getDay();
                    let weekendClass = (weekday === 0 || weekday === 6) ? "weekoff" : "";

                    // ---- Build calendar cell ----
                    calendarHTML += `
                        <td class="py-3 ${weekendClass}">
                            <div><strong>${dayCount}</strong></div>

                            <div style="font-size:12px; color:green;">
                                ${data?.punch_in ? "IN: " + data.punch_in : ""}
                            </div>

                            <div style="font-size:12px; color:red;">
                                ${data?.punch_out ? "OUT: " + data.punch_out : ""}
                            </div>

                            <div style="font-size:12px; color:blue;">
                                ${effective}
                            </div>

                            ${weekendClass ? '<div style="font-size:11px; color:#666;">WEEK OFF</div>' : ""}
                        </td>
                    `;

                    dayCount++;
                }
            }

            calendarHTML += "</tr>";
        }

        $("#calendarBody").html(calendarHTML);
    }

    // Initial render
    renderCalendar(currentDate);

    // Previous Month
    $("#prevMonth").click(function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    // Next Month
    $("#nextMonth").click(function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

});
</script>




@endsection
