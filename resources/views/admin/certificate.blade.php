@extends('app')
@section('title')
    Sertifikat Vaksin
@endsection
@section('title_header')
    Sertifikat Vaksin
@endsection
@section('breadcrumbs')
    <li class="active">Sertifikat Vaksin</li>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush
@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary" id="btnAdd">
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
        </div>
        <div class="box-body">
           <div class="table-responsive">
             <table id="certificateTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pasien</th>
                        <th>Nama Vaksin</th>
                        <th>Tanggal Mulai</th>
                        <th>Dokter</th>
                        <th>No Batch</th>
                        <th>Tanggal Kadaluarsa</th>
                        <th>Booster Berikutnya</th>
                        <th>Target Penyakit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
           </div>
        </div>
        <div class="box-footer"></div>
    </div>

    <!-- Modal Add/Edit -->
    <div class="modal fade" id="certificateModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="modalTitle">Tambah Sertifikat Vaksin</h4>
                </div>
                <form id="certificateForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_biodata">Pasien <span class="text-red">*</span></label>
                                    <select class="form-control" id="id_biodata" name="id_biodata" required>
                                        <option value="">Pilih Pasien</option>
                                    </select>
                                    <span class="help-block text-red" id="id_biodata_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vaccine_name">Nama Vaksin</label>
                                    <input type="text" class="form-control" id="vaccine_name" name="vaccine_name">
                                    <span class="help-block text-red" id="vaccine_name_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Tanggal Mulai <span class="text-red">*</span></label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                    <span class="help-block text-red" id="start_date_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="docter">Dokter</label>
                                    <input type="text" class="form-control" id="docter" name="docter">
                                    <span class="help-block text-red" id="docter_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batch_number">Nomor Batch</label>
                                    <input type="text" class="form-control" id="batch_number" name="batch_number">
                                    <span class="help-block text-red" id="batch_number_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expired_date">Tanggal Kadaluarsa <span class="text-red">*</span></label>
                                    <input type="date" class="form-control" id="expired_date" name="expired_date" required>
                                    <span class="help-block text-red" id="expired_date_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="next_booster">Booster Berikutnya</label>
                                    <input type="date" class="form-control" id="next_booster" name="next_booster">
                                    <span class="help-block text-red" id="next_booster_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dease_target">Target Penyakit</label>
                                    <input type="text" class="form-control" id="dease_target" name="dease_target">
                                    <span class="help-block text-red" id="dease_target_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmit">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('template/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        let certificateTable;
        let currentId = null;
        let isEdit = false;

        $(document).ready(function() {
            // Initialize DataTable
            certificateTable = $('#certificateTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: "/api/dashboard/certificate",
                    type: "GET",
                    dataSrc: function(json) {
                        if (json.success) {
                            return json.data;
                        }
                        return [];
                    },
                    error: function(xhr) {
                        console.error('Error loading data:', xhr);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error loading data'
                        });
                    }
                },
                columns: [
                    { 
                        data: null,
                        render: function (data, type, row, meta) {
                            return meta.row + 1;
                        },
                        orderable: false
                    },
                    { 
                        data: 'biodata',
                        render: function(data) {
                            return data ? data.patient_name : '-';
                        }
                    },
                    { 
                        data: 'vaccine_name',
                        render: function(data) {
                            return data || '-';
                        }
                    },
                    { 
                        data: 'start_date',
                        render: function(data) {
                            return data ? new Date(data).toLocaleDateString('id-ID') : '-';
                        }
                    },
                    { 
                        data: 'docter',
                        render: function(data) {
                            return data || '-';
                        }
                    },
                    { 
                        data: 'batch_number',
                        render: function(data) {
                            return data || '-';
                        }
                    },
                    { 
                        data: 'expired_date',
                        render: function(data) {
                            return data ? new Date(data).toLocaleDateString('id-ID') : '-';
                        }
                    },
                    { 
                        data: 'next_booster',
                        render: function(data) {
                            return data ? new Date(data).toLocaleDateString('id-ID') : '-';
                        }
                    },
                    { 
                        data: 'dease_target',
                        render: function(data) {
                            return data || '-';
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-sm btn-warning btn-edit" data-id="${row.id}">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-info btn-view text-black" data-id="${row.biodata.no_document}">
                                    <i class="fa fa-eye"></i> View
                                </button>
                                <button class="btn btn-sm btn-primary btn-download" data-id="${row.id}">
                                    <i class="fa fa-file"></i> Download
                                </button>
                                <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            `;
                        },
                        orderable: false
                    }
                ]
            });

            // Load biodata for select option
            loadBiodata();

            // Initialize form validation
            $('#certificateForm').validate({
                rules: {
                    id_biodata: {
                        required: true
                    },
                    vaccine_name: {
                        maxlength: 255
                    },
                    start_date: {
                        required: true,
                        date: true
                    },
                    docter: {
                        maxlength: 255
                    },
                    batch_number: {
                        maxlength: 255
                    },
                    expired_date: {
                        required: true,
                        date: true
                    },
                    next_booster: {
                        date: true
                    }
                },
                messages: {
                    id_biodata: {
                        required: "Pilih pasien terlebih dahulu"
                    },
                    start_date: {
                        required: "Tanggal mulai wajib diisi",
                        date: "Format tanggal tidak valid"
                    },
                    expired_date: {
                        required: "Tanggal kadaluarsa wajib diisi",
                        date: "Format tanggal tidak valid"
                    },
                    next_booster: {
                        date: "Format tanggal tidak valid"
                    }
                },
                errorElement: 'span',
                errorClass: 'help-block text-red',
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                    element.closest('.form-group').addClass('has-error');
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                submitHandler: function(form) {
                    saveCertificate();
                }
            });

            // Add button click
            $('#btnAdd').on('click', function() {
                resetForm();
                isEdit = false;
                currentId = null;
                $('#modalTitle').text('Tambah Sertifikat Vaksin');
                $('#certificateModal').modal('show');
            });

            // Edit button click
            $(document).on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                editCertificate(id);
            });

            // Delete button click
            $(document).on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                deleteCertificate(id);
            });

            // View button click - redirect to check document
            $(document).on('click', '.btn-view', function() {
                const no_document = $(this).data('id');
                window.open(`/index.php/welcome/check_document?t=${no_document}`, '_blank');
            });
        });

        function loadBiodata() {
            $.get("/api/dashboard/biodata")
                .done(function(response) {
                    if (response.success) {
                        let options = '<option value="">Pilih Pasien</option>';
                        response.data.forEach(function(item) {
                            options += `<option value="${item.id}">${item.patient_name} - ${item.no_document}</option>`;
                        });
                        $('#id_biodata').html(options);
                    }
                })
                .fail(function() {
                    console.error('Failed to load biodata');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal memuat data pasien'
                    });
                });
        }

        function resetForm() {
            $('#certificateForm')[0].reset();
            $('#certificateForm').validate().resetForm();
            clearErrors();
        }

        function clearErrors() {
            $('.help-block').remove();
            $('.form-group').removeClass('has-error');
        }

        function editCertificate(id) {
            $.get(`/api/dashboard/certificate/${id}`)
                .done(function(response) {
                    if (response.success) {
                        const data = response.data;
                        isEdit = true;
                        currentId = id;
                        $('#modalTitle').text('Edit Sertifikat Vaksin');
                        
                        // Fill form
                        $('#id_biodata').val(data.id_biodata);
                        $('#vaccine_name').val(data.vaccine_name);
                        $('#start_date').val(data.start_date);
                        $('#docter').val(data.docter);
                        $('#batch_number').val(data.batch_number);
                        $('#expired_date').val(data.expired_date);
                        $('#next_booster').val(data.next_booster);
                        $('#dease_target').val(data.dease_target);
                        
                        $('#certificateModal').modal('show');
                    }
                })
                .fail(function(xhr) {
                    console.error('Error:', xhr);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal mengambil data sertifikat'
                    });
                });
        }

        function saveCertificate() {
            const formData = $('#certificateForm').serialize();
            const url = isEdit ? `/api/dashboard/certificate/${currentId}` : "/api/dashboard/certificate";
            const method = isEdit ? 'PUT' : 'POST';
            
            $('#btnSubmit').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Menyimpan...');
            
            $.ajax({
                url: url,
                type: method,
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $('#certificateModal').modal('hide');
                        certificateTable.ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.data) {
                            // Clear previous errors
                            $('.help-block').remove();
                            $('.form-group').removeClass('has-error');
                            
                            // Show new errors
                            for (let field in response.data) {
                                const errorElement = $(`<span class="help-block text-red">${response.data[field][0]}</span>`);
                                $(`#${field}`).after(errorElement);
                                $(`#${field}`).closest('.form-group').addClass('has-error');
                            }
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat menyimpan data'
                        });
                    }
                },
                complete: function() {
                    $('#btnSubmit').prop('disabled', false).html('<i class="fa fa-save"></i> Simpan');
                }
            });
        }

        function deleteCertificate(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data sertifikat yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/dashboard/certificate/${id}`,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                certificateTable.ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Terhapus!',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Gagal menghapus data sertifikat'
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush