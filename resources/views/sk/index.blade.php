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
											<h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Syarat dan Ketentuan</h1>
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
									<!--begin::About card-->
									<div class="card">
										<!--begin::Body-->
										<div class="card-body p-5 px-lg-19 py-lg-16">
											<!--begin::Content main-->
											<div class="mb-14">
												<!--begin::Heading-->
												<div class="mb-15">
													<!--begin::Title-->
													<h1 class="fs-2x text-dark mb-6">Kebijakan Perusahaan</h1>
													<!--end::Title-->
													<!--begin::Text-->
													<div class="fs-5 text-gray-600 fw-semibold">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>
													<!--end::Text-->
												</div>
												<!--end::Heading-->
												<!--begin::Body-->
												
												<!--begin::Block-->
												<div class="mb-20 pb-lg-20">
													<!--begin::Title-->
													<h2 class="fw-bold text-dark mb-8">Regular License:</h2>
													<!--end::Title-->
													<!--begin::List-->
													<ul class="fs-4 fw-semibold mb-6">
														<li>
															<span class="text-gray-700">E-commerce site</span>
														</li>
														<li class="my-2">
															<span class="text-gray-700">Company business activity dashboard</span>
														</li>
														<li>
															<span class="text-gray-700">Customer support center</span>
														</li>
													</ul>
													<!--end::List-->
													<!--begin::Text-->
													<div class="fs-4 fw-semibold text-gray-700 mb-13">If users can free browse and use your website or Admin Panel is used only as interface(eCommerce site) to sell other's products you can use Regular license.
													<br />If you are going to use the item on one domain and multiple subdomains, you only require one Licence.(ex: www.
													<span class="text-dark">domain.com</span>/site1 – site2.
													<span class="text-dark">domain.com</span>– site.3.
													<span class="text-dark">domain.com</span>).</div>
													<!--end::Text-->
													<!--begin::Title-->
													<h2 class="fw-bold text-dark mb-7">Multisite License:</h2>
													<!--end::Title-->
													<!--begin::List-->
													<ul>
														<li>
															<span class="fs-4 fw-semibold text-gray-700">It works the same as the Standard License, but you can use it in unlimited count of projects.</span>
														</li>
													</ul>
													<!--end::List-->
													<!--begin::Text-->
													<div class="fs-4 fw-semibold text-gray-700 mb-13">If users can free browse and use your website is used only as interface(eCommerce site) to sell other's products you can use Regular license. if you are going to use the item on multiple domains, then you will need to purchase a Licence for each domain or buy Multisite License.
													<br />(ex: www.domain-site-
													<span class="text-dark">one.com</span>– www.domain-site.
													<span class="text-dark">two.com</span>– www.site-three-
													<span class="text-dark">domain.com</span>).</div>
													<!--end::Text-->
													<!--begin::Title-->
													<h2 class="fw-bold text-dark mb-8">Extended License:</h2>
													<!--end::Title-->
													<!--begin::List-->
													<ul class="fs-4 fw-semibold mb-6">
														<li>
															<span class="text-gray-700">SaaS projects</span>
														</li>
														<li class="my-2">
															<span class="text-gray-700">Photo stock with PRO subscription</span>
														</li>
														<li>
															<span class="text-gray-700">Cloud service with paid plans</span>
														</li>
													</ul>
													<!--end::List-->
													<!--begin::Text-->
													<div class="fs-4 fw-semibold text-gray-700">E-commerce site Company business activity dashboard Customer support center If users can free browse and use your website is used only as interface(eCommerce site) to sell other's products you can use Regular license. If you are going to use the item on one domain and multiple subdomains, you only require one Licence . (ex: www.domain.com/site1 – site2.domain.com – site.3.domain.com).</div>
													<!--end::Text-->
												</div>
												<!--end::Block-->
												<!--end::Body-->
											</div>
											<!--end::Content main-->
											
										</div>
										<!--end::Body-->
									</div>
									<!--end::About card-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
@endsection
