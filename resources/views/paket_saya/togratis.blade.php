@extends('layouts.master')

@section('content')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <!--begin::Toolbar wrapper-->
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Try Out
                        Gratis
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Card-->
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                @if ($data->count() > 0)
                    @foreach ($data as $item)
                        <div class="col-md-4">
                            <div class="card-xl-stretch mx-md-3">
                                <!--begin::Overlay-->

                                {{-- On progress By Iqbal --}}
                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                    href="{{ asset('gambar') . '/' . $item->paket->gambar }}">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px"
                                        style="background-image:url('{{ asset('gambar') . '/' . $item->paket->gambar }}')">
                                    </div>
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="ki-outline ki-eye fs-2x text-white"></i>
                                    </div>
                                </a>
                                <!--end::Overlay-->
                                <!--begin::Body-->
                                <div class="mt-5">
                                    <!--begin::Title-->
                                    {{-- <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">25 Products Mega Bundle with 50% off discount amazing</a> --}}
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">{{ $item->paket->judul }}
                                    </div>
                                    {{-- <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">Waktu Pengerjaan : {{ $item->paket->judul }}
                                    </div> --}}
                                    <!--end::Text-->
                                    <!--begin::Text-->
                                    <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                        <!--begin::Label-->
                                        {{-- <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                                            <span class="fs-6 fw-semibold text-gray-400">$</span>27</span> --}}
                                        <!--end::Label-->
                                        <!--begin::Action-->
                                        <a href="{{ url('paketsaya/' . $item->paket_id) }}"
                                            class="btn btn-sm btn-primary col-12">Pilih</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading" style="color: black">Belum Ada Paket Gratis Nih</h4>
                    </div>
                @endif
                <!--end::Col-->
            </div>
        </div>
    </div>
    {{-- @include('pembayaran.modalvalidasi') --}}
@endsection

{{-- @push('header')
    <link href="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
@endpush --}}

{{-- @push('footer')
    <script src="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/widgets.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/custom/widgets.js"></script>

    <script>
        "use strict";

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var dt;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#kt_datatable_example_1").DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    stateSave: true,
                    select: {
                        style: 'multi',
                        selector: 'td:first-child input[type="checkbox"]',
                        className: 'row-selected'
                    },
                    ajax: {
                        url: "{{ url('/paketsaya') }}",
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'nama_paket'
                        },
                        {
                            data: 'kategori'
                        },
                        {
                            data: 'tipe'
                        },
                        {
                            data: 'jmlh_soal'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: null
                        },
                    ],
                    order: [
                        [0, 'desc']
                    ],
                    columnDefs: [{
                            targets: 0,
                            orderable: false,
                            render: function(data) {
                                return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="${data}" />
                            </div>`;
                            }
                        },
                        {
                            targets: -1,
                            data: null,
                            orderable: false,
                            className: 'text-end',
                            render: function(data, type, row) {
                                return `
                            <!--begin::Menu-->
                                <!--begin::Menu item-->
                                    <a href="{{ url('/kerjakan') }}" class="btn btn-sm btn-primary">
                                        Kerjakan Soal
                                    </a>
                                <!--end::Menu item-->
                            <!--end::Menu-->
                        `;
                            },
                        },
                    ],
                    // Add data-filter attribute
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    // initToggleToolbar();
                    // toggleToolbars();
                    // handleDeleteRows();
                    KTMenu.createInstances();
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    dt.search(e.target.value).draw();
                });
            }

            // Reset Filter
            var handleResetForm = () => {
                // Select reset button
                const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

                // Reset datatable
                resetButton.addEventListener('click', function() {
                    // Reset payment type
                    filterPayment[0].checked = true;

                    // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                    dt.search('').draw();
                });
            }

            // Init toggle toolbar

            // Toggle toolbars


            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>
@endpush --}}
