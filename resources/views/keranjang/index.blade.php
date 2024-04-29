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
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Keranjang
                        Saya
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
            <div class="alert alert-info d-flex align-items-center p-5">

                <i class="ki-duotone ki-information-3 fs-2hx text-info me-4">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
                <!--end::Icon-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h4 class="mb-1 text-dark">Info Nomor Rekening</h4><br>
                    <p class="text-dark">
                        <strong>Nama Bank : BNI</strong> <br>
                        <strong>Nomor Rekening : 1234567890</strong> <br>
                        <strong>Atas Nama : Ahmad Supendi</strong> <br>
                    </p>
                    <!--end::Title-->

                    <!--begin::Content-->
                    {{-- <span>The alert component can be used to highlight certain parts of your page for higher content
                visibility.</span> --}}
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
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

                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                            <!--begin::Add customer-->
                            <a href="{{ url('pusatlangganan') }}" class="btn btn-primary">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Tambah Paket Lainnya
                            </a>
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-docs-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" title="Coming Soon">
                                Selection Action
                            </button>
                        </div>
                        <!--end::Group actions-->
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
                                <th>Harga</th>
                                <th class="text-end min-w-100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                </div>
            </div> --}}
            @if ($data->isEmpty())
                <div class="text-center">
                    <div class="alert alert-warning text-center mt-5 pt-5" role="alert">
                        <h1>Tidak Ada Item Dikeranjang</h1>
                    </div>
                    <a class="btn btn-primary btn-md text-center" href="{{ url('pusatlangganan') }}">Lihat Paket Sahabat
                        ASN</a>
                </div>
            @endif
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-sm-4 col-xxl-3 mb-3">
                        <!--begin::Card widget 14-->
                        <div class="card card-flush hl-100">
                            <!--begin::Body-->
                            <div class="card-body text-center pb-5">
                                <!--begin::Overlay-->
                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                    href="{{ asset('gambar/' . $item->paket->gambar . '') }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7"
                                        style="height: 266px;background-image:url('{{ asset('gambar/' . $item->paket->gambar . '') }}')">
                                    </div>
                                    <!--end::Image-->
                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="ki-outline ki-eye fs-3x text-white"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                                <!--end::Overlay-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-end flex-stack mb-1">
                                    <!--begin::Title-->
                                    <div class="text-start">
                                        <span
                                            class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{ $item->paket->judul }}</span>
                                        <span class="mt-1 fw-bold fs-6">@rupiah($item->paket->harga)</span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Total-->
                                    {{-- <span class="text-gray-600 text-end fw-bold fs-6">Rp. 130000</span> --}}
                                    <!--end::Total-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer flex-stack pt-0">
                                <!--begin::Link-->
                                <a onclick="getdata({{ $item->id }})" class="btn btn-sm btn-primary" href="#"
                                    data-bs-toggle="modal" data-bs-target="#edit">Bayar</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a data-id="{{ $item->id }}" data-nama="{{ $item->paket->judul }}"
                                    class="btn btn-sm btn-danger delete" href="#">Hapus</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end::Card widget 14-->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('keranjang.modaledit')
@endsection

@push('header')
    <link href="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
@endpush

@push('footer')
    <script src="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/widgets.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/custom/widgets.js"></script>

    <script type="text/javascript">
        $('.card-footer').on('click', '.delete', function() {
            let data = $(this).data()
            let Id = data.id
            let Nama = data.nama
            // console.log(Id);
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Hapus " + Nama + " dari keranjang?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = `{{ url('/keranjang/hapus/') }}/${Id}`;
                    }
                });
        })
    </script>
@endpush
