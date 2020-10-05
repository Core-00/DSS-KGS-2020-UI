<!-- <div class="col-lg-4">
    <div class="example-box example-box-alt pb-5">
        <div class="card card-box mb-5">
            <div class="grid-menu grid-menu-3col">
                <div class="scroll-area-lg" style="height:550px;">
                    <div class="container">
                        <br/>
                        <form class="was-validated" id="updateForm">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="form-2-name">Name</label>
                                    <input type="text" class="form-control" id="form-2-name" name="name" required>
                                    <div class="invalid-feedback">Name wajib diisi!</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="form-2-username">Username</label>
                                    <input type="text" class="form-control" id="form-2-username" name="username" required>
                                    <div class="invalid-feedback">Username wajib diisi!</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="form-2-password">Password</label>
                                    <input type="password" class="form-control" id="form-2-password" name="password" required>
                                    <div class="invalid-feedback">Password wajib diisi!</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="form-2-email">Email</label>
                                    <input type="text" class="form-control" id="form-2-email" name="email" required>
                                    <div class="invalid-feedback">Email wajib diisi!</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary mb-4">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $.ajax({
            url: base_url +"users",
            type: "GET",
            dataType: "json",
            success: function (response) {
                $('#form-2-name').val(response.name)
                $('#form-2-username').attr('disabled', true).val(response.username)
                $('#form-2-password').val('')
                $('#form-2-email').attr('disabled', true).val(response.email)
            }
        });

        $("#updateForm").submit(function(event) {
            $.ajax({
                url: base_url +"users",
                type: "PUT",
                dataType: "json",
                data: $(this).serialize(),
                success: function (response) {
                    alert(response)
                    window.location = '<?= base_url('accounts') ?>'
                }
            });
            event.preventDefault();
        })
    })
</script> -->


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
                    <form class="was-validated" id="updateForm">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="form-2-name">Name</label>
                                    <input type="text" class="form-control" id="form-2-name" name="name" required>
                                    <div class="invalid-feedback">Name wajib diisi!</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="form-2-username">Username</label>
                                    <input type="text" class="form-control" id="form-2-username" name="username" required>
                                    <div class="invalid-feedback">Username wajib diisi!</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="form-2-password">Password</label>
                                    <input type="password" class="form-control" id="form-2-password" name="password" required>
                                    <div class="invalid-feedback">Password wajib diisi!</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="form-2-email">Email</label>
                                    <input type="text" class="form-control" id="form-2-email" name="email" required>
                                    <div class="invalid-feedback">Email wajib diisi!</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary mb-4">
                                        Update
                                    </button>
                                </div>
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

        if(localStorage.getItem('Project1') == null){
			window.location = '<?= site_url('logins') ?>';
		}

        var base_url = '<?= config_item('api_endpoint') ?>';

        // url: base_url + 'reports/',
        //     type: 'GET',
        //     headers: {
        //         "Authorization": "Bearer " + localStorage.getItem('Project1')
        //     },
        //     dataType: 'json',
        //     async: true,
        //     cache: false,
        //     dataType: 'json',

        $(document).ready(function(){
            $.ajax({
                url: base_url +"users",
                type: "GET",
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('Project1')
                },
                dataType: 'json',
                async: true,
                success: function (response) {
                    console.log({
                        alpha: response
                    })
                    $('#form-2-name').val(response.name)
                    $('#form-2-username').attr('disabled', true).val(response.username)
                    $('#form-2-password').val('')
                    $('#form-2-email').attr('disabled', true).val(response.email)
                }
            });

            // $("#editForm").submit(function(event) {
            //     event.preventDefault();
            //     console.log({
            //         bravo: $(this).serialize()
            //     })
            //     $.ajax({
            //         url: base_url +"users",
            //         type: "PUT",
            //         headers: {
            //             "Authorization": "Bearer " + localStorage.getItem('Project1')
            //         },
            //         dataType: "json",
            //         data: $(this).serialize(),
            //         success: function (response) {
            //             alert(response)
            //             window.location.reload()
            //         }
            //     });
            // })
        })
    </script>
</body>
</html>
