<div class="row my-3">
    <div class="col-md-12">
        <h3 class="font-weight-bold">Tables</h3>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <!-- <th width="5%">Multi</th> -->
                    <th width="5%">No</th>
                    <th>File</th>
                    <th width="10%">Total Row</th>
                    <th>Upload Date</th>
                    <!-- <th width="30%">Opsi</th> -->
                </tr>
            </thead>
            <tbody id="list-csv">
                <tr>
                    <td colspan="6" class="text-center">No data</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // ==========><>|Get report|<><==========
        $.ajax({
            url: base_url + 'reports/',
            type: 'GET',
            headers: {
                "Authorization": "Bearer " + localStorage.getItem('Project1')
            },
            dataType: 'json',
            async: true,
            cache: false,
            dataType: 'json',
            beforeSend: function() {},
            success: function(response) {
                let html = ``;
                for (let i = 0; i < response.length; i++) {
                    html += `
                    <tr>
                        <td align="center">${i + 1}</td>
                        <td>${response[i].name.split("-")[0]}</td>
                        <td>${response[i].key_biners.length}</td>
                        <td>${response[i].createdAt}</td>
                    </tr>
                    `
                }
                $("#list-csv").empty().html(html)
            },
            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            }
        });
        // ==========><>|Get report|<><==========

    })

</script>
