<div class="col-lg-12 center-clock">
    <div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">Statistik</h4>
        <div class="row" id="listChart">
            
        </div>
    </div>
</div>

<script src='https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js'></script>
<script src='https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js'></script>
<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script src='https://unpkg.com/jquery-fusioncharts@1.1.0/dist/fusioncharts.jqueryplugin.js'></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
			url: base_url +"cores/csv/<?= $this->input->get('uuid') ?>",
            type: 'GET',
            dataType: 'json',
            async: true,
            cache: false,
            beforeSend: function() {},
            success: function(response) {
                // for (let h = 0; h < response.length; h++) {
                    let domHTML = `
                    <div class="col-lg-12">
                        <div class="card card-box mb-5">
                            <div class="card-body">
                                <div id="chart-container-msline">
                                    <div class="d-flex justify-content-center text-info" id="spinner">
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $("#listChart").append(domHTML)
                // }

                let allData = []
                for (let h = 0; h < response.length; h++) {
                    var sum_biner = response[h].sum_biner.sum.split(",")
                    
                    var data = []
                    for (let i = 0; i < sum_biner.length; i++) {
                        data.push({
                            "label": "Project "+ parseInt(i+1, 10),
                            "value": sum_biner[i]
                        });
                    }
                    let allDataTemp = {
                        seriesname: response[h].name.split('-')[0],
                        data: data
                    }
                    allData.push(allDataTemp)
                }

                $("#chart-container-msline").insertFusionCharts({
                        type: "msline",
                        width: '100%',
                        height: '390',
                        dataFormat: "json",
                        dataSource: {
                            chart: {
                            caption: "Reach of Social Media Platforms amoung youth",
                            yaxisname: "% of youth on this platform",
                            subcaption: "2012-2016",
                            showhovereffect: "1",
                            numbersuffix: "%",
                            drawcrossline: "1",
                            plottooltext: "<b>$dataValue</b> of youth were on $seriesName",
                            theme: "fusion"
                            },
                            categories: [
                            {
                                category: [
                                {
                                    label: "1"
                                },
                                {
                                    label: "2"
                                },
                                {
                                    label: "3"
                                },
                                {
                                    label: "4"
                                },
                                {
                                    label: "5"
                                },
                                {
                                    label: "1"
                                },
                                {
                                    label: "2"
                                },
                                {
                                    label: "3"
                                },
                                {
                                    label: "4"
                                },
                                {
                                    label: "5"
                                }
                                ]
                            }
                            ],
                            dataset: allData
                        }
                    });
            },
            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            },
            complete: function() {
                console.log('complete')
            }
        });
    })
</script>