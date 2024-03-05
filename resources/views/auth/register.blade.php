<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - Perpustakaan </title>
    <link href="adminsb/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <main>
                <div class="justify-content-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Buat Akun</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" id="username"
                                                    type="text" placeholder="username" required />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="email" type="email"
                                                    placeholder="name@example.com" required />
                                                <label for="email">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password" id="password"
                                                            type="password" placeholder="Create a password" required />
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>


                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid"><button
                                                            class="btn btn-primary btn-block form-control"
                                                            type="submit">Create Account</button></div>
                                                </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">Punya akun?<a href="login">login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="adminsb/js/scripts.js"></script>
</body>
@include('sweetalert::alert')

</html>
