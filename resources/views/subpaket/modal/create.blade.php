<div class="modal fade" id="kt_modal_add_paket" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Tambah Sub Paket</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ url('/subpaket/input') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Judul</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="judul"
                                class="form-control form-control-solid mb-3 mb-lg-0 @error('judul') is-invalid @enderror"
                                placeholder="Judul" value="{{ old('judul') }}" />
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Waktu</label>
                            <input type="number" name="waktu"
                                class="form-control form-control-solid mb-3 mb-lg-0 @error('waktu') is-invalid @enderror"
                                placeholder="Contoh: 20" value="{{ old('waktu') }}" />
                            <p class="text-info">Dalam Menit</p>
                            @error('waktu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Sub Ketegori</label>
                            <select data-control="select2"
                                class="form-select form-select-solid @error('subkategori_id') is-invalid @enderror"
                                data-hide-search="true" data-placeholder="-- Pilih Kategori --" name="subkategori_id">
                                <option value=""></option>
                                @foreach ($subkategori as $item)
                                    <option value="{{ $item->id }}" @selected(old('subkategori_id') == $item->id)>
                                        {{ $item->sub_kategori }}</option>
                                @endforeach
                            </select>
                            @error('subkategori_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@push('footer')
    <script>
        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_localization"), {
            localization: {
                locale: "id",
                startOfTheWeek: 1,
                format: "dd/MM/yyyy"
            }
        });
    </script>
@endpush
