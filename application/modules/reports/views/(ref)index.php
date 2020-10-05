<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<div class="col-lg-12">
<div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">Laporan</h4>
        <div class="card card-box mb-5">
            <table id="example" class="table table-hover" width="100%" data-toggle="datatable">
                <thead>
                    <tr>
                        <th width="5%">Multi</th>
                        <th width="5%">No</th>
                        <th>File</th>
                        <th width="10%">Total Row</th>
                        <th>Upload Date</th>
                        <th width="30%">Opsi</th>
                    </tr>
                </thead>
                <tbody id="tableValue">

                </tbody>
            </table>
</div>
</div>
</div>

<script>
    $(document).ready(function(){
        defaultReport()

        $("#multiGraph").click(function(){
            var params = [];
            $("input[name='parameter']:checked").each(function() {
                params.push($(this).val());
            });

            if(params.length > 0){
                window.location = '<?= base_url() ?>reports/multigraph?uuid='+ params.toString()
            }else{
                alert('Silahkan check data yang ingin ditampilkan.')
            }
        })

        $("#formSearchReport").submit(function(event) {
            var endpoint = base_url + 'v1/sales/daterange';
            var start = $("#start").val()
            var end = $("#end").val()
            if(start == "" || end == ""){
                alert("Masukin tanggal valid dulu yaa")
                return false;
            }
            $("title").text("Report File -"+ start +" s/d "+ end)

            $('#example').DataTable().destroy();

            $.ajax({
                url: base_url + 'reports/date_range',
                type: 'GET',
                data: $(this).serialize(),
                async: false,
                cache: false,
                beforeSend: function() {
                },
                success: function(response) {
                    let html = ``;

                    for (let i = 0; i < response.length; i++) {
                        html += `
                        <tr>
                            <td align="center">
                                <div class="custom-control custom-checkbox my-3">
                                    <input type="checkbox" name="parameter" class="custom-control-input" value="`+ response[i].parameter +`" id="customCheck1-`+ i +`">
                                    <label class="custom-control-label" for="customCheck1-`+ i +`"></label>
                                </div>
                            </td>
                            <td align="center">`+ parseInt( i+1, 10) +`</td>
                            <td>`+ response[i].name.split("-")[0] +`</td>
                            <td>`+ response[i].key_biners.length +`</td>
                            <td>`+ response[i].createdAt +`</td>
                            <td align="center">
                                <a class="btn btn-success" href="<?= base_url() ?>reports/graph?uuid=`+ response[i].parameter +`">Grafik</a>
                                <a class="btn btn-primary" href="<?= base_url() ?>csv/edit?uuid=`+ response[i].parameter +`">Edit</a>
                                <a class="btn btn-info" href="<?= base_url() ?>csv/detail?uuid=`+ response[i].parameter +`">Detail</a>
                            </td>
                        </tr>
                        `
                    }

                    $("#tableValue").empty().html(html)

                    $('[data-toggle="datatable"]').DataTable({
                        responsive: !0,
                        autoFill: !0,
                        keys: !0,
                        lengthMenu: [ [ 5, 10, 15, -1 ], [ 5, 10, 15, 'All' ] ],
                        dom:
                            '<"row"<"col-md-6 d-flex align-items-center"B><"col-md-6 d-flex align-items-center" f><"col-md-12"<"divider"> i>><t><"table-footer-wrapper" <"divider"> <"row"<"col-md-6 d-flex align-items-center" l><"col-md-6 d-flex align-items-center" p>>>',
                        buttons: ['pdf' ],
                        columnDefs: [ { targets: 'no-sort', orderable: !1 } ]
                    });
                },
                error: function(response, textStatus, errorThrown) {
                    console.log('error')
                },
                complete: function() {
                    console.log('complete')
                }
            });
            event.preventDefault();
        });
    })

    function defaultReport(){
        $.ajax({
            url: base_url + 'reports/date_range',
            type: 'GET',
            data: {
                start: "<?= date('Y-m') ?>-1",
                end: "<?= date('Y-m') ?>-30"
            },
            dataType: 'json',
            async: true,
            cache: false,
            dataType: 'json',
            beforeSend: function() {
            },
            success: function(response) {
                let html = ``;

                for (let i = 0; i < response.length; i++) {
                    html += `
                    <tr>
                        <td align="center">
                            <div class="custom-control custom-checkbox my-3">
                                <input type="checkbox" name="parameter" class="custom-control-input" value="`+ response[i].parameter +`" id="customCheck1-`+ i +`">
                                <label class="custom-control-label" for="customCheck1-`+ i +`"></label>
                            </div>
                        </td>
                        <td align="center">`+ parseInt( i+1, 10) +`</td>
                        <td>`+ response[i].name.split("-")[0] +`</td>
                        <td>`+ response[i].key_biners.length +`</td>
                        <td>`+ response[i].createdAt +`</td>
                        <td align="center">
                            <a class="btn btn-success" href="<?= base_url() ?>reports/graph?uuid=`+ response[i].parameter +`">Grafik</a>
                            <a class="btn btn-primary" href="<?= base_url() ?>csv/edit?uuid=`+ response[i].parameter +`">Edit</a>
                            <a class="btn btn-info" href="<?= base_url() ?>csv/detail?uuid=`+ response[i].parameter +`">Detail</a>
                        </td>
                    </tr>
                    `
                }

                $("#tableValue").empty().html(html)

                $('[data-toggle="datatable"]').DataTable({
                    responsive: !0,
                    autoFill: !0,
                    keys: !0,
                    lengthMenu: [ [ 5, 10, 15, -1 ], [ 5, 10, 15, 'All' ] ],
                    dom:
                        '<"row"<"col-md-6 d-flex align-items-center"B><"col-md-6 d-flex align-items-center" f><"col-md-12"<"divider"> i>><t><"table-footer-wrapper" <"divider"> <"row"<"col-md-6 d-flex align-items-center" l><"col-md-6 d-flex align-items-center" p>>>',
                    buttons: [ 'pdf' ],
                    columnDefs: [ { targets: 'no-sort', orderable: !1 } ]
                });

            },
            error: function(response, textStatus, errorThrown) {
                error(response.responseJSON.data.message)
            },
            complete: function() {
                console.log('complete')
            }
        });
    }
</script>
