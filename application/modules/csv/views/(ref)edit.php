

<div class="card-body">
    <div class="tab-content p-3 pb-0">
        <div id="example-result-2">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <ul class="nav nav-line" id="myTab3" role="tablist">
                    </ul>
                    <div class="tab-content p-3 pb-0" id="myTab3Value">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		<!-- Script to use ajax() method to 
        add text content -->
		<script>
			$(document).ready(function () {
				$.ajax({
					url: base_url +"cores/csv/<?= $this->input->get('uuid') ?>",
					type: "GET",
					dataType: "json",
					success: function (response) {
                        let html = ''
                        let header = ``;
						let keyStorage = []
						for (let h = 0; h < response.length; h++) {
                            let active = ''
                            if(h == 0){
                                active = 'active'
                            }
                            header += `
                            <li class="nav-item">
                                <a class="nav-link `+ active +`" id="`+ response[h].id +`-tab" data-toggle="tab" href="#tab-`+ response[h].id +`" role="tab" aria-controls="home" aria-selected="true">
                                    `+ response[h].name.split("-")[0] +`
                                    <div class="divider"></div>
                                </a>
                            </li>
                            `
                            html +=`
                            <div class="tab-pane fade show `+ active +`" id="tab-`+ response[h].id +`" role="tabpanel" aria-labelledby="`+ response[h].id +`-tab">
								<input type="hidden" class="parameter" size="100" value="`+ response[h].parameter +`">
							`
							for (let i = 0; i < response[h].key_biners.length; i++) {
								keyStorage.push(response[h].key_biners[i].id)
								
								html += `
								<form name="updateForm-`+ response[h].key_biners[i].id +`" id="updateForm-`+ response[h].key_biners[i].id +`">
                                    <table class="table table-hover table-striped table-bordered mb-5">
                                        <tr>
                                            <td width="5%">`+ parseInt(i+1, 10) +`</td>
                                            <td width="30%">
                                                <input type="hidden" name="id" value="`+ response[h].key_biners[i].id +`">
                                                <textarea class="form-control" name="name">`+ response[h].key_biners[i].name +`</textarea>
                                                <input type="hidden" name="parameter_biner" value="`+ response[h].key_biners[i].parameter +`">
                                            </td>
                                            `;
                                            let biner = response[h].key_biners[i].biner.split(",")
                                            for (let j = 0; j < biner.length; j++) {
                                                html +=`
                                                <td><input type="number" name="biner" size="5" value="`+ biner[j] +`"></td>`
                                            }
                                            html +=`
                                            <td width="10%">`+ biner.length +` Projects</td>
                                        <tr/>
                                    </table>
								</form>
								`							
                            }
                            html += `</div>`;
						}

						localStorage.setItem("idKeyBiner", keyStorage.toString());
                        $("#myTab3Value").html(html)
                        $("#myTab3").html(header)
					}
				});

				$("#updateButton").click(function(event) {
					let idKeyBinerArray = localStorage.getItem("idKeyBiner").split(",");
					
					var parameter = $('.parameter').length;
					var parameter_result = [];
					for (i = 0; i < parameter; i++) { 
						parameter_result.push(new Array($('.parameter').eq(i).val()));
					}

					let formArray = []
					for (let i = 0; i < idKeyBinerArray.length; i++) {
						let singleFormArray = $("#updateForm-"+ idKeyBinerArray[i]).serializeArray()

						let biner = []
						let formArrayBiner = singleFormArray.slice(3)

						for (let j = 0; j < formArrayBiner.length; j++) {
							biner.push(formArrayBiner[j].value)		
						}

						let data = {
							id: singleFormArray[0].value,
							name: singleFormArray[1].value,
							parameter: singleFormArray[2].value,
							biner: biner.toString()
						}
						formArray.push(data)
					}

					let binerWithParameter = []
					for (let h = 0; h < parameter_result.length; h++) {
						let allBinerArray = []
						for (let i = 0; i < idKeyBinerArray.length; i++) {
							let singleFormArray = $("#updateForm-"+ idKeyBinerArray[i]).serializeArray()
							if (parameter_result[h][0] == singleFormArray[2].value) {
								let formArrayBiner = singleFormArray.slice(3)
								let biner = []
								for (let j = 0; j < formArrayBiner.length; j++) {
									biner.push(formArrayBiner[j].value)		
								}
								allBinerArray.push(biner)
							}
						}

						let array_biner = allBinerArray, restructured_biner_sum = array_biner.reduce((r, a) => a.map((b, i) => parseInt((r[i] || 0)) + parseInt(b)), []);
						
						let databinerWithParameterTemp = {
							parameter: parameter_result[h][0],
							biner: restructured_biner_sum.toString()
						}

						binerWithParameter.push(databinerWithParameterTemp)
					}

					$.ajax({
						url: base_url +"cores/csv",
						type: 'PUT',
						data: {
							key_biner: JSON.stringify(formArray),
							sum: JSON.stringify(binerWithParameter),
						},
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
					event.preventDefault();
				});
			}); 
		</script>