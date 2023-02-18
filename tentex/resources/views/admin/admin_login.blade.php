<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Tentex</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="admin/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="admin/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="admin/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="admin/css/style.css">

    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body style="background: url('assets/img/to.png');">

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox" style="box-shadow: 2px 3px 3px grey;background: url('assets/img/tor1.jpg');">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <div class="text-center p-1">
                                <span style="box-shadow: 1px 1px 2px grey;"
                                    class="h1 text-uppercase text-light bg-warning px-2">TEN</span>
                                <span style="box-shadow: 1px 1px 2px grey;"
                                    class="h1 text-uppercase text-dark bg-light px-2 ml-n1">TEX</span>
                                {{-- <a href="" class="text-decoration-none">
                                    <img style="width: 220px;" src="{{ asset('assets/img/newfarm.png') }}"
                                        alt="">
                                </a> --}}
                            </div>


                            <form id="login-form" class="form" action="{{ url('/admin.dashboard') }}" method="post">
                                @csrf
                                <div class="form-group">

                                    <input placeholder="Email" type="email"name="email" id="username"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">

                                    <div class="pass-group">
                                        <input placeholder="Password" type="password" name="password" id="password"
                                            class="form-control pass-input" required>
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>

                                <button class="btn btn-lg btn-block btn-warning w-100" type="submit"
                                    name="submit">Login</button>

                            </form>
                            <p class="alert-danger text-center"> @php
                                $message = Session()->get('message');
                                if ($message) {
                                    echo "$message";
                                    Session()->put('message', null);
                                }
                            @endphp</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="admin/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="admin/js/popper.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>

    <!-- Feather Icon JS -->
    <script src="admin/js/feather.min.js"></script>

    <!-- Custom JS -->
    <script src="admin/js/script.js"></script>

</body>

</html>
