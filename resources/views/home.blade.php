@extends('layouts.master')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Alert-->
            <div class="alert alert-success d-flex align-items-center p-5">
                <!--begin::Icon-->
                <i class="ki-duotone ki-emoji-happy fs-2hx text-success me-4"><span class="path1"></span><span
                        class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                <!--end::Icon-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h4 class="mb-1 text-dark">Selamat datang kembali, <strong
                            class="text-primary">{{ Auth::user()->name }}</strong>! Ayo kita
                        bersama-sama
                        belajar dan persiapkan diri untuk sukses di ujian CPNS atau PPPK. Selamat belajar di Sahabat ASN!
                    </h4>
                    <!--end::Title-->

                    <!--begin::Content-->
                    {{-- <span>The alert component can be used to highlight certain parts of your page for higher content
                            visibility.</span> --}}
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Alert-->
            <div class="card">
                <div class="card-body py-4">
                    <h1>Informasi Tekini</h1>
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
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Isi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
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
                        [0, 'desc'] // Mengubah urutan berdasarkan kolom pertama (id) secara descending
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
                            data: 'id', // Menambahkan kolom id
                            visible: false // Menyembunyikan kolom id dari tampilan tabel
                        },
                        {
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart +
                                    1; // Mengubah penghitungan nomor baris agar dinamis sesuai halaman
                            }
                        },
                        {
                            data: 'tanggal'
                        },
                        {
                            data: 'judul'
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
