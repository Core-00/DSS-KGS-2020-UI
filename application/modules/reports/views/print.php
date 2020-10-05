<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Document</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-3 mb-5">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold">Report Document Covid-19</h3>
                <h6 class="text-center font-weight-bold" id="single-print-doc-name">Document name</h6>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <h5 class="font-weight-bold">Probability</h5>
                <ul class="p-0" style="list-style: none;">
                    <li>
                        <h6 class="font-weight-bold">Highest Probability</h6>
                        <p id="single-print-highest-probability" class="mb-0">0 parameter with probability 1</p>
                        <ul id="single-print-highest-probability-list" class="mb-2">
                            <li>Parameter 1</li>
                        </ul>
                    </li>

                    <li>
                        <h6 class="font-weight-bold">Lowest Probability</h6>
                        <p id="single-print-lowest-probability" class="mb-0">0 parameter with probability 0</p>
                        <ul id="single-print-lowest-probability-list">
                            <li>Parameter 1</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5 class="font-weight-bold">Parameter Status</h5>
                <ul class="p-0" style="list-style: none;">
                    <li>
                        <h6 class="font-weight-bold text-danger">More than Zero</h6>
                        <p id="single-print-total-not-zero">10 parameters</p>
                    </li>

                    <li>
                        <h6 class="font-weight-bold text-success">Equal to zero</h6>
                        <p id="single-print-total-zero">10 parameters</p>
                    </li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5 class="font-weight-bold">Total</h5>
                <h3 class="font-weight-bold" id="single-print-total">3</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Parameter</th>
                            <th>Probability</th>
                            <th>Percentage</th>
                    </thead>
                    <tbody id="single-print-list">
                        <tr>
                            <td colspan="6" class="text-center">No data</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    if(localStorage.getItem('Project1') == null){
        window.location = '<?= site_url('logins') ?>';
    }

    var base_url = '<?= config_item('api_endpoint') ?>';
    var single_print_total_not_zero = 0
    var single_print_total_zero = 0
    var single_print_highest_probability = 0
    var single_print_highest_probability_parameter = 0
    var single_print_lowest_probability = 100
    var single_print_lowest_probability_parameter = 0

    var single_print_highest_probability_parameter_list = []
    var single_print_lowest_probability_parameter_list = []

    $(document).ready(function(){
        $.ajax({
            url: base_url +`cores/csv/<?= $this->input->get('parameter') ?>`,
            headers: {
                "Authorization": "Bearer " + localStorage.getItem('Project1')
            },
            type: 'GET',
            dataType: 'json',
            async: true,
            cache: false,
            beforeSend: function() {},
            success: function(response) {
                $("#single-print-doc-name").empty().html(`${response.name}`)
                // ==========><>|Total Parameter|<><==========
                $("#single-print-total").empty().html(`${response.sum_biner.sum_persen.length}`)
                // ==========><>|Total Parameter|<><==========

                // ==========><>|Total Not Zero|<><==========
                single_print_total_not_zero = response.sum_biner.sum_persen.filter((data) => {
                    return parseInt(data) > 0
                })
                single_print_total_not_zero = single_print_total_not_zero.length
                $("#single-print-total-not-zero").empty().html(`${single_print_total_not_zero} parameters`)
                // ==========><>|Total Not Zero|<><==========

                // ==========><>|Total Zero|<><==========
                single_print_total_zero = response.sum_biner.sum_persen.filter((data) => {
                    return parseInt(data) === 0
                })
                single_print_total_zero = single_print_total_zero.length
                $("#single-print-total-zero").empty().html(`${single_print_total_zero} parameters`)
                // ==========><>|Total Zero|<><==========

                // ==========><>|Probability|<><==========
                response.sum_biner.sum.forEach((data) => {
                    // ==========><>|Highest Probability|<><==========
                    if (single_print_highest_probability < parseFloat(data)) {
                        single_print_highest_probability = parseFloat(data)
                    }
                    // ==========><>|Highest Probability|<><==========

                    // ==========><>|Lowest Probability|<><==========
                    if (single_print_lowest_probability > parseFloat(data)) {
                        single_print_lowest_probability = parseFloat(data)
                    }
                    // ==========><>|Lowest Probability|<><==========

                })

                // ==========><>|Highest Probability|<><==========
                single_print_highest_probability_parameter = response.sum_biner.sum.filter((data) => {
                    return parseFloat(data) === single_print_highest_probability
                })
                single_print_highest_probability_parameter = single_print_highest_probability_parameter.length
                // ==========><>|Highest Probability|<><==========

                // ==========><>|Lowest Probability|<><==========
                single_print_lowest_probability_parameter = response.sum_biner.sum.filter((data) => {
                    return parseFloat(data) === single_print_lowest_probability
                })
                single_print_lowest_probability_parameter = single_print_lowest_probability_parameter.length
                // ==========><>|Lowest Probability|<><==========

                // $("#single-print-highest-probability").empty().html(`${single_print_highest_probability_parameter} parameter with probability ${single_print_highest_probability}`)
                // $("#single-print-lowest-probability").empty().html(`${single_print_lowest_probability_parameter} parameter with probability ${single_print_lowest_probability}`)
                // ==========><>|Probability|<><==========

                // ==========><>|List Parameter|<><==========
                var html = ''
                var htmlHighest = ''
                var htmlLowest = ''
                response.sum_biner.sum_persen.forEach((data, index) => {
                    html += `
                        <tr class="${parseInt(data) > 0 ? 'text-danger' : 'text-success'}">
                            <td align="center">${index + 1}</td>
                            <td>${response.key_biners[0].biner[index]}</td>
                            <td>${response.sum_biner.sum[index]}</td>
                            <td>${data}</td>
                        </tr>
                    `
                    if (parseFloat(response.sum_biner.sum[index]) === 1) {
                        htmlHighest += `
                            <li class="${parseInt(data) > 0 ? 'text-danger' : 'text-success'}">${response.key_biners[0].biner[index]}</li>
                        `
                    } else if (parseFloat(response.sum_biner.sum[index]) === 0) {
                        htmlLowest += `
                            <li class="${parseInt(data) > 0 ? 'text-danger' : 'text-success'}">${response.key_biners[0].biner[index]}</li>
                        `
                    }
                })
                $("#single-print-list").empty().html(html)
                $("#single-print-highest-probability-list").empty().html(`${htmlHighest}`)
                $("#single-print-lowest-probability-list").empty().html(`${htmlLowest}`)
                // ==========><>|List Parameter|<><==========
                window.print()
            },
            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            }
        });
    })
</script>
