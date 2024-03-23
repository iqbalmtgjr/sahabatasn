<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Tambah Soal</h2>
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
                <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ url('/bank-soal/input') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Pertanyaan</h4>
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Soal</label>
                                    <input type="text" name="soal"
                                        class="form-control form-control-solid mb-3 mb-lg-0 @error('soal') is-invalid @enderror"
                                        placeholder="Masukkan soal" value="{{ old('soal') }}" />
                                    @error('soal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Ketegori</label>
                                    <select data-control="select2"
                                        class="form-select form-select-solid @error('kategori') is-invalid @enderror"
                                        data-hide-search="true" data-placeholder="-- Pilih Kategori --" name="kategori"
                                        id="">
                                        <option value=""></option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}" @selected(old('kategori') == $item->id)>
                                                {{ $item->kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Tipe</label>
                                    <select data-control="select2"
                                        class="form-select form-select-solid @error('tipe') is-invalid @enderror"
                                        data-hide-search="true" data-placeholder="-- Pilih Tipe --" name="tipe"
                                        id="">
                                        <option value=""></option>
                                        <option value="Berbayar" @selected(old('tipe') == 'Berbayar')>Berbayar</option>
                                        <option value="Gratis" @selected(old('tipe') == 'Gratis')>Gratis</option>
                                    </select>
                                    @error('tipe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
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
                                    <div class="image-input image-input-outline image-input-placeholder"
                                        data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url(assets/media/svg/files/blank-image.svg);">
                                        </div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Tambah Gambar Soal">
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
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                    <!--begin::Hint-->
                                    <div class="form-text">Tipe file yang diperbolehkan : png, jpg, jpeg.
                                    </div>
                                    <!--end::Hint-->
                                    @error('gambar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Pilihan</h4>
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Pilihan A</label>
                                            <input type="text" name="pilihan_a"
                                                class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_a') is-invalid @enderror"
                                                placeholder="Masukkan pilihan A" value="{{ old('pilihan_a') }}" />
                                            @error('pilihan_a')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Jawaban A</label>
                                            <select data-control="select2"
                                                class="form-select form-select-solid @error('jawaban_a') is-invalid @enderror"
                                                data-hide-search="true" data-placeholder="-- Pilih Jawaban --"
                                                name="jawaban_a">
                                                <option value=""></option>
                                                <option value="1" @selected(old('jawaban_a') == '1')>Benar</option>
                                                <option value="0" @selected(old('jawaban_a') == '0')>Salah</option>
                                            </select>
                                            @error('jawaban_a')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Pilihan B</label>
                                            <input type="text" name="pilihan_b"
                                                class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_b') is-invalid @enderror"
                                                placeholder="Masukkan pilihan B" value="{{ old('pilihan_b') }}" />
                                            @error('pilihan_b')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Jawaban B</label>
                                            <select data-control="select2"
                                                class="form-select form-select-solid @error('jawaban_b') is-invalid @enderror"
                                                data-hide-search="true" data-placeholder="-- Pilih Jawaban --"
                                                name="jawaban_b">
                                                <option value=""></option>
                                                <option value="1" @selected(old('jawaban_b') == '1')>Benar</option>
                                                <option value="0" @selected(old('jawaban_b') == '0')>Salah</option>
                                            </select>
                                            @error('jawaban_b')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Pilihan C</label>
                                            <input type="text" name="pilihan_c"
                                                class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_c') is-invalid @enderror"
                                                placeholder="Masukkan pilihan C" value="{{ old('pilihan_c') }}" />
                                            @error('pilihan_c')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Jawaban C</label>
                                            <select data-control="select2"
                                                class="form-select form-select-solid @error('jawaban_c') is-invalid @enderror"
                                                data-hide-search="true" data-placeholder="-- Pilih Jawaban --"
                                                name="jawaban_c">
                                                <option value=""></option>
                                                <option value="1" @selected(old('jawaban_c') == '1')>Benar</option>
                                                <option value="0" @selected(old('jawaban_c') == '0')>Salah</option>
                                            </select>
                                            @error('jawaban_c')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Pilihan D</label>
                                            <input type="text" name="pilihan_d"
                                                class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_d') is-invalid @enderror"
                                                placeholder="Masukkan pilihan D" value="{{ old('pilihan_d') }}" />
                                            @error('pilihan_d')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Jawaban D</label>
                                            <select data-control="select2"
                                                class="form-select form-select-solid @error('jawaban_d') is-invalid @enderror"
                                                data-hide-search="true" data-placeholder="-- Pilih Jawaban --"
                                                name="jawaban_d">
                                                <option value=""></option>
                                                <option value="1" @selected(old('jawaban_d') == '1')>Benar</option>
                                                <option value="0" @selected(old('jawaban_d') == '0')>Salah</option>
                                            </select>
                                            @error('jawaban_d')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Pilihan E</label>
                                            <input type="text" name="pilihan_e"
                                                class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_e') is-invalid @enderror"
                                                placeholder="Masukkan pilihan E" value="{{ old('pilihan_e') }}" />
                                            @error('pilihan_e')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required fw-semibold fs-6 mb-2">Jawaban E</label>
                                            <select data-control="select2"
                                                class="form-select form-select-solid @error('jawaban_e') is-invalid @enderror"
                                                data-hide-search="true" data-placeholder="-- Pilih Jawaban --"
                                                name="jawaban_e">
                                                <option value=""></option>
                                                <option value="1" @selected(old('jawaban_e') == '1')>Benar</option>
                                                <option value="0" @selected(old('jawaban_e') == '0')>Salah</option>
                                            </select>
                                            @error('jawaban_e')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!--end::Input group-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="fv-row mb-7">
                                <label class="required fw-semibold fs-6 mb-2">Pembahasan</label>
                                <textarea class="form-control form-control-solid mb-3 mb-lg-0  @error('pembahasan') is-invalid @enderror"
                                    name="pembahasan" cols="30" rows="10">{{ old('pembahasan') }}</textarea>
                                @error('pembahasan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
