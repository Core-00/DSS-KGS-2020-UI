<div class="col-lg-8">
    <div class="example-box example-box-alt pb-5">
        <!-- <h4 class="heading-2 pb-4">Produk</h4> -->
        <div class="card card-box mb-5">
            <div class="grid-menu grid-menu-3col">
                <div class="scroll-area-lg" style="height:483px;">
                    <div class="scrollbar-container" style="height:483px;">
                        <div class="no-gutters row" id="listFiles">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="example-box example-box-alt pb-5">
        <!-- <h4 class="heading-2 pb-4">Keranjang</h4> -->
        <div class="card card-box mb-5">
            <div class="grid-menu grid-menu-3col">
                <div class="scroll-area-lg" style="height:483px;">
                    <div class="scrollbar-container" id="nilQuestionMark" style="height:483px;">
                        <div class="no-gutters row" id="divCarts">
                            <div class="container">
                                <br/>
                                <form class="was-validated" id="addForm">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="form-2-csv">File CSV</label>
                                            <input type="file" class="form-control" id="form-2-csv" multiple="multiple" accept=".csv" required>
                                            <div class="invalid-feedback">File CSV wajib diisi!</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary mb-4">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#form-2-csv').change(function(){
            var files = $(this)[0].files;
            let html = ``;
            for (let i = 0; i < files.length; i++) {
                html += `
                <div class="col-sm-6 col-xl-4 p-3">
                    <table>
                        <tr>
                            <td rowspan="3">
                                <img src="https://getdrawings.com/free-icon/icon-extension-55.png" alt="Rounded image" class="img-fluid rounded m-2 shadow-sm cover" width="90">
                            </td>
                            <td colspan="3"><font size="3">` + files[i].name + `</font><br/><font size="2">` + parseInt(files[i].size, 10) / 1000 + ` KB</font></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td> 
                        </tr>
                    </table>
                </div>`;
            }

            $("#listFiles").empty().html(html)
        });
        $("#addForm").submit(function(event) {
            var form_data = new FormData();

            // Read selected files
            var totalfiles = document.getElementById('form-2-csv').files.length;
            for (var index = 0; index < totalfiles; index++) {
                form_data.append("csv[]", document.getElementById('form-2-csv').files[index]);
            }

            $.ajax({
                url: base_url +"cores/multiplecsv",
                type: "POST",
                dataType: "json",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    window.location = '<?= base_url() ?>csv/edit?uuid='+ response.parameter.toString()
                }
            });
            event.preventDefault();
        })
    })
</script>