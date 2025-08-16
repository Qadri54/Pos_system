<x-custom_component.management_layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h1 class="mb-2">
                    <i class="bi bi-plus-circle-fill me-3"></i>
                    Tambah Outlet Baru
                </h1>
                <p class="mb-0">Buat outlet baru untuk mengembangkan bisnis Anda</p>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('outlets.index') }}" class="btn btn-light text-primary fw-bold">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Main Form -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-plus-circle me-2"></i>
                        Form Outlet Baru
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('outlets.store') }}" method="POST" id="createOutletForm" class="row g-4">
                        @csrf

                        <div class="col-12">
                            <label for="outlet_name" class="form-label fw-bold">
                                <i class="bi bi-building me-1"></i>
                                Nama Outlet <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('outlet_name') is-invalid @enderror"
                                id="outlet_name" name="outlet_name" value="{{ old('outlet_name') }}"
                                placeholder="Masukkan nama outlet" required>
                            @error('outlet_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                Nama outlet akan ditampilkan dalam sistem dan laporan
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label fw-bold">
                                <i class="bi bi-geo-alt me-1"></i>
                                Alamat Outlet <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" rows="4" placeholder="Masukkan alamat lengkap outlet"
                                required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-geo-alt me-1"></i>
                                Masukkan alamat lengkap dengan detail jalan, nomor, kota, dan kode pos
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="alert alert-info border-0" role="alert">
                                <i class="bi bi-lightbulb me-2"></i>
                                <strong>Tips:</strong> Pastikan nama outlet mudah diingat dan alamat lengkap untuk
                                memudahkan operasional.
                                Staff yang dipilih akan memiliki akses ke outlet ini.
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('outlets.index') }}" class="btn btn-light">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Batal
                                </a>
                                <button type="button" class="btn btn-primary-modern" onclick="previewData()">
                                    <i class="bi bi-eye me-1"></i>
                                    Preview
                                </button>
                                <button type="submit" class="btn btn-success-modern">
                                    <i class="bi bi-plus-circle me-1"></i>
                                    Buat Outlet
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="col-lg-4">
            <!-- Tips Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle p-3 me-3"
                            style="background: linear-gradient(135deg, #4f46e5, #7c3aed);">
                            <i class="bi bi-lightbulb text-white"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Tips Sukses</h6>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <small>Gunakan nama yang mudah diingat</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <small>Alamat harus lengkap dan jelas</small>
                        </li>
                        <li class="mb-0">
                            <i class="bi bi-check-circle text-success me-2"></i>
                            <small>Pilih staff yang berpengalaman</small>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Features Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle p-3 me-3"
                            style="background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="bi bi-star text-white"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Fitur Outlet</h6>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="bi bi-arrow-right text-primary me-2"></i>
                            <small>Manajemen inventori terpisah</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-arrow-right text-primary me-2"></i>
                            <small>Laporan penjualan per outlet</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-arrow-right text-primary me-2"></i>
                            <small>Kontrol akses staff</small>
                        </li>
                        <li class="mb-0">
                            <i class="bi bi-arrow-right text-primary me-2"></i>
                            <small>Notifikasi real-time</small>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle p-3 me-3"
                            style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                            <i class="bi bi-graph-up text-white"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Statistik Sistem</h6>
                    </div>
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="fw-bold text-primary fs-4">{{ \App\Models\Outlet::count() }}</div>
                            <small class="text-muted">Total Outlet</small>
                        </div>
                        <div class="col-6">
                            <div class="fw-bold text-success fs-4">{{ \App\Models\User::count() }}</div>
                            <small class="text-muted">Total Staff</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">
                        <i class="bi bi-eye me-2"></i>
                        Preview Data Outlet
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold text-primary mb-3">Informasi Outlet</h6>
                            <div class="mb-3">
                                <small class="text-muted d-block">Nama Outlet</small>
                                <div class="fw-semibold" id="preview-name"></div>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted d-block">Alamat</small>
                                <div id="preview-address"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold text-primary mb-3">Staff yang Dipilih</h6>
                            <div id="preview-users"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success-modern" onclick="submitForm()">
                        <i class="bi bi-check-circle me-2"></i>
                        Buat Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- CDN untuk Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize Select2
            $('#user_id').select2({
                placeholder: 'Pilih staff untuk outlet...',
                allowClear: true,
                closeOnSelect: false
            });

            // Form validation
            $('#createOutletForm').on('submit', function (e) {
                e.preventDefault();
                if (validateForm()) {
                    const submitBtn = this.querySelector('button[type="submit"]');
                    submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-1"></i>Menyimpan...';
                    submitBtn.disabled = true;
                    this.submit();
                }
            });
        });

        function validateForm() {
            let isValid = true;

            // Validate outlet name
            const outletName = $('#outlet_name').val().trim();
            if (outletName === '') {
                showFieldError('outlet_name', 'Nama outlet harus diisi');
                isValid = false;
            } else if (outletName.length < 3) {
                showFieldError('outlet_name', 'Nama outlet minimal 3 karakter');
                isValid = false;
            } else {
                clearFieldError('outlet_name');
            }

            // Validate address
            const address = $('#address').val().trim();
            if (address === '') {
                showFieldError('address', 'Alamat harus diisi');
                isValid = false;
            } else if (address.length < 10) {
                showFieldError('address', 'Alamat minimal 10 karakter');
                isValid = false;
            } else {
                clearFieldError('address');
            }

            return isValid;
        }

        function showFieldError(fieldId, message) {
            const field = $('#' + fieldId);
            field.addClass('is-invalid');
            field.siblings('.invalid-feedback').remove();
            field.after(`<div class="invalid-feedback">${message}</div>`);
        }

        function clearFieldError(fieldId) {
            const field = $('#' + fieldId);
            field.removeClass('is-invalid');
            field.siblings('.invalid-feedback').remove();
        }

        function previewData() {
            const outletName = $('#outlet_name').val() || 'Tidak ada nama';
            const address = $('#address').val() || 'Tidak ada alamat';
            const selectedUsers = $('#user_id').select2('data');

            // Update preview content
            $('#preview-name').text(outletName);
            $('#preview-address').text(address);

            // Update users preview
            let usersHtml = '';
            if (selectedUsers.length > 0) {
                selectedUsers.forEach(user => {
                    usersHtml += `
                        <div class="d-flex align-items-center mb-2">
                            <div class="rounded-circle p-2 me-3" style="background: linear-gradient(135deg, #4f46e5, #7c3aed); width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-person text-white"></i>
                            </div>
                            <div>
                                <div class="fw-semibold">${user.text.split(' (')[0]}</div>
                                <small class="text-muted">${user.text.split(' (')[1]?.replace(')', '') || ''}</small>
                            </div>
                        </div>
                    `;
                });
            } else {
                usersHtml = `
                    <div class="text-center text-muted py-3">
                        <i class="bi bi-people fs-1 opacity-50"></i>
                        <p class="mb-0 mt-2">Belum ada staff dipilih</p>
                    </div>
                `;
            }
            $('#preview-users').html(usersHtml);

            // Show modal
            var modal = new bootstrap.Modal(document.getElementById('previewModal'));
            modal.show();
        }

        function submitForm() {
            if (validateForm()) {
                $('#createOutletForm')[0].submit();
            }
        }
    </script>
</x-custom_component.management_layout>
