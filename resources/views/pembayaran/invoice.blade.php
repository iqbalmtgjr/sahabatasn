@extends('layouts.master')

@section('content')
    <!--begin::Alert-->
    <div class="alert alert-warning d-flex align-items-center p-5 m-5">
        <i class="ki-duotone ki-shield-tick fs-2hx text-warning me-4"><span class="path1"></span><span
                class="path2"></span></i>
        <div class="d-flex flex-column">
            <h4 class="mb-1 text-dark">Catatan</h4>
            <span class="text-dark">Jika sudah divalidasi, silahkan menuju menu <strong>Paket Saya</strong> disisi kiri
                halaman. <br> Terima Kasih</span>
        </div>
    </div>
    <!--end::Alert-->
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">

            <!--begin::Toolbar wrapper-->
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Invoice
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
            {{-- <div class="card">
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-5">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <input type="text" data-kt-docs-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Cari Paket" />
                        </div>
                        <!--end::Search-->

                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Datatable-->
                    <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_datatable_example_1 .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th>Nama Paket</th>
                                <th>Harga Paket</th>
                                <th>Total yang dibayar</th>
                                <th>Status</th>
                                <th class="text-end min-w-100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                </div>
            </div> --}}
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-xl-4 mb-3">
                        <!--begin::Address-->
                        <div class="card h-xl-100 flex-row flex-stack flex-wrap p-6">
                            <!--begin::Details-->
                            <div class="d-flex flex-column py-2">
                                <div class="d-flex align-items-center fs-5 fw-bold mb-5">
                                    @if ($item->status == 0)
                                        <span class="badge badge-light-warning fs-5 me-1"> Pengecekan Pembayaran<i
                                                class="ki-duotone ki-arrows-loop fs-2x text-warning"><span
                                                    class="path1"></span><span class="path2"></span>
                                            </i></span>
                                    @else
                                        <span class="badge badge-light-success fs-5 me-1"> Pembayaran Berhasil<i
                                                class="ki-outline ki-check fs-2x text-success"></i></span>
                                    @endif
                                </div>
                                <div class="fs-5 mb-2">
                                    <span class="text-gray-800 fw-bold me-1">{{ $item->paket->judul }}</span>
                                    {{-- <span class="text-gray-600 fw-semibold">@rupiah($item->nominal)</span> --}}
                                </div>
                                <div class="fs-6 text-gray-600 fw-semibold">Total yang dibayar: @rupiah($item->nominal)</div>
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Address-->
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    @include('pembayaran.modaledit')
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
                        url: "{{ url('/invoice') }}",
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'nama_paket'
                        },
                        {
                            data: 'harga'
                        },
                        {
                            data: 'harga_bayar'
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
                                if (row.status ==
                                    '<div class="badge badge-light-primary">Sudah divalidasi</div>'
                                ) {
                                    return ``;
                                } else {
                                    return `
                                    <a target="_blank" href="http://localhost:8000/bukti/${row['gambar']}"  class="btn btn-sm btn-warning">
                                        Lihat Bukti Bayar
                                    </a>
                                    <a href="#" onclick="getdata(${row['id']})" class="btn btn-sm btn-primary" data-kt-docs-table-filter="edit_row" data-bs-toggle="modal"
                                    data-bs-target="#edit">
                                        Ubah Bukti Bayar
                                    </a>
                                `;
                                }
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
                    handleDeleteRows();
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

            // Delete customer
            var handleDeleteRows = () => {
                // Select all delete buttons
                const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');

                deleteButtons.forEach(d => {
                    // Delete button on click
                    d.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Select parent row
                        const parent = e.target.closest('tr');

                        // Get customer name
                        const customerName = parent.querySelectorAll('td')[1].innerText;
                        let data = $(this).data()
                        let Id = data.id;

                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Yakin ingin menghapus " + customerName + "?",
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
                                // Simulate delete request -- for demo purpose only
                                Swal.fire({
                                    text: "Menghapus " + customerName,
                                    icon: "info",
                                    buttonsStyling: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(function() {
                                    Swal.fire({
                                        text: "Data kategori " +
                                            customerName + " terhapus !.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, mengerti!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function() {
                                        window.location =
                                            `{{ url('/keranjang/hapus/') }}/${Id}`;
                                        dt.draw();
                                    });
                                });
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: "Kategori " + customerName +
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
                    handleDeleteRows();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>
@endpush
