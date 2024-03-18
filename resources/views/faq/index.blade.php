@extends('layouts.master')

@section('content')
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
											<h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Frequesntly Asked Questions</h1>
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
									<!--begin::FAQ card-->
									<div class="card">
										<!--begin::Body-->
										<div class="card-body p-lg-15">
											<!--begin::Classic content-->
											<div class="mb-13">
												<!--begin::Intro-->
												<!-- <div class="mb-15"> -->
													<!--begin::Title-->
													<!-- <h4 class="fs-2x text-gray-800 w-bolder mb-6">Frequesntly Asked Questions</h4> -->
													<!--end::Title-->
													<!--begin::Text-->
													<!-- <p class="fw-semibold fs-4 text-gray-600 mb-2">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</p> -->
													<!--end::Text-->
												<!-- </div> -->
												<!--end::Intro-->
												<!--begin::Row-->
												<div class="row mb-12">
													<!--begin::Col-->
													<div class="col-md-6 pe-md-10 mb-10 mb-md-0">
														<!--begin::Title-->
														<h2 class="text-gray-800 fw-bold mb-4">Buying Product</h2>
														<!--end::Title-->
														<!--begin::Accordion-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How does it work?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_4_1" class="collapse show fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_2">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Do I need a designer to use Admin Theme ?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_4_2" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_3">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">What do I need to do to start selling?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_4_3" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_4_4">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How much does Extended license cost?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_4_4" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
														</div>
														<!--end::Section-->
														<!--end::Accordion-->
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="col-md-6 ps-md-10">
														<!--begin::Title-->
														<h2 class="text-gray-800 fw-bold mb-4">Installation</h2>
														<!--end::Title-->
														<!--begin::Accordion-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_1">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">What platforms are compatible?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_5_1" class="collapse show fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_2">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How many people can it support?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_5_2" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_3">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How long is the warrianty?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_5_3" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_5_4">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How fast is the installation?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_5_4" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
														</div>
														<!--end::Section-->
														<!--end::Accordion-->
													</div>
													<!--end::Col-->
												</div>
												<!--end::Row-->
												<!--begin::Row-->
												<div class="row">
													<!--begin::Col-->
													<div class="col-md-6 pe-md-10 mb-10 mb-md-0">
														<!--begin::Title-->
														<h2 class="text-gray-800 w-bolder mb-4">User Roles</h2>
														<!--end::Title-->
														<!--begin::Accordion-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_6_1">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How does it work?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_6_1" class="collapse show fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_6_2">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">Do I need a designer to use this Admin Theme?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_6_2" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_6_3">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">What do I need to do to start selling?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_6_3" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_6_4">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How much does Extended license cost?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_6_4" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
														</div>
														<!--end::Section-->
														<!--end::Accordion-->
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="col-md-6 ps-md-10">
														<!--begin::Title-->
														<h2 class="text-gray-800 fw-bold mb-4">Reports Generation</h2>
														<!--end::Title-->
														<!--begin::Accordion-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_7_1">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">What platforms are compatible?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_7_1" class="collapse show fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_7_2">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How many people can it support?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_7_2" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_7_3">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How long is the warrianty?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_7_3" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
															<!--begin::Separator-->
															<div class="separator separator-dashed"></div>
															<!--end::Separator-->
														</div>
														<!--end::Section-->
														<!--begin::Section-->
														<div class="m-0">
															<!--begin::Heading-->
															<div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_7_4">
																<!--begin::Icon-->
																<div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
																	<i class="ki-outline ki-minus-square toggle-on text-primary fs-1"></i>
																	<i class="ki-outline ki-plus-square toggle-off fs-1"></i>
																</div>
																<!--end::Icon-->
																<!--begin::Title-->
																<h4 class="text-gray-700 fw-bold cursor-pointer mb-0">How fast is the installation?</h4>
																<!--end::Title-->
															</div>
															<!--end::Heading-->
															<!--begin::Body-->
															<div id="kt_job_7_4" class="collapse fs-6 ms-1">
																<!--begin::Text-->
																<div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
																<!--end::Text-->
															</div>
															<!--end::Content-->
														</div>
														<!--end::Section-->
														<!--end::Accordion-->
													</div>
													<!--end::Col-->
												</div>
												<!--end::Row-->
											</div>
											<!--end::Classic content-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::FAQ card-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
@endsection
