@extends('layouts.master')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Toolbar-->
	<div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
		<!--begin::Toolbar container-->
		{{-- <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
			<!--begin::Toolbar wrapper-->
			<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
				<!--begin::Page title-->
				<div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
					<!--begin::Title-->
					<h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Mixed</h1>
					<!--end::Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">
							<a href="../../demo38/dist/index.html" class="text-muted text-hover-primary">Home</a>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">Pages</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">Widgets</li>
						<!--end::Item-->
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page title-->
				<!--begin::Actions-->
				<div class="d-flex align-items-center gap-2 gap-lg-3">
					<a href="#" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">Add Member</a>
					<a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">New Campaign</a>
				</div>
				<!--end::Actions-->
			</div>
			<!--end::Toolbar wrapper-->
		</div> --}}
		<!--end::Toolbar container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Content-->
	
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-8">
                <div class="col-xl-4">
                    <!--begin::Statistics Widget 2-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                <a href="#" class="fw-bold text-dark fs-2 mb-2 text-hover-primary">Rp. 130.000</a>
                                <span class="fw-semibold text-muted fs-5">SKB Guru</span>
                            </div>
                            <img src="assets/media/svg/avatars/guru.png" alt="" class="align-self-end h-100px">
                        </div>
						<div class="pt-5">
							{{-- <p class="text-center fs-6 pb-5">
							<span class="badge badge-light-danger fs-8">Notes:</span>&nbsp; Current sprint requires stakeholders
							<br>to approve newly amended policies</p> --}}
							<a href="#" class="btn btn-primary w-100 py-3">Beli</a>
						</div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 2-->
                </div>
				<div class="col-xl-4">
                    <!--begin::Statistics Widget 2-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center pt-3 pb-0">
                            <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                <a href="#" class="fw-bold text-dark fs-2 mb-2 text-hover-primary">Rp. 130.000</a>
                                <span class="fw-semibold text-muted fs-5">SKB Guru</span>
                            </div>
                            <img src="assets/media/svg/avatars/dokter.png" alt="" class="align-self-end h-100px">
                        </div>
						<div class="pt-5">
							{{-- <p class="text-center fs-6 pb-5">
							<span class="badge badge-light-danger fs-8">Notes:</span>&nbsp; Current sprint requires stakeholders
							<br>to approve newly amended policies</p> --}}
							<a href="#" class="btn btn-primary w-100 py-3">Beli</a>
						</div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 2-->
                </div>
            </div>
        </div>
        <!--end::Content container-->
	<!--end::Content-->
</div>
@endsection