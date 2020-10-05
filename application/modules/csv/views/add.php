<div class="row my-3">
    <div class="col-md-12">
        <h3 class="font-weight-bold">Input Data</h3>
    </div>
</div>

<div class="row mb-3 align-items-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="add-csv" multiple accept=".csv" required>
                            <label class="custom-file-label" for="add-csv">Choose file</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-info" type="button" id="add-button">Process</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- <div class="col-md-6">
        <button class="btn btn-block btn-info" id="add-button">upload</button>
    </div> -->
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5>Selected files</h5>
                <div id="new-csv">
                    please select csv file
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#add-csv').change(function(){
            var files = $(this)[0].files;
            let html = ``;
            for (let i = 0; i < files.length; i++) {
                // console.log(files[i])
                html += `
                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                    <h6 class="font-weight-bold">${files[i].name}</h6>
                    <p class="">${files[i].lastModifiedDate}</p>
                </div>`;
            }

            $("#new-csv").empty().html(html)
        });

        $("#add-button").click(function(event) {
            var form_data = new FormData();

            // Read selected files
            var dataFiles = document.getElementById('add-csv').files;
            for (var index = 0; index < dataFiles.length; index++) {
                form_data.append("csv[]", dataFiles[index]);
            }

            $.ajax({
                url: base_url +"cores/multiplecsv",
                type: "POST",
                dataType: "json",
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('Project1')
                },
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    window.location = '<?= site_url('logs/detail') ?>';
                    // window.location = '<?= base_url() ?>dashboards'
                }
            });
            // event.preventDefault();
        })
    })

</script>
