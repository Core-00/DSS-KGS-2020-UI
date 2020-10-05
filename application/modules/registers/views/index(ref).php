<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Daftar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <link rel="shortcut icon" href="<?= base_url() ?>appassets/favicon/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>appassets/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>appassets/favicon/favicon-32x32.png">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Bamburgh UI Kit Stylesheets -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>appassets/assets/js/demo/jquery-confirm/jquery-confirm.min.css">
	<script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/jquery-confirm/jquery-confirm.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>appassets/assets/css/bamburgh.min.css">
    <script>
        if('<?= $this->uri->segment(1) ?>' == 'logins' || '<?= $this->uri->segment(1) ?>' == ''){
			if(localStorage.getItem('posJwtTokenOwner') != null){
				window.location = '<?= site_url('cashiers') ?>';
			}
        }
    </script>
</head>

<body id="app-top">
    <div class="hero-wrapper bg-composed-wrapper bg-white">
        <div class="flex-grow-1 w-100 d-flex align-items-center">
            <div class="bg-composed-wrapper--content py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex align-items-center">
                            <img src="<?= base_url() ?>appassets/assets/img/illustrations/experience_design.svg" class="w-100 mx-auto d-block img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="pl-0">
                                <div class="text-black mt-3">
                                    <h3 class="font-weight-bold">
                                        Isi kolom dibawah untuk mendaftar.
                                    </h3>
                                    <div>
                                        <form id="registerForm">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="username" class="form-control" name="username" placeholder="Username" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button class="btn d-block w-100 btn-first">
                                                            <span class="btn-wrapper--label">
                                                                Daftar
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <small class="d-block text-black-50 pt-3">Sudah mempunyai akun? Silahkan login <a href="<?= site_url('logins') ?>">disini</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bamburgh UI Kit Javascript Core -->

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!--Bootstrap init-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/bootstrap/bootstrap.min.js"></script>

    <!-- Bamburgh UI Kit Javascript Widgets -->

    <!--Perfect scrollbar-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>

    <!--Perfect scrollbar init-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!--StickyKit-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/stickykit/js/stickykit.min.js"></script>

    <!--StickyKit init-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/stickykit/stickykit.min.js"></script>

    <!--Headroom-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/headroom/js/headroom.min.js"></script>

    <!--Headroom init-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/headroom/headroom.min.js"></script>

    <!--Animations-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/wow/js/wow.min.js"></script>

    <!--Animations init-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/wow/wow.min.js"></script>

    <!--Slick slideshow-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/vendor/slick/js/slick.min.js"></script>

    <!--Slick slideshow init-->

    <script type="text/javascript" src="<?= base_url() ?>appassets/assets/js/demo/slick/slick.min.js"></script>

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