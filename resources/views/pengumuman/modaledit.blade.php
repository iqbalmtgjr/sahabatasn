<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Edit Pengumuman</h2>
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
                <form id="kt_modal_add_user_form" class="form" method="POST"
                    action="{{ url('/pengumuman/update') }}">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <input type="hidden" name="id" id="id">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Judul</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="judul" id="judul"
                                class="form-control form-control-solid mb-3 mb-lg-0 @error('judul') is-invalid @enderror"
                                placeholder="Judul" value="" />
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Tanggal</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" name="tanggal" id="tanggal"
                                class="form-control form-control-solid mb-3 mb-lg-0 @error('tanggal') is-invalid @enderror"
                                placeholder="Tanggal" value="">
                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Isi</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="isi" id="isi"
                                class="form-control form-control-solid mb-3 mb-lg-0 @error('isi') is-invalid @enderror" placeholder="Isi"
                                value=""></textarea>
                            @error('isi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Simpan</span>
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
<script>
    function getdata(id) {
        // console.log(id)
        var url = '{{ url('/pengumuman/getdata') }}' + '/' + id
        // console.log(url);

        $.ajax({
            url: url,
            cache: false,
            success: function(response) {
                console.log(response);
                $('#id').val(response.id);
                $('#judul').val(response.judul);
                $('#tanggal').val(response.tanggal);
                $('#isi').val(response.isi);
            }
        });
    }
</script>
