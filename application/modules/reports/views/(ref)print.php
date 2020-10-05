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
                <h3 class="text-center font-weight-bold">Report Document Covid-19 Patient</h3>
                <h6 class="text-center font-weight-bold" id="single-print-doc-name">Document name</h6>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <h5 class="font-weight-bold">Probability</h5>
                <ul class="p-0" style="list-style: none;">
                    <li>
                        <h6 class="font-weight-bold">Highest Probability</h6>
                        <p id="single-print-highest-probability" class="mb-0">10 patients with probability 100%</p>
                        <ul id="single-print-highest-probability-list" class="mb-2">
                            <li>Patient 1</li>
                        </ul>
                    </li>

                    <li>
                        <h6 class="font-weight-bold">Lowest Probability</h6>
                        <p id="single-print-lowest-probability" class="mb-0">10 patients with probability 0%</p>
                        <ul id="single-print-lowest-probability-list">
                            <li>Patient 1</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5 class="font-weight-bold">Patient Status</h5>
                <ul class="p-0" style="list-style: none;">
                    <li>
                        <h6 class="font-weight-bold text-danger">Infected</h6>
                        <p id="single-print-total-infected">10 patients</p>
                    </li>

                    <li>
                        <h6 class="font-weight-bold text-success">Uninfected</h6>
                        <p id="single-print-total-uninfected">10 patients</p>
                    </li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5 class="font-weight-bold">Total Patient</h5>
                <h3 class="font-weight-bold" id="single-print-total-patient">3</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Patient</th>
                            <th>Status</th>
                            <th>Probability</th>
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
    var single_print_total_infected = 0
    var single_print_total_uninfected = 0
    var single_print_highest_probability = 0
    var single_print_highest_probability_patient = 0
    var single_print_lowest_probability = 100
    var single_print_lowest_probability_patient = 0

    var single_print_highest_probability_patient_list = []
    var single_print_lowest_probability_patient_list = []

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
                // ==========><>|Total patient|<><==========
                $("#single-print-total-patient").empty().html(`${response.sum_biner.sum_persen.length}`)
                // ==========><>|Total patient|<><==========

                // ==========><>|Total infected|<><==========
                single_print_total_infected = response.sum_biner.sum_persen.filter((data) => {
                    return parseInt(data) > 0
                })
                single_print_total_infected = single_print_total_infected.length
                $("#single-print-total-infected").empty().html(`${single_print_total_infected} patients`)
                // ==========><>|Total infected|<><==========

                // ==========><>|Total uninfected|<><==========
                single_print_total_uninfected = response.sum_biner.sum_persen.filter((data) => {
                    return parseInt(data) === 0
                })
                single_print_total_uninfected = single_print_total_uninfected.length
                $("#single-print-total-uninfected").empty().html(`${single_print_total_uninfected} patients`)
                // ==========><>|Total uninfected|<><==========

                // ==========><>|Probability|<><==========
                response.sum_biner.sum_persen.forEach((data) => {
                    // ==========><>|Highest Probability|<><==========
                    if (single_print_highest_probability < parseInt(data)) {
                        single_print_highest_probability = parseInt(data)
                    }
                    // ==========><>|Highest Probability|<><==========

                    // ==========><>|Lowest Probability|<><==========
                    if (single_print_lowest_probability > parseInt(data)) {
                        single_print_lowest_probability = parseInt(data)
                    }
                    // ==========><>|Lowest Probability|<><==========

                })

                // ==========><>|Highest Probability|<><==========
                single_print_highest_probability_patient = response.sum_biner.sum_persen.filter((data) => {
                    return parseInt(data) === single_print_highest_probability
                })
                single_print_highest_probability_patient = single_print_highest_probability_patient.length
                // ==========><>|Highest Probability|<><==========

                // ==========><>|Lowest Probability|<><==========
                single_print_lowest_probability_patient = response.sum_biner.sum_persen.filter((data) => {
                    return parseInt(data) === single_print_lowest_probability
                })
                single_print_lowest_probability_patient = single_print_lowest_probability_patient.length
                // ==========><>|Lowest Probability|<><==========

                $("#single-print-highest-probability").empty().html(`${single_print_highest_probability_patient} patients with probability ${single_print_highest_probability}%`)
                $("#single-print-lowest-probability").empty().html(`${single_print_lowest_probability_patient} patients with probability ${single_print_lowest_probability}%`)
                // ==========><>|Probability|<><==========

                // ==========><>|List Patient|<><==========
                var html = ''
                var htmlHighest = ''
                var htmlLowest = ''
                response.sum_biner.sum_persen.forEach((data, index) => {
                    html += `
                        <tr class="${parseInt(data) > 0 ? 'text-danger' : 'text-success'}">
                            <td align="center">${index + 1}</td>
                            <td>Patient ${index + 1}</td>
                            <td>${parseInt(data) > 0 ? 'Infected' : 'Uninfected'}</td>
                            <td>${data}</td>
                        </tr>
                    `
                    if (parseInt(data) === single_print_highest_probability) {
                        htmlHighest += `
                            <li class="${parseInt(data) > 0 ? 'text-danger' : 'text-success'}">Patient ${index + 1}</li>
                        `
                    } else if (parseInt(data) === single_print_lowest_probability) {
                        htmlLowest += `
                            <li class="${parseInt(data) > 0 ? 'text-danger' : 'text-success'}">Patient ${index + 1}</li>
                        `
                    }
                })
                $("#single-print-list").empty().html(html)
                $("#single-print-highest-probability-list").empty().html(`${htmlHighest}`)
                $("#single-print-lowest-probability-list").empty().html(`${htmlLowest}`)
                // ==========><>|List Patient|<><==========
                window.print()
            },
            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            }
        });
    })
</script>
