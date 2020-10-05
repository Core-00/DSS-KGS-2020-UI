<div class="row my-3">
    <div class="col-md-12">
        <div class="w-100 d-flex justify-content-between align-items-center">
            <h3 class="font-weight-bold">Edit CSV</h3>

            <div>
                <a href="<?= site_url('csv/list_history') ?>" class="text-danger mr-3">back</a>
                <button onclick="submitUpdateCsv()" class="btn btn-info">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <form id="updateCvs">
            <table class="table table-striped table-responsive">
                <tbody id="detail-csv">
                    <tr>
                        <td colspan="6" class="text-center">No data</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var dataKeyBiner = []
    var dataSumBiner = {}


    $(document).ready(function() {
        $.ajax({
            url: base_url + "cores/csv/<?= $this->input->get('parameter') ?>",
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
                    if (index === 0) {
                        html += '<tr>'
                        html += `<td align="center">${index + 1}</td>`
                        html += `<td align="center">${data.name}</td>`
                        data.biner.forEach((dataBiner, indexBiner) => {
                            html += `
                            <td align="center">${dataBiner}</td>`
                        })
                        html += '</tr>'
                    } else {
                        html += '<tr>'
                        html += `<td align="center">${index + 1}</td>`
                        html += `<td align="center">${data.name}</td>`
                        data.biner.forEach((dataBiner, indexBiner) => {
                            html += `
                            <td align="center">
                                <!-- <input type="number" value="${dataBiner}" class="form-control" /> -->
                                <input type="number" value="${dataBiner}" index="${index}" indexBiner="${indexBiner}" onkeyup="setBinerCsv(this)" class="form-control" />
                            </td>`
                        })
                        html += '</tr>'
                    }
                })

                $("#detail-csv").empty().html(html)


                response.key_biners.forEach((data, index) => {
                    dataKeyBiner.push({
                        id: data.id,
                        userid: data.userid,
                        parameter: data.parameter,
                        name: data.name,
                        biner: data.biner,
                        createdAt: data.updatedAt,
                        updatedAt: data.updatedAt
                    })
                })
                dataSumBiner = {
                    id: response.sum_biner.id
                }
            },
            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            }
        });
    })

    function setBinerCsv(data) {
        dataKeyBiner[data.attributes.index.value].biner[data.attributes.indexBiner.value] = data.value
    }

    $("#updateCvs").on('submit', function (event) {
        // event.preventDefault();
        // $.ajax({
        //     url: base_url +"cores/csv",
        //     type: 'PUT',
        //     data: {
        //         key_biner: JSON.stringify(dataKeyBiner),
        //         sum: JSON.stringify(dataSumBiner),
        //     },
        //     cache: false,
        //     beforeSend: function() {},
        //     success: function(response) {
        //         alert('Data berhasil di update.')
        //     },
        //     error: function(response, textStatus, errorThrown) {
        //         console.log('error')
        //     },
        //     complete: function() {
        //         console.log('complete')
        //     }
        // });

    })

    function submitUpdateCsv () {
        alert("fuck")
        $.ajax({
            url: base_url +"cores/csv",
            type: 'PUT',
            headers: {
                "Authorization": "Bearer " + localStorage.getItem('Project1')
            },
            data: JSON.stringify({
                key_biner: dataKeyBiner,
                sum: dataSumBiner
            }),
            cache: false,
            beforeSend: function() {},
            success: function(response) {
                alert('Data berhasil di update.')
            },
            error: function(response, textStatus, errorThrown) {
                console.log('error')
            },
            complete: function() {
                console.log('complete')
            }
        });
        // $("#updateCvs").submit()
    }
</script>
