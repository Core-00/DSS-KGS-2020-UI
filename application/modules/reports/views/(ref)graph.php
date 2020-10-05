
<div class="col-lg-8 center-clock">
    <div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">Statistik</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-box mb-5">
                    <div class="card-body">
                        <div id="chart-container-line">
                            <div class="d-flex justify-content-center text-info" id="spinner">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-box mb-5">
                    <div class="card-body">
                        <div id="chart-container-bar">
                            <div class="d-flex justify-content-center text-info" id="spinner">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-12">
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
            </div> -->
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">Persentase</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-box mb-5">
                    <div class="card-body">
                        <div id="chart-container-3d-doughnut">
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
    </div>
</div>

<script src='https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js'></script>
<script src='https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js'></script>
<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script src='https://unpkg.com/jquery-fusioncharts@1.1.0/dist/fusioncharts.jqueryplugin.js'></script>
<script type="text/javascript">
        function monthName(mon) {
            return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Nov', 'Dec'][mon - 1];
        }

        $(document).ready(function(){
            $.ajax({
				url: base_url +"cores/csv/<?= $this->input->get('uuid') ?>",
                type: 'GET',
                dataType: 'json',
                async: true,
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    var data = []
                    
                    var sum_biner = response[0].sum_biner.sum.split(",")
                    
                    for (let i = 0; i < sum_biner.length; i++) {
                        data.push(
                            {
                                "label": "Project "+ parseInt(i+1, 10),
                                "value": sum_biner[i]
                            }
                        );
                    }

                    FusionCharts.ready(function () {
                        var visitChart = new FusionCharts({
                            type: 'line',
                            renderAt: 'chart-container-line',
                            width: '100%',
                            height: '350',
                            dataFormat: 'json',
                            dataSource: {
                                "chart": {
                                    "theme": "fusion",
                                    "caption": response[0].name.split("-")[0],
                                    "subCaption": "Semua Project",
                                    "xAxisName": "Project n",
                                    "yAxisName": "Pendapatan",
                                    "divlineColor": "#999999",
                                    "divLineIsDashed": "1"
                                },
                                "data": data
                            }
                        });
                        
                        visitChart.render();
                    });
                },
                error: function(response, textStatus, errorThrown) {
                    error(response.responseJSON.data.message)
                },
                complete: function() {
                    console.log('complete')
                }
            });

            $.ajax({
				url: base_url +"cores/csv/<?= $this->input->get('uuid') ?>",
                type: 'GET',
                dataType: 'json',
                async: true,
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    var data = []
                    var sum_biner = response[0].sum_biner.sum.split(",")
                    
                    for (let i = 0; i < sum_biner.length; i++) {
                        data.push(
                            {
                                "label": "Project "+ parseInt(i+1, 10),
                                "value": sum_biner[i]
                            }
                        );
                    }

                    FusionCharts.ready(function(){
                        var chartObj = new FusionCharts({
                            type: 'doughnut3d',
                            renderAt: 'chart-container-3d-doughnut',
                            width: '100%',
                            height: '450',
                            dataFormat: 'json',
                            dataSource: {
                                "chart": {
                                    "caption": response[0].name.split("-")[0],
                                    "subCaption": "Persentase Penjumlahan",
                                    "bgColor": "#ffffff",
                                    "startingAngle": "310",
                                    "showLegend": "1",
                                    "centerLabelBold": "1",
                                    "showTooltip": "0",
                                    "decimals": "0",
                                    "theme": "fusion"
                                },
                                "data": data
                            }
                        });
                        chartObj.render();
                    });
                },
                error: function(response, textStatus, errorThrown) {
                    error(response.responseJSON.data.message)
                },
                complete: function() {
                    console.log('complete')
                }
            });

            $.ajax({
				url: base_url +"cores/csv/<?= $this->input->get('uuid') ?>",
                type: 'GET',
                dataType: 'json',
                async: true,
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    var data = []
                    
                    var sum_biner = response[0].sum_biner.sum.split(",")
                    
                    for (let i = 0; i < sum_biner.length; i++) {
                        data.push(
                            {
                                "label": "Project "+ parseInt(i+1, 10),
                                "value": sum_biner[i]
                            }
                        );
                    }

                        FusionCharts.ready(function(){
                        var chartObj = new FusionCharts({
                            type: 'column2d',
                            renderAt: 'chart-container-bar',
                            width: '100%',
                            height: '390',
                            dataFormat: 'json',
                            dataSource: {
                                "chart": {
                                    "caption": response[0].name.split("-")[0],
                                    "subCaption": "Bar",
                                    "xAxisName": "Project n",
                                    "theme": "fusion"
                                },
                                "data": data,
                                "trendlines": [{
                                    "line": [{
                                        "startvalue": "35",
                                        "valueOnRight": "1",
                                        "displayvalue": "Angka Minimal"
                                    }]
                                }]
                            }
                        });
                        chartObj.render();
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
               
//         $("#chart-container-msline").insertFusionCharts({
//   type: "msline",
//   width: '100%',
//                             height: '390',
//   dataFormat: "json",
//   dataSource: {
//     chart: {
//       caption: "Reach of Social Media Platforms amoung youth",
//       yaxisname: "% of youth on this platform",
//       subcaption: "2012-2016",
//       showhovereffect: "1",
//       numbersuffix: "%",
//       drawcrossline: "1",
//       plottooltext: "<b>$dataValue</b> of youth were on $seriesName",
//       theme: "fusion"
//     },
//     categories: [
//       {
//         category: [
//           {
//             label: "2012"
//           },
//           {
//             label: "2013"
//           },
//           {
//             label: "2014"
//           },
//           {
//             label: "2015"
//           },
//           {
//             label: "2016"
//           }
//         ]
//       }
//     ],
//     dataset: [
//       {
//         seriesname: "Facebook",
//         data: [
//           {
//             value: "62"
//           },
//           {
//             value: "64"
//           },
//           {
//             value: "64"
//           },
//           {
//             value: "66"
//           },
//           {
//             value: "78"
//           }
//         ]
//       },
//       {
//         seriesname: "Instagram",
//         data: [
//           {
//             value: "16"
//           },
//           {
//             value: "28"
//           },
//           {
//             value: "34"
//           },
//           {
//             value: "42"
//           },
          
//         ]
//       },
//       {
//         seriesname: "LinkedIn",
//         data: [
//           {
//             value: "20"
//           },
//           {
//             value: "22"
//           },
//           {
//             value: "27"
//           },
//           {
//             value: "22"
//           },
//           {
//             value: "29"
//           }
//         ]
//       },
//       {
//         seriesname: "Twitter",
//         data: [
//           {
//             value: "18"
//           },
//           {
//             value: "19"
//           },
//           {
//             value: "21"
//           },
//           {
//             value: "21"
//           },
//           {
//             value: "24"
//           }
//         ]
//       }
//     ]
//   }
// });
</script>