@extends('layouts.master')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card border-transparent" data-bs-theme="light" style="background-color: #1C325E;">
                <!--begin::Body-->
                <div class="card-body d-flex ps-xl-15">
                    <!--begin::Wrapper-->
                    <div class="m-0">
                        <!--begin::Title-->
                        <div class="position-relative fs-2x z-index-2 fw-bold text-white mb-7">
                            <span class="me-2">Selamat Datang Kembali
                                <span class="position-relative d-inline-block text-danger">
                                    <a href="{{ url('profil') }}"
                                        class="text-danger opacity-75-hover">{{ auth()->user()->name }}</a>
                                    <!--begin::Separator-->
                                    <span
                                        class="position-absolute opacity-50 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                    <!--end::Separator-->
                                </span></span>,
                            <br>Ayo manfaatkan waktu belajar kita dengan maksimal agar sukses dalam ujian CPNS dan PPPK!
                        </div>
                        <!--end::Title-->
                        <!--begin::Action-->
                        <div class="mb-3">
                            <a href="{{ url('pusatlangganan') }}" class="btn btn-danger fw-semibold me-2">Lihat Paket</a>
                            <a href="{{ url('paketsaya') }}"
                                class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold">Paket
                                Saya</a>
                        </div>
                        <!--begin::Action-->
                    </div>
                    <!--begin::Wrapper-->
                    <!--begin::Illustration-->
                    <img src="{{ url('assets/media/illustrations/sigma-1/17-dark.png') }}"
                        class="position-absolute me-3 bottom-0 end-0 h-200px" alt="">
                    <!--end::Illustration-->
                </div>
                <!--end::Body-->
            </div>
            <div class="card py-4 px-4 mt-4">
                <div class="card-body py-4">
                    <h2>Informasi Terbaru</h2>
                    @foreach ($data as $item)
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body" style="background-color: #BFDDE3">
                                <!--begin::Header-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-5">
                                            <i class="ki-outline ki-notification text-primary fs-1"></i>
                                            {{-- <img src="assets/media/avatars/300-7.jpg" alt=""> --}}
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-6 fw-bold">{{ $item->judul }}</a>
                                            <span
                                                class="text-gray">{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Menu-->
                                    <!--end::Menu-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Post-->
                                <div class="mb-7">
                                    <!--begin::Text-->
                                    <div class="text mb-5">{{ $item->isi }}</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Post-->
                                <!--begin::Separator-->
                                {{-- <div class="separator mb-4"></div> --}}
                                <!--end::Separator-->
                            </div>
                            <!--end::Body-->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push('header')
    <link href="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
@endpush

@push('footer')
    <script src="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/widgets.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/custom/widgets.js"></script>

    <script>
        "use strict";

        // Definisi Class
        var KTDatatablesServerSide = function() {
            // Variabel bersama
            var table;
            var dt;
            var filterPayment;

            // Fungsi privat
            var initDatatable = function() {
                dt = $("#kt_datatable_example_1").DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    order: [
                        [0, 'desc']
                    ],
                    stateSave: true,
                    select: {
                        style: 'multi',
                        selector: 'td:first-child input[type="checkbox"]',
                        className: 'row-selected'
                    },
                    ajax: {
                        url: "{{ url('/pengumuman') }}",
                    },
                    columns: [{
                            data: 'id',
                            visible: false
                        },
                        {
                            data: 'isi'
                        },
                    ],
                });

                table = dt.$;

                // Re-inisialisasi fungsi pada setiap penggambaran ulang tabel
                dt.on('draw', function() {
                    handleDeleteRows();
                    KTMenu.createInstances();
                });
            }

            // Fungsi pencarian Datatable
            var handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    dt.search(e.target.value).draw();
                });
            }

            // Fungsi menghapus baris
            var handleDeleteRows = () => {
                const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');

                deleteButtons.forEach(d => {
                    d.addEventListener('click', function(e) {
                        e.preventDefault();

                        const parent = e.target.closest('tr');
                        const customerName = parent.querySelectorAll('td')[1].innerText;
                        let data = $(this).data()
                        let Id = data.id;

                        Swal.fire({
                            text: "Yakin ingin menghapus pengumuman " + customerName + "?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Ya, hapus!",
                            cancelButtonText: "Tidak, batal",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then(function(result) {
                            if (result.value) {
                                Swal.fire({
                                    text: "Menghapus " + customerName,
                                    icon: "info",
                                    buttonsStyling: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(function() {
                                    Swal.fire({
                                        text: "Data pengumuman " +
                                            customerName + " terhapus !.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, mengerti!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function() {
                                        window.location =
                                            `{{ url('/pengumuman/hapus/') }}/${Id}`;
                                        dt.draw();
                                    });
                                });
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: "Pengumuman " + customerName +
                                        " tidak jadi dihapus.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, mengerti!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                });
                            }
                        });
                    })
                });
            }

            // Metode publik
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                    handleDeleteRows();
                }
            }
        }();

        // Ketika dokumen siap
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>
@endpush
