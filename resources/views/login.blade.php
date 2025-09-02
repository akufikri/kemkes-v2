<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('template/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            width: 360px;
            max-width: 90%;
        }
        .error {
            color: #d9534f;
            font-size: 12px;
            margin-top: 5px;
        }
        .alert {
            margin-bottom: 20px;
        }
        .btn-loading {
            position: relative;
        }
        .btn-loading .fa-spinner {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
    <div class="login-box">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title text-center">Sign In</h3>
                </div>
                <div class="box-body">
                    <!-- Alert Area -->
                    <div id="alert-area"></div>
                    
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="loginBtn" class="btn btn-primary btn-block">
                                <span class="btn-text">Sign In</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('template/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
    
    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Setup CSRF Token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Initialize form validation
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: {
                        required: "Email wajib diisi",
                        email: "Format email tidak valid"
                    },
                    password: {
                        required: "Password wajib diisi",
                        minlength: "Password minimal 6 karakter"
                    }
                },
                submitHandler: function(form) {
                    handleLogin();
                }
            });

            function handleLogin() {
                const email = $('#email').val();
                const password = $('#password').val();
                const $btn = $('#loginBtn');
                const $btnText = $('.btn-text');

                // Show loading state
                $btn.prop('disabled', true).addClass('btn-loading');
                $btnText.html('<i class="fa fa-spinner fa-spin"></i> Logging in...');
                
                // Clear previous alerts
                $('#alert-area').empty();

                // AJAX Login Request
                $.ajax({
                    url: '/api/login',
                    type: 'POST',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        if (response.success) {
                            showAlert('success', response.message || 'Login berhasil!');
                            
                            // Redirect to dashboard after 1 second
                            setTimeout(function() {
                                window.location.href = '/dashboard';
                            }, 1000);
                        } else {
                            showAlert('danger', response.message || 'Login gagal!');
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = 'Terjadi kesalahan pada server';
                        
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.status === 401) {
                            errorMessage = 'Email atau password salah';
                        } else if (xhr.status === 422) {
                            errorMessage = 'Data yang dimasukkan tidak valid';
                            
                            // Show validation errors
                            if (xhr.responseJSON && xhr.responseJSON.data) {
                                const errors = xhr.responseJSON.data;
                                let errorList = '<ul class="mb-0">';
                                $.each(errors, function(key, value) {
                                    if (Array.isArray(value)) {
                                        $.each(value, function(index, msg) {
                                            errorList += '<li>' + msg + '</li>';
                                        });
                                    } else {
                                        errorList += '<li>' + value + '</li>';
                                    }
                                });
                                errorList += '</ul>';
                                errorMessage = errorList;
                            }
                        }
                        
                        showAlert('danger', errorMessage);
                    },
                    complete: function() {
                        // Reset button state
                        $btn.prop('disabled', false).removeClass('btn-loading');
                        $btnText.html('Sign In');
                    }
                });
            }

            function showAlert(type, message) {
                const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
                const iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle';
                
                const alertHtml = `
                    <div class="alert ${alertClass} alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <i class="fa ${iconClass}"></i> ${message}
                    </div>
                `;
                
                $('#alert-area').html(alertHtml);
                
                // Auto hide success alerts after 3 seconds
                if (type === 'success') {
                    setTimeout(function() {
                        $('.alert').fadeOut();
                    }, 3000);
                }
            }
        });
    </script>
</body>
</html>