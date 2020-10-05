<div class="row my-3">
    <div class="col-md-12">
        <h3 class="font-weight-bold">Graphs</h3>
        <!-- <canvas id="myChart" style="width: 300px; height: 200px"></canvas> -->
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12 mb-3">
        <select class="custom-select" id="re-drawer">
            <option value="bar" selected>Bar</option>
            <option value="line">Line</option>
            <option value="pie">Pie</option>
        </select>
    </div>
</div>

<!-- ==========><>|Merged|<><========== -->
<div class="row mb-3">
    <div class="col-md-12 mb-3">
        <h5>Fusion Result</h5>
        <div id="draw-merge-graph">
            <canvas id="merge-graph" width="10" height="3"></canvas>
        </div>
    </div>`
</div>
<!-- ==========><>|Merged|<><========== -->

<!-- ==========><>|Listed|<><========== -->
<div class="row mb-3" id="listed-graph"></div>
<!-- ==========><>|Listed|<><========== -->


<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var mergedGraph
    var borderColor = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ]

    var backgroundColor = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ]

    function getRandomColor() {
        // var letters = '0123456789ABCDEF'.split('');
        var letters = '0A1B2C3D4E5F6789'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    $(document).ready(function(){
        initiateReportGraph ('bar')
    })

    $('#re-drawer').on('change', function(){
        reDraw($('#re-drawer').val())
    })

    function reDraw (type) {
        mergedGraph.destroy()
        initiateReportGraph (type)
    }

    function initiateReportGraph (type) {
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
                renderListedGraph(response.per_table, response.merge_result, type)
            },
            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            }
        });
    }

    function renderListedGraph (list, merge, type) {
        var renderListedGraphHtml = ''
        var setMergeGraphListCounter = 0

        // if (list.length > 1) {
            list.forEach((data, index) => {
                renderListedGraphHtml += `
                <div class="col-md-12 mb-3">
                    <h5>${data.name}</h5>
                    <canvas id="listed-graph-${index}" width="10" height="${type === 'pie' ? '5' : '2'}"></canvas>
                </div>`
            })
        // }
        $("#listed-graph").empty().html(renderListedGraphHtml)
        var reportGraphCounter = 0
        list.forEach((data, index) => {
            new Chart($(`#listed-graph-${index}`), {
                type,
                data: {
                    labels: data.key_biners[0].biner.map((dataLabel, indexLabel) => {
                        return `${dataLabel} | ${data.sum_biner.sum_persen[indexLabel]}`
                    }),
                    datasets: [{
                        label: data.name,
                        data: data.sum_biner.sum_persen.map((dataList) => {
                            return parseFloat(dataList)
                        }),
                        borderWidth: 1,
                        borderColor: type === 'line' ? backgroundColor[reportGraphCounter] : [],
                        // backgroundColor: type === 'line' ? backgroundColor[reportGraphCounter] : data.key_biners[0].biner.map((data, index) => {
                        //     return backgroundColor[index % backgroundColor.length]
                        // }),
                        backgroundColor: type === 'line' ? backgroundColor[reportGraphCounter] : data.key_biners[0].biner.map((data, index) => {
                            return getRandomColor()
                        }),
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    responsive: true
                }
            });
            setMergeGraphListCounter++
            reportGraphCounter++
            if (reportGraphCounter === 5) {
                reportGraphCounter = 0
            }

            if (setMergeGraphListCounter === list.length) {
                renderMergedGraph(merge.sum_persen, list[0].key_biners[0].biner, type)
            }
        })
    }

    function renderMergedGraph (data, label, type) {
        var renderDrawMergeGraph = `<canvas id="merge-graph" width="10" height="${type === 'pie' ? '5' : '3'}"></canvas>`
        $("#draw-merge-graph").empty().html(renderDrawMergeGraph)
        mergedGraph = new Chart($('#merge-graph'), {
            type,
            data: {
                labels: label.map((dataLabel, indexLabel) => {
                    return `${dataLabel} | ${data[indexLabel]}`
                }),
                datasets: [{
                    label: 'Fusion Results',
                    data: data.map((data) => {
                        return parseFloat(data)
                    }),
                    borderWidth: 1,
                    borderColor: type === 'line' ? backgroundColor[5] : [],
                    // backgroundColor: type === 'line' ? backgroundColor[5] : label.map((data, index) => {
                    //     return backgroundColor[index % backgroundColor.length]
                    // }),
                    backgroundColor: type === 'line' ? backgroundColor[5] : label.map((data, index) => {
                        return getRandomColor()
                    }),
                    fill: false,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                responsive: true
            }
        });
    }
</script>
