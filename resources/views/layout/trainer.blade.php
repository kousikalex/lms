<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<!-- Mirrored from wowdash.wowtheme7.com/bundlelive/demo/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Dec 2025 04:55:02 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wowdash - Bootstrap 5 Admin Dashboard HTML Template</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">

    <!-- Remix icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">

    <!-- Apex Chart -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}">

    <!-- Data Table -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">

    <!-- Text Editor -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}">

    <!-- Calendar -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}">

    <!-- Vector Map -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}">

    <!-- Popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}">

    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}">

    <!-- Prism -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/prism.css') }}">

    <!-- File Upload -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/file-upload.css') }}">

    <!-- Audio Player -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/audioplayer.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .weekoff {
            background-color: #f2f2f2 !important;
            color: #777 !important;
            font-weight: bold;
        }
    </style>

</head>


<body>

    <aside class="sidebar">
        <button type="button" class="sidebar-close-btn">
            <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
        </button>

        <div>
            <a href="{{ route('dashboard') }}" class="sidebar-logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
                <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
            </a>
        </div>

        <div class="sidebar-menu-area">
            <ul class="sidebar-menu" id="sidebar-menu">

                <li class="sidebar-menu-group-title">Menu</li>

                {{-- Course Menu --}}
                {{-- <li class="dropdown">
                    <a href="javascript:void(0)">
                        <i class="ri-robot-2-line text-xl me-6 d-flex w-auto"></i>
                        <span>Course</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('course.index') }}">
                                <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Course
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('subcourse.index') }}">
                                <i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Sub-course
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- Trainer --}}
                <li>
                    <a href="{{ route('trainer.clock') }}">
                        <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                        <span>Punch I/O</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('trainer.calendar') }}">
                        <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('trainer.work') }}">
                        <iconify-icon icon="solar:calendar-outline" class="menu-icon"></iconify-icon>
                        <span>Work Module</span>
                    </a>
                </li>


                {{-- Blog --}}
                <li class="dropdown">
                    {{-- <a href="javascript:void(0)">
                        <i class="ri-news-line text-xl me-6 d-flex w-auto"></i>
                        <span>Blog</span>
                    </a> --}}
                    {{-- <ul class="sidebar-submenu">
                        <li><a href="{{ route('blog.index') }}"><i
                                    class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Blog</a></li>
                        <li><a href="{{ route('blog.details') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Blog Details</a>
                        </li>
                        <li><a href="{{ route('blog.add') }}"><i
                                    class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add Blog</a></li>
                    </ul> --}}
                </li>

                {{-- More Menus --}}
                <li>
                    {{-- <a href="{{ route('testimonial.index') }}">
                        <i class="ri-star-line text-xl me-6 d-flex w-auto"></i>
                        <span>Testimonial</span>
                    </a> --}}
                </li>

                <li>
                    {{-- <a href="{{ route('faq.index') }}">
                        <iconify-icon icon="mage:message-question-mark-round" class="menu-icon"></iconify-icon>
                        <span>FAQs</span>
                    </a> --}}
                </li>

                <li>
                    {{-- <a href="{{ route('error.404') }}">
                        <iconify-icon icon="streamline:straight-face" class="menu-icon"></iconify-icon>
                        <span>404</span>
                    </a> --}}
                </li>

            </ul>
        </div>
    </aside>


    <div class="main-content">
        @yield('content') <!-- content from child view -->
    </div>

    <!-- jQuery library js -->
    <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
    <!-- Data Table js -->
    <script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Popup js -->
    <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
    <!-- prism js -->
    <script src="{{ asset('assets/js/lib/prism.js') }}"></script>
    <!-- file upload js -->
    <script src="{{ asset('assets/js/lib/file-upload.js') }}"></script>
    <!-- audioplayer js -->
    <script src="{{ asset('assets/js/lib/audioplayer.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>


    <script>
        // ===================== Average Enrollment Rate Start ===============================
        function createChartTwo(chartId, color1, color2) {
            var options = {
                series: [{
                    name: 'series1',
                    data: [48, 35, 55, 32, 48, 30, 55, 50, 57]
                }, {
                    name: 'series2',
                    data: [12, 20, 15, 26, 22, 60, 40, 48, 25]
                }],
                legend: {
                    show: false
                },
                chart: {
                    type: 'area',
                    width: '100%',
                    height: 270,
                    toolbar: {
                        show: false
                    },
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3,
                    colors: [color1, color2], // Use two colors for the lines
                    lineCap: 'round'
                },
                grid: {
                    show: true,
                    borderColor: '#D1D5DB',
                    strokeDashArray: 1,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },
                    row: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    column: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    padding: {
                        top: -20,
                        right: 0,
                        bottom: -10,
                        left: 0
                    },
                },
                fill: {
                    type: 'gradient',
                    colors: [color1, color2], // Use two colors for the gradient
                    // gradient: {
                    //     shade: 'light',
                    //     type: 'vertical',
                    //     shadeIntensity: 0.5,
                    //     gradientToColors: [`${color1}`, `${color2}00`], // Bottom gradient colors with transparency
                    //     inverseColors: false,
                    //     opacityFrom: .6,
                    //     opacityTo: 0.3,
                    //     stops: [0, 100],
                    // },
                    gradient: {
                        shade: 'light',
                        type: 'vertical',
                        shadeIntensity: 0.5,
                        gradientToColors: [undefined, `${color2}00`], // Apply transparency to both colors
                        inverseColors: false,
                        opacityFrom: [0.4, 0.4], // Starting opacity for both colors
                        opacityTo: [0.3, 0.3], // Ending opacity for both colors
                        stops: [0, 100],
                    },
                },
                markers: {
                    colors: [color1, color2], // Use two colors for the markers
                    strokeWidth: 3,
                    size: 0,
                    hover: {
                        size: 10
                    }
                },
                xaxis: {
                    labels: {
                        show: false
                    },
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    tooltip: {
                        enabled: false
                    },
                    labels: {
                        formatter: function(value) {
                            return value;
                        },
                        style: {
                            fontSize: "14px"
                        }
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return "$" + value + "k";
                        },
                        style: {
                            fontSize: "14px"
                        }
                    },
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
            chart.render();
        }

        createChartTwo('enrollmentChart', '#45B369', '#487fff');
        // ===================== Average Enrollment Rate End ===============================


        // ================================ Users Overview Donut chart Start ================================
        var options = {
            series: [500, 500, 500],
            colors: ['#FF9F29', '#487FFF', '#E4F1FF'],
            labels: ['Active', 'New', 'Total'],
            legend: {
                show: false
            },
            chart: {
                type: 'donut',
                height: 270,
                sparkline: {
                    enabled: true // Remove whitespace
                },
                margin: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            },
            stroke: {
                width: 0,
            },
            dataLabels: {
                enabled: false
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
        };

        var chart = new ApexCharts(document.querySelector("#userOverviewDonutChart"), options);
        chart.render();
        // ================================ Users Overview Donut chart End ================================

        // ================================ Client Payment Status chart End ================================
        var options = {
            series: [{
                name: 'Net Profit',
                data: [44, 100, 40, 56, 30, 58, 50]
            }, {
                name: 'Free Cash',
                data: [60, 120, 60, 90, 50, 95, 90]
            }],
            colors: ['#45B369', '#FF9F29'],
            labels: ['Active', 'New', 'Total'],

            legend: {
                show: false
            },
            chart: {
                type: 'bar',
                height: 420,
                toolbar: {
                    show: false
                },
            },
            grid: {
                show: true,
                borderColor: '#D1D5DB',
                strokeDashArray: 4, // Use a number for dashed style
                position: 'back',
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: 8,
                },
            },
            dataLabels: {
                enabled: false
            },
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                }
            },
            stroke: {
                show: true,
                width: 0,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
            },
            fill: {
                opacity: 1,
                width: 18,
            },
        };

        var chart = new ApexCharts(document.querySelector("#paymentStatusChart"), options);
        chart.render();
        // ================================ Client Payment Status chart End ================================

        // ================================ Aminated Radial Progress Bar Start ================================
        $('svg.radial-progress').each(function(index, value) {
            $(this).find($('circle.complete')).removeAttr('style');
        });

        // Activate progress animation on scroll
        $(window).scroll(function() {
            $('svg.radial-progress').each(function(index, value) {
                // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
                if (
                    $(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.75) &&
                    $(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window).height() *
                        0.25)
                ) {
                    // Get percentage of progress
                    percent = $(value).data('percentage');
                    // Get radius of the svg's circle.complete
                    radius = $(this).find($('circle.complete')).attr('r');
                    // Get circumference (2πr)
                    circumference = 2 * Math.PI * radius;
                    // Get stroke-dashoffset value based on the percentage of the circumference
                    strokeDashOffset = circumference - ((percent * circumference) / 100);
                    // Transition progress for 1.25 seconds
                    $(this).find($('circle.complete')).animate({
                        'stroke-dashoffset': strokeDashOffset
                    }, 1250);
                }
            });
        }).trigger('scroll');
        // ================================ Aminated Radial Progress Bar End ================================
    </script>

</body>

<!-- Mirrored from wowdash.wowtheme7.com/bundlelive/demo/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Dec 2025 04:56:38 GMT -->

</html>
