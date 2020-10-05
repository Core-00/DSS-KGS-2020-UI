<div class="row my-3">
    <div class="col-md-12">
        <h3 class="font-weight-bold">List History</h3>
    </div>
</div>

<div class="row mb-3 align-items-center">
    <div class="col-md-12" id="list-history">
        <div class="card">
            <div class="card-body">
                <h5>Batch 1</h5>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>File</th>
                            <th width="10%">Total Row</th>
                            <th>Upload Date</th>
                            <th width="30%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" class="text-center">No data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var listHistoryBatches = []
    var listHistoryConvertedBaches = []
    var listHistoryCsvByGroup = []

    function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
}


    $(document).ready(function(){
        $.ajax({
            url: base_url + 'reports/all',
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
                // ==========><>|Batches|<><==========
                listHistoryBatches = response.map((data) => {
                    return data.batch
                })

                listHistoryConvertedBaches = listHistoryBatches.filter((value, index, self) => {
                    return self.indexOf(value) === index
                })
                // ==========><>|Batches|<><==========

                // ==========><>|Batches|<><==========

                listHistoryConvertedBaches.forEach((dataBatch) => {
                    listHistoryCsvByGroup.push({
                        data: response.filter((dataCsv) => {
                            return dataCsv.batch === dataBatch
                        })
                    })
                })

                let html = ``
                var dataBlob, textFile

                listHistoryCsvByGroup.forEach((dataBatch, batchIndex) => {
                    html += `
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Batch ${dataBatch.data[0].batch}</h5>
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>File</th>
                                        <th width="10%">Total Row</th>
                                        <th>Upload Date</th>
                                        <th width="30%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                    `
                    dataBatch.data.forEach((data, index) => {
                        textFile = data.name.split("-")[0]
                        textFile += '\r\n'
                        var tmpKeyBiner = data.key_biners[0].biner.split(',')
                        var tmpSumBiner = data.sum_biner.sum.split(',')
                        // textFile += `\r\nNo\tParameter\tProbability`
                        tmpKeyBiner.forEach((dataKeyBiner, indexDataKeyBiner) => {
                            textFile += `\r\n${indexDataKeyBiner + 1}\t${dataKeyBiner}\t${tmpSumBiner[indexDataKeyBiner]}`
                        })
                        textFile += '\r\n'
                        // data.key_biners.forEach((dataKeyBiner) => {
                        //     textFile += '\r\n\r\n'
                        //     textFile += dataKeyBiner.name
                        //     textFile += '\r\n ==========><>|Value|<><==========\r\n'
                        //     var biner = dataKeyBiner.biner.split(',')
                        //     biner.forEach((dataBiner) => {
                        //         textFile += `${dataBiner}   `
                        //     })
                        //     textFile += '\r\n ==========><>|Value|<><=========='
                        //     textFile += '\r\n\r\n'
                        // })


                        dataBlob = new Blob([textFile], {type: 'text/plain'});

                        html += `
                        <tr>
                            <td align="center">${index + 1}</td>
                            <td>${data.name.split("-")[0]}</td>
                            <td>${data.key_biners.length}</td>
                            <td>${data.createdAt}</td>
                            <td>
                                <a href="<?= base_url() ?>csv/edit?parameter=${data.parameter}" class="mr-2">edit</a>
                                <a href="<?= base_url() ?>csv/detail?parameter=${data.parameter}" class="text-info mr-2">detail</a>
                                <a href="<?= base_url() ?>reports/single_print?parameter=${data.parameter}" class="text-success mr-2">print</a>
                                <a download="${data.name.split("-")[0]}.txt" target="_blank" href="${window.URL.createObjectURL(dataBlob)}" class="text-warning">download txt</a>
                            </td>
                        </tr>
                        `
                    })
                    html += `
                                </tbody>
                            </table>
                        </div>
                    </div>
                    `
                })
                $("#list-history").empty().html(html)
            },

            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            }
        });
    })

</script>
