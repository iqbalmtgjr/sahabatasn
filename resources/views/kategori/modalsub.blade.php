<div class="modal fade" id="sub" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Tambah Sub Kategori</h2>
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
                <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ url('kategori/sub') }}"
                    onsubmit="event.preventDefault(); submitForm();">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <input type="hidden" name="id" id="kategori_id">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Nama Sub Kategori</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="sub_kategori" id="sub_kategori"
                                class="form-control form-control-solid mb-3 mb-lg-0 @error('sub_kategori') is-invalid @enderror"
                                placeholder="Nama Sub Kategori" value="" />
                            @error('sub_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Input-->
                        </div>
                        <!-- Tempatkan di sini agar enak dipandang -->
                        <div id="sub_kategori_list" class="table-responsive fv-row mb-4"></div>
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
    function submitForm() {
        var form = document.getElementById('kt_modal_add_user_form');
        var formData = new FormData(form);
        var urll = form.getAttribute('action');

        fetch(urll, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
            .then(response => response.json())
            .then(data => {
                // Tampilkan pesan sukses
                toastr.success('Sub Kategori berhasil ditambah', 'Sukses');
                // Muat ulang data sub kategori
                getdatasub($('#kategori_id').val());
                // Kosongkan field input sub kategori
                $('#sub_kategori').val('');
            })
            .catch(error => console.error('Error:', error));
    }
</script>
<script>
    function getdatasub(id) {
        // console.log(id);
        var url = '{{ url('/kategori/getdatasub') }}' + '/' + id;

        $.ajax({
            url: url,
            method: 'GET',
            cache: false,
            success: function(response) {
                console.log(response.sub_kategori[0].kategori_id);
                $('#kategori_id').val(response.sub_kategori[0].kategori_id);
                // Tampilkan data sub kategori
                var subKategoriList = '';
                if (response.sub_kategori && response.sub_kategori.length > 0) {
                    subKategoriList += '<table class="table table-striped">';
                    subKategoriList +=
                        '<thead><tr><th>No</th><th>Sub Kategori</th><th>Aksi</th></tr></thead>';
                    subKategoriList += '<tbody>';
                    response.sub_kategori.forEach(function(sub, index) {
                        subKategoriList += '<tr><td>' + (index + 1) + '</td><td>' + sub
                            .sub_kategori + '</td>';
                        subKategoriList +=
                            '<td><a class="text-danger" href="#" onclick="hapusSubKategori(' + sub
                            .id + ')">Hapus</a></td></tr>';
                    });
                    subKategoriList += '</tbody></table>';
                } else {
                    subKategoriList = '<div>Tidak ada sub kategori</div>';
                }
                $('#sub_kategori_list').html(subKategoriList);
            }
        });
    }

    function hapusSubKategori(id) {
        var url = '{{ url('/kategori/hapusSubKategori') }}' + '/' + id;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                toastr.success('Sub Kategori berhasil dihapus', 'Sukses');
                // Muat ulang data sub kategori
                getdatasub($('#kategori_id').val());
            },
            error: function(error) {
                toastr.error('Gagal menghapus sub kategori', 'Error');
            }
        });
    }
</script>
