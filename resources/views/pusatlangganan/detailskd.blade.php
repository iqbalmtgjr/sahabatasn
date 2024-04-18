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
            <div class="row g-10">
                <!--begin::Col-->
                <div class="col-md-4">
                    <!--begin::Hot sales post-->
                    <div class="card-xl-stretch mx-md-3">
                        <!--begin::Overlay-->
                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="assets/media/stock/600x600/img-14.jpg">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px" style="background-image:url('assets/media/stock/600x600/img-14.jpg')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="ki-outline ki-eye fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                        <!--end::Overlay-->
                        <!--begin::Body-->
                        <div class="mt-5">
                            <!--begin::Title-->
                            <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">25 Products Mega Bundle with 50% off discount amazing</a>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">We’ve been focused on making a the from also not been eye</div>
                            <!--end::Text-->
                            <!--begin::Text-->
                            <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                <!--begin::Label-->
                                <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                                <span class="fs-6 fw-semibold text-gray-400">$</span>27</span>
                                <!--end::Label-->
                                <!--begin::Action-->
                                <a href="#" class="btn btn-sm btn-primary">Purchase</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Hot sales post-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4">
                    <!--begin::Hot sales post-->
                    <div class="card-xl-stretch ms-md-6">
                        <!--begin::Overlay-->
                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="assets/media/stock/600x400/img-71.jpg">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px" style="background-image:url('assets/media/stock/600x400/img-71.jpg')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="ki-outline ki-eye fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                        <!--end::Overlay-->
                        <!--begin::Body-->
                        <div class="mt-5">
                            <!--begin::Title-->
                            <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">25 Products Mega Bundle with 50% off discount amazing</a>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">We’ve been focused on making a the from also not been eye</div>
                            <!--end::Text-->
                            <!--begin::Text-->
                            <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                <!--begin::Label-->
                                <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                                <span class="fs-6 fw-semibold text-gray-400">$</span>25</span>
                                <!--end::Label-->
                                <!--begin::Action-->
                                <a href="#" class="btn btn-sm btn-primary">Purchase</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Hot sales post-->
                </div>
                <!--end::Col-->
            </div>
        </div>
        <!--end::Content container-->
	<!--end::Content-->
</div>
@endsection