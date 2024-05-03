<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Edit Kategori</h2>
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
                <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ url('/paket/update') }}"
                    enctype="multipart/form-data">
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
                            <label class="d-block fw-semibold fs-6 mb-5">Gambar</label>
                            <!--end::Label-->
                            <!--begin::Image placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('assets/media/svg/files/blank-image.svg');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                }
                            </style>
                            <!--end::Image placeholder-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-placeholder @error('gambar') is-invalid @enderror"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url(assets/media/svg/files/blank-image.svg);">
                                </div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah avatar">
                                    <i class="ki-outline ki-pencil fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="gambar" accept=".png, .jpg, .jpeg" />
                                    {{-- <input type="hidden" name="avatar_remove" /> --}}
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Tipe file yang diperbolehkan : png, jpg, jpeg.
                            </div>
                            <!--end::Hint-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Nama Paket</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="judul" id="judul"
                                class="form-control form-control-solid mb-3 mb-lg-0 @error('judul') is-invalid @enderror"
                                placeholder="Nama Kategori" value="" />
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Waktu</label>
                            <input type="number" name="waktu" id="waktu"
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
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Harga Paket</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="harga" id="harga"
                                class="form-control form-control-solid mb-3 mb-lg-0 @error('harga') is-invalid @enderror"
                                placeholder="harga" value="" />
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Sub Ketegori</label>
                            <select class="form-select form-select-solid @error('subkategori_id') is-invalid @enderror"
                                data-hide-search="true" data-placeholder="-- Pilih Kategori --" name="subkategori_id"
                                id="subkategori_id">
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
        var url = '{{ url('/paket/getdata') }}' + '/' + id
        // console.log(url);

        $.ajax({
            url: url,
            cache: false,
            success: function(response) {
                console.log(response);
                $('#id').val(response.id);
                $('#judul').val(response.judul);
                $('#harga').val(response.harga);
                $('#waktu').val(response.waktu);
                $('#subkategori_id').val(response.subkategori_id);

                $.ajax({
                    url: 'http://localhost:8000/gambar/' + response.gambar + '',
                    type: 'HEAD',
                    error: function() {
                        console.log('woi tak ada data')
                        const file = "" + response.gambar + "";
                        if (response.gambar !== null) {
                            if (response.gambar !== null) {
                                $('.image-input-wrapper').css('background-image', 'url(' +
                                    file +
                                    ')');
                                $('#gambar').val(response.gambar);
                            } else {
                                $('.image-input-wrapper').css('background-image', 'url(' +
                                    file +
                                    ')');
                                $('#gambar').val(response.gambar);
                            }
                        }
                    },
                    success: function() {
                        console.log('woi ada data')
                        const file = "gambar/" + response.gambar + "";
                        if (response.gambar !== null) {
                            if (response.gambar !== null) {
                                $('.image-input-wrapper').css('background-image', 'url(' +
                                    file +
                                    ')');
                                $('#gambar').val(response.gambar);
                            } else {
                                $('.image-input-wrapper').css('background-image', 'url(' +
                                    file +
                                    ')');
                                $('#gambar').val(response.gambar);
                            }
                        }
                    }
                });

            }
        });
    }
</script>
