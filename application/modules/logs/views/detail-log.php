<div class="row my-3">
    <div class="col-md-12">
        <div class="w-100 d-flex justify-content-between align-items-center">
            <h3 class="font-weight-bold">Detail Log</h3>

            <div>
                <a href="<?= base_url() ?>csv/add" class="text-danger mr-2">Reupload</a>
                <a href="<?= base_url() ?>reports/fusion_print" class="text-success">Print Fusion Result</a>
            </div>
        </div>
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
                    <th></th>
                    <!-- <th width="30%">Opsi</th> -->
                </tr>
            </thead>
            <tbody id="list-detail-log">
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
        $.ajax({
            url: base_url + 'reports/merge_result',
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
                response.per_table.forEach((data, index) => {
                    html += `
                        <tr>
                            <td align="center">${index + 1}</td>
                            <td>${data.name.split("-")[0]}</td>
                            <td>${data.key_biners.length}</td>
                            <td>${data.createdAt}</td>
                            <td>
                                <a href="<?= base_url() ?>csv/detail?parameter=${data.parameter}" class="text-info mr-2">detail</a>
                                <a href="<?= base_url() ?>reports/single_print?parameter=${data.parameter}" class="text-success">print</a>
                            </td>
                        </tr>
                        `
                })
                $("#list-detail-log").empty().html(html)
            },
            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            }
        });
    })

</script>
