<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KGS-Knowledge Growing System</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/landings/landing.css">
</head>
<body>
    <div class="wrapper wrapper-l3">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-center">
                    <img src="<?= base_url() ?>assets/images/landings/l3-main_icon.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <img src="<?= base_url() ?>assets/images/landings/en-title.PNG" alt="" class="img-fluid img-menu_static">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-5 mb-md-0">
                    <a href="<?= site_url('logins') ?>">
                        <img src="<?= base_url() ?>assets/images/landings/en-guest.PNG" alt="" class="img-fluid img-menu">
                    </a>
                </div>

                <div class="col-md-4 mb-5 mb-md-0 info-wrapper">
                    <img src="<?= base_url() ?>assets/images/landings/en-tips.PNG" alt="" class="img-fluid">
                    <div class="info-lang ml-5 mb-4">
                        <img data-toggle="modal" data-target="#id-tips-modal"  src="<?= base_url() ?>assets/images/landings/l3-id.png" alt="" class="info-control mr-5">
                        <img data-toggle="modal" data-target="#en-tips-modal" src="<?= base_url() ?>assets/images/landings/l3-en.png" alt="" class="info-control">
                    </div>
                </div>

                <div class="col-md-4 info-wrapper">
                    <img src="<?= base_url() ?>assets/images/landings/en-what.PNG" alt="" class="img-fluid">
                    <div class="info-lang mb-4">
                        <img data-toggle="modal" data-target="#id-what-modal"  src="<?= base_url() ?>assets/images/landings/l3-id.png" alt="" class="info-control mr-5">
                        <img data-toggle="modal" data-target="#en-what-modal" src="<?= base_url() ?>assets/images/landings/l3-en.png" alt="" class="info-control">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="en-tips-modal" tabindex="-1" role="dialog" aria-labelledby="en-tips-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <img src="<?= base_url() ?>assets/images/landings/en-modal-tips.png" alt="" class="img-fluid img-menu">
        </div>
    </div>

    <div class="modal fade" id="id-tips-modal" tabindex="-1" role="dialog" aria-labelledby="id-tips-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <img src="<?= base_url() ?>assets/images/landings/id-modal-tips.png" alt="" class="img-fluid img-menu">
        </div>
    </div>

    <div class="modal fade" id="en-what-modal" tabindex="-1" role="dialog" aria-labelledby="en-what-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <img src="<?= base_url() ?>assets/images/landings/en-modal-what.png" alt="" class="img-fluid img-menu">
        </div>
    </div>

    <div class="modal fade" id="id-what-modal" tabindex="-1" role="dialog" aria-labelledby="id-what-modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <img src="<?= base_url() ?>assets/images/landings/id-modal-what.png" alt="" class="img-fluid img-menu">
        </div>
    </div>


    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script></script>
</body>
</html>
