<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/auths/auth.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row align-items-center">
                <!-- ==========><>|Media|<><========== -->
                <div class="col-md-6">
                    <img src="<?= base_url() ?>assets/images/auths/login.png" alt="auth-image" class="img-fluid">
                </div>
                <!-- ==========><>|Media|<><========== -->

                <!-- ==========><>|Form Side|<><========== -->
                <div class="col-md-6">
                    <h1 class="mb-5">
                        DSS KGS for Covid-19
                        <br />
                        Detection <span class=text-info>Log In</span>
                    </h1>

                    <!-- ==========><>|Form|<><========== -->
                    <form id="loginForm">
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="username" placeholder="Enter username">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                        </div>

                        <div class="row justify-content-end mb-3">
                            <button class="btn btn-info mx-3" type="submit">Login</button>
                        </div>

                        <div class="row">
                            <p class="lead mx-3">
                                Don't Have Account Yet? Get Your Account <a href="<?= site_url('registers') ?>">Here</a>
                            </p>
                        </div>
                    </form>
                    <!-- ==========><>|Form|<><========== -->
                </div>
                <!-- ==========><>|Form Side|<><========== -->
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        var base_url = '<?= config_item('api_endpoint') ?>';

        $(document).ready(function(){
            $("#loginForm").submit(function(event) {
                event.preventDefault();
                // alert('logged in')
                $.ajax({
                    url: base_url + 'users/login',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {},
                    success: function(response) {
                        localStorage.setItem('Project1', response);
			            window.location = '<?= site_url('dashboards') ?>';
                    },
                    error: function(response, textStatus, errorThrown) {
                        alert(response.responseJSON)
                    },
                    complete: function() {
                        console.log('complete')
                    }
                });

            });
        })
    </script>
</body>
</html>
