<div class="container p-sm-0">
	<div class="headerImage"></div>
	<div class="block-header">
		<div class="card">
			<div class="header headerTitle">
				Wat wilt u melden?
			</div>
		</div>
	</div>
</div>
<div class="container">
    <div class="row clearfix">
   		<form id="reportMelding" action="" method="">
			{% for block in pageblocks %}
				{% if block.blockname == "DESCRIPTION" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="description" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		        {% elseif block.blockname == "MOREINFO" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="moreinfo" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		        {% elseif block.blockname == "WEAPONLOCATION" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="weaponlocation" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		        {% elseif block.blockname == "STOLENOBJECT" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="stolenobject" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		        {% elseif block.blockname == "VICTIM" %}
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header mldColor">
		                            <h2>{{ block.title }}</h2>
		                        </div>
		                        <div class="body">
		                            <div class="row clearfix">
		                                <div class="col-sm-12 margin0">
		                                    <div class="form-group margin0">
		                                        <div class="form-line">
		                                            <textarea rows="4" class="form-control no-resize" name="victim" placeholder=""></textarea>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
				{% elseif block.blockname == "UNCONSCIOUS" %}
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="btn-group btn-toggle btn-group-justified jaNeeToggle" id="toggle_event_editing">
	                                        <button type="button" class="btn btn-default waves-effect ja">Ja</button>
	                                        <button type="button" class="btn btn-info waves-effect nee">Nee</button>
	                                        <input type="hidden" name="unconscious" class="jaNee" value="0">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            {% elseif block.blockname == "ISWEAPONPRESENT" %}
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="btn-group btn-toggle btn-group-justified jaNeeToggle" id="toggle_event_editing">
	                                        <button type="button" class="btn btn-default waves-effect ja">Ja</button>
	                                        <button type="button" class="btn btn-info waves-effect nee">Nee</button>
											<input type="hidden" name="isweaponpresent" class="jaNee" value="0">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				{% elseif block.blockname == "CONTACT" %}
					{% if block.required == 1 %}
					<!-- Example Tab -->
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>

		                        <div class="body padding0">
		                            <!-- Nav tabs -->

		                            <!-- Tab panes -->
		                                <div role="tabpanel" class="tab-pane fade in active" id="ja">
						       				<div class="body">
					                                <label for="contact_name">Wat is u naam?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                                <label for="contact_number">Wat is uw telefoonnummer?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="contact_number" name="contact_number" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                                <label for="contact_email">Wat is uw e-mailadres?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="contact_email" name="contact_email" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                        </div>
		                                <div role="tabpanel" class="tab-pane fade" id="nee"></div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            <!-- #END# Example Tab -->
					{% else %}
		 			<!-- Example Tab -->
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>

		                        <div class="body padding0">
		                            <!-- Nav tabs -->
		                            <ul class="nav nav-tabs tab-nav-right nav-justified" role="tablist">
		                                <li role="presentation" class="active"><a href="#ja" data-toggle="tab">Ja</a></li>
		                                <li role="presentation"><a href="#nee" data-toggle="tab">Nee</a></li>
		                            </ul>

		                            <!-- Tab panes -->
		                            <div class="tab-content">
		                                <div role="tabpanel" class="tab-pane fade in active" id="ja">
		       
						       				<div class="body padding0">
					                                <label for="contact_name">Wat is uw naam?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                                <label for="contact_number">Wat is uw telefoonnummer?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="contact_number" name="contact_number" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                                <label for="contact_email">Wat is uw e-mailadres?</label>
					                                <div class="form-group">
					                                    <div class="form-line">
					                                        <input type="text" id="contact_email" name="contact_email" class="form-control" placeholder="">
					                                    </div>
					                                </div>
					                        </div>
						                </div>
		                                <div role="tabpanel" class="tab-pane fade" id="nee"></div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            <!-- #END# Example Tab -->
		            {% endif %}
		        {% elseif block.blockname == "IMAGES" %} <!-- Hoe gaan we deze oplossen nog!  -->
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
		                                    <div class="table-responsive">
		                                        <table class="table ">
		                                            <td style="vertical-align: middle;">Test.png</td>
		                                            <td style="width: 50px;">
		                                                <button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
		                                                    <i class="material-icons">mode_edit</i>
		                                                </button>
		                                            </td>
		                                            <td style="width: 50px;">
		                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
		                                                    <i class="material-icons">delete</i>
		                                                </button>
		                                            </td>
		                                        </table>
		                                    </div>
	                                        <button type="button" class="btn btnSubmit btn-block btn-lg btn-default waves-effect">Voeg afbeelding toe</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            {% elseif block.blockname == "VEHICLE" %} <!-- Hoe gaan we deze oplossen nog!  -->
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
		                                    <div class="table-responsive">
		                                        <table class="table ">
		                                        	<tr>
			                                            <td style="vertical-align: middle;">tesla</td>
			                                            <td style="width: 50px;">
			                                                <button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
			                                                    <i class="material-icons">mode_edit</i>
			                                                </button>
			                                            </td>
			                                            <td style="width: 50px;">
			                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
			                                                    <i class="material-icons">delete</i>
			                                                </button>
			                                            </td>
		                                            </tr>
		                                        	<tr>
			                                            <td style="vertical-align: middle;">fiets</td>
			                                            <td style="width: 50px;">
			                                                <button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">
			                                                    <i class="material-icons">mode_edit</i>
			                                                </button>
			                                            </td>
			                                            <td style="width: 50px;">
			                                                <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
			                                                    <i class="material-icons">delete</i>
			                                                </button>
			                                            </td>
		                                            </tr>
		                                        </table>
		                                    </div>
	                                        <button type="button" class="btn btnSubmit btn-block btn-lg btn-default waves-effect">Voeg voertuig toe</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
		   		{% elseif block.blockname == "WEAPONTYPE_ID" %}
			               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			                   <div class="card">
			                       <div class="header mldColor">
										<h2>{{ block.title }}</h2>
			                       </div>
			                       <div class="body">
			                           <div class="row clearfix">
			                               <div class="col-sm-12 margin0">
			                                   <select id="weaponSelector" name="weapontype_id" class="form-control show-tick">
			                                   		{% for weapon in weapons %}
			                                       		<option value="{{ weapon.id }}">{{ weapon.name }}</option>
			                                       	{% endfor %}
			                                   </select>
			                                   <div id="otherwaepon" style=" display: none;">
													<br>
													<div class='form-group margin0'>
														<div class='form-line'>
															<input type='text' name='weapontypeother' id='email_address' class='form-control'>
														</div>
													</div>
			                                   </div>
			                               </div>
			                           </div>
			                       </div>
			                   </div>
			               </div>
			      <script>
					$('#weaponSelector').on('change', function() {        
						var option = $(this).find('option:selected').text();
						  if (option == "Anders") {
						      $( "#otherwaepon" ).show();
						  } else {
						      $( "#otherwaepon" ).hide();
						  }
					})
				</script>
			   	{% elseif block.blockname == "DRUGSACTION_ID" %} <!-- Deze nog even testen !!!!!! -->
			               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			                   <div class="card">
			                       <div class="header mldColor">
										<h2>{{ block.title }}</h2>
			                       </div>
			                       <div class="body">
			                           <div class="row clearfix">
			                               <div class="col-sm-12 margin0">
			                                   <select name="drugsaction_id" class="form-control show-tick">
			                                   		{% for drugs_action in drugs_actions %}
			                                       		<option value="{{ drugs_action.id }}">{{ drugs_action.name }}</option>
			                                       	{% endfor %}
			                                   </select>
			                               </div>
			                           </div>
			                       </div>
			                   </div>
			               </div>
				{% elseif block.blockname == "PERSON" %}
				    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
								<h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
	                                        <div class="table-responsive">
	                                            <table class="table">
													<tbody id="table_persons">
														<!-- data inserted by script -->
													</tbody>
	                                            </table>
	                                        </div>
	                                        <button type="button" class="btn btnSubmit btn-block btn-lg btn-default waves-effect" data-toggle="modal" data-target="#modal_AddPerson">Voeg persoon toe</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				{% elseif block.blockname == "DATEOFTHEFT" %}
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
	                            <h2>
	                                <h2>{{ block.title }}</h2>
	                            </h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
	                                        <div class="form-line">
	                                            <input type="text" name="dateoftheft" class="datetimepicker form-control" placeholder="Please choose date & time...">
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
		   		{% elseif block.blockname == "FIGHTERCOUNT" %}
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="header mldColor">
	                            <h2>{{ block.title }}</h2>
	                        </div>
	                        <div class="body">
	                            <div class="row clearfix">
	                                <div class="col-sm-12 margin0">
	                                    <div class="form-group margin0">
	                                        <div class="form-line">
	                                            <input type="number" name="fightercount" class="form-control no-resize" value="2" placeholder="">
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
				{% endif %}
			{% endfor %}
			<input type="hidden" name="report_id" value="{{ report_id }}">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="submit" name='postreport' class="btn btnSubmit btn-block btn-lg btn-default waves-effect fontsize18">Melding versturen</button>
			</div>
		</form>
    </div>
</div>

{% for block in pageblocks %}
	{% if block.blockname == "PERSON" %}
		<div class="modal fade" id="modal_AddPerson" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="largeModalLabel">Voeg een persoon toe</h4>
					</div>
					<form id="form_AddPerson" action="" method="">
						<div class="modal-body">
							
								<h4>Hoe heet de persoon?</h4>
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" name="person_name" />
									</div>
								</div>
								
								<h4>Wat is het geslacht van de persoon?</h4>
								<div class="form-group">
									<div class="form-line">
										<select name="person_sex" class="form-control show-tick">
											<option value="0">Onbekend</option>
											<option value="1">Man</option>
											<option value="2">Vrouw</option>
										</select>
									</div>
								</div>
								
								<h4>Welke huidskleur heeft de persoon?</h4>
								<div class="form-group">
									<div class="form-line">
										<select name="person_skincolor" class="form-control show-tick">
											<option value="0">Blank</option>
											<option value="1">Licht getint</option>
											<option value="2">Donker</option>
										</select>
									</div>
								</div>
								
								<h4>Hoe oud is de persoon?</h4>
								<div class="form-group">
									<div class="form-line">
										<select name="person_age" class="form-control show-tick">
											<option value="0">Jonger dan 12</option>
											<option value="1">Tussen 12 en 30</option>
											<option value="2">Tussen 21 en 35</option>
											<option value="3">Ouder dan 35</option>
										</select>
									</div>
								</div>
								
								<h4>Wat voor kleding draagt de persoon?</h4>
								<div class="form-group">
									<div class="form-line">
										<textarea rows="3" class="form-control no-resize auto-growth" name="person_clothing"></textarea>
									</div>
								</div>
								
								<h4>Heeft de persoon nog andere opvallende kenmerken?</h4>
								<div class="form-group">
									<div class="form-line">
										<textarea rows="3" class="form-control no-resize auto-growth" name="person_uniqueproperties"></textarea>
									</div>
								</div>
							
						</div>
						<div class="modal-footer">
							<div class="row clearfix">
								<div class="col-xs-6">
									<button type="button" class="btn btn-block btn-lg bg-red waves-effect" data-dismiss="modal">SLUITEN</button>
								</div>
								<div class="col-xs-6">
									<button type="button" id="postPerson" class="btn btn-block btn-lg btn-success waves-effect">OPSLAAN</button>
								</div>
							</div>
						</div>
						
						<input type="hidden" name="person_report_id" value="{{ report_id }}">
					</form>
				</div>
			</div>
		</div>
	{% endif %}
{% endfor %}

<script>
	$(document).ready(function() {
        $("form#reportMelding").submit(function(){
            event.preventDefault();
            
            $.ajax({
                type: 'POST',
                url: '{{ API_URL }}report/',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
					{% if DEBUG %}
						console.log("Succes:");
						console.log(data);
					{% endif %}
					
                    swal(
                        'Succesvol verzonden!',
                        'uw melding is verzonden!',
                        'success'
                    )

                },
                error: function(data) {
					{% if DEBUG %}
						console.log("Error:");
						console.log(data);
					{% endif %}
					
                    swal(
                        'Verzenden mislukt!',
                        'Er is iets mis gegaan met het verzenden van uw melding, probeer het later opnieuw.',
                        'error'
                    )
                    
                }
            });
        });
		
		var auto_refresh = setInterval(
			function () {			
				updateForm();
			}, 5000
		);
		$.ajaxSetup({ cache: true });
		
		var updateForm = function() {
			$.ajax({
                type: 'POST',
                url: '{{ API_URL }}report/',
                data: $("form#reportMelding").serialize(),
                dataType: 'json',
                success: function(data) {
					{% if DEBUG %}
						console.log("Succes:");
						console.log(data);
					{% endif %}

                },
                error: function(data) {
					{% if DEBUG %}
						console.log("Error:");
						console.log(data);
					{% endif %}
                }
            });
		};
		
		$("#postPerson").click(function() {
			$.ajax({
                type: 'POST',
                url: '{{ API_URL }}report/addPerpetrator',
                data: $("form#form_AddPerson").serialize(),
                dataType: 'json',
                success: function(data) {
					{% if DEBUG %}
						console.log("Succes:");
						console.log(data);
					{% endif %}
					
					var htmldata = 
						  '	<tr data-perpetrator_id="' + data.perpetrator_id + '">'
						+ '		<td style="vertical-align: middle;">' + data.perpetrator_data.name + '</td>'
						+ '		<td style="width: 50px;">'
						+ '			<button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">'
						+ '				<i class="material-icons">mode_edit</i>'
						+ '			</button>'
						+ '		</td>'
						+ '		<td style="width: 50px;">'
						+ '			<button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">'
						+ '				<i class="material-icons">delete</i>'
						+ '			</button>'
						+ '		</td>'
						+ '	</tr>'
					;
					
					$("#table_persons").append(htmldata);
					
					
					$('#modal_AddPerson').modal('hide');
					$('form#form_AddPerson')[0].reset();
                },
                error: function(data) {
					{% if DEBUG %}
						console.log("Error:");
						console.log(data);
					{% endif %}
                }
            });
		});
    });
</script>

<script>
	// Load all data
	
	$(document).ready(function() {
		$.getJSON("{{ API_URL }}report/currentReport", function(data) {			
			var form_AddPerson = $('form#reportMelding');
			
			console.log('%c Oh my heavens! ', 'color: #bada55');
			
			console.log("======= REPORT DATA =======");
			console.log(data);
			console.log("===== END REPORT DATA =====");
			
			form_AddPerson.find('input[name="fightercount"]')		.val( data.fightercount );
			form_AddPerson.find('input[name="weapontype_id"]')		.val( data.weapontype_id );
			form_AddPerson.find('input[name="weapontypeother"]')	.val( data.weapontypeother );
			form_AddPerson.find('input[name="unconscious"]')		.val( data.unconscious );
			form_AddPerson.find('input[name="isweaponpresent"]')	.val( data.isweaponpresent );
			form_AddPerson.find('input[name="drugsaction_id"]')		.val( data.drugsaction_id );
			form_AddPerson.find('input[name="dateoftheft"]')		.val( data.dateoftheft );
			form_AddPerson.find('input[name="contact_name"]')		.val( data.contact_data.name );
			form_AddPerson.find('input[name="contact_number"]')		.val( data.contact_data.phonenumber );
			form_AddPerson.find('input[name="contact_email"]')		.val( data.contact_data.emailadress );
			
			form_AddPerson.find('textarea[name="description"]')		.text( data.description );
			form_AddPerson.find('textarea[name="moreinfo"]')		.text( data.moreinfo );
			form_AddPerson.find('textarea[name="weaponlocation"]')	.text( data.weaponlocation );
			form_AddPerson.find('textarea[name="victim"]')			.text( data.victim );
			form_AddPerson.find('textarea[name="stolenobject"]')	.text( data.stolenobject );
			
			var items = [];
			$.each(data.perpetrators, function(key, val) {
				var htmldata = 
					  '	<tr data-perpetrator_id="' + val.perpetrator_id + '">'
					+ '		<td style="vertical-align: middle;">' + val.perpetrator_data.name + '</td>'
					+ '		<td style="width: 50px;">'
					+ '			<button type="button" class="btn bg-light-green btn-circle waves-effect waves-circle waves-float">'
					+ '				<i class="material-icons">mode_edit</i>'
					+ '			</button>'
					+ '		</td>'
					+ '		<td style="width: 50px;">'
					+ '			<button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">'
					+ '				<i class="material-icons">delete</i>'
					+ '			</button>'
					+ '		</td>'
					+ '	</tr>'
				;
				
				$("#table_persons").append(htmldata);
			});
		});
	});
</script>

<script>
	$('.jaNeeToggle .ja, .jaNeeToggle .nee').click(function () {
		var jaNeeElement = $(this).parent().find('.jaNee');
	    if (jaNeeElement.val() == "0") {
			jaNeeElement.val("1");
		} else if (jaNeeElement.val() == "1") {
			jaNeeElement.val("0");
		}
	});
</script>