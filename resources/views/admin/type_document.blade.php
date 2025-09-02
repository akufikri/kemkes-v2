@extends('app')
@section('title')
   Tipe Dokumen
@endsection
@section('title_header')
   Tipe Dokumen
@endsection
@section('breadcrumbs')
    <li class="active">Type Document</li>
@endsection
@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css">
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
            <table id="typeDocumentTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="typeDocumentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalTitle">Add Type Document</h4>
                </div>
                <form id="typeDocumentForm">
                    <div class="modal-body">
                        <input type="hidden" id="typeDocumentId">
                        <div class="form-group">
                            <label for="name">Name <span class="text-red">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <span class="help-block text-red" id="nameError"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        let table;
        let isEdit = false;

        $(document).ready(function() {
            // Initialize DataTable
            table = $('#typeDocumentTable').DataTable({
                ajax: {
                    url: '/api/dashboard/type/document',
                    type: 'GET',
                    dataSrc: function(json) {
                        if (json.success) {
                            return json.data;
                        }
                        return [];
                    }
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { 
                        data: 'created_at',
                        render: function(data) {
                            return new Date(data).toLocaleDateString();
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-sm btn-warning btn-edit" data-id="${row.id}">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            `;
                        }
                    }
                ],
                responsive: true,
                processing: true
            });

            // Add button click
            $('#btnAdd').click(function() {
                resetForm();
                isEdit = false;
                $('#modalTitle').text('Add Type Document');
                $('#typeDocumentModal').modal('show');
            });

            // Edit button click
            $(document).on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                editTypeDocument(id);
            });

            // Delete button click
            $(document).on('click', '.btn-delete', function() {
                const id = $(this).data('id');
                deleteTypeDocument(id);
            });

            // Form submit
            $('#typeDocumentForm').submit(function(e) {
                e.preventDefault();
                saveTypeDocument();
            });
        });

        function resetForm() {
            $('#typeDocumentForm')[0].reset();
            $('#typeDocumentId').val('');
            $('.help-block').text('');
            $('.form-group').removeClass('has-error');
        }

        function saveTypeDocument() {
            const id = $('#typeDocumentId').val();
            const name = $('#name').val();
            
            const url = isEdit ? `/api/dashboard/type/document/${id}` : '/api/dashboard/type/document';
            const method = isEdit ? 'PUT' : 'POST';

            $('#saveBtn').prop('disabled', true).text('Saving...');

            $.ajax({
                url: url,
                type: method,
                data: { name: name },
                success: function(response) {
                    if (response.success) {
                        $('#typeDocumentModal').modal('hide');
                        table.ajax.reload();
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
                    const errors = xhr.responseJSON?.errors;
                    if (errors) {
                        $('.help-block').text('');
                        $('.form-group').removeClass('has-error');
                        
                        Object.keys(errors).forEach(function(key) {
                            $('#' + key + 'Error').text(errors[key][0]);
                            $('#' + key).closest('.form-group').addClass('has-error');
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong!'
                        });
                    }
                },
                complete: function() {
                    $('#saveBtn').prop('disabled', false).text('Save');
                }
            });
        }

        function editTypeDocument(id) {
            $.ajax({
                url: `/api/dashboard/type/document/${id}`,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        resetForm();
                        isEdit = true;
                        $('#modalTitle').text('Edit Type Document');
                        $('#typeDocumentId').val(response.data.id);
                        $('#name').val(response.data.name);
                        $('#typeDocumentModal').modal('show');
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to load type document data!'
                    });
                }
            });
        }

        function deleteTypeDocument(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/dashboard/type/document/${id}`,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                table.ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Failed to delete type document!'
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
