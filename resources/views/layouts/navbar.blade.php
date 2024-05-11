<!--begin::Navbar-->
<div class="app-navbar flex-lg-grow-1" id="kt_app_header_navbar">
    <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1">
        {{-- nothing --}}
    </div>
    <!--begin::Notifications-->
    @if (auth()->user()->role == 'user')
        <div class="app-navbar-item ms-1 ms-md-3">
            <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                data-kt-menu-placement="bottom-end">
                <a href="{{ url('/invoice') }}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    data-bs-original-title="Invoice">
                    <i class="ki-outline ki-purchase fs-1"></i>
                </a>
            </div>
        </div>
        <div class="app-navbar-item ms-1 ms-md-3">
            <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px position-relative"
                id="kt_drawer_chat_toggle">
                @if (auth()->user()->keranjang)
                    <a href="{{ url('keranjang') . '/' . auth()->user()->keranjang->id }}" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" data-bs-original-title="Keranjang">
                        <i class="ki-outline ki-handcart fs-1"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge badge-circle badge-danger w-15px h-15px ms-n4 mt-3">{{ auth()->user()->keranjang->count() }}</span>
                    </a>
                @else
                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        data-bs-original-title="Keranjang Kosong">
                        <i class="ki-outline ki-handcart fs-1"></i>
                    </a>
                @endif
            </div>
        </div>
    @else
        <div class="app-navbar-item ms-1 ms-md-3">
            <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px position-relative"
                id="kt_drawer_chat_toggle">
                @php
                    $notif = App\Models\Pembayaran::where('status', 0)->get();
                @endphp
                @if ($notif->count() != 0)
                    <a href="{{ url('/pembayaran') }}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        data-bs-original-title="Ada {{ $notif->count() }} Pembayaran Belum Valid">
                        <i class="ki-outline ki-notification-on fs-1"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge badge-circle badge-danger w-15px h-15px ms-n4 mt-3">{{ $notif->count() }}</span>
                    </a>
                @else
                    <a href="{{ url('/pembayaran') }}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        data-bs-original-title="Belum ada pembayaran yang masuk">
                        <i class="ki-outline ki-notification-on fs-1"></i>
                    </a>
                @endif

            </div>
        </div>
    @endif
    <!--end::Notifications-->
    <!--begin::User menu-->
    <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-circle symbol-35px symbol-md-45px"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
            data-kt-menu-placement="bottom-end">
            @if (Auth::user()->avatar == null)
                <img src="assets/media/svg/avatars/blank.svg" alt="user" />
            @else
                @if (Auth::user()->google_id != null)
                    @if (file_exists('gambar/' . auth()->user()->avatar))
                        <img src="{{ asset('') . 'gambar/' . auth()->user()->avatar }}" alt="user" />
                    @else
                        <img src="{{ Auth::user()->avatar }}" alt="user" />
                    @endif
                @else
                    <img src="{{ asset('') . 'gambar/' . auth()->user()->avatar }}" alt="user" />
                @endif
            @endif
        </div>
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
            data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">

                        @if (Auth::user()->avatar == null)
                            <img src="assets/media/svg/avatars/blank.svg" alt="user" />
                        @else
                            @if (Auth::user()->google_id != null)
                                @if (file_exists('gambar/' . auth()->user()->avatar))
                                    <img src="{{ asset('') . 'gambar/' . auth()->user()->avatar }}" alt="user" />
                                @else
                                    <img src="{{ Auth::user()->avatar }}" alt="user" />
                                @endif
                            @else
                                <img src="{{ asset('') . 'gambar/' . auth()->user()->avatar }}" alt="user" />
                            @endif
                        @endif
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">
                            {{ auth()->user()->name }}
                        </div>
                        <a href="#"
                            class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="{{ url('profil') }}" class="menu-link px-5">Profil
                    Saya</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            {{-- mode dark --}}
            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                <a href="#" class="menu-link px-5">
                    <span class="menu-title position-relative">Mode
                        <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                            <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                            <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                        </span></span>
                </a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-outline ki-night-day fs-2"></i>
                            </span>
                            <span class="menu-title">Light</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-outline ki-moon fs-2"></i>
                            </span>
                            <span class="menu-title">Dark</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                            <span class="menu-icon" data-kt-element="icon">
                                <i class="ki-outline ki-screen fs-2"></i>
                            </span>
                            <span class="menu-title">System</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu item-->
            <div class="menu-item px-5">
                <a href="{{ url('faq') }}" class="menu-link px-5">FAQ</a>
            </div>
            <div class="menu-item px-5">
                <a href="{{ url('sk') }}" class="menu-link px-5">Syarat & Ketentuan</a>
            </div>
            <div class="menu-item px-5">
                <a href="{{ url('tentang-kami') }}" class="menu-link px-5">Tentang Kami</a>
            </div>
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="{{ route('logout') }}" class="menu-link px-5 text-danger"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::User account menu-->
        <!--end::Menu wrapper-->
    </div>
    <!--end::User menu-->
</div>
<!--end::Navbar-->
