<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
                    <img src="<?= base_url() ?>assets/images/auths/register.png" alt="auth-image" class="img-fluid">
                </div>
                <!-- ==========><>|Media|<><========== -->

                <!-- ==========><>|Form Side|<><========== -->
                <div class="col-md-6">
                    <h1 class="mb-5">
                        DSS KGS for Covid-19
                        <br />
                        Detection <span class="text-info">Registration</span>
                    </h1>

                    <!-- ==========><>|Form|<><========== -->
                    <form id="registerForm">
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="username" placeholder="Enter username">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                        </div>

                        <div class="row justify-content-end mb-3">
                            <button class="btn btn-info mx-3">Register</button>
                        </div>

                        <div class="row">
                            <p class="lead mx-3">
                                Already Registered? Click <a href="<?= site_url('logins') ?>">Here</a> to Log In
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
            $("#registerForm").submit(function(event) {
                $.ajax({
                    url: base_url + 'users',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {},
                    success: function(response) {
			            window.location = '<?= site_url('logins') ?>';
                    },
                    error: function(response, textStatus, errorThrown) {
                        alert(response.responseJSON)
                    },
                    complete: function() {
                        console.log('complete')
                    }
                });
                event.preventDefault();
            });
        })
    </script>
</body>
</html>
