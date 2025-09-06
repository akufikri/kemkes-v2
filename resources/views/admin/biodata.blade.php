@extends('app')
@section('title')
    Bio data
@endsection
@section('title_header')
    Bio data
@endsection
@section('breadcrumbs')
    <li class="active">Bio data</li>
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
            <table id="biodataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Document</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Kebangsaan</th>
                        <th>Penyakit</th>
                        <th>Fasilitas</th>
                        <th>Tipe Dokumen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="box-footer"></div>
    </div>

    <!-- Modal Add/Edit -->
    <div class="modal fade" id="biodataModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="modalTitle">Tambah Biodata</h4>
                </div>
                <form id="biodataForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_document">No Document <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" id="no_document" name="no_document" required>
                                    <span class="help-block text-red" id="no_document_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="patient_name">Nama Pasien <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                                    <span class="help-block text-red" id="patient_name_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sex">Jenis Kelamin <span class="text-red">*</span></label>
                                    <select class="form-control" id="sex" name="sex" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="MALE">Laki-laki</option>
                                        <option value="FEMALE">Perempuan</option>
                                    </select>
                                    <span class="help-block text-red" id="sex_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Tanggal Lahir <span class="text-red">*</span></label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                    <span class="help-block text-red" id="date_of_birth_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality">Kebangsaan <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" id="nationality" name="nationality" required>
                                    <span class="help-block text-red" id="nationality_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality_doc">Dokumen Kebangsaan <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" id="nationality_doc" name="nationality_doc" required>
                                    <span class="help-block text-red" id="nationality_doc_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="disease">Penyakit <span class="text-red">*</span></label>
                                    <textarea class="form-control" id="disease" name="disease" rows="3" required></textarea>
                                    <span class="help-block text-red" id="disease_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facility">Fasilitas <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" id="facility" name="facility" required>
                                    <span class="help-block text-red" id="facility_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_type_document">Tipe Dokumen <span class="text-red">*</span></label>
                                    <select class="form-control" id="id_type_document" name="id_type_document" required>
                                        <option value="">Pilih Tipe Dokumen</option>
                                    </select>
                                    <span class="help-block text-red" id="id_type_document_error"></span>
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
    <script>
        let biodataTable;
        let currentId = null;
        let isEdit = false;

        $(document).ready(function() {
            // Initialize DataTable
            biodataTable = $('#biodataTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: "/api/dashboard/biodata",
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
                    { data: 'no_document' },
                    { data: 'patient_name' },
                    { 
                        data: 'sex',
                        render: function(data) {
                            return data === 'MALE' ? 'Laki-laki' : 'Perempuan';
                        }
                    },
                    { 
                        data: 'date_of_birth',
                        render: function(data) {
                            return new Date(data).toLocaleDateString('id-ID');
                        }
                    },
                    { data: 'nationality' },
                    { data: 'disease' },
                    { data: 'facility' },
                    { 
                        data: 'type_document',
                        render: function(data) {
                            return data ? data.name : '-';
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-sm btn-info btn-view" data-id="${row.no_document}">
                                    <i class="fa fa-eye"></i> View
                                </button>
                                <button class="btn btn-sm btn-warning btn-edit" data-id="${row.id}">
                                    <i class="fa fa-edit"></i> Edit
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

            // Load type documents for select option
            loadTypeDocuments();

            // Add button click
            $('#btnAdd').on('click', function() {
                resetForm();
                isEdit = false;
                currentId = null;
                $('#modalTitle').text('Tambah Biodata');
                $('#biodataModal').modal('show');
            });

            // View button click
            $(document).on('click', '.btn-view', function() {
                const noDocument = $(this).data('id');
                window.open(`/icv/${noDocument}`, '_blank');
            });

            // Edit button click
            $(document).on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                editBiodata(id);
            });

            // Delete button click
            $(document).on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                deleteBiodata(id);
            });

            // Form submit
            $('#biodataForm').on('submit', function(e) {
                e.preventDefault();
                saveBiodata();
            });
        });

        function loadTypeDocuments() {
            $.get("/api/dashboard/type/document")
                .done(function(response) {
                    if (response.success) {
                        let options = '<option value="">Pilih Tipe Dokumen</option>';
                        response.data.forEach(function(item) {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        });
                        $('#id_type_document').html(options);
                    }
                })
                .fail(function() {
                    console.error('Failed to load type documents');
                });
        }

        function resetForm() {
            $('#biodataForm')[0].reset();
            clearErrors();
        }

        function clearErrors() {
            $('.help-block').text('');
            $('.form-group').removeClass('has-error');
        }

        function showErrors(errors) {
            clearErrors();
            for (let field in errors) {
                $('#' + field + '_error').text(errors[field][0]);
                $('#' + field).closest('.form-group').addClass('has-error');
            }
        }

        function editBiodata(id) {
            $.get(`/api/dashboard/biodata/${id}`)
                .done(function(response) {
                    if (response.success) {
                        const data = response.data;
                        isEdit = true;
                        currentId = id;
                        $('#modalTitle').text('Edit Biodata');
                        
                        // Fill form
                        $('#no_document').val(data.no_document);
                        $('#patient_name').val(data.patient_name);
                        $('#sex').val(data.sex);
                        $('#date_of_birth').val(data.date_of_birth);
                        $('#nationality').val(data.nationality);
                        $('#nationality_doc').val(data.nationality_doc);
                        $('#disease').val(data.disease);
                        $('#facility').val(data.facility);
                        $('#id_type_document').val(data.id_type_document);
                        
                        $('#biodataModal').modal('show');
                    }
                })
                .fail(function(xhr) {
                    console.error('Error:', xhr);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal mengambil data biodata'
                    });
                });
        }

        function saveBiodata() {
            const formData = $('#biodataForm').serialize();
            const url = isEdit ? `/api/dashboard/biodata/${currentId}` : "/api/dashboard/biodata";
            const method = isEdit ? 'PUT' : 'POST';
            
            $('#btnSubmit').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Menyimpan...');
            
            $.ajax({
                url: url,
                type: method,
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $('#biodataModal').modal('hide');
                        biodataTable.ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const response = JSON.parse(xhr.responseText);
                        showErrors(response.data);
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

        function deleteBiodata(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/dashboard/biodata/${id}`,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                biodataTable.ajax.reload();
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
                                text: 'Gagal menghapus data biodata'
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
