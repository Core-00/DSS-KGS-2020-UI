

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
                            <div class="tab-pane fade show `+ active +`" id="tab-`+ response[h].id +`" role="tabpanel" aria-labelledby="`+ response[h].id +`-tab">`
							for (let i = 0; i < response[h].key_biners.length; i++) {
								keyStorage.push(response[h].key_biners[i].id)
								
								html += `
								<form name="updateForm-`+ response[h].key_biners[i].id +`" id="updateForm-`+ response[h].key_biners[i].id +`">
                                    <table class="table table-hover table-striped table-bordered mb-5">
                                        <tr>
                                            <td width="5%">`+ parseInt(i+1, 10) +`</td>
                                            <td width="30%">
                                                `+ response[h].key_biners[i].name +`
                                            </td>
                                            `;
                                            let biner = response[h].key_biners[i].biner.split(",")
                                            for (let j = 0; j < biner.length; j++) {
                                                html +=`<td align="center"><b>`+ biner[j] +`</b></td>`
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
                        $("#myTab3Value").html(html)
                        $("#myTab3").html(header)
					}
				});
			}); 
		</script>