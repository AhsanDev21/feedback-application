<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="VOD" name="description" />
    <meta content="VOD" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/back/assets/images/favicon-32x32.png">

    <!-- Bootstrap Css -->
    <link href="/back/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/back/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/back/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/back/assets/toastr/toastr.min.css">

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to Feedback App.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="/back/assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="/back/assets/images/vod-icon.png" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="index.html" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="/back/assets/images/vod-icon.png" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" method="post" action="javascript:login()" id="login_form">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" name="password" id="password" required>
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Feedback.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="/back/assets/libs/jquery/jquery.min.js"></script>
    <script src="/back/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/back/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/back/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/back/assets/libs/node-waves/waves.min.js"></script>
    <script src="/back/assets/toastr/toastr.min.js"></script><!-- TOASTR -->

    <!-- App js -->
    <script src="/back/assets/js/app.js"></script>
    <script>
        function login() {
            let cred = $("#login_form").serialize();
            $.ajax({
                url: "{{ route('back.login_post') }}",
                method: "POST",
                data: cred,
            }).done(function(response) {
                if (response.status == "success") {
                    toastr.success('Login Successfuly', 'Success');
                    location.href = "/admin/dashboard";
                }
            }).fail(function(error) {
                console.log(error);
                let errorList = error.responseJSON.errors
                for (err in errorList) {
                    for (let er = 0; er < errorList[err].length; er++) {
                        toastr.error(errorList[err][er]);
                    }
                }
            });
        }
    </script>
</body>

</html>
