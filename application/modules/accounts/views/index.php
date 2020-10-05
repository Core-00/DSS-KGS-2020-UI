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
                    <form id="editForm">
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <input id="edit-profile-name" type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <input id="edit-profile-email" type="email" class="form-control" name="email" placeholder="Enter email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <input id="edit-profile-username" type="text" class="form-control" name="username" placeholder="Enter username">
                            </div>

                            <div class="form-group col-md-6">
                                <input id="edit-profile-password" type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                        </div>

                        <div class="row justify-content-end mb-3">
                            <button class="btn btn-info mx-3">Update</button>
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
                    $('#edit-profile-name').val(response.name)
                    $('#edit-profile-email').val(response.email)
                    $('#edit-profile-username').val(response.username)
                    $('#edit-profile-password').val(response.password).attr('disabled', true)
                }
            });
            // "$2a$10$wO0J0bxOlqUcw7RVk3fq6esci8ARdA6ZQ5r/nn.UqALw/Sj8Epgb2"
            // "$2a$10$oS1z1lYPefHb/zEnp2gLBuatOIHftNQhxrJnGoD4nvQU1aq7U6I1O"

            $("#editForm").submit(function(event) {
                event.preventDefault();
                console.log({
                    bravo: $(this).serialize()
                })
                $.ajax({
                    url: base_url +"users",
                    type: "PUT",
                    headers: {
                        "Authorization": "Bearer " + localStorage.getItem('Project1')
                    },
                    dataType: "json",
                    data: $(this).serialize(),
                    success: function (response) {
                        alert(response)
                        window.location.reload()
                    }
                });
            })
        })
    </script>
</body>
</html>
