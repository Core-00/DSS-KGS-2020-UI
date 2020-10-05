<div class="row my-3">
    <div class="col-md-12">
        <div class="w-100 d-flex justify-content-between align-items-center">
            <h3 class="font-weight-bold">Detail CSV</h3>

            <a href="<?= site_url('csv/list_history') ?>" class="text-danger">back</a>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <table class="table table-striped table-responsive">
            <tbody id="detail-csv">
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
            url: base_url +"cores/csv/<?= $this->input->get('parameter') ?>",
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
                response.key_biners.forEach((data, index) => {
                    html += '<tr>'
                    html += `<td align="center">${index + 1}</td>`
                    html += `<td align="center">${data.name}</td>`
                    data.biner.forEach((dataBiner) => {
                        html += `<td align="center">${dataBiner}</td>`
                    })
                    html += '</tr>'
                })
                $("#detail-csv").empty().html(html)
            },
            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            }
        });

    })

</script>
