<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">Edit Sub Kategori</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ url('/subpaket/update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" name="id" id="id">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Nama Paket</label>
                            <input type="text" name="judul" id="judul"
                                class="form-control form-control-solid mb-3 mb-lg-0 @error('judul') is-invalid @enderror"
                                placeholder="Nama Kategori" value="" />
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
@push('footer')
    <script>
        function getdata(id) {
            // console.log(id)
            var url = '{{ url('/subpaket/getdata') }}' + '/' + id
            // console.log(url);

            $.ajax({
                url: url,
                cache: false,
                success: function(response) {
                    console.log(response);
                    $('#id').val(response.id);
                    $('#judul').val(response.judul);
                    $('#waktu').val(response.waktu);
                    $('#subkategori_id').val(response.subkategori_id);
                }
            });
        }
    </script>
@endpush
