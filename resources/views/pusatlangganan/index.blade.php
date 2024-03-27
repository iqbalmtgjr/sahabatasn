@extends('layouts.master')

@section('content')
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
									<!--begin::Toolbar wrapper-->
									<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
										<!--begin::Page title-->
										<div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
											<!--begin::Title-->
											<h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Pusat Langganan</h1>
											<!--end::Title-->
											<!--begin::Breadcrumb-->
											<!--end::Breadcrumb-->
										</div>
										<!--end::Page title-->
										<!--begin::Actions-->
										<!-- <div class="d-flex align-items-center gap-2 gap-lg-3">
											<a href="#" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">Add Member</a>
											<a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">New Campaign</a>
										</div> -->
										<!--end::Actions-->
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
									<!--begin::Post card-->
									<div class="card">
										<!--begin::Body-->
										<div class="card-body p-lg-5 pb-lg-0">
											<!--begin::Section-->
											<div class="mb-17">
												<!--begin::Row-->
												<div class="row g-10">
													@foreach ($data as $item)
													<!--begin::Col-->
													<div class="col-md-4">
														<!--begin::Hot sales post-->
														<div class="card-xl-stretch me-md-6">
															<!--begin::Overlay-->
															<a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{ asset('') . 'gambar/' . $item->gambar}}">
																<!--begin::Image-->
																<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px" style="background-image:url('{{ asset('') . 'gambar/' . $item->gambar}}')"></div>
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
																	<a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">{{$item->judul}}</a>
																	<!--end::Title-->
																	<!--begin::Text-->
																	<div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">Gratis Tryout</div>
																	<!--end::Text-->
																	<!--begin::Text-->
																	<div class="fs-6 fw-bold mt-5 d-flex flex-stack">
																		<!--begin::Label-->
																		<span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
																		@rupiah($item->harga)</span>
																		<!--end::Label-->
																		<!--begin::Action-->
																		<a href="{{ url('keranjang/'.$item->id.'') }}" class="btn btn-sm btn-primary">Beli</a>
																		<!--end::Action-->
																	</div>
																	<!--end::Text-->
																</div>															
															<!--end::Body-->
														</div>
														<!--end::Hot sales post-->
													</div>
													@endforeach
													<!--end::Col-->
												</div>
												<!--end::Row-->
											</div>
											<!--end::Section-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Post card-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
@endsection