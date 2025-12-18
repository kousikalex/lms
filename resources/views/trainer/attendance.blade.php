@extends('layout.trainer    ')

@section('title', 'Dashboard')

@section('content')



    <main class="dashboard-main">
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
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                        <div class="dropdown d-none d-sm-inline-block">
                            <button
                                class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                                type="button" data-bs-toggle="dropdown">
                                <img src="assets/images/lang-flag.png" alt="image"
                                    class="w-24 h-24 object-fit-cover rounded-circle" />
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <div
                                    class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-0">
                                            Choose Your Language
                                        </h6>
                                    </div>
                                </div>

                                <div class="max-h-400-px overflow-y-auto scroll-sm pe-8">
                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="english">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="assets/images/flags/flag1.png" alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0" />
                                                <span class="text-md fw-semibold mb-0">English</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto" id="english" />
                                    </div>

                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="japan">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="assets/images/flags/flag2.png" alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0" />
                                                <span class="text-md fw-semibold mb-0">Japan</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto" id="japan" />
                                    </div>

                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="france">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="assets/images/flags/flag3.png" alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0" />
                                                <span class="text-md fw-semibold mb-0">France</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto" id="france" />
                                    </div>

                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="germany">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="assets/images/flags/flag4.png" alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0" />
                                                <span class="text-md fw-semibold mb-0">Germany</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto" id="germany" />
                                    </div>

                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="korea">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="assets/images/flags/flag5.png" alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0" />
                                                <span class="text-md fw-semibold mb-0">South Korea</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto" id="korea" />
                                    </div>

                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="bangladesh">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="assets/images/flags/flag6.png" alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0" />
                                                <span class="text-md fw-semibold mb-0">Bangladesh</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto" id="bangladesh" />
                                    </div>

                                    <div
                                        class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="india">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="assets/images/flags/flag7.png" alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0" />
                                                <span class="text-md fw-semibold mb-0">India</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto" id="india" />
                                    </div>
                                    <div class="form-check style-check d-flex align-items-center justify-content-between">
                                        <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="canada">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                                <img src="assets/images/flags/flag8.png" alt=""
                                                    class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0" />
                                                <span class="text-md fw-semibold mb-0">Canada</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="crypto" id="canada" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Language dropdown end -->

                        <div class="dropdown">
                            <button
                                class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                                type="button" data-bs-toggle="dropdown">
                                <iconify-icon icon="mage:email" class="text-primary-light text-xl"></iconify-icon>
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                                <div
                                    class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-0">
                                            Message
                                        </h6>
                                    </div>
                                    <span
                                        class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                                </div>

                                <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="assets/images/notification/profile-3.png" alt="" />
                                                <span
                                                    class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">
                                                    Kathryn Murphy
                                                </h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-100-px">
                                                    hey! there i’m...
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-end">
                                            <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                            <span
                                                class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="assets/images/notification/profile-4.png" alt="" />
                                                <span
                                                    class="w-8-px h-8-px bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">
                                                    Kathryn Murphy
                                                </h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-100-px">
                                                    hey! there i’m...
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-end">
                                            <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                            <span
                                                class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">2</span>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="assets/images/notification/profile-5.png" alt="" />
                                                <span
                                                    class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">
                                                    Kathryn Murphy
                                                </h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-100-px">
                                                    hey! there i’m...
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-end">
                                            <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                            <span
                                                class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="assets/images/notification/profile-6.png" alt="" />
                                                <span
                                                    class="w-8-px h-8-px bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">
                                                    Kathryn Murphy
                                                </h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-100-px">
                                                    hey! there i’m...
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-end">
                                            <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                            <span
                                                class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                                        </div>
                                    </a>

                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                                <img src="assets/images/notification/profile-7.png" alt="" />
                                                <span
                                                    class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">
                                                    Kathryn Murphy
                                                </h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-100-px">
                                                    hey! there i’m...
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-end">
                                            <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                            <span
                                                class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="text-center py-12 px-16">
                                    <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                        Message</a>
                                </div>
                            </div>
                        </div>
                        <!-- Message dropdown end -->

                        <div class="dropdown">
                            <button
                                class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                                type="button" data-bs-toggle="dropdown">
                                <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                                <div
                                    class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-0">
                                            Notifications
                                        </h6>
                                    </div>
                                    <span
                                        class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                                </div>

                                <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <iconify-icon icon="bitcoin-icons:verify-outline"
                                                    class="icon text-xxl"></iconify-icon>
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">
                                                    Congratulations
                                                </h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-200-px">
                                                    Your profile has been Verified. Your profile has
                                                    been Verified
                                                </p>
                                            </div>
                                        </div>
                                        <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                    </a>

                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <img src="assets/images/notification/profile-1.png" alt="" />
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">
                                                    Ronald Richards
                                                </h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-200-px">
                                                    You can stitch between artboards
                                                </p>
                                            </div>
                                        </div>
                                        <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                    </a>

                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                AM
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">Arlene McCoy</h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-200-px">
                                                    Invite you to prototyping
                                                </p>
                                            </div>
                                        </div>
                                        <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                    </a>

                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                <img src="assets/images/notification/profile-2.png" alt="" />
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">
                                                    Annette Black
                                                </h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-200-px">
                                                    Invite you to prototyping
                                                </p>
                                            </div>
                                        </div>
                                        <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                    </a>

                                    <a href="javascript:void(0)"
                                        class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                        <div
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <span
                                                class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                                DR
                                            </span>
                                            <div>
                                                <h6 class="text-md fw-semibold mb-4">
                                                    Darlene Robertson
                                                </h6>
                                                <p class="mb-0 text-sm text-secondary-light text-w-200-px">
                                                    Invite you to prototyping
                                                </p>
                                            </div>
                                        </div>
                                        <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                    </a>
                                </div>

                                <div class="text-center py-12 px-16">
                                    <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                        Notification</a>
                                </div>
                            </div>
                        </div>
                        <!-- Notification dropdown end -->

                        <div class="dropdown">
                            <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                                data-bs-toggle="dropdown">
                                <img src="assets/images/user.png" alt="image"
                                    class="w-40-px h-40-px object-fit-cover rounded-circle" />
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <div
                                    class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <h6 class="text-lg text-primary-light fw-semibold mb-2">
                                            Shaidul Islam
                                        </h6>
                                        <span class="text-secondary-light fw-medium text-sm">Admin</span>
                                    </div>
                                    <button type="button" class="hover-text-danger">
                                        <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                    </button>
                                </div>
                                <ul class="to-top-list">
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="view-profile.html">
                                            <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                            My Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="email.html">
                                            <iconify-icon icon="tabler:message-check" class="icon text-xl"></iconify-icon>
                                            Inbox</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="company.html">
                                            <iconify-icon icon="icon-park-outline:setting-two"
                                                class="icon text-xl"></iconify-icon>
                                            Setting</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                                            href="javascript:void(0)">
                                            <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>
                                            Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Profile dropdown end -->
                    </div>
                </div>
            </div>
        </div>
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

            <div class="row gy-4">

                <form class="row gy-3 needs-validation" action="{{ route('student.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Please fix the errors below:</strong>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <label class="form-label">From Date</label>
                        <input type="date" name="from_date" id="from_date"
                            class="form-control @error('from_date') is-invalid @enderror" value="{{ old('from_date') }}">

                            @error('from_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Select Batch</label>
                        <select name="batch_name" id="batch_name" class="form-control">
                            <option value="">-- Select Batch --</option>
                            @foreach ($batchNames as $batch)
                                <option value="{{ $batch }}">{{ $batch }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Department</label>
                        <input type="text" id="department_name" class="form-control" readonly>
                        <input type="hidden" name="department_id" id="department_id">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Year</label>
                        <input type="text" id="year_name" class="form-control" readonly>
                        <input type="hidden" name="year_id" id="year_id">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Section</label>
                        <input type="text" id="section_name" class="form-control" readonly>
                        <input type="hidden" name="section_id" id="section_id">
                    </div>






                </form>


                <div id="studentListContainer" class="col-md-12 mt-4" style="display:none;">
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Student Name</th>
                                {{-- <th>Register No</th> --}}
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody id="studentList"></tbody>
                    </table>

                    <button type="button" id="submitAttendance" class="btn btn-success">
                        Submit Attendance
                    </button>

                </div>
            </div>
        </div>


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
$("#batch_name").change(function () {

    let batch = $(this).val();
    let fromDate = $("#from_date").val();

    if (!batch || !fromDate) {
        alert("Please select From Date and Batch");
        return;
    }

    // RESET UI
    $("#department_name, #year_name, #section_name").val('');
    $("#department_id, #year_id, #section_id").val('');
    $("#studentList").html("");
    $("#studentListContainer").hide();
    $("#attendanceMessage").remove();

    // ----------------------------
    // FETCH BATCH DETAILS
    // ----------------------------
    $.get("/get-batch-details", {
        batch_name: batch
    }, function (data) {

        $("#department_name").val(data.department_name);
        $("#year_name").val(data.year_name);
        $("#section_name").val(data.section_name);

        $("#department_id").val(data.department_id);
        $("#year_id").val(data.year_id);
        $("#section_id").val(data.section_id);
    });

    // ----------------------------
    // FETCH STUDENTS + CHECK ATTENDANCE
    // ----------------------------
    $.get("/get-batch-students", {
        batch_name: batch,
        attendance_date: fromDate
    }, function (response) {

        // ❌ Attendance already done
        if (response.already_done) {
            $("#studentListContainer").hide();
            $("<div id='attendanceMessage' class='alert alert-warning mt-3'>Attendance already done for this date.</div>")
                .insertAfter("#studentListContainer");
            return;
        }

        // ✅ Show students
        let html = "";
        let count = 1;

        response.students.forEach(function (student) {
            html += `
                <tr>
                    <td>${count++}</td>
                    <td>${student.name}</td>
                    <td>
                        <select name="attendance[${student.id}]" class="form-control">
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>
                    </td>
                </tr>
            `;
        });

        $("#studentList").html(html);
        $("#studentListContainer").show();
    });

});
</script>


    <script>
        $("#submitAttendance").click(function() {

            let batchName = $("#batch_name").val();
            let date = $("input[name='from_date']").val();

            if (!batchName || !date) {
                alert("Please select date and batch");
                return;
            }

            let attendanceData = [];

            $("#studentList tr").each(function() {
                let studentId = $(this).find("select").attr("name").match(/\d+/)[0];
                let attendance = $(this).find("select").val();

                attendanceData.push({
                    student_id: studentId,
                    attendance: attendance
                });
            });

            $.ajax({
                url: "{{ route('attendance.store') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    batch_name: batchName,
                    attendance_date: date,
                    attendance: attendanceData
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function() {
                    alert("Something went wrong");
                }
            });

        });
    </script>



@endsection
