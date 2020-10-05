<div class="col-lg-12 center-clock">
    <div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">Grafik</h4>
        <div class="row" id="listChart">
            
        </div>
        <div class="row" id="mergeChart" style="display:none">
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
            </div>
        </div>

        <div class="row" id="mergeChartResult" style="display:none">
            <div class="col-lg-12">
                <div class="card card-box mb-5">
                    <div class="card-body">
                        <div class="row" id="mergeResult">

                        </div>
                    </div>
                </div>
            </div>
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
                for (let h = 0; h < response.length; h++) {
                    let domHTML = `
                    <div class="col-lg-12">
                        <div class="card card-box mb-5">
                            <div class="card-body">
                                <div id="chart-container-line-`+ h +`">
                                    <div class="d-flex justify-content-center text-info" id="spinner">
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                <table width="30%" border="1">
                                    <thead>
                                        <tr>
                                            <th width="5%">Project</th>
                                            <th width="10%">Nilai</th>
                                            <th width="15%">Rekomendasi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="chart-result-`+ h +`">
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $("#listChart").append(domHTML)
                }

                let allData = []
                for (let h = 0; h < response.length; h++) {
                    var sum_biner = response[h].sum_biner.sum.split(",")
                    let data = []
                    let html = ''
                    for (let i = 0; i < sum_biner.length; i++) {
                        data.push({
                            "label": "Project "+ parseInt(i+1, 10),
                            "value": sum_biner[i]
                        });

                        let recomendation

                        if(sum_biner[i] > 0 && sum_biner[i] < 20){
                            recomendation = 'Rekomendasi 1'
                        }else if(sum_biner[i] > 20 && sum_biner[i] < 30){
                            recomendation = 'Rekomendasi 2'
                        }else if(sum_biner[i] > 30 && sum_biner[i] < 40){
                            recomendation = 'Rekomendasi 3'
                        }else if(sum_biner[i] > 40 && sum_biner[i] < 50){
                            recomendation = 'Rekomendasi 4'
                        }else if(sum_biner[i] > 50 && sum_biner[i] < 60){
                            recomendation = 'Rekomendasi 5'
                        }else{
                            recomendation = 'Rekomendasi 6'
                        }
                        html += `
                            <tr>
                                <td>`+ parseInt(i+1, 10) +`</td>
                                <td>`+ sum_biner[i] +`</td>
                                <td>`+ recomendation +`</td>
                            </tr>`
                    }
                    $("#chart-result-"+h).html(html)
                    allData.push({
                        name: response[h].name.split("-")[0],
                        data: data
                    })
                }
                for (let h = 0; h < allData.length; h++) {
                    let html = `
                    
                    `
                    $("#chart-result-"+ h)
                    FusionCharts.ready(function () {
                        var visitChart = new FusionCharts({
                            type: 'line',
                            renderAt: 'chart-container-line-'+ h,
                            width: '100%',
                            height: '350',
                            dataFormat: 'json',
                            dataSource: {
                                "chart": {
                                    "theme": "fusion",
                                    "caption": allData[h].name,
                                    "subCaption": "Semua Project",
                                    "xAxisName": "Project n",
                                    "yAxisName": "Angka",
                                    "divlineColor": "#999999",
                                    "divLineIsDashed": "1"
                                },
                                "data": allData[h].data
                            }
                        });
                        visitChart.render();
                    });
                }
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
                let allData = []
                let projectLongest = 0
                var html = ``
                for (let h = 0; h < response.length; h++) {
                    var sum_biner = response[h].sum_biner.sum.split(",")
                    
                    var data = []
                    html +=`<div class="col-md-6">
                    <h5>`+response[h].name.split('-')[0]+`</h5>
                    <table width="100%" border="1">
                                    <thead>
                                        <tr>
                                            <th width="5%">Project</th>
                                            <th width="10%">Nilai</th>
                                            <th width="15%">Rekomendasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>`
                    for (let i = 0; i < sum_biner.length; i++) {
                        data.push({
                            "label": "Project "+ parseInt(i+1, 10),
                            "value": sum_biner[i]
                        });
                        
                        if(sum_biner[i] > 0 && sum_biner[i] < 20){
                            recomendation = 'Rekomendasi 1'
                        }else if(sum_biner[i] > 20 && sum_biner[i] < 30){
                            recomendation = 'Rekomendasi 2'
                        }else if(sum_biner[i] > 30 && sum_biner[i] < 40){
                            recomendation = 'Rekomendasi 3'
                        }else if(sum_biner[i] > 40 && sum_biner[i] < 50){
                            recomendation = 'Rekomendasi 4'
                        }else if(sum_biner[i] > 50 && sum_biner[i] < 60){
                            recomendation = 'Rekomendasi 5'
                        }else{
                            recomendation = 'Rekomendasi 6'
                        }
                        
                        html += `
                            <tr>
                                <td>`+ parseInt(i+1, 10) +`</td>
                                <td>`+ sum_biner[i] +`</td>
                                <td>`+ recomendation +`</td>
                            </tr>`
                    }
                    html += `</td></tr></tbody>
                        </table></div></br></br>`
                    let allDataTemp = {
                        seriesname: response[h].name.split('-')[0],
                        data: data
                    }
                    allData.push(allDataTemp)

                    if(sum_biner.length > projectLongest){
                        projectLongest = sum_biner.length
                    }
                }

                let project = []
                for (let i = 0; i < projectLongest; i++) {
                    project.push({
                        label: "Project "+ parseInt(i+1, 10)
                    })
                }
                $("#chart-container-msline").insertFusionCharts({
                    type: "msline",
                    width: '100%',
                    height: '390',
                    dataFormat: "json",
                    dataSource: {
                        chart: {
                        caption: "Gabungan Grafik",
                        yaxisname: "Angka",
                        subcaption: "Semua File CSV",
                        showhovereffect: "1",
                        drawcrossline: "1",
                        // showvalues: "1",
                        plottooltext: "$label: $dataValue ($seriesName)",
                        theme: "fusion"
                        },
                        categories: [{
                            category: project
                        }],
                        dataset: allData
                    }
                });
                $("#mergeResult").html(html)
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

<script>
    $(document).ready(function(){
        $('#merge-chart').click(function() {
            if( $(this).is(':checked')) {
                $("#mergeChart").show()
                $("#mergeChartResult").show()
                $("#listChart").hide()
            }else {
                $("#mergeChart").hide()
                $("#mergeChartResult").hide()
                $("#listChart").show()
            }
        }); 
    })
</script>